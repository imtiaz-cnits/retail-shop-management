<style>
    .financemodal .modal-content {
        border-radius: 16px;
        width: 60%;
        max-width: 650px;
        padding: 24px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
    }

    .financemodal form .form-row {
        display: flex !important;
        flex-direction: column !important;
        align-items: stretch !important;
        gap: 4px !important;
        margin-bottom: 12px !important;
        width: 100% !important;
    }

    @media screen and (max-width: 992px) {
        .financemodal .modal-content {
            width: 92%;
            max-width: 580px;
            padding: 20px;
        }
    }

    @media screen and (max-width: 576px) {
        .financemodal .modal-content {
            width: 95% !important;
            padding: 16px 12px !important;
            margin: 10px auto !important;
            border-radius: 14px !important;
        }

        .upload-profile .item {
            flex-direction: column !important;
            align-items: center !important;
            text-align: center !important;
        }

        .actions-btn-group {
            flex-direction: column-reverse !important;
            width: 100% !important;
        }

        .actions-btn-group button {
            width: 100% !important;
        }
    }

    .financemodal .modal-content .col-lg-6,
    .financemodal .modal-content .col-lg-4 {
        padding: 0 6px !important;
    }

    .newbrand .upload-profile .item,
    .newcategory .upload-profile .item {
        width: 100%;
        display: flex !important;
        gap: 10px;
        margin-bottom: 15px;
    }

    .newbrand .upload-profile .item .img-box,
    .newcategory .upload-profile .item .img-box {
        width: 84px;
        height: 70px;
        border-radius: 6px;
        background: #f2f2f2;
        display: flex !important;
        justify-content: center;
        align-items: center;
    }

    .newbrand .profile-wrapper,
    .newcategory .profile-wrapper {
        width: 100%;
    }

    .newbrand .parent,
    .newcategory .parent {
        width: 100%;
        height: 100%;
        display: inline-flex;
        justify-content: space-between;
        flex-direction: column;
    }

    .newbrand .profile-wrapper p,
    .newcategory .profile-wrapper p {
        margin: 8px 0px 0px 0px;
        font-size: 14px;
        color: #aaaaaa;
    }

    .newbrand .custom-file-input-wrapper,
    .newcategory .custom-file-input-wrapper {
        font-family: var(--primary-font);
        position: relative;
        width: 100%;
        height: 46px;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 16px;
        color: #666;
        background: #ededed;
        cursor: pointer;
    }

    .newbrand .custom-file-input,
    .newcategory .custom-file-input {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
        z-index: 2;
        cursor: pointer;
    }

    .newbrand .custom-file-input-wrapper input[type="file"],
    .newcategory .custom-file-input-wrapper input[type="file"] {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
        z-index: -2;
        cursor: pointer;
    }

    .newbrand .custom-file-input-wrapper::before,
    .newcategory .custom-file-input-wrapper::before {
        content: "";
        position: absolute;
        margin: 0px 118px 0px auto;
        width: 20px;
        height: 20px;
        background-image: url("../icons/upload-photo-icon.svg");
        background-size: cover;
        background-position: center;
    }

    .newbrand .custom-file-input-wrapper::after,
    .newcategory .custom-file-input-wrapper::after {
        content: "Upload Photo";
        margin-right: -20px !important;
    }

    .newbrand .upload p,
    .newcategory .upload p {
        font-size: 12px;
        color: #777;
    }
</style>

