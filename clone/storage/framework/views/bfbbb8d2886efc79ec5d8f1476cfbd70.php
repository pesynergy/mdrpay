<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <?php if($mydata['company']->logo): ?>
            <a class="navbar-brand no-padding" href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('')); ?>/<?php echo e($mydata['company']->logo); ?>" class=" img-responsive" alt="">
            </a>
        <?php else: ?>
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>" style="padding: 17px">
                <span class="companyname" style="color: black"><?php echo e($mydata['company']->companyname); ?></span>
            </a>
        <?php endif; ?>

        <ul class="nav navbar-nav visible-xs-block">
            <li>
                <a data-toggle="collapse" data-target="#navbar-mobile">
                    <i class="fa fa-inr"></i> : <span class="payoutwallet"><?php echo e(Auth::user()->payoutwallet); ?></span>
                </a>
            </li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <?php if(Myhelper::hasRole('admin')): ?>
                <li><a href="javascript:void(0)" style="padding: 13px"><button type="button" class="btn bg-slate btn-labeled btn-xs legitRipple" data-toggle="modal" data-target="#walletLoadModal"><b><i class="icon-wallet"></i></b> Load Wallet</button></a></li>
            <?php endif; ?>
            <div class="clearfix"></div>
        </ul>

        <div class="navbar-right">
            <p class="navbar-text">Collection : <span class="mainwallet"><?php echo e(Auth::user()->mainwallet); ?></span> /-</p>
            <p class="navbar-text">Payout : <span class="payoutwallet"><?php echo e(Auth::user()->payoutwallet); ?></span> /-</p>
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span><?php echo e(explode(' ',ucwords(Auth::user()->name))[0]); ?></span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right width-250 mt-5">
                        <li class="dropdown-header">
                            Aid : <?php echo e(Auth::user()->id); ?>

                        </li>
                        <li class="dropdown-header">
                            Agentcode : <?php echo e(Auth::user()->agentcode); ?>

                        </li>
                        <li class="dropdown-header">
                            Name : <?php echo e(Auth::user()->name); ?>

                        </li>
                        <li class="dropdown-header">
                            Member : <?php echo e(Auth::user()->role->name); ?>

                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo e(route('profile')); ?>"><i class="icon-user-plus"></i> <span>My Account</span></a></li>
                        <?php if(Myhelper::hasNotRole('admin') && Myhelper::can('view_commission')): ?>
                            <li><a href="<?php echo e(route('resource', ['type' => 'commission'])); ?>"><i class="icon-coins"></i> <span>My Package</span></a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo e(route('logout')); ?>"><i class="icon-switch2"></i> <span>Logout</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php echo $__env->make('layouts.newsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u564371677/domains/login.nanakpay.com/public_html/resources/views/layouts/topbar.blade.php ENDPATH**/ ?>