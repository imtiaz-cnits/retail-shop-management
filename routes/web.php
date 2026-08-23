<?php

use App\Http\Middleware\AdminOnly;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\ProductReturnController;
use App\Http\Controllers\OpeningBalanceController;


// User Registration API Route Strat
Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/admin-login-page', [UserController::class, 'UserLogin']);
Route::post('/nexus-login-page', [UserController::class, 'UserLogin']);
Route::post('/verify-otp', [UserController::class, 'VerifyOtp']);



// Route::post('/resend-otp', function (Request $request) {
//     $user = \App\Models\User::where('email', $request->email)->first();

//     if (!$user) {
//         return response()->json(['status' => 'failed', 'message' => 'User not found']);
//     }

//     $otp = rand(100000, 999999);
//     $user->otp = $otp;
//     $user->otp_expires_at = \Carbon\Carbon::now()->addMinutes(5);
//     $user->save();

//     \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\OtpMail($otp));

//     return response()->json(['status' => 'otp_sent', 'message' => 'OTP resent to your email']);
// });


// User Registration API Route End

// Front-end View Route Api Start
Route::redirect('/', '/admin-dashboard');
Route::view('/admin-login-page', 'auth.registration-form');
Route::redirect('/nexus-login-page', '/admin-login-page');
Route::view('/user-verify-otp', 'auth.user-login-otp');
Route::get('/user-profile', [UserController::class, 'UsersProfile'])->middleware('auth:sanctum');
Route::post('/user-update', [UserController::class, 'UpdateProfile'])->middleware('auth:sanctum');



Route::get('/naxus-pos-logout', [UserController::class, 'UserLogout'])->middleware('auth:sanctum');

// Front-end View Route Api End


// Dashboard View Page Route Start
Route::view('/admin-dashboard-invoice', 'backend.pages.invoice-view');
Route::view('/admin-dashboard-brand', 'backend.pages.brand');
Route::view('/admin-dashboard-category', 'backend.pages.category');
Route::view('/admin-dashboard-sub-category', 'backend.pages.sub-category');
Route::view('/admin-dashboard-unit', 'backend.pages.unit');
Route::view('/admin-dashboard-supplier', 'backend.pages.supplier');
Route::view('/supplier-due-collection-page', 'backend.pages.supplier-due-collection');
Route::view('/supplier-due-page', 'backend.pages.supplier-due');
Route::view('/admin-dashboard-Purchase', 'backend.pages.purchase');
Route::view('/admin-dashboard-product', 'backend.pages.product');
Route::view('/admin-dashboard-barcode-genarate', 'backend.components.barcode-genarate.barcode-print');
Route::view('/admin-dashboard-product-barcode', 'backend.components.product-barcode-print.barcode-print');
Route::view('/admin-dashboard-warehouse', 'backend.pages.warehouse');
Route::view('/admin-dashboard-pos', 'backend.components.pos.pos-page');
Route::view('/admin-dashboard-customer-invoice-report', 'backend.pages.customer-invoice-report');



Route::view('/admin-dashboard', 'backend.components.admindashboard');
Route::view('/customer-page', 'backend.pages.modal');
Route::view('/customer-due-collection-page', 'backend.pages.customer-due-collection');
Route::view('/admin-dashboard-customer-due-list', 'backend.pages.customer-due');


Route::view('/admin-dashboard-dsistrict', 'backend.pages.district');
Route::view('/admin-dashboard-upazila', 'backend.pages.upazila');
Route::view('/admin-dashboard-thana', 'backend.pages.thana');
Route::view('/admin-dashboard-location', 'backend.pages.location');
Route::view('/admin-dashboard-customer', 'backend.pages.customer');
Route::view('/admin-dashboard-opening-balance', 'backend.pages.opening-balance');


Route::get('/admin-dashboard-low-stock-notifications', [App\Http\Controllers\DashboardController::class, 'GetLowStockNotifications']);
Route::get('/admin-dashboard-low-stock-products-list', [App\Http\Controllers\DashboardController::class, 'GetAllLowStockProducts']);
Route::view('/admin-dashboard-low-stock-list', 'backend.pages.low-stock-product');

