<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Invoice - মেসার্স আনিস ষ্টোর</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Bootstrap Css for basic screen layout buttons -->
    <link href="{{ asset('back-end/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Axios -->
    <script src="{{ asset('back-end/assets/js/axios.min.js') }}"></script>
    
    <style>
        body {
            background-color: #f5f5f5;
            margin: 0;
            padding: 15px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, 'SolaimanLipi', 'Kalpurush', sans-serif;
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
        <button class="btn btn-success" onclick="window.print()" style="font-size: 14px; font-weight: bold; background-color: #15803d; border-color: #15803d;">
            <i class="fa-solid fa-print me-1"></i> ইনভয়েস প্রিন্ট করুন (A5 / Half-A4)
        </button>
        <div class="d-flex gap-2">
            <a href="{{ url('admin-dashboard-pos') }}" class="btn btn-warning fw-bold text-dark" style="font-size: 13px; border-radius: 6px;">
                <i class="fa-solid fa-basket-shopping me-1"></i> পস পেজে ফিরে যান
            </a>
            <a href="{{ url('admin-dashboard-invoice') }}" class="btn btn-secondary fw-bold" style="font-size: 13px; border-radius: 6px;">
                <i class="fa-solid fa-list me-1"></i> সকল ইনভয়েস
            </a>
        </div>
    </div>

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
                        <table style="width: 100%; border: none; font-size: 9.5px; margin-bottom: 6px; border-collapse: collapse;">
                            <tr>
                                <td style="width: 60%; vertical-align: top; border: none; padding: 0; text-align: left;">
                                    <table style="width: 100%; font-size: 9.5px; line-height: 1.3; border-collapse: collapse;">
                                        <tr>
                                            <td style="width: 90px; font-weight: bold; border: none; padding: 1px 0; text-align: left;">গ্রাহক কোড:</td>
                                            <td id="CustomerCode" style="border: none; padding: 1px 0; text-align: left;"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; border: none; padding: 1px 0; text-align: left;">গ্রাহকের নাম:</td>
                                            <td id="CustomerName" style="font-weight: bold; border: none; padding: 1px 0; text-align: left;"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; border: none; padding: 1px 0; text-align: left;">ঠিকানা:</td>
                                            <td id="CustomerAddress" style="border: none; padding: 1px 0; text-align: left;"></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 40%; vertical-align: top; border: none; padding: 0;">
                                    <div class="metadata-box" style="border: 1.5px solid #000 !important; padding: 4px; border-radius: 4px; background-color: #ffffff; box-sizing: border-box !important; margin-left: auto; width: 100%;">
                                        <table style="width: 100%; font-size: 9.5px; line-height: 1.3; border-collapse: collapse;">
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 1px 0;">তারিখ:</td>
                                                <td id="invoice_date" style="text-align: right; border: none; padding: 1px 0;"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 1px 0;">মেমো নং:</td>
                                                <td id="order_no" style="text-align: right; font-weight: bold; border: none; padding: 1px 0;"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 1px 0;">সময়:</td>
                                                <td id="invoice_time" style="text-align: right; border: none; padding: 1px 0;"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr style="border-bottom: 2px solid #000; background-color: #f2f2f2;">
                    <th style="border: 1px solid #000; padding: 2px 4px; text-align: center; width: 6%;">ক্রমিক</th>
                    <th style="border: 1px solid #000; padding: 2px 4px; text-align: center; width: 18%;">পণ্য কোড</th>
                    <th style="border: 1px solid #000; padding: 2px 4px; text-align: left; width: 44%;">পণ্যের বিবরণ</th>
                    <th style="border: 1px solid #000; padding: 2px 4px; text-align: center; width: 8%;">পরিমাণ</th>
                    <th style="border: 1px solid #000; padding: 2px 4px; text-align: right; width: 12%;">দর (টাকা)</th>
                    <th style="border: 1px solid #000; padding: 2px 4px; text-align: right; width: 12%;">মোট টাকা</th>
                </tr>
            </thead>
            
            <tbody id="order_details">
                <!-- Javascript loaded -->
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="6" style="border: none; padding: 0;">
                        <!-- Calculations Section (Split 50% left & 50% right) -->
                        <table style="width: 100%; border: none; font-size: 9.5px; margin-top: 10px; border-collapse: collapse;">
                            <tr>
                                <td style="width: 49%; vertical-align: top; padding: 0; border: none;">
                                    <div class="calc-box" style="border: 1px dashed #000; padding: 4px; box-sizing: border-box; width: 100%;">
                                        <table style="width: 100%; border-collapse: collapse; font-size: 9.5px;">
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 1px 0;">পূর্বের বকেয়া -</td>
                                                <td id="previousdueamount" style="text-align: right; font-weight: bold; border: none; padding: 1px 0;">০.০০</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 1px 0;">সর্বমোট বকেয়া -</td>
                                                <td id="Totaldueamount" style="text-align: right; font-weight: bold; border: none; padding: 1px 0;">০.০০</td>
                                            </tr>
                                            <tr style="border-top: 1px solid #000;">
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 1px 0; padding-top: 1px;">আজকের জমা -</td>
                                                <td id="paidamount" style="text-align: right; font-weight: bold; border: none; padding: 1px 0; padding-top: 1px;">০.০০</td>
                                            </tr>
                                            <tr style="border-top: 1px double #000; font-weight: bold;">
                                                <td style="text-align: left; border: none; padding: 1px 0; padding-top: 1px;">অবশিষ্ট বকেয়া -</td>
                                                <td id="due_amount" style="text-align: right; border: none; padding: 1px 0; padding-top: 1px;">০.০০</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                                <td style="width: 2%; border: none;"></td>
                                <td style="width: 49%; vertical-align: top; padding: 0; border: none;">
                                    <div class="calc-box" style="border: 1px dashed #000; padding: 4px; box-sizing: border-box; width: 100%;">
                                        <table style="width: 100%; border-collapse: collapse; font-size: 9.5px;">
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 1px 0;">আজকের বিল -</td>
                                                <td id="sub_total" style="text-align: right; font-weight: bold; border: none; padding: 1px 0;">০.০০</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold; text-align: left; border: none; padding: 1px 0;">অন্যান্য / ছাড় -</td>
                                                <td id="Discountamount" style="text-align: right; font-weight: bold; border: none; padding: 1px 0;">০.০০</td>
                                            </tr>
                                            <tr style="border-top: 1px double #000; font-weight: bold;">
                                                <td style="text-align: left; border: none; padding: 1px 0; padding-top: 1px;">মোট বিল -</td>
                                                <td id="BillTotalAmount" style="text-align: right; border: none; padding: 1px 0; padding-top: 1px;">০.০০</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <!-- Footer Details -->
                        <div class="footer-info" style="margin-top: 10px; font-size: 9px;">
                            <div class="footer-info-row">
                                <div><strong>অপারেটর:</strong> <span id="operator_name"></span></div>
                                <div><strong>কথায়:</strong> <span id="taka_words"></span></div>
                            </div>
                            <div><strong>নোট/বিবরণ:</strong> <span id="orderNote"></span></div>
                        </div>

                        <!-- Signatures Section -->
                        <table style="width: 100%; margin-top: 18px; font-size: 9px; border: none; border-collapse: collapse; page-break-inside: avoid; break-inside: avoid;">
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
                        <div style="font-size: 8.5px; color: #555; font-weight: bold; text-align: right; margin-top: 10px; font-family: sans-serif; border-top: 1px dashed #eee; padding-top: 4px; page-break-inside: avoid; break-inside: avoid;">
                            Software By: CodeNext IT (www.codenextit.com)
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>

<script>
    function engToBanglaNum(str) {
        if (str === null || str === undefined) return '';
        str = String(str);
        const en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        const bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        for (let i = 0; i < 10; i++) {
            str = str.split(en[i]).join(bn[i]);
        }
        return str;
    }

    function HeaderToken() {
        let token = localStorage.getItem('token');
        return {
            headers: {
                "Authorization": "Bearer " + token
            }
        }
    }

    fetchInvoiceDetails();

    async function fetchInvoiceDetails() {
        try {
            const response = await axios.get("/api/invoice-print-receipt", HeaderToken());

            if (response.data && !response.data.hasOwnProperty('error')) {
                const invoiceData = response.data;

                // Load basic fields
                document.getElementById('order_no').innerText = engToBanglaNum(invoiceData.order_no);
                document.getElementById('orderNote').innerText = invoiceData.order_note || 'N/A';
                document.getElementById('invoice_date').innerText = engToBanglaNum(invoiceData.invoice_date);
                document.getElementById('invoice_time').innerText = engToBanglaNum(invoiceData.invoice_time || 'N/A');
                document.getElementById('operator_name').innerText = invoiceData.operator_name || 'N/A';

                // Load Customer info
                document.getElementById('CustomerCode').innerText = engToBanglaNum(invoiceData.customer.id || 'N/A');
                document.getElementById('CustomerName').innerText = invoiceData.customer.customer_name;
                document.getElementById('CustomerAddress').innerText = invoiceData.customer.address || 'N/A';

                // Render Table rows
                const orderDetailsTable = document.getElementById('order_details');
                orderDetailsTable.innerHTML = '';
                invoiceData.order_details.forEach((detail, index) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td style="border: 1px solid #000; padding: 2px 4px; text-align: center;">${engToBanglaNum(index + 1)}</td>
                        <td style="border: 1px solid #000; padding: 2px 4px; text-align: center;">${engToBanglaNum(detail.product_code || 'N/A')}</td>
                        <td style="border: 1px solid #000; padding: 2px 4px; text-align: left;">${detail.product_name}</td>
                        <td style="border: 1px solid #000; padding: 2px 4px; text-align: center;">${engToBanglaNum(detail.quantity)}</td>
                        <td style="border: 1px solid #000; padding: 2px 4px; text-align: right;">${engToBanglaNum(parseFloat(detail.selling_price).toFixed(2))}</td>
                        <td style="border: 1px solid #000; padding: 2px 4px; text-align: right;">${engToBanglaNum((parseFloat(detail.selling_price) * parseFloat(detail.quantity)).toFixed(2))}</td>
                    `;
                    orderDetailsTable.appendChild(row);
                });

                // Set footer prices
                const subTotalVal = parseFloat(invoiceData.sub_total) || 0;
                const discountVal = parseFloat(invoiceData.discount_amount) || 0;
                const paidVal = parseFloat(invoiceData.paid_amount) || 0;
                const dueVal = parseFloat(invoiceData.due_amount) || 0;
                const prevDueVal = parseFloat(invoiceData.previous_due_amount) || 0;
                const totalDueVal = prevDueVal + dueVal;
                const billTotalVal = subTotalVal - discountVal;

                document.getElementById('sub_total').innerText = engToBanglaNum(subTotalVal.toFixed(2));
                document.getElementById('Discountamount').innerText = engToBanglaNum(discountVal.toFixed(2));
                document.getElementById('paidamount').innerText = engToBanglaNum(paidVal.toFixed(2));
                document.getElementById('due_amount').innerText = engToBanglaNum(dueVal.toFixed(2));
                document.getElementById('previousdueamount').innerText = engToBanglaNum(prevDueVal.toFixed(2));
                document.getElementById('Totaldueamount').innerText = engToBanglaNum(totalDueVal.toFixed(2));
                document.getElementById('BillTotalAmount').innerText = engToBanglaNum(billTotalVal.toFixed(2));

                // Convert bill total to words
                document.getElementById('taka_words').innerText = engToBanglaNum(billTotalVal.toFixed(2)) + ' টাকা মাত্র';

                // Automatically trigger browser print dialog
                setTimeout(() => {
                    window.print();
                }, 500);

            } else {
                console.error('Error fetching invoice data:', response.data.error);
            }
        } catch (error) {
            console.error("There was an error fetching the invoice data:", error);
        }
    }

    function printInvoice() {
        window.print();
    }
</script>
</body>
</html>