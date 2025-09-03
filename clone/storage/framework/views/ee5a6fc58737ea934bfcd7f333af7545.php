<!--**********************************
    Header start
***********************************-->
<header class="pc-header">
    <div class="header-wrapper"> 
        <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">
                <!--<li class="dropdown pc-h-item d-none d-md-inline-flex">-->
                <!--    <button type="button" class="btn btn-rounded btn-primary me-5" data-toggle="modal" data-target="#walletLoadModal">-->
                <!--        <span class="btn-icon-start text-primary"><i class="fa fa-wallet"></i></span>LOAD WALLET-->
                <!--    </button>-->
                <!--</li>-->
                <li class="dropdown pc-h-item d-none d-md-inline-flex">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ph-duotone ph-sun-dim"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
                            <i class="ph-duotone ph-moon"></i>
                            <span>Dark</span>
                        </a>
                        <a href="#!" class="dropdown-item" onclick="layout_change('light')">
                            <i class="ph-duotone ph-sun-dim"></i>
                            <span>Light</span>
                        </a>
                    </div>
                </li>
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="<?php echo e(asset('')); ?>new_assests/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
                        <h5 class="mb-0" style="margin-left:10px;"><?php echo e(explode(' ',ucwords(Auth::user()->name))[0]); ?></h5>
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0">Profile</h5>
                        </div>
                        <div class="dropdown-body">
                            <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                                <ul class="list-group list-group-flush w-100">
                                    <li class="list-group-item">
                                        <!--<a href="#" class="dropdown-item">-->
                                        <!--    <span class="d-flex align-items-center">-->
                                        <!--        <i class="ph-duotone ph-user-circle"></i>-->
                                        <!--        <span>Edit profile</span>-->
                                        <!--    </span>-->
                                        <!--</a>-->
                                        <a href="<?php echo e(route('logout')); ?>" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-power"></i>
                                                <span>Logout</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header><?php /**PATH /home/u690537273/domains/login.mdrpay.com/public_html/clone/resources/views/layouts/topbar.blade.php ENDPATH**/ ?>