<div class="main-content" id="myModal">
    <div class="page-content">

        <!-- Create Product Modal Start -->
        <section id="createProduct" class="financemodal">
            <div class="modal-content">
                <a class="close-btn closes" onclick="closePosAddProductModal()" style="cursor: pointer;">
                    <i class="fa-solid fa-xmark"></i>
                </a>
                <h2 class="heading text-success fw-bold">Add New Product</h2>
                <div id="popup-modal">
                    <form onsubmit="return Save(event)" id="signup">
                        <!-- Select Dropdowns with Add Buttons (Hidden per user preference) -->
                        <div class="row d-none">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <select class="form-select input-style" id="ProductBrand"
                                        aria-label="Default select example">
                                        <option value="none" selected>Select Brand</option>
                                    </select>
                                    <button type="button" class="btn-add newbrand-open">+ Add</button>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <select id="ProductCategoryDataID">
                                        <option value="none" selected>
                                            Select Category
                                        </option>
                                    </select>
                                    <button type="button" class="btn-add newcategory-open">
                                        + Add
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-12 mb-1">
                                <h3 class="heading2 text-success fw-bold fs-6 mb-1"><i class="fa-solid fa-box-open me-2"></i>Product Information</h3>
                            </div>

                            <div class="col-12">
                                <div class="form-row mb-2">
                                    <label for="ProductName" class="fw-bold text-success mb-1" style="font-size: 13px;">Product Name *</label>
                                    <button type="button" id="translateBtn" onclick="translateProductName()" class="btn btn-sm text-white d-inline-flex align-items-center gap-1 shadow-sm mb-2" style="background-color: #15803d; font-size: 12px; font-weight: 600; padding: 6px 14px; border-radius: 8px; border: none; cursor: pointer; width: fit-content;">
                                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                                        </svg>
                                        <span>বাংলায় রূপান্তর (Translate to Bangla)</span>
                                    </button>
                                    <input type="text" placeholder="Product Name (বাংলা বা English) *" id="ProductName" class="form-control" style="width: 100%; height: 44px; border-radius: 8px; font-size: 13px;" />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-row">
                                    <label for="ProductQuantity" class="fw-semibold text-dark mb-1" style="font-size: 13px;">পরিমাণ (Quantity) *</label>
                                    <input type="text" placeholder="Product Quantity *" id="ProductQuantity" class="form-control" style="height: 44px; border-radius: 8px; font-size: 13px;" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-row">
                                    <label for="ProductCostPrice" class="fw-semibold text-dark mb-1" style="font-size: 13px;">ক্রয় মূল্য (Cost Price) *</label>
                                    <input type="text" placeholder="Product Cost Price *" id="ProductCostPrice" class="form-control" style="height: 44px; border-radius: 8px; font-size: 13px;" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-row">
                                    <label for="ProductSellingPrice" class="fw-semibold text-dark mb-1" style="font-size: 13px;">বিক্রয় মূল্য (Selling Price) *</label>
                                    <input type="text" placeholder="Selling Price *" id="ProductSellingPrice" class="form-control" style="height: 44px; border-radius: 8px; font-size: 13px;" />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-row">
                                    <label for="ProductCodeInput" class="fw-semibold text-dark mb-1" style="font-size: 13px;">বারকোড (Scan/Enter Barcode)</label>
                                    <div class="d-flex align-items-center gap-2" style="width: 100%;">
                                        <input type="text" id="ProductCodeInput" placeholder="Enter or scan barcode..." class="form-control" style="flex: 1; height: 44px; border-radius: 8px; font-size: 13px;" />
                                        <button type="button" class="btn btn-primary fw-bold text-nowrap d-flex align-items-center gap-2 px-3 shadow-sm" onclick="openProductCreateCameraScanner()" style="height: 44px; border-radius: 8px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none;">
                                            <i class="fa-solid fa-camera fs-5"></i>
                                            <span class="d-inline">স্ক্যান</span>
                                        </button>
                                    </div>
                                </div>
                                <div id="BarcodeContainer" class="d-flex flex-wrap gap-2 mt-2 mb-2"></div>
                            </div>

                            <!-- Upload Photo (Positioned at bottom per user request) -->
                            <div class="col-12 mb-2">
                                <div class="form-row">
                                    <label class="fw-semibold text-dark mb-1" style="font-size: 13px;">প্রোডাক্ট ছবি (Product Photo)</label>
                                    <div class="upload-profile p-2 border rounded-3 bg-light" style="width: 100%;">
                                        <div class="item d-flex align-items-center gap-3">
                                            <div class="img-box bg-white border rounded-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 60px; flex-shrink: 0;">
                                                <svg width="28" height="28" viewBox="0 0 50 50" fill="red"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <rect width="50" height="50" fill="url(#pattern0_1204_6)"
                                                        fill-opacity="0.5" />
                                                    <defs>
                                                        <pattern id="pattern0_1204_6"
                                                            patternContentUnits="objectBoundingBox" width="1"
                                                            height="1">
                                                            <use xlink:href="#image0_1204_6" transform="scale(0.005)" />
                                                        </pattern>
                                                        <image id="image0_1204_6" width="200" height="200"
                                                            xlink:href="data:image/png;base64,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" />
                                                        </defs>
                                                    </svg>
                                                </div>

                                                <div class="profile-wrapper flex-grow-1">
                                                    <label class="custom-file-input-wrapper mb-0">
                                                        <input type="file" class="custom-file-input" id="ProductImage"
                                                            aria-label="Upload Photo" />
                                                    </label>
                                                    <p class="mb-0 small text-muted">PNG, JPEG or GIF (up to 1 MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="actions d-flex align-items-center justify-content-end gap-2 actions-btn-group">
                                        <button type="button" onclick="resetProductForm()" class="btn btn-outline-secondary px-4 fw-bold" style="height: 42px; border-radius: 8px;">Reset</button>
                                        <button type="button" onclick="ProductDataSave(event)" class="btn-save btn btn-success px-4 fw-bold" style="height: 42px; margin: 0; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; border-radius: 8px;">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>      </form>
                </div>
            </div>
        </section>
        <!-- Create Product Modal End -->

        <!-- Add Product modal to Add New Brand Modal Start -->
        <div class="newbrand" id="addBrandModal">
            <div class="newbrand-content">
                <h2>Add New Brand</h2>
                <form>
                    <div class="col">

                        <div class="upload-profile">
                            <div class="item">
                                <div class="img-box">
                                    <svg width="32" height="32" viewBox="0 0 50 50" fill="red"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="50" height="50" fill="url(#pattern0_1204_6)"
                                            fill-opacity="0.5" />
                                        <defs>
                                            <pattern id="pattern0_1204_6" patternContentUnits="objectBoundingBox"
                                                width="1" height="1">
                                                <use xlink:href="#image0_1204_6" transform="scale(0.005)" />
                                            </pattern>
                                            <image id="image0_1204_6" width="200" height="200"
                                                xlink:href="data:image/png;base64,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" />
                                        </defs>
                                    </svg>
                                </div>

                                <div class="profile-wrapper">
                                    <label class="custom-file-input-wrapper">
                                        <input type="file" class="custom-file-input" aria-label="Upload Photo"
                                            id="CreateBrandImg" />
                                    </label>
                                    <p>PNG,JPEG or GIF (up to 1 MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" id="CreateBrandName" placeholder="Enter brand name" />
                    </div>
                    <div class="form-group">
                        <div class="dropdown-wrapper">
                            <select class="status-select" id="BrandSelectStatus">
                                <option selected>Select brand status</option>
                                <option value="Active">Active</option>
                                <option value="InActive">Inactive</option>
                            </select>
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </div>
                    </div>
                    <div class="button-group">
                        <button type="button" class="cancel-btn newbrand-close">
                            Cancel
                        </button>
                        <button onclick="BrandSave(event)" class="save-btn">Save Brand</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Add Product modal to New Brand Modal End -->

        <!-- Add Product modal to New Category Modal Start -->
        <div class="newcategory" id="addCategoryModal">
            <div class="newcategory-content">
                <h2>Add New Category</h2>
                <form>
                    <div class="upload-profile">
                        <div class="item">
                            <div class="img-box">
                                <svg width="32" height="32" viewBox="0 0 50 50" fill="red"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="50" height="50" fill="url(#pattern0_1204_6)"
                                        fill-opacity="0.5" />
                                    <defs>
                                        <pattern id="pattern0_1204_6" patternContentUnits="objectBoundingBox"
                                            width="1" height="1">
                                            <use xlink:href="#image0_1204_6" transform="scale(0.005)" />
                                        </pattern>
                                        <image id="image0_1204_6" width="200" height="200"
                                            xlink:href="data:image/png;base64,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" />
                                    </defs>
                                </svg>
                            </div>

                            <div class="profile-wrapper">
                                <label class="custom-file-input-wrapper">
                                    <input type="file" class="custom-file-input" aria-label="Upload Photo"
                                        id="CategoryImg" />
                                </label>
                                <p>PNG,JPEG or GIF (up to 1 MB)</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Enter category name" id="CategoryName" />
                    </div>
                    <div class="form-group">
                        <div class="dropdown-wrapper">
                            <select class="status-select" id="CategorySelectStatus">
                                <option disabled selected>Select category status</option>
                                <option value="Active">Active</option>
                                <option value="InActive">Inactive</option>
                            </select>
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </div>
                    </div>
                    <div class="button-group">
                        <button type="button" class="cancel-btn newcategory-close">
                            Cancel
                        </button>
                        <button class="save-btn" onclick="CategorySave(event)">Save Category</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Add Product modal to New Category Modal End -->
    </div>


</div>


<script>
    // Save brand function
    async function BrandSave(event) {
        event.preventDefault();

        try {
            const CreateBrandName = document.getElementById('CreateBrandName').value;
            const BrandSelectStatus = document.getElementById('BrandSelectStatus').value;
            const imgInput = document.getElementById('CreateBrandImg');
            const imgFile = imgInput.files[0];

            // Validation
            if (!CreateBrandName) {
                errorToast("Brand Name is required!");
                return;
            }
            if (!BrandSelectStatus) {
                errorToast("Brand Status is required!");
                return;
            }

            // Prepare form data
            const formData = new FormData();
            formData.append('name', CreateBrandName);
            formData.append('status', BrandSelectStatus);
            formData.append('img_url', imgFile);

            const config = {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    ...HeaderToken().headers,
                },
            };

            // API call to save brand
            const res = await axios.post("/api/create-brand", formData, config);

            if (res.data.status === "success") {
                successToast(res.data.message);

                // Clear the form and close the modal
                document.getElementById('CreateBrandName').value = '';
                closeBrandModal();

                // Refresh the dropdown and select the newly created brand
                await refreshBrandList(res.data.newBrandId);
            } else {
                errorToast(res.data.message);
            }
        } catch (e) {
            unauthorized(e.response?.status || 500);
        }
    }

    // Refresh brand list and optionally select the newly added brand
    async function refreshBrandList(selectedBrandId = null) {
        try {
            const res = await axios.get("/api/brand-list", HeaderToken());
            const Brand = res.data.BrandData;

            const optionsHtmlBrand = Brand.map(brand =>
                `<option value="${brand.id}" ${selectedBrandId == brand.id ? 'selected' : ''}>${brand.name}</option>`
            ).join('');

            document.getElementById("ProductBrand").innerHTML =
                `<option value="none" selected>Select Brand</option>` + optionsHtmlBrand;
        } catch (error) {
            console.error("Error occurred while fetching brands:", error);
        }
    }

    // Modal handling (open/close)
    function closeBrandModal() {
        document.getElementById('addBrandModal').style.display = 'none';
    }

    function openBrandModal() {
        document.getElementById('addBrandModal').style.display = 'block';
    }

    // Trigger modal open/close
    // Trigger modal open/close
    document.querySelector('.newbrand-open').addEventListener('click', openBrandModal);
    document.querySelectorAll('.newbrand-close').forEach(btn =>
        btn.addEventListener('click', closeBrandModal)
    );


    // Initial brand list fetch
    refreshBrandList();

    // Refresh unit list
    async function refreshUnitList(selectedUnitId = null) {
        try {
            const res = await axios.get("/api/unit-list", HeaderToken());
            const units = res.data.units;

            const optionsHtmlUnit = units.map(unit =>
                `<option value="${unit.id}" ${selectedUnitId == unit.id ? 'selected' : ''}>${unit.unit_name}</option>`
            ).join('');

            document.getElementById("ProductUnit").innerHTML =
                `<option value="" disabled selected>Select Unit</option>` + optionsHtmlUnit;
        } catch (error) {
            console.error("Error occurred while fetching units:", error);
        }
    }

    refreshUnitList();
</script>



<script>
    // Save Category Function
    async function CategorySave(event) {
        event.preventDefault(); // Prevent form submission and reload

        try {
            const CategoryName = document.getElementById('CategoryName').value.trim();
            const CategorySelectStatus = document.getElementById('CategorySelectStatus').value;
            const imgInput = document.getElementById('CategoryImg');
            const imgFile = imgInput.files[0]; // Get the selected file

            // Validation
            if (!CategoryName) {
                errorToast("Category Name is required!");
                return;
            }
            if (!CategorySelectStatus || CategorySelectStatus === 'Select category status') {
                errorToast("Category Status is required!");
                return;
            }

            // Prepare Form Data
            const formData = new FormData();
            formData.append('category_name', CategoryName);
            formData.append('status', CategorySelectStatus);
            if (imgFile) {
                formData.append('img_url', imgFile); // Append image file if provided
            }

            // Axios Request Configuration
            const config = {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    ...HeaderToken().headers,
                },
            };

            // API Call to Save Category
            const res = await axios.post("/api/create-category", formData, config);

            if (res.data.status === "success") {
                successToast(res.data.message);

                // Clear Form Fields
                document.getElementById('CategoryName').value = '';
                document.getElementById('CategorySelectStatus').value = 'Select category status';
                imgInput.value = ''; // Clear the file input

                // Close Modal
                closeCategoryModal();

                // Refresh Dropdown
                await refreshCategoryList(res.data.newCategoryId);
            } else {
                errorToast(res.data.message || "Failed to save category.");
            }
        } catch (error) {
            console.error("Error saving category:", error);
            errorToast("An error occurred while saving the category. Please try again.");
        }
    }

    async function refreshCategoryList(selectedCategoryId = null) {
        try {
            const res = await axios.get("/api/category-list", HeaderToken());

            if (res.data.status === "success") {
                const categories = res.data.CategoryData;

                // Build the options for the dropdown
                let optionsHtml = `<option value="none" selected>Select Category</option>`;
                optionsHtml += categories
                    .map(category => `<option value="${category.id}">${category.category_name}</option>`)
                    .join('');

                const categoryDropdown = document.getElementById("ProductCategoryDataID");
                categoryDropdown.innerHTML = optionsHtml;

                // Optionally select the newly created category
                if (selectedCategoryId) {
                    categoryDropdown.value = selectedCategoryId;
                }

                // Add onchange event listener for fetching subcategories
                categoryDropdown.addEventListener('change', handleCategoryChange);
            } else {
                errorToast("Failed to update categories. Please try again.");
            }
        } catch (error) {
            console.error("Error fetching categories:", error);
            errorToast("An error occurred while updating the category list.");
        }
    }

    // Fetch Subcategories for the Selected Category
    async function handleCategoryChange(event) {
        const categoryId = event.target.value;
        const subCategoryDropdown = document.getElementById("ProductSubCategoryID");

        // Clear Subcategory Dropdown
        subCategoryDropdown.innerHTML = `<option value="none" selected>Select Sub Category</option>`;

        if (categoryId === "none") return;

        try {
            const res = await axios.get(`/api/sub-category-list/${categoryId}`, HeaderToken());

            if (res.data.status === "success") {
                const subCategories = res.data.subCategories;

                if (subCategories.length === 0) {
                    errorToast("No subcategories found for this category.");
                    return;
                }

                // Build Subcategory Options
                const optionsHtml = subCategories
                    .map(subCategory =>
                        `<option value="${subCategory.id}">${subCategory.sub_category_name}</option>`)
                    .join('');

                subCategoryDropdown.innerHTML += optionsHtml;
            } else {
                errorToast("No subcategories found for this category.");
            }
        } catch (error) {
            console.error("Error fetching subcategories:", error);
            errorToast("An error occurred while fetching subcategories. Please try again.");
        }
    }

    // Initial Setup
    document.addEventListener('DOMContentLoaded', () => {
        refreshCategoryList();
    });
    // Modal Handling (Open/Close)
    function closeCategoryModal() {
        document.getElementById('addCategoryModal').style.display = 'none';
    }

    function openCategoryModal() {
        document.getElementById('addCategoryModal').style.display = 'block';
    }

    // Modal Trigger Setup
    document.querySelector('.newcategory-open').addEventListener('click', openCategoryModal);
    document.querySelectorAll('.newcategory-close').forEach(btn =>
        btn.addEventListener('click', closeCategoryModal)
    );

    // Initial Dropdown Refresh
    document.addEventListener('DOMContentLoaded', () => {
        refreshCategoryList();
    });
