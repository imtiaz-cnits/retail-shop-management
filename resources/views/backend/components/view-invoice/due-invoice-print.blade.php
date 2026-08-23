<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Invoice {{ $invoice->order_no }} - মেসার্স আনিস ষ্টোর</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Google Fonts: BricolageGrotesque & TiroBangla -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla:ital@0;1&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Css for basic screen layout buttons -->
    <link href="{{ asset('back-end/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <style>
        body {
            background-color: #f5f5f5;
            margin: 0;
            padding: 15px;
            font-family: 'BricolageGrotesque', 'TiroBangla', sans-serif;
            color: #000;
            font-size: 9.5px;
        }

        .no-print-wrapper {
            max-width: 5.8in;
            margin: 0 auto 15px auto;
            display: flex;
            gap: 10px;
        }

        /* Invoice Container styled for 5.8 x 8.3 inches Portrait */
        .invoice-container {
            background: #ffffff;
            padding: 6mm 5mm;
            border: 1.5px solid #000 !important;
            width: 5.8in;
            min-height: 8.3in;
            margin: 0 auto;
            box-sizing: border-box !important;
        }

        /* Header Layout */
        .invoice-header {
            text-align: center;
            border-bottom: 2px solid #000 !important;
            padding-bottom: 4px;
            margin-bottom: 6px;
        }
        .invoice-header h1 {
            font-size: 15px;
            font-weight: 700;
            margin: 0 0 2px 0;
        }
        .invoice-header p {
            font-size: 9px;
            margin: 0 0 2px 0;
            line-height: 1.2;
        }

        /* Details info grid */
        .info-grid {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 6px;
            gap: 8px;
        }
        .customer-info {
            width: 60%;
        }
        .customer-info table {
            width: 100%;
            font-size: 9.5px;
            line-height: 1.3;
            border-collapse: collapse;
        }
        .customer-info td {
            padding: 1px 0;
            vertical-align: top;
            text-align: left;
        }

        .metadata-box {
            width: 100% !important;
            border: 1.5px solid #000 !important;
            padding: 4px;
            border-radius: 4px;
            background-color: #ffffff;
            box-sizing: border-box !important;
            overflow: hidden !important;
        }
        .metadata-box table {
            width: 100%;
            font-size: 9.5px;
            line-height: 1.3;
            border-collapse: collapse;
        }
        .metadata-box td {
            padding: 1px 0;
        }

        /* Goods Table */
        .invoice_table_list {
            width: 100%;
            border-collapse: collapse;
            border: 1.5px solid #000 !important;
            font-size: 9.5px;
            margin-bottom: 6px;
            box-sizing: border-box !important;
        }
        .invoice_table_list th, 
        .invoice_table_list td {
            border: 1.5px solid #000 !important;
            padding: 2px 4px !important;
            box-sizing: border-box !important;
        }
        .invoice_table_list th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }
        .invoice_table_list tr {
            page-break-inside: avoid;
            break-inside: avoid;
        }

        /* Calculations boxes */
        .calculations-wrap {
            display: flex;
            justify-content: space-between;
            font-size: 9.5px;
            line-height: 1.3;
            gap: 8px;
            margin-bottom: 6px;
        }
        .calc-box {
            width: 49%;
            border: 1.5px dashed #000 !important;
            padding: 4px !important;
            box-sizing: border-box !important;
        }
        .calc-box table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9.5px;
        }
        .calc-box td {
            padding: 1px 0;
        }

        /* Footer Details */
        .footer-info {
            margin-top: 8px;
            font-size: 9px;
        }
        .footer-info-row {
            display: flex;
            justify-content: space-between;
        }

        /* Print Media Styles for exact 5.8 x 8.3 inches Paper */
        @media print {
            @page {
                size: 5.8in 8.3in portrait;
                margin: 0mm;
            }
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                box-sizing: border-box !important;
            }
            html, body {
                width: 5.8in !important;
                height: 8.3in !important;
                margin: 0 auto !important;
                padding: 0 !important;
                background: #ffffff !important;
                overflow: hidden !important;
            }
            .no-print-wrapper {
                display: none !important;
            }
            .invoice-container {
                border: 1.5px solid #000 !important;
                width: 5.8in !important;
                max-width: 5.8in !important;
                height: 8.3in !important;
                max-height: 8.3in !important;
                padding: 5mm 4mm !important;
                margin: 0 auto !important;
                box-shadow: none !important;
                box-sizing: border-box !important;
                page-break-after: avoid !important;
                break-after: avoid !important;
                page-break-inside: avoid !important;
            }
            .metadata-box {
                border: 1.5px solid #000 !important;
            }
            .invoice_table_list {
                border: 1.5px solid #000 !important;
            }
            .invoice_table_list th, 
            .invoice_table_list td {
                border: 1.5px solid #000 !important;
                padding: 2px 4px !important;
            }
            .calc-box {
                border: 1.5px dashed #000 !important;
                box-sizing: border-box !important;
            }
        }
    </style>
