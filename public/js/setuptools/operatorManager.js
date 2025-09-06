$(document).ready(function () {
    var url = operatorSetupConfig.fetchUrl;
    var onDraw = function () {
        $('.operatorStatusBtn').off('click').on('click', function () {
            let btn = $(this);
            let id = btn.data('id');
            let currentStatus = btn.data('status');
            let newStatus = currentStatus == "1" ? "0" : "1";

            $.ajax({
                url: operatorSetupConfig.updateUrl,
                type: 'post',
                headers: { 'X-CSRF-TOKEN': operatorSetupConfig.csrf },
                dataType: 'json',
                data: { id: id, status: newStatus, actiontype: "operator" }
            })
                .done(function (data) {
                    if (data.status == "success") {
                        let newText = newStatus == "1" ? "Active" : "Inactive";
                        btn.text(newText).data('status', newStatus);
                        notify("Operator Updated", 'success');
                    } else {
                        notify("Something went wrong, Try again.", 'warning');
                    }
                })
                .fail(function (errors) {
                    showError(errors, "withoutform");
                });
        });
        $('.editOperator').on('click', function () {
            var data = DT.row($(this).parent().parent()).data();
            $('#setupModal').find('.msg').text("Edit");
            $('#setupModal').find('input[name="id"]').val(data.id);
            $('#setupModal').find('input[name="name"]').val(data.name);
            $('#setupModal').find('input[name="recharge1"]').val(data.recharge1);
            $('#setupModal').find('input[name="recharge2"]').val(data.recharge2);
            $('#setupModal').find('[name="type"]').select2().val(data.type).trigger('change');
            $('#setupModal').find('[name="api_id"]').select2().val(data.api_id).trigger('change');
            $('#setupModal').modal('show');
        });

        $('select').select2();
    };
    var options = [
        { "data": "id" },
        { "data": "name" },
        { "data": "type" },
        {
            "data": "status",
            render: function (data, type, full) {
                let btnText = full.status == "1" ? "Active" : "Inactive";
                return `<button type="button" 
                            class="btn btn-sm btn-dark operatorStatusBtn" 
                            data-id="${full.id}" 
                            data-status="${full.status}">
                            ${btnText}
                        </button>`;
            }
        },
        {
            "data": "api_id",
            render: function (data, type, full) {
                let out = `<select class="form-control select" required onchange="apiUpdate(this, ${full.id})">`;
                operatorSetupConfig.apis.forEach(api => {
                    let selected = api.id == full.api_id ? 'selected="selected"' : '';
                    out += `<option value="${api.id}" ${selected}>${api.product}</option>`;
                });
                out += `</select>`;
                return out;
            }
        },
        {
            "data": "id",
            render: function () {
                return `<button type="button" 
                            class="btn btn-dark btn-raised legitRipple btn-xs editOperator">
                            <i class="fas fa-pencil-alt" style="padding-right:5px;"></i> Edit
                        </button>`;
            }
        },
    ];
    var DT = datatableSetup(url, options, onDraw);
    $("#setupManager").validate({
        rules: {
            name: { required: true },
            recharge1: { required: true },
            recharge2: { required: true },
            type: { required: true },
            api_id: { required: true },
        },
        messages: {
            name: { required: "Please enter operator name" },
            recharge1: { required: "Please enter value" },
            recharge2: { required: "Please enter value" },
            type: { required: "Please select operator type" },
            api_id: { required: "Please select api" }
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
                        if (id == "new") {
                            form[0].reset();
                            $('[name="api_id"]').select2().val(null).trigger('change');
                        }
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

    $("#setupModal").on('hidden.bs.modal', function () {
        $('#setupModal').find('.msg').text("Add");
        $('#setupModal').find('form')[0].reset();
    });
});
function addSetup() {
    $('#setupModal').find('.msg').text("Add");
    $('#setupModal').find('input[name="id"]').val("new");
    $('#setupModal').modal('show');
}

function apiUpdate(ele, id) {
    var api_id = $(ele).val();
    if (api_id != "") {
        $.ajax({
            url: operatorSetupConfig.updateUrl,
            type: 'post',
            headers: { 'X-CSRF-TOKEN': operatorSetupConfig.csrf },
            dataType: 'json',
            data: { id: id, api_id: api_id, actiontype: "operator" }
        })
            .done(function (data) {
                if (data.status == "success") {
                    notify("Operator Updated", 'success');
                } else {
                    notify("Something went wrong, Try again.", 'warning');
                }
                $('#datatable').dataTable().api().ajax.reload();
            })
            .fail(function (errors) {
                showError(errors, "withoutform");
            });
    }
}
