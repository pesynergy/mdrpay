$(document).ready(function () {
    var url = "/statement/list/fetch/setup" + type + "/0";

    var onDraw = function () {
        $('[data-popup="popover"]').popover({
            template: '<div class="popover border-teal-400"><div class="arrow"></div><h5 class="popover-title bg-teal-400"></h5><div class="popover-content"></div></div>'
        });
    };

    var options = [
        { "data": "id" },
        { "data": "username" },
        { "data": "ip" },
        { "data": "token" },
        {
            "data": "status",
            render: function (data, type, full, meta) {
                let isActive = full.status == "1";
                let btnClass = isActive ? "btn btn-dark btn-sm" : "btn btn-outline-dark btn-sm";
                let text = isActive ? "Active" : "Inactive";

                return `<button class="${btnClass}" id="apiStatus" value="${full.id}" actionType="${type}">
                            ${text}
                        </button>`;
            }
        }
    ];
    datatableSetup(url, options, onDraw);

    // 🔹 Status button click handler (delegated)
    $('#datatable').on('click', '#apiStatus', function (evt) {
        evt.stopPropagation();
        let ele = $(this);
        let id = ele.val();
        let currentText = ele.text().trim();
        let status = currentText === "Active" ? "0" : "1"; // toggle

        $.ajax({
            url: setupUpdateRoute,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: { id: id, status: status, actiontype: "apitoken" }
        })
            .done(function (data) {
                if (data.status === "success") {
                    notify("Api Status Updated", 'success');

                    // 🔹 Instantly toggle button UI without reload
                    if (status === "1") {
                        ele.removeClass("btn-outline-dark").addClass("btn-dark").text("Active");
                    } else {
                        ele.removeClass("btn-dark").addClass("btn-outline-dark").text("Inactive");
                    }

                } else {
                    notify("Something went wrong, Try again.", 'warning');
                }
            })
            .fail(function (errors) {
                showError(errors, "withoutform");
            });
    });

    // 🔹 Form Validation
    $("#setupManager").validate({
        rules: {
            name: { required: true },
            product: { required: true },
            code: { required: true },
        },
        messages: {
            name: { required: "Please enter display name" },
            product: { required: "Please enter product name" },
            url: { required: "Please enter api url" },
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
                        if (id == "new") {
                            form[0].reset();
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

function editSetup(id, product, name, url, username, password, optional1, code, type) {
    $('#setupModal').find('.msg').text("Edit");
    $('#setupModal').find('input[name="id"]').val(id);
    $('#setupModal').find('input[name="product"]').val(product);
    $('#setupModal').find('input[name="name"]').val(name);
    $('#setupModal').find('input[name="url"]').val(url);
    $('#setupModal').find('input[name="username"]').val(username);
    $('#setupModal').find('input[name="password"]').val(password);
    $('#setupModal').find('input[name="optional1"]').val(optional1);
    $('#setupModal').find('input[name="code"]').val(code);
    $('#setupModal').find('[name="type"]').select2().val(type).trigger('change');
    $('#setupModal').modal('show');
}
