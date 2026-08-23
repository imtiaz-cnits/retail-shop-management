<?php

require __DIR__ . '/../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderPaymentDetails;
use App\Models\Product;

$latestOrder = Order::with(['details.product', 'payment'])->latest()->first();

if (!$latestOrder) {
    echo "No order found!\n";
    exit;
}

echo "Order ID: " . $latestOrder->id . "\n";
echo "Order No: " . $latestOrder->order_no . "\n";
echo "Current SubTotal: " . $latestOrder->sub_total . "\n";
echo "Current Paid: " . $latestOrder->paid_amount . "\n";

$calculatedSubtotal = 0;
foreach ($latestOrder->details as $detail) {
    echo "Detail ID: " . $detail->id . " | Product: " . ($detail->product->product_name ?? 'N/A') . " | Qty: " . $detail->quantity . " | Selling Price: " . $detail->selling_price . " | Product DB Selling Price: " . ($detail->product->selling_price ?? 0) . "\n";
    
    // If detail selling_price is 0 or less, update it from product's actual selling_price
    if ($detail->selling_price <= 0 && $detail->product) {
        $actualSellPrice = (float) $detail->product->selling_price;
        $actualCostPrice = (float) $detail->product->price;
        $detail->selling_price = $actualSellPrice;
        $detail->price = $actualCostPrice;
        $detail->save();
        echo "   -> Updated Detail ID {$detail->id} to Selling Price: {$actualSellPrice}, Price: {$actualCostPrice}\n";
    }
    
    $calculatedSubtotal += ($detail->selling_price * $detail->quantity);
}

echo "Calculated Subtotal: " . $calculatedSubtotal . "\n";

// Update Order subtotal, paid amount, due amount
if ($latestOrder->sub_total <= 0 || $latestOrder->details->where('selling_price', '<=', 0)->count() > 0) {
    $latestOrder->sub_total = $calculatedSubtotal;
    // Assuming this order was paid in full or partial:
    // If paid_amount is 0 and subtotal > 0, set paid_amount = calculatedSubtotal (or update as per calculation)
    if ($latestOrder->paid_amount <= 0) {
        $latestOrder->paid_amount = $calculatedSubtotal;
        $latestOrder->due_amount = 0;
    } else {
        $latestOrder->due_amount = max(0, $calculatedSubtotal - $latestOrder->discount_amount - $latestOrder->paid_amount);
    }
    $latestOrder->save();
    echo "-> Updated Order #{$latestOrder->id} Subtotal to: {$latestOrder->sub_total}, Paid: {$latestOrder->paid_amount}, Due: {$latestOrder->due_amount}\n";
    
    // Also update OrderPaymentDetails
    if ($latestOrder->payment) {
        $latestOrder->payment->paid_amount = $latestOrder->paid_amount;
        if ($latestOrder->due_amount == 0) {
            $latestOrder->payment->payment_status = 'Fully Paid';
        }
        $latestOrder->payment->save();
        echo "-> Updated OrderPaymentDetails for Order #{$latestOrder->id}\n";
    }
} else {
    echo "Order already has positive subtotal.\n";
}
