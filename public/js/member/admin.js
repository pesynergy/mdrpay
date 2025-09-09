$(document).ready(function () {
    // Helper: generic AJAX form submit
    function ajaxFormSubmit($form, successCallback) {
        $form.ajaxSubmit({
            dataType: 'json',
            beforeSubmit: function () {
                $form.find('button:submit').button('loading');
            },
            complete: function () {
                $form.find('button:submit').button('reset');
            },
            success: function (data) {
                if (data.status === "success" || data.status === "TXN") {
                    if (successCallback) successCallback(data);
                    notify("Request Successful", 'success');
                    $('#datatable').dataTable().api().ajax.reload();
                } else {
                    notify(data.message || data.status, 'warning');
                }
            },
            error: function (errors) {
                showError(errors, $form);
            }
        });
    }

    // ===== Member Form Validation =====
    $(".memberForm").validate({
        rules: {
            name: { required: true },
            mobile: { required: true, minlength: 10, maxlength: 10, number: true },
            email: { required: true, email: true },
            state: { required: true },
            city: { required: true },
            pincode: { required: true, minlength: 6, maxlength: 6, number: true },
            address: { required: true },
            aadharcard: { required: true, minlength: 12, maxlength: 12, number: true }
        },
        messages: {
            name: { required: "Please enter name" },
            mobile: {
                required: "Please enter mobile",
                number: "Mobile must be numeric",
                minlength: "Must be 10 digits",
                maxlength: "Must be 10 digits"
            },
            email: { required: "Please enter email", email: "Enter valid email" },
            state: { required: "Please enter state" },
            city: { required: "Please enter city" },
            pincode: {
                required: "Please enter pincode",
                number: "Pincode must be numeric",
                minlength: "Must be 6 digits",
                maxlength: "Must be 6 digits"
            },
            address: { required: "Please enter address" },
            aadharcard: {
                required: "Please enter aadharcard",
                number: "Must be numeric",
                minlength: "Must be 12 digits",
                maxlength: "Must be 12 digits"
            }
        },
        errorElement: "p",
        errorPlacement: function (error, element) {
            element.prop("tagName").toLowerCase() === "select"
                ? error.insertAfter(element.closest(".form-group").find(".select2"))
                : error.insertAfter(element);
        },
        submitHandler: function (form) {
            ajaxFormSubmit($(form), function () {
                form.reset();
                $('select').val('').trigger('change');
                $("#memberModal").modal('hide');
            });
        }
    });


    // ===== Member Status Toggle =====
    var onDraw = function () {
        $(document).off('click', '.membarStatusBtn').on('click', '.membarStatusBtn', function (evt) {
            evt.stopPropagation();

            let ele = $(this),
                id = ele.data('id'),
                currentStatus = ele.data('status'),
                newStatus = currentStatus === "active" ? "block" : "active";

            $.ajax({
                url: profileUpdateRoute, // defined globally
                type: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                dataType: 'json',
                data: { id, status: newStatus, actiontype: 'profile' }
            })
                .done(function (data) {
                    if (data.status === "success") {
                        notify("Member Updated", 'success');
                        $('#datatable').dataTable().api().ajax.reload();
                    } else {
                        notify("Something went wrong", 'warning');
                    }
                })
                .fail(function () {
                    notify("Error occurred", 'warning');
                });
        });
    };


    // ===== Datatable Setup =====
    var url = fetchUrl; // define globally
    var options = [
        {
            "data": "agentcode",
            render: function (data, type, full) {
                let isActive = full.status === "active";
                return `
                <button class="btn btn-small-dark membarStatusBtn" 
                        data-id="${full.id}" 
                        data-status="${isActive ? "active" : "block"}">
                    ${isActive ? "Active" : "Inactive"}
                </button>`;
            }
        },
        { "data": "parents" },
        {
            "data": "agentcode",
            render: (data, type, full) =>
                `<a href="${baseUrl}/profile/view/${full.id}" target="_blank">${full.name}</a><br>${full.agentcode}`
        },
        {
            "data": "email",
            render: (data, type, full) =>
                `Email : ${full.email}<br>Mobile no : ${full.mobile}`
        },
        {
            "data": "mainwallet",
            render: (data, type, full) =>
                `Collection : ${full.mainwallet}<br>Payout : ${full.payoutwallet}<br>Locked : ${full.lockedamount}`
        }
        // Add more renderers as needed...
    ];
    datatableSetup(url, options, onDraw);

    // ===== Reusable Form Validations =====
    function setupValidation(formSelector, rules, messages, successMsg) {
        $(formSelector).validate({
            rules, messages,
            errorElement: "p",
            errorPlacement: function (error, element) {
                element.prop("tagName").toLowerCase() === "select"
                    ? error.insertAfter(element.closest(".form-group").find(".select2"))
                    : error.insertAfter(element);
            },
            submitHandler: function (form) {
                ajaxFormSubmit($(form), function () {
                    $(form).closest('.modal').modal('hide');
                    notify(successMsg, 'success');
                });
            }
        });
    }

    // Setup multiple forms
    setupValidation("#transferForm",
        { type: { required: true }, amount: { required: true, min: 1 } },
        { type: { required: "Please select transfer action" }, amount: { required: "Please enter amount", min: "Amount > 0" } },
        "Fund Transfer Successful"
    );

    setupValidation("#kycUpdateForm",
        { kyc: { required: true } },
        { kyc: { required: "Please select kyc status" } },
        "Member KYC Updated"
    );

    setupValidation("#schemeForm",
        { scheme_id: { required: true } },
        { scheme_id: { required: "Please select scheme" } },
        "Member Scheme Updated"
    );

    setupValidation("#lockedAmountForm",
        { amount: { required: true } },
        { amount: { required: "Please enter value" } },
        "Locked Amount Updated"
    );

    setupValidation("#stockForm",
        { stock: { required: true } },
        { stock: { required: "Please enter value" } },
        "Stock Updated"
    );

    // ===== Checkbox Handling =====
    $('#selectall').click(function () {
        $('.case, .selectall').prop('checked', this.checked);
    });

    $('.selectall').click(function () {
        $(this).closest('tr').find('.case').prop('checked', this.checked);
    });

    // ===== Helper Modal Functions =====
    window.transfer = id => $('#transferForm').find('[name="payee_id"]').val(id).end().closest('.modal').modal('show');
    window.getPermission = id => {
        if (!id) return;
        $.ajax({
            url: `${baseUrl}/tools/get/permission/${id}`,
            type: 'post',
            dataType: 'json',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })
            .done(data => {
                $('#permissionForm').find('[name="payee_id"]').val(id);
                $('.case').prop('checked', false);
                data.forEach(val => $('#permissionForm').find(`input[value=${val.permission_id}]`).prop('checked', true));
                $('#permissionModal').modal('show');
            })
            .fail(() => notify('Something went wrong', 'warning'));
    };
    window.kycManage = (id, kyc, remark) => {
        $('#kycUpdateForm').find('[name="id"]').val(id);
        $('#kycUpdateForm').find('[name="kyc"]').select2().val(kyc).trigger('change');
        $('#kycUpdateForm').find('[name="remark"]').val(remark);
        $('#kycUpdateModal').modal('show');
    };
    window.scheme = (id, scheme) => {
        $('#schemeForm').find('[name="id"]').val(id);
        if (scheme) $('#schemeForm').find('[name="scheme_id"]').select2().val(scheme).trigger('change');
        $('#commissionModal').modal('show');
    };
    window.lockedAmount = (id, amount) => {
        $('#lockedAmountModal').find('input[name="id"]').val(id);
        $('#lockedAmountModal').find('input[name="lockedamount"]').val(amount);
        $('#lockedAmountModal').modal('show');
    };
    window.stockmanager = (id) => {
        $('#stockModal').find('input[name="id"]').val(id);
        $('#stockModal').modal('show');
    };
});