</head>
<body>

    <!-- Control Buttons (Hidden during printing) -->
    <div class="no-print-wrapper" style="max-width: 5.8in; margin: 0 auto 15px auto; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
        <button class="btn btn-success" onclick="window.print()" style="font-size: 15px; font-weight: bold; background-color: #15803d; border-color: #15803d;">
            <i class="fa-solid fa-print me-1"></i> Print Invoice (A5 / Half-A4)
        </button>
        <div class="d-flex gap-2">
            <a href="{{ url('admin-dashboard-pos') }}" class="btn btn-warning fw-bold text-dark" style="font-size: 14px; border-radius: 6px;">
                <i class="fa-solid fa-basket-shopping me-1"></i> Back to POS (পস পেজ)
            </a>
            <a href="{{ url('admin-dashboard-invoice') }}" class="btn btn-secondary fw-bold" style="font-size: 14px; border-radius: 6px;">
                <i class="fa-solid fa-list me-1"></i> All Invoices
            </a>
        </div>
    </div>

    @php
        if (!function_exists('bnNum')) {
            function bnNum($number) {
                $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                $bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                return str_replace($en, $bn, (string)$number);
            }
        }
        $subTotalVal = $invoice->sub_total ?? 0;
        $discountVal = $invoice->discount_amount ?? 0;
        $paidVal = $invoice->paid_amount ?? 0;
        $dueVal = $invoice->due_amount ?? 0;
        $prevDueVal = $actualPreviousDue ?? 0;
        $totalDueVal = $totalDue ?? ($prevDueVal + $dueVal);
        $billTotalVal = $subTotalVal - $discountVal;
    @endphp

    <!-- Printable Invoice Container -->
    <div class="invoice-container" id="printArea">
        <table style="width: 100%; border-collapse: collapse; border: none;">
            <thead>
                <tr>
                    <td colspan="6" style="border: none; padding: 0;">
                        <!-- Header Section -->
                        <div class="invoice-header">
                            <h1>মেসার্স আনিস ষ্টোর</h1>
                            <p>বিভিন্ন প্রকার দেশী বিদেশী কমেটিক, ষ্টেশনারী, ইমিটেশন, ব্রেসিয়ার, পেন্টি, বেল্ট পাইকারী ও খুচরা বিক্রেতা ৷</p>
                            <p style="font-weight: bold;">ঝালাইপট্টি, পাবনা ৷</p>
                            <p style="font-weight: bold;">মোবাইলঃ ০১৭৯২-৮৩৩৭৪৭, ০১৭১১-৪৫১৩৩</p>
                        </div>

                        <!-- Billing Info Section -->
                        <table style="width: 100%; border: none; font-size: 11px; margin-bottom: 8px; border-collapse: collapse;">
                            <tr>
                                <td style="width: 60%; vertical-align: top; border: none; padding: 0; text-align: left;">
                                    <table style="width: 100%; font-size: 11px; line-height: 1.4; border-collapse: collapse;">
                                        <tr>
                                            <td style="width: 100px; font-weight: bold; border: none; padding: 1px 0; text-align: left;">গ্রাহক কোড:</td>
                                            <td style="border: none; padding: 1px 0; text-align: left;">{{ bnNum($invoice->customer->customer_id ?? $invoice->customer->id ?? 'N/A') }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; border: none; padding: 1px 0; text-align: left;">গ্রাহকের নাম:</td>
                                            <td style="font-weight: bold; border: none; padding: 1px 0; text-align: left;">{{ $invoice->customer->customer_name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; border: none; padding: 1px 0; text-align: left;">ঠিকানা:</td>
                                            <td style="border: none; padding: 1px 0; text-align: left;">{{ $invoice->customer->address_details ?? $invoice->customer->address ?? 'N/A' }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 40%; vertical-align: top; border: none; padding: 0;">
                                    <div class="metadata-box" style="border: 1.5px solid #000 !important; padding: 6px; border-radius: 4px; background-color: #ffffff; box-sizing: border-box !important; margin-left: auto; width: 100%;">
                                        <table style="width: 100%; font-size: 11px; line-height: 1.4; border-collapse: collapse;">
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 1px 0;">তারিখ:</td>
                                                <td style="text-align: right; border: none; padding: 1px 0;">{{ bnNum(\Carbon\Carbon::parse($invoice->created_at)->format('d-m-Y')) }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 1px 0;">মেমো নং:</td>
                                                <td style="text-align: right; font-weight: bold; border: none; padding: 1px 0;">{{ bnNum($invoice->order_no) }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 1px 0;">সময়:</td>
                                                <td style="text-align: right; border: none; padding: 1px 0;">{{ bnNum(\Carbon\Carbon::parse($invoice->created_at)->format('h:i:s A')) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr style="border-bottom: 2px solid #000; background-color: #f2f2f2;">
                    <th style="border: 1.5px solid #000 !important; padding: 4px; text-align: center; width: 8%;">ক্রমিক</th>
                    <th style="border: 1.5px solid #000 !important; padding: 4px; text-align: center; width: 22%;">পণ্য কোড</th>
                    <th style="border: 1.5px solid #000 !important; padding: 4px; text-align: left; width: 40%;">পণ্যের বিবরণ</th>
                    <th style="border: 1.5px solid #000 !important; padding: 4px; text-align: center; width: 10%;">পরিমাণ</th>
                    <th style="border: 1.5px solid #000 !important; padding: 4px; text-align: right; width: 10%;">দর (টাকা)</th>
                    <th style="border: 1.5px solid #000 !important; padding: 4px; text-align: right; width: 10%;">মোট টাকা</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($invoice->details as $index => $detail)
                @php
                    $codes = json_decode($detail->product->product_code ?? '[]', true);
                    $codeStr = is_array($codes) ? ($codes[0] ?? 'N/A') : ($detail->product->product_code ?? 'N/A');
                @endphp
                <tr>
                    <td style="border: 1.5px solid #000 !important; padding: 4px; text-align: center;">{{ bnNum($index + 1) }}</td>
                    <td style="border: 1.5px solid #000 !important; padding: 4px; text-align: center;">{{ bnNum($codeStr) }}</td>
                    <td style="border: 1.5px solid #000 !important; padding: 4px; text-align: left;">{{ $detail->product->product_name ?? 'N/A' }}</td>
                    <td style="border: 1.5px solid #000 !important; padding: 4px; text-align: center;">{{ bnNum($detail->quantity) }}</td>
                    <td style="border: 1.5px solid #000 !important; padding: 4px; text-align: right;">{{ bnNum(number_format($detail->selling_price, 2)) }}</td>
                    <td style="border: 1.5px solid #000 !important; padding: 4px; text-align: right;">{{ bnNum(number_format($detail->selling_price * $detail->quantity, 2)) }}</td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="6" style="border: none; padding: 0;">
                        <!-- Calculations Section (Split 50% left & 50% right) -->
                        <table style="width: 100%; border: none; font-size: 11px; margin-top: 15px; border-collapse: collapse;">
                            <tr>
                                <td style="width: 49%; vertical-align: top; padding: 0; border: none;">
                                    <div class="calc-box" style="border: 1.5px dashed #000 !important; padding: 6px; box-sizing: border-box !important; width: 100%;">
                                        <table style="width: 100%; border-collapse: collapse;">
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 2px 0;">পূর্বের বকেয়া -</td>
                                                <td style="text-align: right; font-weight: bold; border: none; padding: 2px 0;">{{ bnNum(number_format($prevDueVal, 2)) }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 2px 0;">সর্বমোট বকেয়া -</td>
                                                <td style="text-align: right; font-weight: bold; border: none; padding: 2px 0;">{{ bnNum(number_format($totalDueVal, 2)) }}</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #000;">
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 2px 0; padding-top: 2px;">আজকের জমা -</td>
                                                <td style="text-align: right; font-weight: bold; border: none; padding: 2px 0; padding-top: 2px;">{{ bnNum(number_format($paidVal, 2)) }}</td>
                                            </tr>
                                            <tr style="border-top: 1px double #000; font-weight: bold;">
                                                <td style="text-align: left; border: none; padding: 2px 0; padding-top: 2px;">অবশিষ্ট বকেয়া -</td>
                                                <td style="text-align: right; border: none; padding: 2px 0; padding-top: 2px;">{{ bnNum(number_format($dueVal, 2)) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                                <td style="width: 2%; border: none;"></td>
                                <td style="width: 49%; vertical-align: top; padding: 0; border: none;">
                                    <div class="calc-box" style="border: 1.5px dashed #000 !important; padding: 6px; box-sizing: border-box !important; width: 100%;">
                                        <table style="width: 100%; border-collapse: collapse;">
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 2px 0;">আজকের বিল -</td>
                                                <td style="text-align: right; font-weight: bold; border: none; padding: 2px 0;">{{ bnNum(number_format($subTotalVal, 2)) }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 2px 0;">অন্যান্য / ছাড় -</td>
                                                <td style="text-align: right; font-weight: bold; border: none; padding: 2px 0;">{{ bnNum(number_format($discountVal, 2)) }}</td>
                                            </tr>
                                            <tr style="border-top: 1px double #000; font-weight: bold;">
                                                <td style="text-align: left; border: none; padding: 2px 0; padding-top: 2px;">মোট বিল -</td>
                                                <td style="text-align: right; border: none; padding: 2px 0; padding-top: 2px;">{{ bnNum(number_format($billTotalVal, 2)) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <!-- Footer Details -->
                        <div class="footer-info" style="margin-top: 15px;">
                            <div class="footer-info-row">
                                <div><strong>অপারেটর:</strong> <span>{{ $invoice->user->name ?? 'অ্যাডমিন' }}</span></div>
                                <div><strong>কথায়:</strong> <span id="taka_words">{{ bnNum(number_format($billTotalVal, 2)) }} টাকা মাত্র</span></div>
                            </div>
                            <div><strong>নোট/বিবরণ:</strong> <span>{{ $invoice->order_note ?? 'N/A' }}</span></div>
                        </div>

                        <!-- Signatures Section -->
                        <table style="width: 100%; margin-top: 25px; font-size: 10px; border: none; border-collapse: collapse; page-break-inside: avoid; break-inside: avoid;">
                            <tr>
                                <td style="width: 40%; text-align: center; border: none; border-top: 1px solid #000; padding-top: 2px;">
                                    <strong>গ্রাহকের স্বাক্ষর</strong>
                                </td>
                                <td style="width: 20%; border: none;"></td>
                                <td style="width: 40%; text-align: center; border: none; border-top: 1px solid #000; padding-top: 2px;">
                                    <strong>পক্ষে: মেসার্স আনিস ষ্টোর</strong>
                                </td>
                            </tr>
                        </table>

                        <!-- Branding Credit at the absolute bottom -->
                        <div style="font-size: 9px; color: #555; font-weight: bold; text-align: right; margin-top: 15px; font-family: sans-serif; border-top: 1px dashed #eee; padding-top: 5px; page-break-inside: avoid; break-inside: avoid;">
                            Software By: CodeNext IT (www.codenextit.com)
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ready for print
    });
</script>
</body>
</html>