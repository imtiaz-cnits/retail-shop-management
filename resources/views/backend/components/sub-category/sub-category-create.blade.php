
<style>
      .select2-container--default .select2-dropdown {
            z-index: 999999 !important; /* Set high z-index */
        }
</style>


<div class="main-content" id="myModal">
    <div class="page-content" id="signup">

        <!-- Create Product Modal Start -->
        <section id="createProduct" class="financemodal">
            <div class="modal-content">
                <a class="close-btn closes">
                    <i class="fa-solid fa-xmark"></i>
                </a>
                <h2 class="heading">Create Sub Category</h2>
                <div id="popup-modal">
                    <form id="expenseForm" onsubmit="return Save(event)">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-row">
                                    <select  id="ProductCategoryID" style="width: 100%;">
                                        <option>
                                            Select Category
                                        </option>
                                    </select>
                                    <button type="button" class="btn-add newcategory-open">
                                        + Add
                                    </button>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-row">
                                    <input type="text" placeholder="Enter Sub Category *" id="SubcategoryName" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-row">
                                    <label class="country">
                                        <select name="status" id="SelectStatus" required>
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="InActive">Inactive</option>
                                        </select>
                                    </label>
                                </div>
                            </div>

                            <div class="actions">
                                <button onclick="SubCategoryDataSave(event)" class="btn-save">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Create Product Modal End -->

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

    // Refresh Category Dropdown
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

                // Populate the dropdown
                const categoryDropdown = document.getElementById("ProductCategoryID");
                categoryDropdown.innerHTML = optionsHtml;

                // Optionally select the newly created category
                if (selectedCategoryId) {
                    categoryDropdown.value = selectedCategoryId;
                }
            } else {
                console.error("Failed to fetch categories:", res.data.message);
                errorToast("Failed to update categories. Please try again.");
            }
        } catch (error) {
            console.error("Error fetching categories:", error);
            errorToast("An error occurred while updating the category list.");
        }
    }

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

    // Optional: Initial Dropdown Refresh
    document.addEventListener('DOMContentLoaded', () => {
        refreshCategoryList();
    });
</script>






<script>

async function Save(event) {
    event.preventDefault(); // Prevent form submission and page reload
    try {
        const SubcategoryName = document.getElementById('SubcategoryName').value;
        const ProductCategoryID = document.getElementById('ProductCategoryID').value;
        const SelectStatus = document.getElementById('SelectStatus').value;

        if (!ProductCategoryID) {
            errorToast("Category ID required!");
            return false;
        }

        else if (!SubcategoryName) {
            errorToast("Sub Category Name is required!");
            return false;
        }


        else if (!SelectStatus) {
            errorToast("Select Status is required!");
            return false;
        }



        else {
            let formData = new FormData();
            formData.append('sub_category_name', SubcategoryName);
            formData.append('category_id', ProductCategoryID);
            formData.append('status', SelectStatus);




            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers,
                },
            };

            let res = await axios.post("/api/sub-create-category", formData, config);

            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                document.getElementById("expenseForm").reset();
                closeModal(document.getElementById('myModal'));
                setTimeout(() => {
                    location.reload();
                }, 500);
            } else {
                errorToast(res.data['message']);
            }
        }
    } catch (e) {
        unauthorized(e.response.status);
    }
}

function closeModal(modal) {
    modal.style.display = 'none';
}
</script>
