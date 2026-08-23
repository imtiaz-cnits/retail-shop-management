<style>
    #exampleModal {
        z-index: 1060 !important;
    }
    #exampleModal .modal-dialog {
        max-width: 500px;
        margin: 1.75rem auto;
    }
    #exampleModal .modal-content {
        border-radius: 14px;
        border: none;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }
    #exampleModal .form-control,
    #exampleModal .form-select {
        height: 44px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        font-size: 14px;
        padding: 8px 12px;
    }
</style>

<!-- Action Button Edit Modal Start -->
<section class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header border-0 pb-2">
                <h5 class="modal-title fw-bold text-success d-flex align-items-center gap-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Expense Update (খরচের তথ্য আপডেট)</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <form onsubmit="return Update(event)">
                    <input type="hidden" id="updateID">

                    <div class="row g-3">
                        <div class="col-12 mb-2">
                            <label class="form-label small fw-bold text-secondary mb-1">Expense Type</label>
                            <select class="form-select" id="UpdateExpenseTypeInfoID" required>
                                <option value="">Select Expense Type</option>
                            </select>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label small fw-bold text-secondary mb-1">Expense Amount (৳)</label>
                            <input type="number" step="any" class="form-control fw-bold text-danger" placeholder="Expense Amount *" id="UpdateExpenseAmount" required />
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label small fw-bold text-secondary mb-1">Expense Date</label>
                            <input type="date" class="form-control" id="UpdateExpenseDate" required />
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label small fw-bold text-secondary mb-1">Expense Details</label>
                            <textarea class="form-control" placeholder="Expense Details..." id="UpdateExpenseDetails" rows="3" style="height: auto;"></textarea>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 mt-4 pt-3 border-top">
                        <button type="button" class="btn btn-light px-4 py-2 fw-bold text-secondary" data-bs-dismiss="modal" style="border-radius: 8px;">Cancel</button>
                        <button type="submit" class="btn btn-success px-4 py-2 fw-bold" style="border-radius: 8px; background-color: #15803d; border: none;">
                            <i class="fa-solid fa-check me-1"></i> Update Expense
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Action Button Edit Modal End -->

<script>
    $(document).ready(function() {
        $('#exampleModal').appendTo("body");
        ExpenseTypeDataShow();

        $('#exampleModal').on('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (button) {
                const id = $(button).attr('data-id') || $(button).data('id') || $(button).closest('[data-id]').attr('data-id');
                if (id) {
                    FillUpUpdateForm(id);
                }
            }
        });
    });

    async function ExpenseTypeDataShow() {
        try {
            let res = await axios.get("/api/expense-type-list", HeaderToken());
            if (res.data.ExpenseTypeData) {
                let optionsHtml = res.data.ExpenseTypeData.map(ExpenseType => `<option value="${ExpenseType.id}">${ExpenseType.type_name}</option>`).join('');
                $("#UpdateExpenseTypeInfoID").html(`<option value="" disabled selected>Select Expense Type</option>` + optionsHtml);
            }
        } catch (error) {
            console.error("Error fetching expense types:", error);
        }
    }

    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;

            let res = await axios.post("/api/expense-by-id", {
                id: id.toString()
            }, HeaderToken());

            let data = res.data.rows;
            if (data) {
                document.getElementById('UpdateExpenseTypeInfoID').value = data.expense_type_id || '';
                document.getElementById('UpdateExpenseAmount').value = data.expense_amount || 0;
                document.getElementById('UpdateExpenseDate').value = data.date || '';
                document.getElementById('UpdateExpenseDetails').value = data.expense_details || '';
            }
        } catch (e) {
            console.error(e);
            unauthorized(e.response ? e.response.status : 500);
        }
    }

    async function Update(event) {
        if (event) event.preventDefault();
        try {
            let formData = new FormData();
            formData.append('expense_type_id', $('#UpdateExpenseTypeInfoID').val());
            formData.append('expense_amount', $('#UpdateExpenseAmount').val());
            formData.append('date', $('#UpdateExpenseDate').val());
            formData.append('expense_details', $('#UpdateExpenseDetails').val());
            formData.append('id', $('#updateID').val());

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();
            let res = await axios.post("/api/update-expense", formData, config);
            hideLoader();

            if (res.data.status === "success") {
                successToast(res.data.message);
                $("#exampleModal").modal('hide');
                if (typeof getExpenseList === 'function') {
                    await getExpenseList();
                } else {
                    setTimeout(() => location.reload(), 500);
                }
            } else {
                errorToast(res.data.message);
            }
        } catch (e) {
            hideLoader();
            console.error("Error:", e.response);
            errorToast("Failed to update expense.");
        }
        return false;
    }
</script>
