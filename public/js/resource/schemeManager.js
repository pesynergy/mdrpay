$(document).ready(function () {
    const cfg = window.schemeConfig;

    // Default values
    $('input[name="whitelable[]"]').val('0');
    $('input[name="md[]"]').val('0');
    $('input[name="distributor[]"]').val('0');
    $('input[name="retailer[]"]').val('0');

    // Handle scheme status toggle
    var onDraw = function () {
        $('.schemeStatus').off('click').on('click', function () {
            let btn = $(this);
            let id = btn.data('id');
            let currentStatus = btn.data('status');
            let newStatus = (currentStatus == "1") ? "0" : "1";

            $.ajax({
                url: cfg.updateUrl,
                type: 'post',
                headers: { 'X-CSRF-TOKEN': cfg.csrf },
                dataType: 'json',
                data: { id, status: newStatus, actiontype: "scheme" }
            })
                .done(function (data) {
                    if (data.status == "success") {
                        let newText = (newStatus == "1") ? "Active" : "Inactive";

                        btn.text(newText); // Only text changes, button stays dark
                        btn.data('status', newStatus);

                        notify("Scheme Updated", 'success');
                    } else {
                        notify("Something went wrong, Try again.", 'warning');
                    }
                })
                .fail(function (errors) {
                    showError(errors, "withoutform");
                });
        });
    };



    // Datatable columns
    var options = [
        { "data": "id" },
        { "data": "name" },
        {
            "data": "status",
            render: function (data, type, full) {
                let btnText = (full.status == "1") ? "Active" : "Inactive";

                return `
            <button type="button" class="schemeStatus btn btn-sm btn-dark" 
                data-id="${full.id}" 
                data-status="${full.status}">
                ${btnText}
            </button>
        `;
            }
        },

        {
            "data": "id",
            render: function (data, type, full) {
                let menu = `<li class="dropdown-header">Charge</li>`;
                $.each(cfg.charges, function (key) {
                    menu += `<li style="padding-left:15px;padding-bottom:10px;text-transform:capitalize;">
                                <a href="javascript:void(0)" onclick="commission(${full.id}, '${key}', '${key}Modal')">
                                    <i class="fa fa-inr"></i> ${key} Charge
                                </a>
                             </li>`;
                });

                return `
                    <button type="button" class="btn btn-info btn-xs" onclick="editSetup(this)">
                        <i class="fas fa-pencil-alt me-1"></i>Edit
                    </button>
                    <button type="button" class="btn btn-info btn-xs" onclick="viewCommission(${full.id}, '${full.name}')">
                        <i class="flaticon-381-list me-1"></i> View Commission
                    </button>
                    <div class="btn-group btn-group-fade">
                        <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">
                            <i class="flaticon-381-list-1 me-1"></i> Commission/Charge <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">${menu}</ul>
                    </div>`;
            }
        },
    ];

    // Setup datatable
    datatableSetup(cfg.fetchUrl, options, onDraw);

    // Form validation
    $("#setupManager").validate({
        rules: { name: { required: true } },
        messages: { name: { required: "Please enter bank name" } },
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
                beforeSubmit: function () { form.find('button[type="submit"]').button('loading'); },
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

    // Commission form submit
    $('form.commissionForm').submit(function () {
        var form = $(this);
        form.closest('.modal').find('tbody').find('span.pull-right').remove();
        $(this).ajaxSubmit({
            dataType: 'json',
            beforeSubmit: function () { form.find('button[type="submit"]').button('loading'); },
            complete: function () { form.find('button[type="submit"]').button('reset'); },
            success: function (data) {
                $.each(data.status, function (index, values) {
                    let row = form.find('input[value="' + index + '"]').closest('tr');
                    if (values.id) {
                        row.find('td').eq(0).append('<span class="pull-right text-success"><i class="fa fa-check"></i></span>');
                    } else {
                        row.find('td').eq(0).append('<span class="pull-right text-danger"><i class="fa fa-times"></i></span>');
                        if (values != 0) {
                            row.find('input[value="' + index + '"]').closest('tr')
                                .find('input[name="apiuser[]"]').closest('td')
                                .append('<span class="text-danger pull-right"><i class="fa fa-times"></i> ' + values + '</span>');
                        }
                    }
                });
                setTimeout(() => { form.find('span.pull-right').remove(); }, 10000);
            },
            error: function (errors) { showError(errors, form); }
        });
        return false;
    });

    // Reset modal on close
    $("#setupModal").on('hidden.bs.modal', function () {
        $(this).find('.msg').text("Add");
        $(this).find('form')[0].reset();
    });
});

// Global functions
function addSetup() {
    $('#setupModal').find('.msg').text("Add");
    $('#setupModal').find('input[name="id"]').val("new");
    $('#setupModal').modal('show');
}

function editSetup(ele) {
    var row = $(ele).closest('tr');
    var id = row.find('td').eq(0).text();
    var name = row.find('td').eq(1).text();

    $('#setupModal').find('.msg').text("Edit");
    $('#setupModal').find('input[name="id"]').val(id);
    $('#setupModal').find('input[name="name"]').val(name);
    $('#setupModal').modal('show');
}

function commission(id, type, modal) {
    const cfg = window.schemeConfig;
    $.ajax({
        url: `${cfg.getResourceUrl}/${type}/commission`,
        type: 'post',
        headers: { 'X-CSRF-TOKEN': cfg.csrf },
        dataType: 'json',
        data: { scheme_id: id }
    })
        .done(function (data) {
            if (data.length > 0) {
                $.each(data, function (index, values) {
                    if (type != "gst" && type != "itr" && cfg.isAdmin) {
                        $('#' + modal).find('input[value="' + values.slab + '"]').closest('tr').find('select[name="type[]"]').val(values.type);
                    }
                    $('#' + modal).find('input[value="' + values.slab + '"]').closest('tr').find('input[name="apiuser[]"]').val(values.apiuser);
                });
            }
        })
        .fail(function (errors) {
            notify('Oops', errors.status + '! ' + errors.statusText, 'warning');
        });

    $('#' + modal).find('input[name="scheme_id"]').val(id);
    $('#' + modal).modal('show');
}

function viewCommission(id, name) {
    const cfg = window.schemeConfig;
    if (id != '') {
        $('#loader').show();
        $.ajax({
            url: cfg.getMemberCommissionUrl,
            type: 'POST',
            dataType: 'json',
            headers: { 'X-CSRF-TOKEN': cfg.csrf },
            data: { "scheme_id": id },
            success: function (data) {
                $('#loader').hide();
                $('#commissionModal').find('.schemename').text(name);
                $('#commissionModal').find('.commissioData').html(data);
                $('#commissionModal').modal('show');
            },
            error: function (xhr, status, error) {
                $('#loader').hide();
                console.error('Error:', error);
                notify('Something went wrong while fetching commission details', 'warning');
            }
        });
    } else {
        notify('Invalid scheme ID provided', 'warning');
    }
}

function SETTYPE(ele) {
    var type = $(ele).val();
    $('[name="type[]"]').select2().val(type).trigger('change');
}

function SETVALUE(ele, type) {
    var value = $(ele).val();
    $('[name="' + type + '[]"]').val(value);
}
