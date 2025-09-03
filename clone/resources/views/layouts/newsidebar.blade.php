<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="#" class="b-brand text-primary">
                <img src="https://mdrpay.com/images/MDR-Logo.png" alt="logo image" width="120" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-hasmenu">
                    <a href="{{route('home')}}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-gauge"></i>
                        </span>
                        <span class="pc-mtext" data-i18n="Dashboard">Dashboard</span>
                    </a>
                </li>
                @if (Myhelper::can(['company_manager', 'change_company_profile', 'scheme_manager']))
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"> <i class="ph-duotone ph-layout"></i></span>
                        <span class="pc-mtext" data-i18n="Resources">Resources</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        @if (Myhelper::can('company_manager'))
                            <li class="pc-item"><a class="pc-link" href="{{route('resource', ['type' => 'company'])}}" data-i18n="Company Manager">Company Manager</a></li>
                        @endif
                        @if (Myhelper::can('change_company_profile'))
                            <li class="pc-item"><a class="pc-link" href="{{route('resource', ['type' => 'companyprofile'])}}" data-i18n="Company Profile">Company Profile</a></li>
                        @endif
                        @if (Myhelper::can('scheme_manager'))
                            <li class="pc-item"><a class="pc-link" href="{{route('resource', ['type' => 'scheme'])}}" data-i18n="Scheme Manager">Scheme Manager</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if (Myhelper::can(['setup_bank', 'api_manager', 'setup_operator']))
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"> <i class="ph-duotone ph-gear"></i></span>
                        <span class="pc-mtext" data-i18n="Setup Tools">Setup Tools</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        @if (Myhelper::can('api_manager'))
                            <li class="pc-item"><a class="pc-link" href="{{route('setup', ['type' => 'api'])}}" data-i18n="API Manager">API Manager</a></li>
                        @endif
                        @if (Myhelper::can('api_manager'))
                            <li class="pc-item"><a class="pc-link" href="{{route('setup', ['type' => 'bank'])}}" data-i18n="Bank Account">Bank Account</a></li>
                        @endif
                        @if (Myhelper::can('api_manager'))
                            <li class="pc-item"><a class="pc-link" href="{{route('setup', ['type' => 'operator'])}}" data-i18n="Operator Manager">Operator Manager</a></li>
                        @endif
                        @if (Myhelper::can('api_manager'))
                            <li class="pc-item"><a class="pc-link" href="{{route('setup', ['type' => 'portalsetting'])}}" data-i18n="Portal Setting">Portal Setting</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if (Myhelper::can(['view_apiuser', 'view_mis', 'view_web', 'view_admin']))
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"> <i class="ph-duotone ph-user"></i></span>
                        <span class="pc-mtext" data-i18n="Member">Member</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        @if (Myhelper::can('view_subamdin'))
                            <li class="pc-item"><a class="pc-link" href="{{route('member', ['type' => 'subadmin'])}}" data-i18n="Admin">Admin</a></li>
                        @endif
                        @if (Myhelper::can('view_apiuser'))
                            <li class="pc-item"><a class="pc-link" href="{{route('member', ['type' => 'apiuser'])}}" data-i18n="API User">API User</a></li>
                        @endif
                        @if (Myhelper::can('view_mis'))
                            <li class="pc-item"><a class="pc-link" href="{{route('member', ['type' => 'mis'])}}" data-i18n="MIS User">MIS User</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"> <i class="ph-duotone ph-chart-pie"></i></span>
                        <span class="pc-mtext" data-i18n="Reports">Reports</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        @if (Myhelper::can('collection_statement'))
                            <li class="pc-item"><a class="pc-link" href="{{route('reports', ['type' => 'chargeback'])}}" data-i18n="Chargeback">Chargeback</a></li>
                            <li class="pc-item"><a class="pc-link" href="{{route('reports', ['type' => 'payin'])}}" data-i18n="Collection">Collection</a></li>
                        @endif
                        @if (Myhelper::can('payout_statement'))
                            <li class="pc-item"><a class="pc-link" href="{{route('reports', ['type' => 'payout'])}}" data-i18n="Payout">Payout</a></li>
                        @endif
                        @if (Myhelper::can('qr_statement'))
                            <li class="pc-item"><a class="pc-link" href="{{route('reports', ['type' => 'upiintent'])}}" data-i18n="Intent">Intent</a></li>
                        @endif
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"> <i class="ph-duotone ph-projector-screen-chart"></i></span>
                        <span class="pc-mtext" data-i18n="Account Ledger">Account Ledger</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="" data-i18n="Collection Wallet">Collection Wallet</a></li>
                        <li class="pc-item"><a class="pc-link" href="" data-i18n="Payout Wallet">Payout Wallet</a></li>
                    </ul>
                </li>
                @if (Myhelper::hasRole('apiuser'))
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"> <i class="ph-duotone ph-plug-charging"></i></span>
                        <span class="pc-mtext" data-i18n="Developer Tools">Developer Tools</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('apisetup', ['type' => 'setting'])}}" data-i18n="API Settings">API Settings</a></li>
                        <li class="pc-item"><a class="pc-link" href="" data-i18n="Api Documents">Api Documents</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <div class="card pc-user-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="{{asset('')}}new_assests/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-45 rounded-circle" />
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <div class="dropdown">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 me-2">
                                    <h6 class="mb-0">{{ explode(' ',ucwords(Auth::user()->name))[0] }}</h6>
                                    <small>Administrator</small>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="{{route('logout')}}">
                                        <div class="btn btn-icon btn-link-secondary avtar">
                                            <i class="ph-duotone ph-power"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>