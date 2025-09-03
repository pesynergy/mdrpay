@extends('layouts.app')
@section('title', 'Dashboard')
@section('pagetitle', 'Dashboard')

@php
    $search = "hide";
    $header = "hide";
@endphp

@section('content')
			<!-- row -->
		<div class="container-fluid">
			<div class="form-head mb-4">
				<h2 class="text-black font-w600 mb-0">Dashboard</h2>
			</div>
			@if(Myhelper::hasRole(["admin"]))
			    <div class="row  mb-4">
                    <div class="col-xl-6">
                        <div class="mb-4" style="background:var(--card); border-radius: 5px;">
                            <div class="card-bx mb-0">
                                <img src="{{ asset('new_assests/images/card3-DiULJuRe.jpg') }}" alt="">
                                <div class="card-info text-white">
                                    <p class="fs-22 mb-1 text-white"><strong>Total Deposit  <span class="fs-26 text-white mb-sm-4 mb-3">$23,511</span></strong></p>
                                </div>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$23,511</h3><span>Success TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$140</h3><span>Pending TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">$45</h3><span>Failed TXN</span>
                                    </div>
                                </div>
                            </div>
    					</div>
					</div>
                    <div class="col-xl-6">
                        <div class="mb-4" style="background:var(--card); border-radius: 5px;">
                            <div class="card-bx mb-0">
                                <img src="{{ asset('new_assests/images/card2-NRj3firC.jpg') }}" alt="">
                                <div class="card-info text-white">
                                    <p class="fs-22 mb-1 text-white"><strong>Total Withdrawal  <span class="fs-26 text-white mb-sm-4 mb-3">$23,511</span></strong></p>
                                </div>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$23,511</h3><span>Success TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$140</h3><span>Pending TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">$45</h3><span>Failed TXN</span>
                                    </div>
                                </div>
                            </div>
    					</div>
					</div>
                    <div class="col-xl-6">
                        <div class="mb-4" style="background:var(--card); border-radius: 5px;">
                            <div class="card-bx mb-0">
                                <img src="{{ asset('new_assests/images/card/card2.png') }}" alt="">
                                <div class="card-info text-white">
                                    <p class="fs-22 mb-1 text-white"><strong>Total Refund  <span class="fs-26 text-white mb-sm-4 mb-3">$23,511</span></strong></p>
                                </div>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$23,511</h3><span>Success TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$140</h3><span>Pending TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">$45</h3><span>Failed TXN</span>
                                    </div>
                                </div>
                            </div>
    					</div>
					</div>
                    <div class="col-xl-6">
                        <div class="mb-4" style="background:var(--card); border-radius: 5px;">
                            <div class="card-bx mb-0">
                                <img src="{{ asset('new_assests/images/card/card4.png') }}" alt="">
                                <div class="card-info text-white">
                                    <p class="fs-22 mb-1 text-white"><strong>Total Chargeback  <span class="fs-26 text-white mb-sm-4 mb-3">$23,511</span></strong></p>
                                </div>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$23,511</h3><span>Success TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$140</h3><span>Pending TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">$45</h3><span>Failed TXN</span>
                                    </div>
                                </div>
                            </div>
    					</div>
					</div>
                </div>
                
                <div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <div>
                        <label>Period: </label>
    					<div class="dropdown custom-dropdown">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="dropdown" aria-expanded="false">Last 7 days
                                <i class="fa fa-angle-down ms-3"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" style="">
                                <a class="dropdown-item" href="javascript:void(0);">Last 1 Month</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last 6 Month</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last 10 Month</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Payment Type: </label>
    					<div class="dropdown custom-dropdown">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="dropdown" aria-expanded="false">All Types
                                <i class="fa fa-angle-down ms-3"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" style="">
                                <a class="dropdown-item" href="javascript:void(0);">DEPOSIT</a>
                                <a class="dropdown-item" href="javascript:void(0);">WITHDRAWAL</a>
                                <a class="dropdown-item" href="javascript:void(0);">REFUND</a>
                                <a class="dropdown-item" href="javascript:void(0);">CARDVERIFY</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Merchant: </label>
    					<div class="dropdown custom-dropdown">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="dropdown" aria-expanded="false">All Merchants
                                <i class="fa fa-angle-down ms-3"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" style="">
                                <a class="dropdown-item" href="javascript:void(0);">Justfortest</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Terminal: </label>
    					<div class="dropdown custom-dropdown">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="dropdown" aria-expanded="false">All Terminals
                                <i class="fa fa-angle-down ms-3"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" style="">
                                <a class="dropdown-item" href="javascript:void(0);">Terminal 1</a>
                                <a class="dropdown-item" href="javascript:void(0);">Terminal 2</a>
                                <a class="dropdown-item" href="javascript:void(0);">Terminal 3</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Currency: </label>
    					<div class="dropdown custom-dropdown">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="dropdown" aria-expanded="false">All Currencies
                                <i class="fa fa-angle-down ms-3"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" style="height: 250px; overflow: scroll; background: #fff;">
                                <a class="dropdown-item" href="javascript:void(0);">United Arab Emirates Dirham (AED)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Albanian lek (ALL)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Armenian dram (AMD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Argentine peso (ARS)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Australian dollar (AUD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Aruban florin (AWG)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Azerbaijan Manat (AZN)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Convertible Mark (BAM)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Barbadian dollar (BBD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Bangladeshi taka (BDT)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Bulgarian Lev (BGN)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Bahraini Dinar (BHD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Burundi Franc (BIF)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Bermudian dollar (BMD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Brunei dollar (BND)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Bolivian boliviano (BOB)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Brazilian Real (BRL)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Bahamian dollar (BSD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Bhutanese Ngultrum (BTN)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Botswana pula (BWP)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Belize dollar (BZD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Canadian dollar (CAD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Swiss franc (CHF)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Chilean Peso (CLP)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Chinese yuan renminbi (CNY)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Colombian peso (COP)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Costa Rican colon (CRC)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Cuban peso (CUP)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Cabo Verde Escudo (CVE)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Czech koruna (CZK)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Djibouti Franc (DJF)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Danish krone (DKK)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Dominican peso (DOP)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Algerian dinar (DZD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Egyptian pound (EGP)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Ethiopian birr (ETB)</a>
                                <a class="dropdown-item" href="javascript:void(0);">European euro (EUR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Fijian dollar (FJD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Pound sterling (GBP)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Ghanian Cedi (GHS)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Gibraltar pound (GIP)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Gambian dalasi (GMD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Guinean Franc (GNF)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Guatemalan quetzal (GTQ)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Guyanese dollar (GYD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Hong Kong dollar (HKD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Honduran lempira (HNL)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Croatian kuna (HRK)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Haitian gourde (HTG)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Hungarian forint (HUF)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Indonesian rupiah (IDR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Israeli new shekel (ILS)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Indian rupee (INR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Iraqi Dinar (IQD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Iceland Krona (ISK)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Jamaican dollar (JMD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Jordanian Dinar (JOD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Japanese Yen (JPY)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Kenyan shilling (KES)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Kyrgyzstani som (KGS)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Cambodian riel (KHR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Comorian Franc (KMF)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Korean Won (KRW)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Kuwaiti Dinar (KWD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Cayman Islands dollar (KYD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Kazakhstani tenge (KZT)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Lao kip (LAK)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Sri Lankan rupee (LKR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Liberian dollar (LRD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Lesotho loti (LSL)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Moroccan dirham (MAD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Moldovan leu (MDL)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Malagasy Ariary (MGA)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Macedonian denar (MKD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Myanmar kyat (MMK)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Mongolian tugrik (MNT)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Macanese pataca (MOP)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Mauritian rupee (MUR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Maldivian rufiyaa (MVR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Malawian kwacha (MWK)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Mexican peso (MXN)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Malaysian ringgit (MYR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Mozambique Metical (MZN)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Namibian dollar (NAD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Nigerian naira (NGN)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Nicaraguan cordoba (NIO)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Norwegian krone (NOK)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Nepalese rupee (NPR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">New Zealand dollar (NZD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Rial Omani (OMR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Peruvian sol (PEN)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Papua New Guinean kina (PGK)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Philippine peso (PHP)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Pakistani rupee (PKR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Polish Zloty (PLN)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Paraguayan Guarani (PYG)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Qatari riyal (QAR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Romanian Leu (RON)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Serbian Dinar (RSD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Russian ruble (RUB)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Rwanda Franc (RWF)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Saudi Arabian riyal (SAR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Seychellois rupee (SCR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Swedish krona (SEK)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Singapore dollar (SGD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Sierra Leonean leone (SLL)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Somali shilling (SOS)</a>
                                <a class="dropdown-item" href="javascript:void(0);">South Sudanese pound (SSP)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Salvadoran colón (SVC)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Swazi lilangeni (SZL)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Thai baht (THB)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Tunisian Dinar (TND)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Turkish Lira (TRY)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Trinidad and Tobago dollar (TTD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">New Taiwan Dollar (TWD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Tanzanian shilling (TZS)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Ukrainian Hryvnia (UAH)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Uganda Shilling (UGX)</a>
                                <a class="dropdown-item" href="javascript:void(0);">United States dollar (USD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Uruguayan peso (UYU)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Uzbekistani so'm (UZS)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Vietnamese Dong (VND)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Vatu (VUV)</a>
                                <a class="dropdown-item" href="javascript:void(0);">CFA Franc BEAC (XAF)</a>
                                <a class="dropdown-item" href="javascript:void(0);">East Caribbean Dollar (XCD)</a>
                                <a class="dropdown-item" href="javascript:void(0);">CFA Franc BCEAO (XOF)</a>
                                <a class="dropdown-item" href="javascript:void(0);">CFP Franc (XPF)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Yemeni rial (YER)</a>
                                <a class="dropdown-item" href="javascript:void(0);">South African rand (ZAR)</a>
                                <a class="dropdown-item" href="javascript:void(0);">Zambian Kwacha (ZMW)</a>
                            </div>

                        </div>
                    </div>
				</div>
				<div class="row">
				    <div class="col-4">
				        <div class="card">
				            <div class="card-header border-0 pb-0">
				                <h2 class="card-title">Merchants Overview</h2>
				            </div>
				            <div class="card-body pb-0">
				                <ul class="list-group list-group-flush">
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Active Merchants</strong><span class="mb-0"><b style="color:var(--primary);">7</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>KYC Completed</strong><span class="mb-0"><b style="color:var(--primary);">10</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>KYC Pending</strong><span class="mb-0"><b style="color:var(--primary);">3</b></span>
				                    </li>
				                </ul>
				            </div>
				        </div>
				    </div>
				    <div class="col-4">
				        <div class="card">
				            <div class="card-header border-0 pb-0">
				                <h2 class="card-title">Reseller(RP) Overview</h2>
				            </div>
				            <div class="card-body pb-0">
				                <ul class="list-group list-group-flush">
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>All Resellers</strong><span class="mb-0"><b style="color:var(--primary);">7</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Total Merchants</strong><span class="mb-0"><b style="color:var(--primary);">10</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Active Merchants</strong><span class="mb-0"><b style="color:var(--primary);">3</b></span>
				                    </li>
				                </ul>
				            </div>
				        </div>
				    </div>
				    <div class="col-4">
				        <div class="card">
				            <div class="card-header border-0 pb-0">
				                <h2 class="card-title">Admin Overview</h2>
				            </div>
				            <div class="card-body pb-0">
				                <ul class="list-group list-group-flush">
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>All Admin</strong><span class="mb-0"><b style="color:var(--primary);">7</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Total Merchants</strong><span class="mb-0"><b style="color:var(--primary);">10</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Active Merchants</strong><span class="mb-0"><b style="color:var(--primary);">3</b></span>
				                    </li>
				                </ul>
				            </div>
				        </div>
				    </div>
				</div>
			    <div class="row">
				    <div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-block d-sm-flex border-0">
										<div class="me-3">
											<h4 class="fs-20 text-black">Deposit Txn Summary</h4>
										</div>
										<div class="card-action card-tabs d-inline-block mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-bs-toggle="tab" href="#piToday"
														role="tab">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#piWeekly"
														role="tab">Weekly</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#pimonthly"
														role="tab">Monthly</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body tab-content p-0">
										<div class="tab-pane" id="pimonthly" role="tabpanel">
											<div class="table-responsive">
												<table
													class="table table-responsive-md card-table previous-transactions">
												    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="piWeekly" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane active show fade" id="piToday" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-block d-sm-flex border-0">
										<div class="me-3">
											<h4 class="fs-20 text-black">Withdrawal Txn Summary</h4>
										</div>
										<div class="card-action card-tabs d-inline-block mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-bs-toggle="tab" href="#poToday"
														role="tab">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#poWeekly"
														role="tab">Weekly</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#pomonthly"
														role="tab">Monthly</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body tab-content p-0">
										<div class="tab-pane active show fade" id="poToday" role="tabpanel">
											<div class="table-responsive">
												<table
													class="table table-responsive-md card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="poWeekly" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="pomonthly" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				    <div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-block d-sm-flex border-0">
										<div class="me-3">
											<h4 class="fs-20 text-black">Refund Txn Summary</h4>
										</div>
										<div class="card-action card-tabs d-inline-block mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-bs-toggle="tab" href="#reToday"
														role="tab">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#reWeekly"
														role="tab">Weekly</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#remonthly"
														role="tab">Monthly</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body tab-content p-0">
										<div class="tab-pane" id="remonthly" role="tabpanel">
											<div class="table-responsive">
												<table
													class="table table-responsive-md card-table previous-transactions">
												    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="reWeekly" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane active show fade" id="reToday" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-block d-sm-flex border-0">
										<div class="me-3">
											<h4 class="fs-20 text-black">Chargeback Txn Summary</h4>
										</div>
										<div class="card-action card-tabs d-inline-block mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-bs-toggle="tab" href="#chToday"
														role="tab">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#chWeekly"
														role="tab">Weekly</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#chmonthly"
														role="tab">Monthly</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body tab-content p-0">
										<div class="tab-pane active show fade" id="chToday" role="tabpanel">
											<div class="table-responsive">
												<table
													class="table table-responsive-md card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="chWeekly" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="chmonthly" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endif
			@if(Myhelper::hasRole(["mis"]))
			    <div class="row">
			        <div class="col-xl-6">
			            <div class="card">
				            <div class="card-header border-0 pb-0">
				                <h2 class="card-title fs-24">Hello {{ explode(' ',ucwords(Auth::user()->name))[0] }}<br><span style="color:var(--primary);" class="fs-18">Welcome Back!</span></h2>
				            </div>
				            <div class="card-body pb-0">
				                <ul class="list-group list-group-flush">
				                    <li class="list-group-item d-flex px-0 justify-content-between fs-16">
				                        <strong>Total Processing</strong><span class="mb-0"><b style="color:var(--primary);">$100</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between fs-16">
				                        <strong>Commission Earned</strong><span class="mb-0"><b style="color:var(--primary);">$3</b></span>
				                    </li>
				                </ul>
				            </div>
				        </div>
			        </div>
			        <div class="col-xl-6">
			            <div class="card">
			                <div class="card-header">
			                    <h4 class="heading mb-0">Referral Program</h4>
			                </div>
			                <div class="card-body mb-3">
                                <h6 class="mb-1 fw-semibold">Your Referral Link</h6>
                                <div class="select-text-wrap">
                                    <!-- Referral Link Display -->
                                    <div class="text-select-copy border border-secondary border-opacity-10 px-3 py-2 rounded mb-3 text-primary">
                                        https://login.mdrpay.com/register?reseller_id={{ explode(' ', ucwords(Auth::user()->id))[0] }}
                                    </div>
                                    
                                    <!-- Copy Button -->
                                    <button type="button" class="btn btn-light btn-select-text">Copy Link</button>
                                </div>
                            </div>
			            </div>
			        </div>
				</div>
				<div class="row">
				    <div class="col-4">
				        <div class="card">
				            <div class="card-header border-0 pb-0">
				                <h2 class="card-title">Your Commission Overview</h2>
				            </div>
				            <div class="card-body pb-0">
				                <ul class="list-group list-group-flush">
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Buy Rate</strong><span class="mb-0"><b style="color:var(--primary);">7%</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Markup Rate</strong><span class="mb-0"><b style="color:var(--primary);">10%</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Commission %</strong><span class="mb-0"><b style="color:var(--primary);">3%</b></span>
				                    </li>
				                </ul>
				            </div>
				        </div>
				    </div>
				    <div class="col-4">
				        <div class="card">
				            <div class="card-header border-0 pb-0">
				                <h2 class="card-title">Merchants Overview</h2>
				            </div>
				            <div class="card-body pb-0">
				                <ul class="list-group list-group-flush">
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>All Merchants</strong><span class="mb-0"><b style="color:var(--primary);">17</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Onboarded Merchants</strong><span class="mb-0"><b style="color:var(--primary);">10</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Live Merchants</strong><span class="mb-0"><b style="color:var(--primary);">3</b></span>
				                    </li>
				                </ul>
				            </div>
				        </div>
				    </div>
				    <div class="col-4">
				        <div class="card">
				            <div class="card-header border-0 pb-0">
				                <h2 class="card-title">Txn Processing</h2>
				            </div>
				            <div class="card-body pb-0">
				                <ul class="list-group list-group-flush">
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Success Amount</strong><span class="mb-0"><b style="color:var(--primary);">$78945</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Pending Amount</strong><span class="mb-0"><b style="color:var(--primary);">$1000</b></span>
				                    </li>
				                    <li class="list-group-item d-flex px-0 justify-content-between">
				                        <strong>Failed Amount</strong><span class="mb-0"><b style="color:var(--primary);">$300</b></span>
				                    </li>
				                </ul>
				            </div>
				        </div>
				    </div>
				</div>
			    <div class="row">
				    <div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-block d-sm-flex border-0">
										<div class="me-3">
											<h4 class="fs-20 text-black">Deposit Txn Summary</h4>
										</div>
										<div class="card-action card-tabs d-inline-block mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-bs-toggle="tab" href="#piToday"
														role="tab">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#piWeekly"
														role="tab">Weekly</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#pimonthly"
														role="tab">Monthly</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body tab-content p-0">
										<div class="tab-pane" id="pimonthly" role="tabpanel">
											<div class="table-responsive">
												<table
													class="table table-responsive-md card-table previous-transactions">
												    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="piWeekly" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane active show fade" id="piToday" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-block d-sm-flex border-0">
										<div class="me-3">
											<h4 class="fs-20 text-black">Withdrawal Txn Summary</h4>
										</div>
										<div class="card-action card-tabs d-inline-block mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-bs-toggle="tab" href="#poToday"
														role="tab">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#poWeekly"
														role="tab">Weekly</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#pomonthly"
														role="tab">Monthly</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body tab-content p-0">
										<div class="tab-pane active show fade" id="poToday" role="tabpanel">
											<div class="table-responsive">
												<table
													class="table table-responsive-md card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="poWeekly" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="pomonthly" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				    <div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-block d-sm-flex border-0">
										<div class="me-3">
											<h4 class="fs-20 text-black">Refund Txn Summary</h4>
										</div>
										<div class="card-action card-tabs d-inline-block mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-bs-toggle="tab" href="#reToday"
														role="tab">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#reWeekly"
														role="tab">Weekly</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#remonthly"
														role="tab">Monthly</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body tab-content p-0">
										<div class="tab-pane" id="remonthly" role="tabpanel">
											<div class="table-responsive">
												<table
													class="table table-responsive-md card-table previous-transactions">
												    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="reWeekly" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane active show fade" id="reToday" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-block d-sm-flex border-0">
										<div class="me-3">
											<h4 class="fs-20 text-black">Chargeback Txn Summary</h4>
										</div>
										<div class="card-action card-tabs d-inline-block mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-bs-toggle="tab" href="#chToday"
														role="tab">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#chWeekly"
														role="tab">Weekly</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#chmonthly"
														role="tab">Monthly</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body tab-content p-0">
										<div class="tab-pane active show fade" id="chToday" role="tabpanel">
											<div class="table-responsive">
												<table
													class="table table-responsive-md card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="chWeekly" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="chmonthly" role="tabpanel">
											<div class="table-responsive">
												<table class="table card-table previous-transactions">
													<thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Merchant Name</th>
                                                            <th>Success Count</th>
                                                            <th>Pending Count</th>
                                                            <th>Currency</th>
                                                            <th>Total Amount</th>
                                                        </tr>
                                                    </thead>
													<tbody>
														<tr>
                                                            <td>1</td>
                                                            <td>Merchant 1 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703064</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Merchant 2 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703060</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Merchant 3 </td>
                                                            <td>2495</td>
                                                            <td>6056</td>
                                                            <td>USD,EUR</td>
                                                            <td>703054</td>
                                                            <!--<td>2117399</td>-->
                                                        </tr>
													<tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endif
			@if(Myhelper::hasRole(["subadmin"]))
			    <div class="row  mb-4">
                    <div class="col-xl-6">
                        <div class="mb-4" style="background:var(--card); border-radius: 5px;">
                            <div class="card-bx mb-0">
                                <img src="{{ asset('new_assests/images/card3-DiULJuRe.jpg') }}" alt="">
                                <div class="card-info text-white">
                                    <p class="fs-22 mb-1 text-white"><strong>Total Deposit  <span class="fs-26 text-white mb-sm-4 mb-3">$23,511</span></strong></p>
                                </div>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$23,511</h3><span>Success TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$140</h3><span>Pending TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">$45</h3><span>Failed TXN</span>
                                    </div>
                                </div>
                            </div>
    					</div>
					</div>
                    <div class="col-xl-6">
                        <div class="mb-4" style="background:var(--card); border-radius: 5px;">
                            <div class="card-bx mb-0">
                                <img src="{{ asset('new_assests/images/card2-NRj3firC.jpg') }}" alt="">
                                <div class="card-info text-white">
                                    <p class="fs-22 mb-1 text-white"><strong>Total Withdrawal  <span class="fs-26 text-white mb-sm-4 mb-3">$23,511</span></strong></p>
                                </div>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$23,511</h3><span>Success TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$140</h3><span>Pending TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">$45</h3><span>Failed TXN</span>
                                    </div>
                                </div>
                            </div>
    					</div>
					</div>
                    <div class="col-xl-6">
                        <div class="mb-4" style="background:var(--card); border-radius: 5px;">
                            <div class="card-bx mb-0">
                                <img src="{{ asset('new_assests/images/card/card2.png') }}" alt="">
                                <div class="card-info text-white">
                                    <p class="fs-22 mb-1 text-white"><strong>Total Refund  <span class="fs-26 text-white mb-sm-4 mb-3">$23,511</span></strong></p>
                                </div>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$23,511</h3><span>Success TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$140</h3><span>Pending TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">$45</h3><span>Failed TXN</span>
                                    </div>
                                </div>
                            </div>
    					</div>
					</div>
                    <div class="col-xl-6">
                        <div class="mb-4" style="background:var(--card); border-radius: 5px;">
                            <div class="card-bx mb-0">
                                <img src="{{ asset('new_assests/images/card/card4.png') }}" alt="">
                                <div class="card-info text-white">
                                    <p class="fs-22 mb-1 text-white"><strong>Total Chargeback  <span class="fs-26 text-white mb-sm-4 mb-3">$23,511</span></strong></p>
                                </div>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$23,511</h3><span>Success TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$140</h3><span>Pending TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">$45</h3><span>Failed TXN</span>
                                    </div>
                                </div>
                            </div>
    					</div>
					</div>
                </div>
			@endif
			@if(Myhelper::hasRole(["apiuser"]))
			    <div class="row  mb-4">
                    <div class="col-xl-6">
                        <div class="mb-4" style="background:var(--card); border-radius: 5px;">
                            <div class="card-bx mb-0">
                                <img src="{{ asset('new_assests/images/card3-DiULJuRe.jpg') }}" alt="">
                                <div class="card-info text-white">
                                    <p class="fs-22 mb-1 text-white"><strong>Total Deposit  <span class="fs-26 text-white mb-sm-4 mb-3">$23,511</span></strong></p>
                                </div>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$23,511</h3><span>Success TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$140</h3><span>Pending TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">$45</h3><span>Failed TXN</span>
                                    </div>
                                </div>
                            </div>
    					</div>
					</div>
                    <div class="col-xl-6">
                        <div class="mb-4" style="background:var(--card); border-radius: 5px;">
                            <div class="card-bx mb-0">
                                <img src="{{ asset('new_assests/images/card2-NRj3firC.jpg') }}" alt="">
                                <div class="card-info text-white">
                                    <p class="fs-22 mb-1 text-white"><strong>Total Withdrawal  <span class="fs-26 text-white mb-sm-4 mb-3">$23,511</span></strong></p>
                                </div>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$23,511</h3><span>Success TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$140</h3><span>Pending TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">$45</h3><span>Failed TXN</span>
                                    </div>
                                </div>
                            </div>
    					</div>
					</div>
                    <div class="col-xl-6">
                        <div class="mb-4" style="background:var(--card); border-radius: 5px;">
                            <div class="card-bx mb-0">
                                <img src="{{ asset('new_assests/images/card/card2.png') }}" alt="">
                                <div class="card-info text-white">
                                    <p class="fs-22 mb-1 text-white"><strong>Total Refund  <span class="fs-26 text-white mb-sm-4 mb-3">$23,511</span></strong></p>
                                </div>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$23,511</h3><span>Success TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$140</h3><span>Pending TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">$45</h3><span>Failed TXN</span>
                                    </div>
                                </div>
                            </div>
    					</div>
					</div>
                    <div class="col-xl-6">
                        <div class="mb-4" style="background:var(--card); border-radius: 5px;">
                            <div class="card-bx mb-0">
                                <img src="{{ asset('new_assests/images/card/card4.png') }}" alt="">
                                <div class="card-info text-white">
                                    <p class="fs-22 mb-1 text-white"><strong>Total Chargeback  <span class="fs-26 text-white mb-sm-4 mb-3">$23,511</span></strong></p>
                                </div>
                            </div>
                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$23,511</h3><span>Success TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-primary">$140</h3><span>Pending TXN</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-primary">$45</h3><span>Failed TXN</span>
                                    </div>
                                </div>
                            </div>
    					</div>
					</div>
                </div>
			@endif
		</div>
	</div>

    @if (Myhelper::hasNotRole('admin'))
        @if (Auth::user()->resetpwd == "default")
            <div id="pwdModal" class="modal fade" data-backdrop="false" data-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-slate">
                            <h6 class="modal-title">Change Password </h6>
                        </div>
                        <form id="passwordForm" action="{{route('profileUpdate')}}" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="{{Auth::id()}}">
                                <input type="hidden" name="actiontype" value="password">
                                {{ csrf_field() }}
                                @if (Myhelper::can('password_reset'))
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Old Password</label>
                                            <input type="password" name="oldpassword" class="form-control" required="" placeholder="Enter Value">
                                        </div>
                                        <div class="form-group col-md-6  ">
                                            <label>New Password</label>
                                            <input type="password" name="password" id="password" class="form-control" required="" placeholder="Enter Value">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6  ">
                                            <label>Confirmed Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" required="" placeholder="Enter Value">
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button class="btn bg-slate btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endif

    <div id="noticeModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-slate">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Necessary Notice ( आवश्यक सूचना )</h4>
                </div>
                <div class="modal-body">
                    {!! nl2br($mydata['notice']) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="addMoneyModal" class="modal fade" data-backdrop="false" data-keyboard="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-slate">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Add Money</h6>
                </div>
                <form id="addMoneyForm" action="{{route('fundtransaction')}}" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="type" value="addmoney">
                            {{ csrf_field() }}
                            <div class="form-group col-md-12">
                                <label>Amount</label>
                                <input type="number" name="amount" step="any" class="form-control" placeholder="Enter Amount" required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 text-center">
                                <img class="" id="image_qr" style="width:200px;" src="#" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn bg-slate btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="getMoneyModal" class="modal fade" data-backdrop="false" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-slate">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Get Money</h6>
                </div>
                <form id="getMoneyForm" action="{{route('fundtransaction')}}" method="post">
                    <input type="hidden" name="type" value="getmoney">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Account Holder Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter value" required="">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Account Number</label>
                                <input type="text" name="account_number" class="form-control" placeholder="Enter value" required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>IFSC Code</label>
                                <input type="text" name="ifsc_code" class="form-control" placeholder="Enter value" required="">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Bank Name</label>
                                <input type="text" name="bank_name" step="any" class="form-control" placeholder="Enter value" required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Amount</label>
                                <input type="number" name="amount" step="any" class="form-control" placeholder="Enter Amount" required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-raised legitRipple" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn bg-slate btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    
@endpush

@push('script')
    <script type="text/javascript" src="{{asset('')}}assets/js/plugins/forms/selects/select2.min.js"></script>
    <script>
        var salesdata = {
            dates : [],
            qrcodesales : [],
            payoutsales : [],
            payinsales  : []
        };

        $(document).ready(function(){
            $('select').select2();
            @if (Myhelper::hasNotRole('admin') && Auth::user()->resetpwd == "default")
                $('#pwdModal').modal();
            @endif

            @if ($mydata['notice'] != null && $mydata['notice'] != '')
                $('#noticeModal').modal();
            @endif

            $( "#passwordForm" ).validate({
                rules: {
                    @if (!Myhelper::can('member_password_reset'))
                    oldpassword: {
                        required: true,
                        minlength: 6,
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        equalTo : "#password"
                    },
                    @endif
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    @if (!Myhelper::can('member_password_reset'))
                    oldpassword: {
                        required: "Please enter old password",
                        minlength: "Your password lenght should be atleast 6 character",
                    },
                    password_confirmation: {
                        required: "Please enter confirmed password",
                        minlength: "Your password lenght should be atleast 8 character",
                        equalTo : "New password and confirmed password should be equal"
                    },
                    @endif
                    password: {
                        required: "Please enter new password",
                        minlength: "Your password lenght should be atleast 8 character"
                    }
                },
                errorElement: "p",
                errorPlacement: function ( error, element ) {
                    if ( element.prop("tagName").toLowerCase().toLowerCase() === "select" ) {
                        error.insertAfter( element.closest( ".form-group" ).find(".select2") );
                    } else {
                        error.insertAfter( element );
                    }
                },
                submitHandler: function () {
                    var form = $('form#passwordForm');
                    form.find('span.text-danger').remove();
                    form.ajaxSubmit({
                        dataType:'json',
                        beforeSubmit:function(){
                            form.find('button:submit').button('loading');
                        },
                        complete: function () {
                            form.find('button:submit').button('reset');
                        },
                        success:function(data){
                            if(data.status == "success"){
                                form[0].reset();
                                form.closest('.modal').modal('hide');
                                notify("Password Successfully Changed" , 'success');
                            }else{
                                notify(data.status , 'warning');
                            }
                        },
                        error: function(errors) {
                            showError(errors, form.find('.modal-body'));
                        }
                    });
                }
            });

            $('form#filterForm').submit(function(){
                $.ajax({
                    url: "{{url('mystatics')}}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    data:{"fromdate" : $('form#filterForm').find("[name='fromdate']").val(), "todate" : $('form#filterForm').find("[name='todate']").val(), "userid" : $('form#filterForm').find("[name='userid']").val()},
                    success: function(data){
                        $.each(data, function (index, value) {
                            $('.'+index).text(value);
                        });
                    }
                });
                return false;
            });

            $.ajax({
                url: "{{url('mystatics')}}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                success: function(data){
                    if(data.main.length > 0){
                        $.each(data.main, function (index, value) {
                            salesdata["dates"][index] =  moment(value.created_at, "YYYY-MM-DD hh:mm:ss").format("DD-MM-YYYY");
                            salesdata["qrcodesales"][index] = value.qrcodesales;
                            salesdata["payinsales"][index]  = value.payinsales;
                            salesdata["payoutsales"][index] = value.payoutsales;
                        });

                        var xValues = salesdata.dates;
                        new Chart("salesChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [
                                    {
                                        label: 'Qr Codes',
                                        backgroundColor: '#1676fb',
                                        fill : false,
                                        data: salesdata.qrcodesales
                                    },
                                    {
                                        label: 'Collection',
                                        backgroundColor: '#00897B',
                                        fill : false,
                                        data: salesdata.payinsales
                                    },
                                    {
                                        label: 'Payout',
                                        backgroundColor: '#E53935',
                                        fill : false,
                                        data: salesdata.payoutsales
                                    }
                                ]
                            },
                            options: {
                                legend: {display: true},
                                // scales: {
                                //     xAxes: [{
                                //         stacked: true
                                //     }],
                                //     yAxes: [{
                                //         stacked: true
                                //     }]
                                // }
                            }
                        });
                    }
                }
            });

            $( "#addMoneyForm").validate({
                rules: {
                    amount: {
                        required: true,
                    }
                },
                messages: {
                    amount: {
                        required: "Please enter amount",
                    },
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
                    var form = $('#addMoneyForm');
                    form.ajaxSubmit({
                        dataType:'json',
                        beforeSubmit:function(){
                            form.find('button:submit').button('loading');
                        },
                        complete: function () {
                            form.find('button:submit').button('reset');
                        },
                        success:function(data){
                            if(data.status == "success"){
                                form[0].reset();
                                $('#image_qr').attr('src', data.qr_link);
                            }else{
                                notify(data.message , 'warning');
                            }
                        },
                        error: function(errors) {
                            showError(errors, form);
                        }
                    });
                }
            });

            $( "#getMoneyForm").validate({
                rules: {
                    amount: {
                        required: true,
                    }
                },
                messages: {
                    amount: {
                        required: "Please enter amount",
                    },
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
                    var form = $('#getMoneyForm');
                    form.ajaxSubmit({
                        dataType:'json',
                        beforeSubmit:function(){
                            form.find('button:submit').button('loading');
                        },
                        complete: function () {
                            form.find('button:submit').button('reset');
                        },
                        success:function(data){
                            if(data.status == "success"){
                                form[0].reset();
                                notify("Successfully Transfer", 'success');
                            }else{
                                notify(data.message , 'warning');
                            }
                        },
                        error: function(errors) {
                            showError(errors, form);
                        }
                    });
                }
            });
        });
    </script>
    <!-- JavaScript to copy the referral link to clipboard -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('.btn-select-text').addEventListener('click', function() {
                const linkText = document.querySelector('.text-select-copy');
                const range = document.createRange();
                range.selectNode(linkText);
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
                document.execCommand('copy');
                alert('Referral link copied to clipboard!');
            });
        });
    </script>
@endpush