</script>


{{-- Category Create JS Code end  --}}


<script>
let barcodeList = []; // Array to store barcodes

function renderBarcodes() {
    const container = document.getElementById('BarcodeContainer');
    container.innerHTML = '';
    barcodeList.forEach((barcode, index) => {
        const chip = document.createElement('span');
        chip.className = 'badge bg-success d-inline-flex align-items-center gap-1 p-2 font-size-14';
        chip.style.borderRadius = '20px';
        chip.style.color = '#ffffff';
        chip.innerHTML = `${barcode} <a href="#" onclick="removeBarcode(${index})" style="color: #ffffff; text-decoration: none; font-weight: bold; margin-left: 5px;">&times;</a>`;
        container.appendChild(chip);
    });
}

function addBarcode() {
    const barcodeInput = document.getElementById('ProductCodeInput');
    const barcode = barcodeInput.value.trim();

    if (!barcode) {
        return;
    }

    if (barcodeList.includes(barcode)) {
        errorToast('This barcode is already added!');
        return;
    }

    barcodeList.push(barcode);
    renderBarcodes();
    barcodeInput.value = '';
}

function removeBarcode(index) {
    barcodeList.splice(index, 1);
    renderBarcodes();
}

// Support scanner / Enter keypress on input field
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('ProductCodeInput');
    if (input) {
        input.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                addBarcode();
            }
        });
    }
});

