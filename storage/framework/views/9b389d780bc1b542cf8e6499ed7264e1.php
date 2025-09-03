<?php $__env->startSection('title', $user->name . " Service Manager"); ?>
<?php $__env->startSection('pagetitle',  $user->name . " Service Manager"); ?>
<?php
    $table = "yes";
    $agentfilter = "hide";
    $product['type'] = "Operator Type";
    $product['data'] = [
        "collection"  => "Collection",
        "payout"  => "Payout"
    ];

    $status['type'] = "Operator";
    $status['data'] = [
        "1" => "Active",
        "0" => "De-active"
    ];

    $search = "hide";
?>

<?php $__env->startSection('content'); ?>
    <div class="content p-b-0">
        <div class="tabbable">
            <ul class="nav nav-tabs bg-slate-600 nav-tabs-component">
                <li><a href="<?php echo e(route("setup", ["type" => "servicemanage-collection", "id" => $id])); ?>" class="legitRipple" aria-expanded="false">Collection</a></li>
                <li><a href="<?php echo e(route("setup", ["type" => "servicemanage-payout", "id" => $id])); ?>" class="legitRipple" aria-expanded="false">Payout</a></li>
            </ul>
        </div>
    </div>
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo e(ucfirst($type)); ?> Operator Lists</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Provider Name</th>
                                        <th>Api Name</th>
                                        <th>Operator Api</th>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script type="text/javascript">
    $(document).ready(function () {
        var url = "<?php echo e(url('statement/list/fetch')); ?>/setup<?php echo e($type); ?>/0";

        var onDraw = function() {
            $('select').select2();
        };

        var options = [
            { "data" : "id"},
            { "data" : "name"},
            { "data" : "name",
                render:function(data, type, full, meta){
                    var name = "No Api Select";
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        var providerid = "<?php echo e($service->provider_id ?? ""); ?>";
                        var apiname = "<?php echo e($service->api->product ?? ""); ?>";

                        if(full.id == providerid){
                            name = apiname;
                        }
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    return name;
                }
            },
            { "data" : "name",
                render:function(data, type, full, meta){
                    var out = "";
                    out += `<select class="form-control select" required="" onchange="apiUpdate(this, `+full.id+`)">
                    <option value="">Select Api</option>
                    <option value="0">Reset Api</option>`;
                    <?php $__currentLoopData = $apis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $api): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        out += `<option value="<?php echo e($api->id); ?>"><?php echo e($api->product); ?></option>`;
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    out += `</select>`;
                    return out;
                }
            }
        ];
        var DT = datatableSetup(url, options, onDraw);

        $( "#updateFormAll" ).validate({
            rules: {
                status: {
                    required: true,
                },
                type: {
                    required: true,
                }
            },
            messages: {
                type: {
                    required: "Please select operator type",
                },
                status: {
                    required: "Please select status",
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
                var form = $('#updateFormAll');
                form.ajaxSubmit({
                    dataType:'json',
                    beforeSubmit:function(){
                        form.find('button[type="submit"]').button('loading');
                    },
                    success:function(data){
                        if(data.status == "success"){
                            form.find('button[type="submit"]').button('reset');
                            notify("Task Successfully Completed", 'success');
                            $('#datatable').dataTable().api().ajax.reload();

                            setTimeout(function(){
                                window.location.reload();
                            }, 2000);
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

    });

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
                data: {'provider_id':id, 'api_id':api_id, "payee_id" : "<?php echo e($id); ?>", "actiontype":"servicemanage"}
            })
            .done(function(data) {
                if(data.status == "success"){
                    notify("Operator Updated", 'success');

                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u690537273/domains/login.mdrpay.com/public_html/resources/views/setup/servicemanage.blade.php ENDPATH**/ ?>