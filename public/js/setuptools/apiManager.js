$(document).ready(function () {
    const cfg = {
        url: window.setupConfig.fetchUrl,     // Laravel will pass this
        updateUrl: window.setupConfig.updateUrl,
        csrf: window.setupConfig.csrf
    };
    var onDraw = function () {
        $('.apiStatusBtn').off('click').on('click', function () {
            let btn = $(this);
            let id = btn.data('id');
            let currentStatus = btn.data('status');
            let newStatus = currentStatus == "1" ? "0" : "1";

            $.ajax({
                url: cfg.updateUrl,
                type: 'post',
                headers: { 'X-CSRF-TOKEN': cfg.csrf },
                dataType: 'json',
                data: { id: id, status: newStatus, actiontype: "api" }
            })
                .done(function (data) {
                    if (data.status == "success") {
                        let newText = newStatus == "1" ? "Active" : "Inactive";
                        btn.text(newText).data('status', newStatus);
                        notify("Api Status Updated", 'success');
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
        { "data": "product" },
        { "data": "name" },
        { "data": "code" },
        {
            "data": "id",
            render: function (data, type, full) {
                return `<a href="javascript:void(0)" data-popup="popover" 
                            data-placement="top" title="" data-html="true" 
                            data-trigger="hover" 
                            data-content="Url - ${full.url}<br>Username - ${full.username}<br>Password - ${full.password}<br>Optional - ${full.optional1}" 
                            data-original-title="${full.product}">
                            Api Credentials
                        </a>`;
            }
        },
        {
            "data": "id",
            render: function (data, type, full) {
                return `${full.gst}/${full.tds}`;
            }
        },
        {
            "data": "status",
            render: function (data, type, full) {
                let btnText = full.status == "1" ? "Active" : "Inactive";
                return `<button type="button" class="btn btn-sm btn-dark apiStatusBtn" 
                    data-id="${full.id}" 
                    data-status="${full.status}">
                    ${btnText}
                </button>`;
            }
        },

        {
            "data": "id",
            render: function (data, type, full) {
                return `<button type="button" class="btn btn-dark btn-xs" 
                            onclick="editSetup(${full.id}, \`${full.product}\`, \`${full.name}\`, \`${full.url}\`, \`${full.username}\`, \`${full.password}\`, \`${full.optional1}\`, \`${full.code}\`, \`${full.type}\`, \`${full.gst}\`, \`${full.tds}\`)">
                            <i class="fas fa-pencil-alt me-1"></i>Edit
                        </button>`;
            }
        },
    ];

    // Init datatable
    datatableSetup(cfg.url, options, onDraw);

    // Form validation
    $("#setupManager").validate({
        rules: {
            name: { required: true },
            product: { required: true },
            code: { required: true }
        },
        messages: {
            name: { required: "Please enter display name" },
            product: { required: "Please enter product name" },
            code: { required: "Please enter api code" }
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

    // Reset modal on close
    $("#setupModal").on('hidden.bs.modal', function () {
        $('#setupModal').find('.msg').text("Add");
        $('#setupModal').find('form')[0].reset();
    });
});

// Global functions
function addSetup() {
    $('#setupModal').find('.msg').text("Add");
    $('#setupModal').find('input[name="id"]').val("new");
    $('#setupModal').modal('show');
}

function editSetup(id, product, name, url, username, password, optional1, code, type, gst, tds) {
    $('#setupModal').find('.msg').text("Edit");
    $('#setupModal').find('input[name="id"]').val(id);
    $('#setupModal').find('input[name="product"]').val(product);
    $('#setupModal').find('input[name="name"]').val(name);
    $('#setupModal').find('input[name="url"]').val(url);
    $('#setupModal').find('input[name="username"]').val(username);
    $('#setupModal').find('input[name="password"]').val(password);
    $('#setupModal').find('input[name="optional1"]').val(optional1);
    $('#setupModal').find('input[name="code"]').val(code);
    $('#setupModal').find('input[name="gst"]').val(gst);
    $('#setupModal').find('input[name="tds"]').val(tds);
    $('#setupModal').find('input[name="type"]').val(type);
    $('#setupModal').modal('show');
}