function getBarcodes() {
    return barcodeList;
}

function resetProductForm() {
    const signupForm = document.getElementById("signup");
    if (signupForm) {
        signupForm.reset();
    }
    barcodeList = [];
    renderBarcodes();
}
</script>




{{-- Translation JS Code --}}
<script>
    async function translateProductName() {
        const nameInput = document.getElementById('ProductName');
        const text = nameInput ? nameInput.value.trim() : '';

        if (!text) {
            errorToast("অনুগ্রহ করে প্রথমে প্রোডাক্টের নাম লিখুন!");
            return;
        }

        const translateBtn = document.getElementById('translateBtn');
        const originalContent = translateBtn ? translateBtn.innerHTML : '';
        if (translateBtn) {
            translateBtn.disabled = true;
            translateBtn.innerHTML = `<span>অনুবাদ হচ্ছে...</span>`;
        }

        try {
            const url = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=bn&dt=t&q=${encodeURIComponent(text)}`;
            const res = await axios.get(url);

            if (res.data && res.data[0] && Array.isArray(res.data[0])) {
                const translatedText = res.data[0].map(item => item[0]).filter(Boolean).join('');
                if (translatedText) {
                    nameInput.value = translatedText;
                    successToast("বাংলায় রূপান্তর সফল হয়েছে!");
                } else {
                    errorToast("অনুবাদ ব্যর্থ হয়েছে। আবার চেষ্টা করুন।");
                }
            } else {
                errorToast("অনুবাদ ব্যর্থ হয়েছে।");
            }
        } catch (err) {
            console.error("Translation error:", err);
            errorToast("অনুবাদ করতে সমস্যা হয়েছে। ইন্টারনেট সংযোগ পরীক্ষা করুন।");
        } finally {
            if (translateBtn) {
                translateBtn.disabled = false;
                translateBtn.innerHTML = originalContent;
            }
        }
    }
</script>

{{-- Product Create JS Code Start  --}}

<script>
    async function ProductDataSave(event) {
        event.preventDefault();
        try {
            let ProductImageInput = document.getElementById('ProductImage').files[0];
            let ProductName = document.getElementById('ProductName').value.trim();
            let ProductQuantity = document.getElementById('ProductQuantity').value;
            let ProductCostPrice = document.getElementById('ProductCostPrice').value;
            let ProductSellingPrice = document.getElementById('ProductSellingPrice').value;
            let ProductSelectStatus = 'Active';
            let ProductBrand = document.getElementById('ProductBrand').value;
            let ProductCategoryDataID = document.getElementById('ProductCategoryDataID').value;
            let ProductSubCategoryEl = document.getElementById('ProductSubCategoryID');
            let ProductSubCategoryID = ProductSubCategoryEl ? ProductSubCategoryEl.value : '';
            let ProductUnitEl = document.getElementById('ProductUnit');
            let ProductUnit = ProductUnitEl ? ProductUnitEl.value : '';

            // Resolve final list of barcodes to submit
            let finalBarcodes = [];
            const barcodeInput = document.getElementById('ProductCodeInput');
            const pendingBarcode = barcodeInput ? barcodeInput.value.trim() : '';

            if (barcodeList.length > 0) {
                finalBarcodes = [...barcodeList];
                if (pendingBarcode.length > 0 && !finalBarcodes.includes(pendingBarcode)) {
                    finalBarcodes.push(pendingBarcode);
                }
            } else if (pendingBarcode.length > 0) {
                finalBarcodes = [pendingBarcode];
            }

            const ProductCodes = JSON.stringify(finalBarcodes);

            if (ProductName.length === 0) {
                errorToast("Product Name is required!");
                return false;
            } else {
                let formData = new FormData();
                formData.append('product_name', ProductName);
                formData.append('quantity', ProductQuantity);
                formData.append('cost_price', ProductCostPrice);
                formData.append('sell_price', ProductSellingPrice);
                formData.append('product_code', ProductCodes); // Add barcodes
                formData.append('status', ProductSelectStatus);
                if (ProductBrand && ProductBrand !== 'none') formData.append('brand_id', ProductBrand);
                if (ProductCategoryDataID && ProductCategoryDataID !== 'disabled' && ProductCategoryDataID !== 'none') formData.append('category_id', ProductCategoryDataID);
                if (ProductSubCategoryID) formData.append('sub_category_id', ProductSubCategoryID);
                if (ProductUnit) formData.append('unit_id', ProductUnit);
                if (ProductImageInput) formData.append('img', ProductImageInput);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                };

                let res = await axios.post("/api/create-product", formData, config);

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    document.getElementById("signup").reset();
                    barcodeList = [];
                    renderBarcodes();
                    const modal = document.getElementById('myModal');
                    closeModal(modal);
                    
                    if (typeof refreshPosProductsAndAddToCart === 'function') {
                        refreshPosProductsAndAddToCart(res.data.product);
                    } else {
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    }
                } else {
                    errorToast(res.data['message']);
                }
            }
        } catch (e) {
            unauthorized(e.response ? e.response.status : 500);
        }
        return false;
    }

    function closeModal(modal) {
        const targetModal = modal || document.getElementById('createProduct');
        if (targetModal) {
            targetModal.style.display = 'none';
            document.documentElement.style.overflowY = 'auto';
        }
        if (typeof resetProductForm === 'function') resetProductForm();
    }

    function closePosAddProductModal() {
        closeModal(document.getElementById('createProduct'));
    }

    window.addEventListener('click', function(event) {
        const productModal = document.getElementById('createProduct');
        if (productModal && event.target === productModal) {
            closePosAddProductModal();
        }
    });
</script>

<!-- Create Product Camera Barcode Scanner Modal -->
<div class="modal fade" id="productCreateCameraScanModal" tabindex="-1" aria-labelledby="productCreateCameraScanModalLabel" aria-hidden="true" data-bs-backdrop="static" style="z-index: 999999 !important;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 18px; overflow: hidden;">
            <div class="modal-header text-white py-3" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);">
                <h5 class="modal-title fw-bold" id="productCreateCameraScanModalLabel">
                    <i class="fa-solid fa-camera me-2"></i> বারকোড ক্যামেরা স্ক্যানার
                </h5>
                <button type="button" class="btn-close btn-close-white" onclick="stopProductCreateCameraScanner()"></button>
            </div>
            <div class="modal-body p-3 text-center">
                <div id="productCreateCameraScannerStatus" class="alert alert-info py-2 small mb-3" style="border-radius: 10px;">
                    <i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে... বারকোড ক্যামেরার সামনে রাখুন।
                </div>

                <!-- Reader Viewport -->
                <div id="product-create-reader" style="width: 100%; min-height: 270px; background: #000; border-radius: 14px; overflow: hidden;" class="shadow-sm"></div>

                <div class="d-flex align-items-center justify-content-between mt-3 px-1">
                    <span id="productCreateLastScannedText" class="badge bg-success fs-6 py-2 px-3" style="border-radius: 10px;">স্ক্যান কৃত কোড: -</span>
                    <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="switchProductCreateCamera()">
                        <i class="fa-solid fa-rotate me-1"></i> ক্যামেরা পাল্টান
                    </button>
                </div>
            </div>
            <div class="modal-footer bg-light py-2 justify-content-between">
                <small class="text-muted"><i class="fa-solid fa-bolt text-warning me-1"></i> বারকোড স্ক্যান করলেই ইনপুটে বসে যাবে</small>
                <button type="button" class="btn btn-secondary px-4 fw-bold rounded-pill" onclick="stopProductCreateCameraScanner()">বন্ধ করুন</button>
            </div>
        </div>
    </div>
</div>

<script>
    let productCreateHtml5QrCode = null;
    let productCreateFacingMode = "environment";
    let productCreateLastCode = "";

    function openProductCreateCameraScanner() {
        const modalEl = document.getElementById('productCreateCameraScanModal');
        const modalObj = new bootstrap.Modal(modalEl);
        modalObj.show();
        setTimeout(() => {
            modalEl.style.zIndex = "999999";
            const backdrops = document.querySelectorAll('.modal-backdrop');
            if (backdrops.length > 0) {
                backdrops[backdrops.length - 1].style.zIndex = "999990";
            }
            startProductCreateCameraScanner();
        }, 300);
    }

    function startProductCreateCameraScanner() {
        if (productCreateHtml5QrCode && productCreateHtml5QrCode.isScanning) {
            productCreateHtml5QrCode.stop().then(() => initProductCreateHtml5QrCode()).catch(() => initProductCreateHtml5QrCode());
        } else {
            initProductCreateHtml5QrCode();
        }
    }

    function initProductCreateHtml5QrCode() {
        const statusEl = document.getElementById("productCreateCameraScannerStatus");
        if (statusEl) {
            statusEl.className = "alert alert-info py-2 small mb-3";
            statusEl.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা চালু হচ্ছে... বারকোড ক্যামেরার সামনে আনুন।';
        }

        if (!productCreateHtml5QrCode) {
            productCreateHtml5QrCode = new Html5Qrcode("product-create-reader");
        }

        const config = { fps: 15, qrbox: { width: 260, height: 160 }, aspectRatio: 1.333334 };

        productCreateHtml5QrCode.start(
            { facingMode: productCreateFacingMode },
            config,
            onProductCreateBarcodeDetected,
            onProductCreateBarcodeError
        ).then(() => {
            if (statusEl) {
                statusEl.className = "alert alert-success py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-video me-1"></i> ক্যামেরা সক্রিয়! বারকোড স্ক্যান করলে সরাসরি ইনপুটে যুক্ত হবে।';
            }
        }).catch(err => {
            console.error("Camera start error:", err);
            if (statusEl) {
                statusEl.className = "alert alert-danger py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation me-1"></i> ক্যামেরা চালু করা যায়নি! ব্রাউজারের ক্যামেরা পারমিশন এলাউ (Allow) করুন।';
            }
        });
    }

    function onProductCreateBarcodeDetected(decodedText) {
        if (!decodedText || decodedText === productCreateLastCode) return;

        productCreateLastCode = decodedText;
        const lastTextEl = document.getElementById("productCreateLastScannedText");
        if (lastTextEl) lastTextEl.innerText = `স্ক্যান কৃত: ${decodedText}`;

        if (navigator.vibrate) navigator.vibrate(100);

        // Fill barcode into ProductCodeInput & trigger chip add
        const input = document.getElementById("ProductCodeInput");
        if (input) {
            input.value = decodedText;
            if (typeof addBarcode === "function") {
                addBarcode(decodedText);
            }
        }

        stopProductCreateCameraScanner();
    }

    function onProductCreateBarcodeError(msg) {}

    function switchProductCreateCamera() {
        productCreateFacingMode = (productCreateFacingMode === "environment") ? "user" : "environment";
        startProductCreateCameraScanner();
    }

    function stopProductCreateCameraScanner() {
        if (productCreateHtml5QrCode && productCreateHtml5QrCode.isScanning) {
            productCreateHtml5QrCode.stop().then(() => {
                productCreateHtml5QrCode.clear();
                hideProductCreateCameraModal();
            }).catch(() => {
                hideProductCreateCameraModal();
            });
        } else {
            hideProductCreateCameraModal();
        }
    }

    function hideProductCreateCameraModal() {
        const modalEl = document.getElementById('productCreateCameraScanModal');
        const instance = bootstrap.Modal.getInstance(modalEl);
        if (instance) instance.hide();
    }
</script>
