<?php $__env->startSection('title', 'Permissions To User'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('toolssetpermission')); ?>" method="post" id="setPermissions">
    <?php echo csrf_field(); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
					<h5 class="panel-title">Permission List Of Users</h5>
				</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>User</label>
                            <select class="form-control" name="user_id" onchange="getPermission()">
                                <option value="">Select User</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> (<?php echo e($user->id); ?>) (<?php echo e($user->role->role_title); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label style="width: 100%">&nbsp;</label>
                            <button class="btn btn-primary waves-effect pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Update Permissions</button>
                        </div>
                    </div>
                </div>
				<div class="panel-body p-l-0 p-r-0  table-responsive">
	                <table id="datatable" class="table table-hover table-bordered">
	                    <thead>
	                    <tr>
	                        <th width="170px;">Section Category</th>
	                        <th>
                                <span class="pull-left m-t-5 m-l-10">Permission's</span> 
                                <div class="md-checkbox pull-right">
                                    <input type="checkbox" id="selectall">
                                    <label for="selectall">Select All</label>
                                </div>
                            </th>
	                    </tr>
	                    </thead>
	                    <tbody>
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="md-checkbox mymd">
                                            <input type="checkbox" class="select" id="<?php echo e(ucfirst($key)); ?>">
                                            <label for="<?php echo e(ucfirst($key)); ?>"><?php echo e(ucfirst($key)); ?></label>
                                        </div>
                                    </td>

                                    <td>
                                        <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="md-checkbox" >
                                                <input type="checkbox" class="case" id="<?php echo e($permission->id); ?>" name="permissions[]" value="<?php echo e($permission->id); ?>">
                                                <label for="<?php echo e($permission->id); ?>"><?php echo e($permission->display_name); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
	                    </tbody>
	                </table>
				</div>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
	 <link href="<?php echo e(asset('')); ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .modal.left .modal-dialog, .modal.right .modal-dialog{
            width: 450px;
        }
        .ms-container .ms-list{
            height:350px;
        }

        .md-checkbox.mymd{
            margin: 7px 10px;
            min-width: 10px;
        }

        .md-checkbox{
            margin: 7px 10px;
            min-width: 260px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
	<script src="<?php echo e(asset('')); ?>/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
	<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="user_id"]').select2();

        $(window).load(function() {
            <?php if($id != 0): ?>
                $('select[name="user_id"]').val(<?php echo e($id); ?>);
                $('select[name="user_id"]').trigger('change');
            <?php endif; ?>
        });

    	$('#setPermissions').submit(function(){
    		var form= $(this);
            $(this).ajaxSubmit({
                dataType:'json',
                beforeSubmit:function(){
                    form.find('button[type="submit"]').button('loading');
                },
                complete: function(){
                    form.find('button[type="submit"]').button('reset');
                },
                success:function(data){
                    notify('Transaction Successfull.', 'Success', 'success');
                },
                error: function(errors) {
                	notify('Transaction Failed.', 'Oops!', 'error');
                }
            });
            return false;
    	});

        $('#selectall').click(function(event) {
            if(this.checked) {
                $('.case').each(function() {
                   this.checked = true;       
                });
             }else{
                $('.case').each(function() {
                   this.checked = false;
                });      
            }
        });

        $('.select').click(function(event) {
            if(this.checked) {
                $(this).closest('tr').find('.case').each(function() {
                   this.checked = true;       
                });
             }else{
                $(this).closest('tr').find('.case').each(function() {
                   this.checked = false;
                });      
            }
        });
    });

    function getPermission() {
        var id = $('select[name="user_id"]').val();
        if(id.length != ''){
            $.ajax({
                url: '<?php echo e(url('tools/get/permission')); ?>/'+id,
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            })
            .done(function(data) {
                $('.case').each(function() {
                   this.checked = false;
                });
                $.each(data, function(index, val) {
                    $('input[value='+val.permission_id+']').prop('checked', true);
                });
            })
            .fail(function() {
                notify('Somthing went wrong', 'Oops', 'error');
            });
        }
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u564371677/domains/dashboard.nanakpay.com/public_html/new2/resources/views/tools/permissions_user.blade.php ENDPATH**/ ?>