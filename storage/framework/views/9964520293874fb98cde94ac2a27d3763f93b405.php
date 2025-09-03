<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default sidebar-fixed">
    <div class="sidebar-content" id="my-scrollbar">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <li><a href="<?php echo e(route('home')); ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    <?php if(Myhelper::can(['setup_apitoken', 'complaint'])): ?>
                    <li>
                        <a href="javascript:void(0)"><i class="icon-alarm"></i> <span>Pending Approvals</span>
                            <span class="label bg-danger pendingApprovals <?php echo e(Myhelper::hasRole('admin')?'' : 'hide'); ?>">0</span></a>
                        <ul>
                            <?php if(Myhelper::can('complaint')): ?>
                                <li><a href="<?php echo e(route('complaint')); ?>">Complaints<span class="label bg-blue complaint <?php echo e(Myhelper::hasRole('admin')?'' : 'hide'); ?>">0</span></a></li>
                            <?php endif; ?>

                            <?php if(Myhelper::can('setup_apitoken')): ?>
                                <li><a href="<?php echo e(route('setup', ['type' => "apitoken"])); ?>">Api Token<span class="label bg-blue apitoken <?php echo e(Myhelper::hasRole('admin')?'' : 'hide'); ?>">0</span></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if(Myhelper::can(['company_manager', 'change_company_profile', 'scheme_manager'])): ?>
                    <li>
                        <a href="javascript:void(0)"><i class="icon-wrench"></i> <span>Resources</span></a>
                        <ul>
                            <?php if(Myhelper::can('company_manager')): ?>
                                <li><a href="<?php echo e(route('resource', ['type' => 'company'])); ?>">Company Manager</a></li>
                            <?php endif; ?>

                            <?php if(Myhelper::can('change_company_profile')): ?>
                                <li><a href="<?php echo e(route('resource', ['type' => 'companyprofile'])); ?>">Company Profile</a></li>
                            <?php endif; ?>

                            <?php if(Myhelper::can('scheme_manager')): ?>
                                <li><a href="<?php echo e(route('resource', ['type' => 'scheme'])); ?>">Scheme Manager</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if(Myhelper::can(['view_apiuser', 'view_mis', 'view_web', 'view_admin'])): ?>
                    <li>
                        <a href="javascript:void(0)"><i class="icon-user"></i> <span>Member</span></a>
                        <ul>
                            <?php if(Myhelper::can(['view_admin'])): ?>
                            <li><a href="<?php echo e(route('member', ['type' => 'subadmin'])); ?>">Admin User</a></li>
                            <?php endif; ?>

                            <?php if(Myhelper::can(['view_apiuser'])): ?>
                            <li><a href="<?php echo e(route('member', ['type' => 'apiuser'])); ?>">Api User</a></li>
                            <?php endif; ?>

                            <?php if(Myhelper::can(['view_web'])): ?>
                            <li><a href="<?php echo e(route('member', ['type' => 'web'])); ?>">Registered User</a></li>
                            <?php endif; ?>

                            <?php if(Myhelper::can(['view_mis'])): ?>
                            <li><a href="<?php echo e(route('member', ['type' => 'mis'])); ?>">Mis User</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if(Myhelper::can(['view_kycpending', 'view_kycsubmitted', 'view_kycrejected'])): ?>
                    <li>
                        <a href="javascript:void(0)"><i class="icon-user"></i> <span>Kyc Manager</span> 
                            <span class="label bg-danger <?php echo e(Myhelper::hasRole('admin') ? '' : 'hide'); ?> kycuser">0</span>
                        </a>
                        <ul>
                            <?php if(Myhelper::can(['view_kycpending'])): ?>
                            <li><a href="<?php echo e(route('member', ['type' => 'kycpending'])); ?>">Pending Kyc 
                                <span class="label bg-danger <?php echo e(Myhelper::hasRole('admin') ? '' : 'hide'); ?> kycpending">0</span></a>
                            </li>
                            <?php endif; ?>

                            <?php if(Myhelper::can(['view_kycsubmitted'])): ?>
                            <li><a href="<?php echo e(route('member', ['type' => 'kycsubmitted'])); ?>">Submitted Kyc 
                                <span class="label bg-danger <?php echo e(Myhelper::hasRole('admin') ? '' : 'hide'); ?> kycsubmitted">0</span></a>
                            </li>
                            <?php endif; ?>

                            <?php if(Myhelper::can(['view_kycrejected'])): ?>
                            <li><a href="<?php echo e(route('member', ['type' => 'kycrejected'])); ?>">Rejected Kyc 
                                <span class="label bg-danger <?php echo e(Myhelper::hasRole('admin') ? '' : 'hide'); ?> kycrejected">0</span></a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if(Myhelper::can(['fund_transfer', 'fund_return', 'fund_request_view', 'fund_report', 'fund_request'])): ?>
                    <li>
                        <a href="javascript:void(0)"><i class="icon-wallet"></i> <span>Fund</span>
                        <span class="label bg-danger fundCount <?php echo e(Myhelper::hasRole('admin')?'' : 'hide'); ?>">0</span></a>
                        <ul>
                            <?php if(Myhelper::can(['fund_transfer', 'fund_return'])): ?>
                            <li><a href="<?php echo e(route('fund', ['type' => 'tr'])); ?>">Transfer/Return</a></li>
                            <?php endif; ?>

                            <?php if(Myhelper::can(['fund_requestview'])): ?>
                                <li>
                                    <a href="<?php echo e(route('fund', ['type' => 'requestview'])); ?>">Request 
                                    <span class="label bg-blue fundCount <?php echo e(Myhelper::hasRole('admin')?'' : 'hide'); ?>">0</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('fund', ['type' => 'payoutview'])); ?>">Payout Request</a>
                                </li>
                            <?php endif; ?>

                            <?php if(Myhelper::hasNotRole('admin') && Myhelper::can('fund_request')): ?>
                                <li><a href="<?php echo e(route('fund', ['type' => 'request'])); ?>">Load Wallet</a></li>
                            <?php endif; ?>
                            <?php if(Myhelper::hasNotRole('admin') && Myhelper::can('qr_request')): ?>
                                <li><a href="<?php echo e(route('fund', ['type' => 'upiload'])); ?>">Qr Code</a></li>
                            <?php endif; ?>
                            <?php if(Myhelper::hasNotRole('admin') && Myhelper::can('payout_request')): ?>
                                <li><a href="<?php echo e(route('fund', ['type' => 'payout'])); ?>">Payout</a></li>
                            <?php endif; ?>

                            <?php if(Myhelper::can(['fund_report'])): ?>
                            <li><a href="<?php echo e(route('fund', ['type' => 'requestviewall'])); ?>">Request Report</a></li>
                            <li><a href="<?php echo e(route('fund', ['type' => 'allfund'])); ?>">Fund Transfer Report</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <li>
                        <a href="javascript:void(0)"><i class="icon-history"></i> <span>Transaction History</span></a>
                        <ul>
                            <?php if(Myhelper::can('payout_statement')): ?>
                                <li><a href="<?php echo e(route('reports', ['type' => 'payout'])); ?>">Payout</a></li>
                            <?php endif; ?>
                            
                            <?php if(Myhelper::can('collection_statement')): ?>
                                <li><a href="<?php echo e(route('reports', ['type' => 'collection'])); ?>">Collection</a></li>
                                <li><a href="<?php echo e(route('reports', ['type' => 'chargeback'])); ?>">Charge Back</a></li>
                            <?php endif; ?>
                            
                            <?php if(Myhelper::can('qr_statement')): ?>
                                <li><a href="<?php echo e(route('reports', ['type' => 'upiloads'])); ?>">Qr Codes</a></li>
                            <?php endif; ?>
                            
                            <?php if(Myhelper::can('paytm_statement')): ?>
                                <li><a href="<?php echo e(route('reports', ['type' => 'pcollection'])); ?>">Paytm Collection</a></li>
                                <li><a href="<?php echo e(route('reports', ['type' => 'pupiload'])); ?>">Paytm Qr Code</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li><a href="<?php echo e(route('complaint')); ?>"><i class="icon-arrow-right5"></i>My Complaints</a></li>
                    
                    <?php if(Myhelper::can(['account_statement'])): ?>
                        <li>
                            <a href="javascript:void(0)"><i class="icon-history"></i> <span>Account Ledger</span></a>
                            <ul>
                                <li><a href="<?php echo e(route('reports', ['type' => 'payoutwallet'])); ?>">Payout Wallet</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    
                    <?php if(Myhelper::can(['setup_bank', 'api_manager', 'setup_operator'])): ?>
                    <li>
                        <a href="javascript:void(0)"><i class="icon-cog3"></i> <span>Setup Tools</span></a>
                        <ul>
                            <?php if(Myhelper::can('api_manager')): ?>
                            <li><a href="<?php echo e(route('setup', ['type' => 'api'])); ?>">Api Manager</a></li>
                            <?php endif; ?>
                            <?php if(Myhelper::can('setup_bank')): ?>
                            <li><a href="<?php echo e(route('setup', ['type' => 'bank'])); ?>">Bank Account</a></li>
                            <?php endif; ?>
                            <?php if(Myhelper::can('complaint_subject')): ?>
                            <li><a href="<?php echo e(route('setup', ['type' => 'complaintsub'])); ?>">Complaint Subject</a></li>
                            <?php endif; ?>
                            <?php if(Myhelper::can('setup_operator')): ?>
                            <li><a href="<?php echo e(route('setup', ['type' => 'operator'])); ?>">Operator Manager</a></li>
                            <?php endif; ?>
                            <?php if(Myhelper::hasRole('admin')): ?>
                            <li><a href="<?php echo e(route('setup', ['type' => 'portalsetting'])); ?>">Portal Setting</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <li>
                        <a href="<?php echo e(route('profile')); ?>"><i class="icon-user"></i> <span>My Profile</span></a>
                    </li>
                    
                    <?php if(Myhelper::hasRole('apiuser')): ?>
                    <li>
                        <a href="javascript:void(0)"><i class="icon-cog2"></i> <span>Api Settings</span></a>
                        <ul>
                            <li><a href="<?php echo e(route('apisetup', ['type' => 'setting'])); ?>">Callback & Token</a></li>
                            <li><a href="<?php echo e(route('apisetup', ['type' => 'operator'])); ?>">Operator Code</a></li>
                            <li><a href="https://documenter.getpostman.com/view/5849796/2s93CSnAXm" target="_blank">Api Documents</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if(Myhelper::can("check_logs")): ?>
                    <li>
                        <a href="javascript:void(0)"><i class="icon-cog2"></i> <span>Portal Logs</span></a>
                        <ul>
                            <li><a href="<?php echo e(route('portallogs', ['type' => 'api'])); ?>">Api Logs</a></li>
                            <li><a href="<?php echo e(route('portallogs', ['type' => 'login'])); ?>">Login Session</a></li>
                            <li><a href="<?php echo e(route('portallogs', ['type' => 'callback'])); ?>">Callback Logs</a></li> 
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if(Myhelper::hasRole('admin')): ?>
                    <li>
                        <a href="javascript:void(0)"><i class="icon-lock"></i> <span>Roles & Permissions</span></a>
                        <ul>
                            <li><a href="<?php echo e(route('tools' , ['type' => 'roles'])); ?>">Roles</a></li>
                            <li><a href="<?php echo e(route('tools' , ['type' => 'permissions'])); ?>">Permission</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <li>
                        <a href="<?php echo e(route('logout')); ?>"><i class="icon-switch2"></i> <span>Logout</span></a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
<!-- /main sidebar -->

<div id="profilePic" class="modal fade" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Profile Upload</h6>
            </div>
            <div class="modal-body">
                <form class="dropzone" id="profileupload" action="<?php echo e(route('profileUpdate')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e(Auth::id()); ?>">
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->