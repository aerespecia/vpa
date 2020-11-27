
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 10 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Value Plus Analytics</title>
		<meta name="description" content="Updates and statistics" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
        <!--begin::Page Vendors Styles(used by this page)-->
        <link href="{{url('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/plugins/custom/leaflet/leaflet.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{url('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{url('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{url('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{url('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
        <link rel="shortcut icon" href="#" />
        <script src="{{url('assets/js/jquery-3.5.1.min.js')}}"></script>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" style="" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
		<!--begin::Main-->
        <!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->

			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Aside Mobile Toggle-->
				<!--end::Aside Mobile Toggle-->
				<!--begin::Header Menu Mobile Toggle-->
				<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<!--end::Header Menu Mobile Toggle-->
				<!--begin::Topbar Mobile Toggle-->
				<!--end::Topbar Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Left-->
							<div class="d-flex align-items-stretch mr-2">
								<!--begin::Page Title-->
								<h4 class="d-none text-dark d-lg-flex align-items-center mr-10 mb-0">Value Plus Analytics | Beta v.1</h4>
								<!--end::Page Title-->
								@include('layouts.header')
							</div>
							<!--end::Left-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader gutter-b subheader-transparent mt-10" id="kt_subheader">
							<div class="container d-flex flex-column">
								<div class="d-flex align-items-sm-end flex-column flex-sm-row mb-5">
                                    <h2 class="d-flex align-items-center text-dark mr-5 mb-0">Property List</h2>
								</div>
							</div>
						</div>
                        <!--end::Subheader-->

						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
							<div class="container">
                                <!--begin::Card-->
                                <div class="card card-custom">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <a href="#" class="btn btn-primary" data-toggle="modal"  data-target="#newPropertyModal">
                                                <i class="flaticon2-plus"></i>&nbsp;Add Property
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--begin: Datatable-->
                                        <div class="table-responsive-sm">
                                            <table class="table table-bordered table-hover table-checkable table-sm" id="propertyCalculationsTable" >
                                                <thead>
                                                    <tr>
                                                        <th>Address</th>
                                                        <th>Purchase Price</th>
                                                        <th>Estimated Net Proceeds</th>
                                                        <th>ARV (Zestimate)</th>
                                                        <th>Total Estimated Selling Costs</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end: Datatable-->
                                    </div>
                                </div>
                                <!--end::Card-->
                                <!--begin::Modal-->
								<div class="modal fade" id="newPropertyModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="newPropertyModal" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-1">
													<!--begin::Text-->
													<div class="d-flex flex-column font-weight-bold">
														<h3 href="#" class="text-dark text-hover-primary mb-1">Add New Property</h3>
													</div>
													<!--end::Text-->
												</div>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<i aria-hidden="true" class="ki ki-close"></i>
												</button>
											</div>
											<div class="modal-body">
                                                <!--begin::Card-->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card card-custom gutter-b example example-compact">
                                                            <!--begin::Form-->
                                                            <form id="propertyForm" method="post" action="{{url('upload/store')}}" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label>Property Address</label>
                                                                        <div class="input-group rounded bg-light">
                                                                            <input type="text" id="propertyAddress" autocomplete="off" class="form-control h-45px" placeholder="Search...">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Purchase Price</label>
                                                                                <input type="number" class="form-control" id="price" placeholder="Enter Price" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Square footage</label>
                                                                                <input type="number" class="form-control" id="sqft" placeholder="Enter Sqft addition" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Zestimate</label>
                                                                                <span class="text-muted font-size-xs">Data from <a href="https://www.zillow.com/" target = "_blank">Zillow</a></span>
                                                                                <h6>$<span id="zestimateView"></span></h6>
                                                                                <input type="hidden" id="zestimate"/>
                                                                                <p class="font-size-sm">Rental: $<span id="rentalZestimate"></span></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="separator separator-solid separator-border-4"></div>

                                                                </div>
                                                                <div class="card-footer">
                                                                    <button type="reset" id="saveProperty" class="btn btn-primary mr-2" data-dismiss="modal">Save Property</button>
                                                                </div>
                                                            </form>
                                                            <!--end::Form-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Card-->
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!--end::Modal-->
                                <!--begin::Modal-->
								<div class="modal fade" id="propertyInfoModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-1">
													<!--begin::Text-->
													<div class="d-flex flex-column font-weight-bold">
														<h3 href="#" class="text-dark text-hover-primary mb-1">Property Infomation</h3>
													</div>
													<!--end::Text-->
												</div>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<i aria-hidden="true" class="ki ki-close"></i>
												</button>
											</div>
											<div class="modal-body">
                                                <!--begin::Card-->
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="card card-custom gutter-b example example-compact">
                                                            <div class="card-body">
                                                                <h1><span class="font-weight-boldest display-2" id="info_purchase_price"></span> </h1><input type="hidden" id="zestimate" value="0"/>
                                                                <h6 class="font-weight-bold mt-2"><span id="info_bedrooms" class="font-weight-bold">4</span> bd <span class="font-weight-lighter">&nbsp;|&nbsp;</span> <span id="info_bathrooms" class="font-weight-bold">3</span> ba <span class="font-weight-lighter">&nbsp;|&nbsp;</span> <span id="info_sq_ft" class="font-weight-bold">1,345</span> sqft</h6><input type="hidden" id="sqft" value="0"/>
                                                                <h5 class="mt-3 mb-5" id="info_address">P Sherman Wallaby Street</h5>
                                                                <div class="separator separator-solid separator-border-4"></div>
                                                                <h3 class="mt-5">Home Value</h3>
                                                                <form class="form">
                                                                    <h6 style="text-align:center;">Zestimate <span class="text-muted font-size-xs">Data from <a href="https://www.zillow.com/" target = "_blank">Zillow</a></span></h6>
                                                                    <h3 style="text-align:center;" class="font-weight-bolder" id="info_zestimate">$123,456</h3><input type="hidden" id="purchase_price"/><br/>
                                                                    <h5 style="text-align:center;">Estimated Net Proceeds</h5>
                                                                    <h1 style="text-align:center;" class="font-weight-boldest" id="info_net_proceeds">$123,456</h1>

                                                                    <div class="form-group mt-5">
                                                                        <div class="col-xl-12">
                                                                            <label class="font-size-h6 font-weight-bold">Est. Selling Price of your home&nbsp;(<span id="info_selling_price">$123,456</span>)</label>
                                                                            <label style="float:right;" class="font-size-h6"></label>
                                                                        </div>
                                                                        <div class="col-xl-12">
                                                                            <div class="ion-range-slider">
                                                                                <input type="hidden" id="kt_slider_zestimate" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mt-5">
                                                                        <div class="col-xl-12">
                                                                            <label class="font-size-h6 font-weight-bold">Construction cost ($<span id="info_construction_cost"></span> | <span class="font-size-lg">Cost per sq ft @<span id="info_construciton_cost_punit"></span>)</label>

                                                                            <label style="float:right;" id="info_chosen_construction_type" class="label label-primary label-inline p-4 font-size-h6 font-weight-bold">In process</span>
                                                                        </div>
                                                                        <div class="col-xl-12 mt-5">
                                                                            <div class="ion-range-slider">
                                                                                <input type="hidden" id="kt_slider_construction_cost" />
                                                                                <input type="hidden" id="chosen_construction_cost" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mt-5">
                                                                        <div class="col-xl-12">
                                                                            <div class="accordion accordion-light accordion-toggle-arrow" id="accordionExample5">
                                                                                <div class="card">
                                                                                    <div class="card-header" id="headingOne5">
                                                                                        <div class="card-title collapsed align-right" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="false">
                                                                                        Est. Closing Cost&nbsp;
                                                                                        (<span id="info_closing_cost" style="float:right;">$123,456</span>)
                                                                                    </div>

                                                                                    </div>
                                                                                    <div id="collapseOne5" class="collapse" data-parent="#accordionExample5" style="">
                                                                                        <div class="card-body">
                                                                                            <div class="form-group row">
                                                                                                <label class="col-6 col-form-label">Agent Comission</label>
                                                                                                <div class="col-4">
                                                                                                    <div class="input-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text">$</span>
                                                                                                        </div>
                                                                                                        <input class="form-control numeral-input text-right" type="text" value="" id="info_agent_commission">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-2">
                                                                                                    <div class="input-group">
                                                                                                        <input class="form-control numeral-input text-right" type="text" value="" id="info_agent_commission_percent">
                                                                                                        <div class="input-group-append">
                                                                                                            <span class="input-group-text">%</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label for="example-search-input" class="col-6 col-form-label">Selling Concessions</label>
                                                                                                <div class="col-4">
                                                                                                    <div class="input-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text">$</span>
                                                                                                        </div>
                                                                                                        <input class="form-control numeral-input text-right" type="text" value="" id="info_selling_concessions">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-2">
                                                                                                    <div class="input-group">
                                                                                                        <input class="form-control numeral-input text-right" type="text" value="" id="info_selling_concessions_percent">
                                                                                                        <div class="input-group-append">
                                                                                                            <span class="input-group-text">%</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label for="example-email-input" class="col-6 col-form-label">Closing Fees</label>
                                                                                                <div class="col-4">
                                                                                                    <div class="input-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text">$</span>
                                                                                                        </div>
                                                                                                        <input class="form-control numeral-input text-right" type="text" value="" id="info_closing_fees">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-2">
                                                                                                    <div class="input-group">
                                                                                                        <input class="form-control numeral-input text-right" type="text" value="" id="info_closing_fees_percent">
                                                                                                        <div class="input-group-append">
                                                                                                            <span class="input-group-text">%</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label for="example-url-input" class="col-6 col-form-label">Taxes</label>
                                                                                                <div class="col-4">
                                                                                                    <div class="input-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text">$</span>
                                                                                                        </div>
                                                                                                        <input class="form-control numeral-input text-right" type="text" value="" id="info_taxes">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-2">
                                                                                                    <div class="input-group">
                                                                                                        <input class="form-control numeral-input text-right" type="text" value="" id="info_taxes_percent">
                                                                                                        <div class="input-group-append">
                                                                                                            <span class="input-group-text">%</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="separator separator-solid separator-border-4"></div>
                                                                    <div class="form-group mt-5">
                                                                        <div>
                                                                            <label class="font-size-h4 font-weight-bolder">Est. Selling Cost of your home</label>
                                                                            <label style="float:right;" class="font-size-h4 font-weight-bolder" id="info_selling_cost">$123,456</label>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <!--begin::Card-->
                                                        <div class="card card-custom gutter-b example example-compact">
                                                            <div class="card-header">
                                                                <div class="card-title">
                                                                    <h3 class="card-label">Images</h3>
                                                                </div>
                                                                <div class="card-toolbar">
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div id="kt_leaflet_1" style="height:600px;"></div>
                                                            </div>
                                                        </div>
                                                        <!--end::Card-->
                                                    </div>

                                                </div>
                                                <!--end::Card-->
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!--end::Modal-->
							</div>
                            <!--end::Container-->

						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">2020©</span>
								<a href="#" target="_blank" class="text-dark-75 text-hover-primary">Value Plus Analytics</a>
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{url('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{url('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
        <script src="{{url('assets/js/scripts.bundle.js')}}"></script>
        <script src="{{url('assets/js/numeral.min.js')}}"></script>
        <script src="{{url('assets/js/cleave.min.js')}}"></script>
		<!--end::Global Theme Bundle-->
        <!--begin::Page Vendors(used by this page)-->
        <script src="{{url('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

        <script src="{{url('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
        <script src="{{url('assets/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>
		<!--end::Page Vendors-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="{{url('assets/js/pages/widgets.js')}}"></script>
        <script src="{{url('assets/js/pages/vpa/properties.js')}}"></script>
        <script src="{{url('assets/js/pages/crud/file-upload/dropzonejs.js')}}"></script>
        <script src="{{url('assets/js/pages/features/maps/leaflet.js')}}"></script>
        <script src="{{url('assets/js/pages/crud/forms/widgets/nouislider.js')}}"></script>

		<script src="assets/js/pages/crud/forms/widgets/ion-range-slider.js"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>
