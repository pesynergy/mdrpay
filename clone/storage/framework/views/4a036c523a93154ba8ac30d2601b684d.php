<?php $__env->startSection('title', 'Operator List'); ?>
<?php $__env->startSection('pagetitle',  'Operator List'); ?>
<?php
    $table = "yes";
    $agentfilter = "hide";
    $product['type'] = "Operator Type";
    $product['data'] = [
        "collection" => "Collection",
        "fund"   => "Fund",
        "payout" => "Payout"
    ];

    $status['type'] = "Operator";
    $status['data'] = [
        "1" => "Active",
        "0" => "De-active"
    ];
?>

<?php $__env->startSection('content'); ?>
<div class="content-body default-height">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <form id="updateFormAll" action="<?php echo e(route("setupupdate")); ?>" method="post">
                        <input type="hidden" name="actiontype" value="operatorall">
                        <?php echo e(csrf_field()); ?>

                        <div class="card-header">
                            <h4 class="card-title">Update Operator</h4>
                            <div class="heading-elements">
                                <div class="heading-elements">
                                        <button type="submit" class="btn btn-info btn-xs btn-labeled legitRipple" data-loading-text="<b><i class='fa fa-spin fa-spinner'></i></b> Searching"><b><i class="icon-search4"></i></b> Update</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="panel panel-default">
                                <div class="panel-body p-tb-10 row">
                                    <?php if(isset($product)): ?>
                                        <div class="form-group col-md-4">
                                            <select name="type" class="form-control select">
                                                <option value="">Select <?php echo e($product['type'] ?? ''); ?></option>
                                                <?php if(isset($product['data']) && sizeOf($product['data']) > 0): ?>
                                                    <?php $__currentLoopData = $product['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
            
                                    <?php if($apis): ?>
                                    <div class="form-group col-md-4">
                                        <select name="api_id" class="form-control select">
                                            <option value="">Select Api</option>
                                            <?php if(sizeOf($apis) > 0): ?>
                                                <?php $__currentLoopData = $apis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myapi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($myapi->id); ?>"><?php echo e($myapi->product); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Operator List</h4>
                        <div class="heading-elements">
                            <button type="submit" class="btn btn-info btn-xs btn-labeled legitRipple" onclick="addSetup()" data-loading-text="<b><i class='fa fa-spin fa-spinner'></i></b> Searching"><b><i class="icon-search4"></i></b> Add New</button></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Operator Api</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

<div id="setupModal" class="modal fade" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title"><span class="msg">Add</span> Operator</h6>
            </div>
            <form id="setupManager" action="<?php echo e(route('setupupdate')); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <input type="hidden" name="actiontype" value="operator">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter value" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Code 1</label>
                            <input type="text" name="recharge1" class="form-control" placeholder="Enter value" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Min Range (Min Amount For Collection)</label>
                            <input type="text" name="range1" class="form-control" placeholder="Enter value" required="">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label>Max Range (Max Amount For Collection)</label>
                            <input type="text" name="range2" class="form-control" placeholder="Enter value" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Operator Type</label>
                            <select name="type" class="form-control select" required>
                                <option value="">Select Operator Type</option>

                                <?php $__currentLoopData = $product['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Api</label>
                            <select name="api_id" class="form-control select" required>
                                <option value="">Select Api</option>
                                <?php $__currentLoopData = $apis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $api): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($api->id); ?>"><?php echo e($api->product); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-info btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script type="text/javascript">
    $(document).ready(function () {
        var url = "<?php echo e(url('statement/list/fetch')); ?>/setup<?php echo e($type); ?>/0";

        var onDraw = function() {
            $('select').select2();
            $('input#operatorStatus').on('click', function(evt){
                evt.stopPropagation();
                var ele = $(this);
                var id = $(this).val();
                var status = "0";
                if($(this).prop('checked')){
                    status = "1";
                }
                
                $.ajax({
                    url: '<?php echo e(route('setupupdate')); ?>',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    data: {'id':id, 'status':status, "actiontype":"operator"}
                })
                .done(function(data) {
                    if(data.status == "success"){
                        notify("Operator Updated", 'success');
                        $('#datatable').dataTable().api().ajax.reload();
                    }else{
                        if(status == "1"){
                            ele.prop('checked', false);
                        }else{
                            ele.prop('checked', true);
                        }
                        notify("Something went wrong, Try again." ,'warning');
                    }
                })
                .fail(function(errors) {
                    if(status == "1"){
                        ele.prop('checked', false);
                    }else{
                        ele.prop('checked', true);
                    }
                    showError(errors, "withoutform");
                });
            });

            $('.editOperator').on('click', function () {
                var data = DT.row($(this).parent().parent()).data();
                $('#setupModal').find('.msg').text("Edit");
                $('#setupModal').find('input[name="id"]').val(data.id);
                $('#setupModal').find('input[name="name"]').val(data.name);
                $('#setupModal').find('input[name="recharge1"]').val(data.recharge1);
                $('#setupModal').find('[name="type"]').select2().val(data.type).trigger('change');
                $('#setupModal').find('[name="api_id"]').select2().val(data.api_id).trigger('change');
                $('#setupModal').modal('show');
            });
        };

        var options = [
            { "data" : "id"},
            { "data" : "name"},
            { "data" : "type"},
            { "data" : "name",
                render:function(data, type, full, meta){
                    var check = "";
                    if(full.status == "1"){
                        check = "checked='checked'";
                    }

                    return `<label class="switch">
                                <input type="checkbox" id="operatorStatus" `+check+` value="`+full.id+`" actionType="`+type+`">
                                <span class="slider round"></span>
                            </label>`;
                }
            },
            { "data" : "name",
                render:function(data, type, full, meta){
                    var out = "";
                    out += `<select class="form-control select" required="" onchange="apiUpdate(this, `+full.id+`)">`;
                    <?php $__currentLoopData = $apis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $api): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    var apiid = "<?php echo e($api->id); ?>";
                    out += `<option value="<?php echo e($api->id); ?>"`;
                    if(apiid == full.api_id){
                        out += `selected="selected"`;
                    }
                    out += `><?php echo e($api->product); ?></option>`;
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    out += `</select>`;
                    return out;
                }
            },
            { "data" : "id",
                render:function(data, type, full, meta){
                    return `<button type="button" class="btn btn-info btn-raised legitRipple btn-xs editOperator" > Edit</button>`;
                }
            },
        ];
        var DT = datatableSetup(url, options, onDraw);

        $( "#setupManager" ).validate({
            rules: {
                name: {
                    required: true,
                },
                recharge1: {
                    required: true,
                },
                recharge2: {
                    required: true,
                },
                type: {
                    required: true,
                },
                api_id: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Please enter operator name",
                },
                recharge1: {
                    required: "Please enter value",
                },
                recharge2: {
                    required: "Please enter value",
                },
                type: {
                    required: "Please select operator type",
                },
                api_id: {
                    required: "Please select api",
                }
            },
            errorElement: "p",
            errorPlacement: function ( error, element ) {
                if ( element.prop("tagName").toLowerCase() === "select" ) {
                    error.insertAfter( element.closest( ".form-group" ).find(".select2") );
                } else {
                    error.insertAfter( element );
                }
            },
            submitHandler: function () {
                var form = $('#setupManager');
                var id = form.find('[name="id"]').val();
                form.ajaxSubmit({
                    dataType:'json',
                    beforeSubmit:function(){
                        form.find('button[type="submit"]').button('loading');
                    },
                    success:function(data){
                        if(data.status == "success"){
                            if(id == "new"){
                                form[0].reset();
                                $('[name="api_id"]').select2().val(null).trigger('change');
                            }
                            form.find('button[type="submit"]').button('reset');
                            notify("Task Successfully Completed", 'success');
                            $('#datatable').dataTable().api().ajax.reload();
                        }else{
                            notify(data.status, 'warning');
                        }
                    },
                    error: function(errors) {
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

    function addSetup(){
        $('#setupModal').find('.msg').text("Add");
        $('#setupModal').find('input[name="id"]').val("new");
        $('#setupModal').modal('show');
    }

    function editSetup(full){
        console.log(full['id']);
        $('#setupModal').find('.msg').text("Edit");
        $('#setupModal').find('input[name="id"]').val(id);
        $('#setupModal').find('input[name="name"]').val(name);
        $('#setupModal').find('input[name="recharge1"]').val(recharge1);
        $('#setupModal').find('input[name="recharge2"]').val(recharge2);
        $('#setupModal').find('[name="type"]').select2().val(type).trigger('change');
        $('#setupModal').find('[name="api_id"]').select2().val(api_id).trigger('change');
        $('#setupModal').modal('show');
    }
    
    function apiUpdate(ele, id){
        var api_id = $(ele).val();
        if(api_id != ""){
            $.ajax({
                url: '<?php echo e(route('setupupdate')); ?>',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                data: {'id':id, 'api_id':api_id, "actiontype":"operator"}
            })
            .done(function(data) {
                if(data.status == "success"){
                    notify("Operator Updated", 'success');
                }else{
                    notify("Something went wrong, Try again." ,'warning');
                }
                $('#datatable').dataTable().api().ajax.reload();
            })
            .fail(function(errors) {
                showError(errors, "withoutform");
            });
        }
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u564371677/domains/dashboard.nanakpay.com/public_html/new1/resources/views/setup/operator.blade.php ENDPATH**/ ?>