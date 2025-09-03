<div class="navbar navbar-default bg-yellow" id="navbar-second">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second-toggle">
        <ul class="nav navbar-nav navbar-nav-material">
            <li><a href="<?php echo e(route('home')); ?>" class="legitRipple"><i class=" icon-home text-material position-left"></i> Dashboard</a></li>

            <?php if(Myhelper::can(['company_manager', 'change_company_profile', 'scheme_manager'])): ?>
                <li class="dropdown">
                    <a class="dropdown-toggle legitRipple" data-toggle="dropdown"><i class="icon-wrench position-left"></i> <span>Resources</span><span class="caret"></span></a>
                    <ul class="dropdown-menu width-250">
                        <?php if(Myhelper::can('company_manager')): ?>
                            
                        <?php endif; ?>

                        <?php if(Myhelper::can('change_company_profile')): ?>
                            <li><a href="<?php echo e(route('resource', ['type' => 'companyprofile'])); ?>"><i class="icon-arrow-right5"></i> Company Profile</a></li>
                        <?php endif; ?>

                        <?php if(Myhelper::can('scheme_manager')): ?>
                            <li><a href="<?php echo e(route('resource', ['type' => 'scheme'])); ?>"><i class="icon-arrow-right5"></i> Scheme Manager</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(Myhelper::can(['setup_bank', 'api_manager', 'setup_operator'])): ?>
                <li class="dropdown">
                    <a class="dropdown-toggle legitRipple" data-toggle="dropdown"><i class="icon-cog2"></i> 
                        <span>Setup Tools</span><span class="caret"></span>
                    </a>
                    
                    <ul class="dropdown-menu width-250">
                        <?php if(Myhelper::can('api_manager')): ?>
                            <li><a href="<?php echo e(route('setup', ['type' => 'api'])); ?>"><i class="icon-arrow-right5"></i> Api Manager</a></li>
                        <?php endif; ?>

                        <?php if(Myhelper::can('setup_bank')): ?>
                            <li><a href="<?php echo e(route('setup', ['type' => 'bank'])); ?>"><i class="icon-arrow-right5"></i> Bank Account</a></li>
                        <?php endif; ?>

                        <?php if(Myhelper::can('setup_operator')): ?>
                            <li><a href="<?php echo e(route('setup', ['type' => 'operator'])); ?>"><i class="icon-arrow-right5"></i> Operator Manager</a></li>
                        <?php endif; ?>

                        <?php if(Myhelper::can('admin')): ?>
                            <li><a href="<?php echo e(route('setup', ['type' => 'portalsetting'])); ?>"><i class="icon-arrow-right5"></i> Portal Setting</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(Myhelper::can(['view_apiuser', 'view_mis', 'view_web', 'view_admin'])): ?>
                <li class="dropdown">
                    <a class="dropdown-toggle legitRipple" data-toggle="dropdown"><i class="icon-user"></i> <span>Member</span><span class="caret"></span></a>
                    <ul class="dropdown-menu width-250">
                        <?php if(Myhelper::can(['view_apiuser'])): ?>
                            <li><a href="<?php echo e(route('member', ['type' => 'apiuser'])); ?>"><i class="icon-arrow-right5"></i> Api User</a></li>
                        <?php endif; ?>

                        <?php if(Myhelper::can(['view_mis'])): ?>
                            <li><a href="<?php echo e(route('member', ['type' => 'mis'])); ?>"><i class="icon-arrow-right5"></i> Mis User</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <li class="dropdown">
                <a class="dropdown-toggle legitRipple" data-toggle="dropdown">
                    <i class="icon-history"></i> <span>Reports</span><span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">
                    <?php if(Myhelper::can('collection_statement')): ?>
                        <li><a href="<?php echo e(route('reports', ['type' => 'chargeback'])); ?>"><i class="icon-arrow-right5"></i> Charge Back</a></li>
                        <li><a href="<?php echo e(route('reports', ['type' => 'payin'])); ?>"><i class="icon-arrow-right5"></i> Pay In</a></li>
                    <?php endif; ?>

                    <?php if(Myhelper::can('payout_statement')): ?>
                        <li><a href="<?php echo e(route('reports', ['type' => 'payout'])); ?>"><i class="icon-arrow-right5"></i> Pay Out</a></li>
                        <li><a href="<?php echo e(route('reports', ['type' => 'oldpayout'])); ?>"><i class="icon-arrow-right5"></i> Old Pay Out</a></li>
                    <?php endif; ?>
                    
                    <?php if(Myhelper::can('qr_statement')): ?>
                        <li><a href="<?php echo e(route('reports', ['type' => 'upiintent'])); ?>"><i class="icon-arrow-right5"></i> Upi Intent</a></li>
                    <?php endif; ?>
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle legitRipple" data-toggle="dropdown">
                    <i class="icon-history"></i> <span>Account Ladger</span><span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">
                    <li><a href="<?php echo e(route('reports', ['type' => 'mainwallet'])); ?>"><i class="icon-arrow-right5"></i> Main Wallet</a></li>
                    <li><a href="<?php echo e(route('reports', ['type' => 'payoutwallet'])); ?>"><i class="icon-arrow-right5"></i> Payout Wallet</a></li>
                </ul>
            </li>
            
            <?php if(Myhelper::hasRole('apiuser')): ?>
                <li class="dropdown">
                    <a class="dropdown-toggle legitRipple" data-toggle="dropdown"><i class="icon-cog2"></i> <span>Developer Tools</span></a>
                    <ul class="dropdown-menu width-250">
                        <li><a href="<?php echo e(route('apisetup', ['type' => 'setting'])); ?>">Api Setting</a></li>
                        <li><a href="https://apnamoney.readme.io/reference/account-balance" target="_blank">Api Documents</a></li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>