// Role & User Management Routes
Route::view('/admin-dashboard-user-role', 'backend.pages.user-role');
Route::get('/get-all-users', [UserController::class, 'GetAllUsers']);
Route::post('/create-user-admin', [UserController::class, 'CreateUserByAdmin']);
Route::post('/update-user-role-status', [UserController::class, 'UpdateUserRoleStatus']);
Route::post('/delete-user-admin', [UserController::class, 'DeleteUserByAdmin']);

// Dashboard View Route End



// report managment view page start

Route::view('/admin-dashboard-due-invoice', 'backend.components.report-management.invoice-due-report');
Route::view('/admin-dashboard-stock-out', 'backend.components.report-management.stock-out-report');

// report managment view page end


// invoice print start

Route::view('/invoice-print', 'backend.components.invoice.invoice-print');
Route::view('/due-invoice-print/{id}', 'backend.components.view-invoice.due-invoice-print');


Route::prefix('invoice')->group(function () {

    // Invoice Detail Page (By ID)
    Route::get('/{id}', [InvoiceController::class, 'InvoiceShowDetails'])->name('invoice.show');

    // API Routes for fetching data
    Route::post('/invoice-payment-details-by-id', [InvoiceController::class, 'getInvoiceDetailsById'])->name('invoice.details');
});


Route::prefix('purchase-invoice')->group(function () {

    // purchase Detail Page (By ID)
    Route::get('/{id}', [PurchasesController::class, 'PurchaseShowDetails'])->name('order.show');

    // API Routes for fetching data
    Route::post('/purchase-details-by-id', [PurchasesController::class, 'PurchaseDetailsById'])->name('order.details');
});

Route::prefix('return')->group(function () {

    // Return Detail Page (By ID)
    Route::get('/{id}', [ProductReturnController::class, 'ReturnShowDetails'])->name('return.show');

    // API Routes for fetching data
    Route::post('/return-details-by-id', [ProductReturnController::class, 'ReturnDetailsById'])->name('return.details');
});


Route::prefix('purchase-return')->group(function () {

    // Return Detail Page (By ID)
    Route::get('/{id}', [ProductReturnController::class, 'PurchaseReturnShowDetails'])->name('purchase-return.show');

    // API Routes for fetching data
    Route::post('/purchase-return-details-by-id', [ProductReturnController::class, 'PurchaseReturnDetailsById'])->name('purchase-return.details');
});



// Expence View Page Route Start

Route::view('/admin-dashboard-expence-type', 'backend.pages.expense-type');
Route::view('/admin-dashboard-expence-list', 'backend.pages.expense-list');
Route::view('/admin-dashboard-staff-profile', 'backend.pages.staff-profile');

// Expence View Page Route End

Route::view('/admin-dashboard-investor-info', 'backend.pages.investor-info');
Route::view('/admin-dashboard-invest-list', 'backend.pages.investor-info-list');



// Invesment Managment View Page Start End



// Report Management View Page Start

Route::view('/admin-dashboard-sales-report', 'backend.components.report-management.sales-report');
Route::view('/admin-dashboard-income-expense-report', 'backend.components.report-management.income-expense-report');
Route::view('/admin-dashboard-daily-receipt-payment-report', 'backend.components.report-management.daily-receipt-payment-report');
Route::view('/admin-dashboard-personal-transaction-report', 'backend.components.report-management.personal-transaction-report');
Route::view('/admin-best-selling-report', 'backend.components.report-management.best-selling-report');
Route::view('/admin-dashboard-daily-ledger-report', 'backend.components.report-management.daily-ledger-report');


// Report Management View Page End


// Return Managment View Page Start
Route::view('/admin-dashboard-return-list', 'backend.pages.return');

// Return Managment View Page End


Route::view('/admin-dashboard-user-profile', 'backend.components.user-profile.user-profile-page');

// কাস্টমার প্রোফাইল পেজ দেখানোর জন্য
Route::get('/customer/profile/{id}', [App\Http\Controllers\CustomerController::class, 'CustomerProfilePage']);

// সাপ্লাইয়ার প্রোফাইল পেজ দেখানোর জন্য
Route::get('/supplier/profile/{id}', [App\Http\Controllers\SupplierController::class, 'SupplierProfilePage']);




