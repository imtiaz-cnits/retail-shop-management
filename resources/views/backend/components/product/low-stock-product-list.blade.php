<!-- Hero Main Content Start -->
<div class="main-content">
    <div class="page-content">
        
        <!-- Header Banner Section -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 p-3 p-md-4" style="background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border: 1px solid #e2e8f0 !important;">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-4 p-3 d-flex align-items-center justify-content-center shadow-sm flex-shrink-0" style="background: linear-gradient(135deg, #fee2e2 0%, #fecdd3 100%); border: 1px solid #fca5a5;">
                        <i class="fa-solid fa-triangle-exclamation text-danger fs-2"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold text-dark m-0 d-flex align-items-center gap-2 flex-wrap">
                            <span>কম স্টক প্রোডাক্ট তালিকা</span>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1" style="font-size: 12px; font-weight: 600;">Low Stock Alerts</span>
                        </h4>
                        <p class="text-muted small m-0 mt-1">যে সকল প্রোডাক্টের স্টক ১০ বা তার নিচে নেমে গেছে সেগুলোর রিয়েল-টাইম তালিকা</p>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button onclick="getLowStockList()" class="btn btn-light fw-bold shadow-sm border px-3 py-2 d-flex align-items-center gap-2" style="border-radius: 10px; font-size: 13px; background: #ffffff;">
                        <i class="fa-solid fa-rotate-right text-danger"></i>
                        <span>রিফ্রেশ</span>
                    </button>
                    <a href="{{ url('admin-dashboard-Purchase') }}" class="btn btn-success fw-bold shadow-sm px-3 py-2 d-flex align-items-center gap-2" style="border-radius: 10px; font-size: 13px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none;">
                        <i class="fa-solid fa-cart-plus"></i>
                        <span>+ স্টক পারচেজ</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Summary Metric Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="card border-0 shadow-sm rounded-4 p-3 h-100 position-relative overflow-hidden" style="background: linear-gradient(135deg, #ffffff 0%, #fff1f2 100%); border-left: 5px solid #ef4444 !important;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-secondary fw-bold small text-uppercase tracking-wider">মোট কম স্টক প্রোডাক্ট</span>
                            <h2 class="fw-extrabold text-danger m-0 mt-1" id="totalLowStockCount" style="font-size: 32px;">0</h2>
                            <span class="badge bg-danger-subtle text-danger px-2 py-1 mt-1" style="font-size: 11px; border-radius: 6px;">স্টক <= ১০</span>
                        </div>
                        <div class="rounded-4 p-3 d-flex align-items-center justify-content-center shadow-sm flex-shrink-0" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); width: 56px; height: 56px;">
                            <i class="fa-solid fa-boxes-stacked text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="card border-0 shadow-sm rounded-4 p-3 h-100 position-relative overflow-hidden" style="background: linear-gradient(135deg, #ffffff 0%, #fef2f2 100%); border-left: 5px solid #991b1b !important;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-secondary fw-bold small text-uppercase tracking-wider">স্টক শূন্য / নেগেটিভ</span>
                            <h2 class="fw-extrabold text-dark m-0 mt-1" id="outOfStockCount" style="font-size: 32px; color: #991b1b !important;">0</h2>
                            <span class="badge bg-dark text-white px-2 py-1 mt-1" style="font-size: 11px; border-radius: 6px; background: #991b1b !important;">অবিলম্বে স্টক কিনুন</span>
                        </div>
                        <div class="rounded-4 p-3 d-flex align-items-center justify-content-center shadow-sm flex-shrink-0" style="background: linear-gradient(135deg, #991b1b 0%, #7f1d1d 100%); width: 56px; height: 56px;">
                            <i class="fa-solid fa-circle-exclamation text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card border-0 shadow-sm rounded-4 p-3 h-100 position-relative overflow-hidden" style="background: linear-gradient(135deg, #ffffff 0%, #fffbe6 100%); border-left: 5px solid #d97706 !important;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-secondary fw-bold small text-uppercase tracking-wider">রিঅর্ডার তালিকা (১-১০)</span>
                            <h2 class="fw-extrabold text-warning m-0 mt-1" id="warningStockCount" style="font-size: 32px; color: #d97706 !important;">0</h2>
                            <span class="badge bg-warning-subtle text-warning-emphasis px-2 py-1 mt-1" style="font-size: 11px; border-radius: 6px;">স্টক ১ থেকে ১০</span>
                        </div>
                        <div class="rounded-4 p-3 d-flex align-items-center justify-content-center shadow-sm flex-shrink-0" style="background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%); width: 56px; height: 56px;">
                            <i class="fa-solid fa-truck-ramp-box text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Card Section -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
            <div class="card-body p-3 p-md-4">
                
                <!-- Search & Filters Bar -->
                <div class="row g-2 align-items-center justify-content-between mb-3">
                    <div class="col-lg-5 col-md-6 col-12">
                        <div class="position-relative">
                            <input type="text" id="lowStockSearch" class="form-control ps-5 py-2 fw-medium shadow-sm" placeholder="🔍 প্রোডাক্টের নাম বা কোড দিয়ে খুঁজুন..." style="border-radius: 10px; font-size: 13px; height: 42px; border-color: #cbd5e1;" onkeyup="filterLowStockTable()">
                            <i class="fa-solid fa-magnifying-glass position-absolute start-0 top-50 translate-middle-y ms-3 text-muted"></i>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="d-flex align-items-center gap-2">
                            <label for="stockStatusFilter" class="fw-bold small text-nowrap m-0 text-secondary">ফিল্টার:</label>
                            <select id="stockStatusFilter" class="form-select py-2 fw-bold shadow-sm" style="border-radius: 10px; font-size: 13px; height: 42px; border-color: #cbd5e1;" onchange="filterLowStockTable()">
                                <option value="all">সকল কম স্টক (<=১০)</option>
                                <option value="zero">স্টক শূন্য / নেগেটিভ (<=০)</option>
                                <option value="low">স্বল্প স্টক (১ থেকে ১০)</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-12 text-lg-end">
                        <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                            <button onclick="exportTableToCSV('low_stock_products.csv')" class="btn btn-outline-secondary btn-sm fw-bold px-3 shadow-sm d-inline-flex align-items-center gap-1" style="border-radius: 8px; height: 38px;">
                                <i class="fa-solid fa-file-csv text-success fs-6"></i>
                                <span>CSV</span>
                            </button>
                            <button onclick="printLowStockTable()" class="btn btn-outline-secondary btn-sm fw-bold px-3 shadow-sm d-inline-flex align-items-center gap-1" style="border-radius: 8px; height: 38px;">
                                <i class="fa-solid fa-print text-primary fs-6"></i>
                                <span>প্রিন্ট</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Desktop Table View (Hidden on Mobile) -->
                <div class="table-responsive d-none d-md-block" style="max-height: 520px; overflow-y: auto;">
                    <table class="table table-hover align-middle border mb-0" id="lowStockTable">
                        <thead class="table-dark sticky-top" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
                            <tr class="text-nowrap" style="font-size: 13px;">
                                <th class="py-3 px-3">#</th>
                                <th class="py-3 px-3">প্রোডাক্ট ছবি</th>
                                <th class="py-3 px-3">প্রোডাক্ট নাম ও কোড</th>
                                <th class="py-3 px-3">ক্যাটাগরি / ব্র্যান্ড</th>
                                <th class="py-3 px-3">ক্রয় মূল্য</th>
                                <th class="py-3 px-3">বিক্রয় মূল্য</th>
                                <th class="py-3 px-3 text-center">বর্তমান স্টক</th>
                                <th class="py-3 px-3 text-center">অবস্থা</th>
                                <th class="py-3 px-3 text-center">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody id="lowStockTableBody" style="font-size: 13px;">
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <div class="spinner-border text-danger me-2" role="status"></div>
                                    <span class="fw-bold text-muted">কম স্টক ডাটা লোড হচ্ছে...</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Responsive Card View (Visible only on Mobile) -->
                <div id="lowStockMobileCards" class="d-block d-md-none">
                    <div class="text-center py-4">
                        <div class="spinner-border text-danger me-2" role="status"></div>
                        <span class="fw-bold text-muted">ডাটা লোড হচ্ছে...</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    let rawLowStockData = [];

    document.addEventListener("DOMContentLoaded", function () {
        getLowStockList();
    });

    async function getLowStockList() {
        const tbody = document.getElementById('lowStockTableBody');
        const mCards = document.getElementById('lowStockMobileCards');
        
        if (tbody) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="9" class="text-center py-5">
                        <div class="spinner-border text-danger me-2" role="status"></div>
                        <span class="fw-bold text-muted">কম স্টক ডাটা লোড হচ্ছে...</span>
                    </td>
                </tr>
            `;
        }
        if (mCards) {
            mCards.innerHTML = `
                <div class="text-center py-4">
                    <div class="spinner-border text-danger me-2" role="status"></div>
                    <span class="fw-bold text-muted">ডাটা লোড হচ্ছে...</span>
                </div>
            `;
        }

        try {
            const res = await axios.get('/admin-dashboard-low-stock-products-list');
            if (res.data && res.data.status === 'success') {
                rawLowStockData = res.data.data || [];
                renderLowStockView(rawLowStockData);
            } else {
                if (tbody) tbody.innerHTML = `<tr><td colspan="9" class="text-center py-4 text-danger fw-bold">⚠️ ডাটা পাওয়া যায়নি!</td></tr>`;
                if (mCards) mCards.innerHTML = `<div class="text-center py-4 text-danger fw-bold">⚠️ ডাটা পাওয়া যায়নি!</div>`;
            }
        } catch (e) {
            console.error('Fetch low stock error:', e);
            if (tbody) tbody.innerHTML = `<tr><td colspan="9" class="text-center py-4 text-danger fw-bold">⚠️ সমস্যা দেখা দিয়েছে!</td></tr>`;
            if (mCards) mCards.innerHTML = `<div class="text-center py-4 text-danger fw-bold">⚠️ সমস্যা দেখা দিয়েছে!</div>`;
        }
    }

    function renderLowStockView(data) {
        const tbody = document.getElementById('lowStockTableBody');
        const mCards = document.getElementById('lowStockMobileCards');

        let totalCount = data.length;
        let zeroCount = 0;
        let warningCount = 0;

        data.forEach(item => {
            const qty = parseFloat(item.quantity || 0);
            if (qty <= 0) {
                zeroCount++;
            } else {
                warningCount++;
            }
        });

        // Update Stats Badges
        const elTotal = document.getElementById('totalLowStockCount');
        const elZero = document.getElementById('outOfStockCount');
        const elWarn = document.getElementById('warningStockCount');
        if (elTotal) elTotal.innerText = totalCount;
        if (elZero) elZero.innerText = zeroCount;
        if (elWarn) elWarn.innerText = warningCount;

        const defaultImg = "{{ asset('back-end/assets/img/product-img.png') }}";

        if (data.length === 0) {
            const emptyHtml = `
                <div class="text-center py-5">
                    <i class="fa-solid fa-circle-check text-success display-3 d-block mb-3"></i>
                    <h5 class="fw-bold text-success">চমৎকার! কোনো কম স্টক প্রোডাক্ট নেই</h5>
                    <p class="text-muted small">সকল প্রোডাক্টের স্টক পর্যাপ্ত রয়েছে (১০ এর উপরে)</p>
                </div>
            `;
            if (tbody) tbody.innerHTML = `<tr><td colspan="9">${emptyHtml}</td></tr>`;
            if (mCards) mCards.innerHTML = emptyHtml;
            return;
        }

        // Render Desktop Table
        let tableHtml = '';
        let cardsHtml = '';

        data.forEach((item, index) => {
            const qty = parseFloat(item.quantity || 0);
            const isZeroOrNeg = qty <= 0;

            const stockBadgeStyle = isZeroOrNeg 
                ? 'background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); color: #fff; box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);' 
                : 'background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%); color: #fff; box-shadow: 0 2px 8px rgba(217, 119, 6, 0.3);';
            
            const statusBadge = isZeroOrNeg 
                ? '<span class="badge bg-danger text-white px-2 py-1 shadow-sm"><i class="fa-solid fa-circle-xmark me-1"></i>স্টক খালি!</span>' 
                : '<span class="badge bg-warning text-dark px-2 py-1 shadow-sm"><i class="fa-solid fa-triangle-exclamation me-1"></i>স্টক কম</span>';

            const imgPath = item.img_url ? item.img_url : defaultImg;

            // Desktop Row
            tableHtml += `
                <tr>
                    <td class="fw-bold text-secondary px-3">${index + 1}</td>
                    <td class="px-3">
                        <img src="${imgPath}" onerror="this.src='${defaultImg}'" alt="Product" class="rounded-3 border shadow-sm" style="width: 44px; height: 44px; object-fit: cover;" />
                    </td>
                    <td class="px-3">
                        <div class="fw-bold text-dark fs-6">${item.product_name}</div>
                        <span class="badge bg-light text-secondary border mt-1" style="font-size: 11px;">কোড: ${item.product_code}</span>
                    </td>
                    <td class="px-3">
                        <div class="fw-bold text-dark small">${item.category_name}</div>
                        <span class="text-muted small" style="font-size: 11px;">ব্র্যান্ড: ${item.brand_name}</span>
                    </td>
                    <td class="px-3 fw-bold text-secondary">${formatBanglaAmount(item.price)}</td>
                    <td class="px-3 fw-bold text-success">${formatBanglaAmount(item.selling_price)}</td>
                    <td class="px-3 text-center">
                        <span class="badge rounded-pill px-3 py-2 fs-6 fw-bold" style="${stockBadgeStyle}">
                            ${engToBanglaNum(qty)} ${item.unit_name}
                        </span>
                    </td>
                    <td class="px-3 text-center">${statusBadge}</td>
                    <td class="px-3 text-center">
                        <div class="d-inline-flex align-items-center gap-1">
                            <button onclick="fillEditForm('${item.id}')" class="btn btn-sm btn-outline-primary shadow-sm px-2 py-1" title="এডিট করুন" style="border-radius: 6px;">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <a href="{{ url('admin-dashboard-Purchase') }}" class="btn btn-sm btn-success shadow-sm px-2 py-1" title="স্টক এড করুন" style="border-radius: 6px; background: #16a34a; border: none;">
                                <i class="fa-solid fa-cart-plus"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            `;

            // Mobile Responsive Card
            cardsHtml += `
                <div class="card border-0 shadow-sm rounded-3 mb-3 p-3 position-relative" style="border-left: 4px solid ${isZeroOrNeg ? '#dc2626' : '#d97706'} !important; background: #ffffff;">
                    <div class="d-flex align-items-start gap-3 mb-2">
                        <img src="${imgPath}" onerror="this.src='${defaultImg}'" alt="Product" class="rounded-3 border shadow-sm flex-shrink-0" style="width: 52px; height: 52px; object-fit: cover;" />
                        <div class="flex-grow-1 min-w-0">
                            <div class="d-flex align-items-start justify-content-between gap-1">
                                <h6 class="fw-bold text-dark m-0 text-truncate" style="font-size: 14px;">${item.product_name}</h6>
                                ${statusBadge}
                            </div>
                            <span class="badge bg-light text-secondary border mt-1" style="font-size: 10px;">কোড: ${item.product_code}</span>
                        </div>
                    </div>
                    
                    <div class="row g-2 bg-light rounded-3 p-2 my-1 align-items-center">
                        <div class="col-6">
                            <span class="text-muted d-block" style="font-size: 10px;">ক্রয় / বিক্রয় মূল্য</span>
                            <span class="fw-bold text-dark small">${formatBanglaAmount(item.price)} / <span class="text-success">${formatBanglaAmount(item.selling_price)}</span></span>
                        </div>
                        <div class="col-6 text-end">
                            <span class="text-muted d-block" style="font-size: 10px;">বর্তমান স্টক</span>
                            <span class="badge rounded-pill px-2 py-1 fw-bold" style="${stockBadgeStyle} font-size: 12px;">
                                ${engToBanglaNum(qty)} ${item.unit_name}
                            </span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-2 pt-2 border-top">
                        <span class="text-muted small" style="font-size: 11px;">${item.category_name} | ${item.brand_name}</span>
                        <div class="d-flex align-items-center gap-1">
                            <button onclick="fillEditForm('${item.id}')" class="btn btn-sm btn-outline-primary px-3 py-1 fw-bold" style="border-radius: 6px; font-size: 11px;">
                                <i class="fa-solid fa-pen-to-square me-1"></i> এডিট
                            </button>
                            <a href="{{ url('admin-dashboard-Purchase') }}" class="btn btn-sm btn-success px-3 py-1 fw-bold" style="border-radius: 6px; font-size: 11px; background: #16a34a; border: none;">
                                <i class="fa-solid fa-cart-plus me-1"></i> পারচেজ
                            </a>
                        </div>
                    </div>
                </div>
            `;
        });

        if (tbody) tbody.innerHTML = tableHtml;
        if (mCards) mCards.innerHTML = cardsHtml;
    }

    function filterLowStockTable() {
        const searchVal = document.getElementById('lowStockSearch').value.toLowerCase().trim();
        const statusVal = document.getElementById('stockStatusFilter').value;

        const filtered = rawLowStockData.filter(item => {
            const matchesSearch = item.product_name.toLowerCase().includes(searchVal) || item.product_code.toLowerCase().includes(searchVal);
            const qty = parseFloat(item.quantity || 0);

            let matchesStatus = true;
            if (statusVal === 'zero') {
                matchesStatus = qty <= 0;
            } else if (statusVal === 'low') {
                matchesStatus = qty > 0 && qty <= 10;
            }

            return matchesSearch && matchesStatus;
        });

        renderLowStockView(filtered);
    }

    function exportTableToCSV(filename) {
        let csv = [];
        let rows = document.querySelectorAll("#lowStockTable tr");
        for (let i = 0; i < rows.length; i++) {
            let row = [], cols = rows[i].querySelectorAll("td, th");
            for (let j = 0; j < cols.length - 1; j++) {
                let text = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, " ").replace(/"/g, '""');
                row.push('"' + text.trim() + '"');
            }
            csv.push(row.join(","));
        }
        let csvFile = new Blob(["\ufeff" + csv.join("\n")], {type: "text/csv;charset=utf-8;"});
        let downloadLink = document.createElement("a");
        downloadLink.download = filename;
        downloadLink.href = window.URL.createObjectURL(csvFile);
        downloadLink.style.display = "none";
        document.body.appendChild(downloadLink);
        downloadLink.click();
    }

    function printLowStockTable() {
        let printContents = document.getElementById('lowStockTable').outerHTML;
        let originalContents = document.body.innerHTML;
        document.body.innerHTML = `
            <div style="padding: 20px; font-family: Arial, sans-serif;">
                <h2 style="color: #dc2626; text-align: center; margin-bottom: 20px;">🚨 আনিস ষ্টোর - কম স্টক প্রোডাক্ট তালিকা</h2>
                ${printContents}
            </div>
        `;
        window.print();
        document.body.innerHTML = originalContents;
        window.location.reload();
    }
</script>
