$(document).ready(function () {
    var url = bankSetupConfig.fetchUrl;

    // Handle Active/Inactive button click
    var onDraw = function () {
        $('.bankStatusBtn').off('click').on('click', function () {
            let btn = $(this);
            let id = btn.data('id');
            let currentStatus = btn.data('status');
            let newStatus = currentStatus == "1" ? "0" : "1";

            $.ajax({
                url: bankSetupConfig.updateUrl,
                type: 'post',
                headers: { 'X-CSRF-TOKEN': bankSetupConfig.csrf },
                dataType: 'json',
                data: { id: id, status: newStatus, actiontype: "bank" }
            })
                .done(function (data) {
                    if (data.status == "success") {
                        let newText = newStatus == "1" ? "Active" : "Inactive";
                        btn.text(newText).data('status', newStatus);
                        notify("Bank Account Updated", 'success');
                    } else {
                        notify("Something went wrong, Try again.", 'warning');
                    }
                })
                .fail(function (errors) {
                    showError(errors, "withoutform");
                });
        });
    };
    var options = [
        { "data": "id" },
        { "data": "name" },
        { "data": "account" },
        { "data": "ifsc" },
        { "data": "branch" },
        {
            "data": "status",
            render: function (data, type, full) {
                let btnText = full.status == "1" ? "Active" : "Inactive";
                return `<button type="button" 
                            class="btn btn-sm btn-dark bankStatusBtn" 
                            data-id="${full.id}" 
                            data-status="${full.status}">
                            ${btnText}
                        </button>`;
            }
        },
        {
            "data": "id",
            render: function (data, type, full) {
                return `<button type="button" 
                            class="btn btn-dark btn-raised legitRipple btn-xs" 
                            onclick="editSetup(this)">
                            <i class="fas fa-pencil-alt" style="padding-right:5px;"></i> Edit
                        </button>`;
            }
        },
    ];
    datatableSetup(url, options, onDraw);

    // --- Form validation ---
    $("#setupManager").validate({
        rules: {
            name: { required: true },
            account: { required: true },
            ifsc: { required: true },
            branch: { required: true },
        },
        messages: {
            name: { required: "Please enter bank name" },
            account: { required: "Please enter account number" },
            ifsc: { required: "Please enter ifsc code" },
            branch: { required: "Please enter bank branch" }
        },
        errorElement: "p",
        errorPlacement: function (error, element) {
            if (element.prop("tagName").toLowerCase() === "select") {
                error.insertAfter(element.closest(".form-group").find(".select2"));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function () {
            var form = $('#setupManager');
            var id = form.find('[name="id"]').val();
            form.ajaxSubmit({
                dataType: 'json',
                beforeSubmit: function () {
                    form.find('button[type="submit"]').button('loading');
                },
                success: function (data) {
                    if (data.status == "success") {
                        if (id == "new") form[0].reset();
                        form.find('button[type="submit"]').button('reset');
                        notify("Task Successfully Completed", 'success');
                        $('#datatable').dataTable().api().ajax.reload();
                    } else {
                        notify(data.status, 'warning');
                    }
                },
                error: function (errors) {
                    showError(errors, form);
                }
            });
        }
    });
});

// --- Modal setup helpers ---
function addSetup() {
    $('#setupModal').find('.msg').text("Add");
    $('#setupModal').find('input[name="id"]').val("new");
    $('#setupModal').modal('show');
}

function editSetup(ele) {
    var row = $(ele).closest('tr');
    var id = row.find('td').eq(0).text();
    var name = row.find('td').eq(1).text();
    var account = row.find('td').eq(2).text();
    var ifsc = row.find('td').eq(3).text();
    var branch = row.find('td').eq(4).text();

    $('#setupModal').find('.msg').text("Edit");
    $('#setupModal').find('input[name="id"]').val(id);
    $('#setupModal').find('input[name="name"]').val(name);
    $('#setupModal').find('input[name="account"]').val(account);
    $('#setupModal').find('input[name="ifsc"]').val(ifsc);
    $('#setupModal').find('input[name="branch"]').val(branch);
    $('#setupModal').modal('show');
}
