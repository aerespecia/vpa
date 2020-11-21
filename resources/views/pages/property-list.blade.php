
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
								<h4 class="d-none text-dark d-lg-flex align-items-center mr-10 mb-0">Value Plust Analytics | Beta v.1</h4>
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
                                <!--begin::Dashboard-->
                                <!--begin::Card-->
                                <div class="card card-custom">
                                    <div class="card-body">
                                        <!--begin: Datatable-->
                                        <table class="table table-bordered table-hover table-checkable table-sm" id="propertyTable" >
                                            <thead>
                                                <tr>
                                                    <th>Address</th>
                                                    <th>Sqft</th>
                                                    <th>Purchase Price</th>
                                                    <th>ARV (Zestimate)</th>
                                                    <th>Construction Cost</th>
                                                    <th>Closing Cost</th>
                                                    <th>Total Estimated Costs</th>
                                                    <th>Estimated Net Proceeds</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        <!--end: Datatable-->
                                    </div>
                                </div>
                                <!--end::Card-->
                                <!--end::Dashboard-->
                                <!--begin::Modal-->
								<div class="modal fade" id="exampleModalSizeXl" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
									<div class="modal-dialog modal-xl" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-1">
													<!--begin::Text-->
													<div class="d-flex flex-column font-weight-bold">
														<h3 href="#" class="text-dark text-hover-primary mb-1">Property List</h3>
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
                                                    <div class="col-lg-5">
                                                        <div class="card card-custom gutter-b example example-compact">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Off Market Properties</h3>
                                                                <div class="card-toolbar">
                                                                </div>
                                                            </div>
                                                            <!--begin::Form-->
                                                            <form id="propertyForm" method="post" action="{{url('upload/store')}}" enctype="multipart/form-data">

                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label>Property Address</label>
                                                                        <div class="input-group rounded bg-light">
                                                                            <input type="text" id="propertyAddress" class="form-control h-45px" placeholder="Search...">

                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-primary btn-sm p-4" type="button" id="fillDetails">Fill Details</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Price</label>
                                                                                <input type="number" class="form-control" id="price" placeholder="Enter Price" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Sqft addition</label>
                                                                                <input type="number" class="form-control" id="sqftAddition" placeholder="Enter Sqft addition" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Sqft</label>
                                                                                <input type="number" class="form-control" id="sqft" placeholder="Enter Sqft" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>ARV</label>
                                                                                <input type="number" class="form-control" id="arv" placeholder="Enter ARV" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Lot Size</label>
                                                                                <input type="number" class="form-control" id="lotSize" placeholder="Enter Lot Size" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Zestimate</label>
                                                                                <span class="text-muted font-size-xs">Data from <a href="https://www.zillow.com/" target = "_blank">Zillow</a></span>
                                                                                <h6>$<span id="zestimate"></span></h6>
                                                                                <p class="font-size-sm">Rental: $<span id="rentalZestimate"></span></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Listing Type</label>
                                                                                <div class="radio-list">
                                                                                    <label class="radio">
                                                                                    <input type="radio" value="1" name="listingType" checked>
                                                                                    <span></span>Off Market</label>
                                                                                    <label class="radio">
                                                                                    <input type="radio" value="2" name="listingType">
                                                                                    <span></span>On Market</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Sources</label>
                                                                                <div class="radio-list">
                                                                                    <label class="radio">
                                                                                    <input type="radio" value="1" name="sources" checked>
                                                                                    <span></span>Email</label>
                                                                                    <label class="radio">
                                                                                    <input type="radio" value="2" name="sources">
                                                                                    <span></span>Manual</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Link to source</label>
                                                                        <input type="text" class="form-control" id="linkToSource" placeholder="Enter Link to source" />
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Level of Construction</label>
                                                                                <div class="radio-list">
                                                                                    <label class="radio">
                                                                                    <input type="radio" value="1" name="levelOfConstruction" checked>
                                                                                    <span></span>Light</label>
                                                                                    <label class="radio">
                                                                                    <input type="radio" value="2" name="levelOfConstruction">
                                                                                    <span></span>Medium</label>
                                                                                    <label class="radio">
                                                                                    <input type="radio" value="3" name="levelOfConstruction">
                                                                                    <span></span>Heavy</label>
                                                                                    <label class="radio">
                                                                                    <input type="radio" value="4" name="levelOfConstruction">
                                                                                    <span></span>Ground up</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Rehab Cost</label>
                                                                                <input type="number" class="form-control" placeholder="Enter Rehab Cost" id="rehabCost"/>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Hold Time</label>
                                                                                <input type="number" class="form-control" placeholder="Enter Hold Time" id="holdTime"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Seller's Name</label>
                                                                                <input type="text" class="form-control" id="sellersName" placeholder="Enter Seller's Name" />
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Phone</label>
                                                                                <input type="text" class="form-control" id="phone" placeholder="Enter Seller's Phone" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Email</label>
                                                                                <input type="text" class="form-control" placeholder="Enter Email" id="email"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleTextarea">Description
                                                                        </label>
                                                                        <textarea class="form-control" id="description" rows="3" placeholder="Enter Description"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleTextarea">Notes
                                                                        </label>
                                                                        <textarea class="form-control" id="notes" rows="3" placeholder="Enter Notes"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Upload photos</label>
                                                                        <div class="col-sm-12">
                                                                            <div class="dropzone dropzone-default dropzone-primary dz-clickable" id="kt_dropzone_2">
                                                                                <div class="dropzone-msg dz-message needsclick">
                                                                                    <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                    <button type="reset" id="saveProperty" class="btn btn-primary mr-2">Save Property</button>
                                                                </div>
                                                            </form>
                                                            <!--end::Form-->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <!--begin::Card-->
                                                        <div class="card card-custom gutter-b example example-compact">
                                                            <div class="card-header">
                                                                <div class="card-title">
                                                                    <h3 class="card-label">Map View</h3>
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
        <script>
            // Class definition
            var KTLeaflet = function () {

            // Private functions
            var demo5 = function () {
            // Define Map Location
            var leaflet = L.map('kt_leaflet_5', {
            center: [40.725, -73.985],
            zoom: 13
            });

            // Init Leaflet Map
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(leaflet);

            // Set Geocoding
            var geocodeService;
            if (typeof L.esri.Geocoding === 'undefined') {
            geocodeService = L.esri.geocodeService();
            } else {
            geocodeService = L.esri.Geocoding.geocodeService();
            }

            // Define Marker Layer
            var markerLayer = L.layerGroup().addTo(leaflet);

            // Set Custom SVG icon marker
            var leafletIcon = L.divIcon({
            html: `<span class="svg-icon svg-icon-danger svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/></g></svg></span>`,
            bgPos: [10, 10],
            iconAnchor: [20, 37],
            popupAnchor: [0, -37],
            className: 'leaflet-marker'
            });

            // Map onClick Action
            leaflet.on('click', function (e) {
            geocodeService.reverse().latlng(e.latlng).run(function (error, result) {
            if (error) {
                return;
            }
            markerLayer.clearLayers(); // remove this line to allow multi-markers on click
            L.marker(result.latlng, { icon: leafletIcon }).addTo(markerLayer).bindPopup(result.address.Match_addr, { closeButton: false }).openPopup();
            alert(`You've clicked on the following address: ${result.address.Match_addr}`);
            });
            });
            }

            return {
            // public functions
            init: function () {
            // default charts
            demo5();
            }
            };
            }();

            jQuery(document).ready(function () {
            KTLeaflet.init();
            });
        </script>
		<script src="{{url('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{url('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{url('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Theme Bundle-->
        <!--begin::Page Vendors(used by this page)-->
        <script src="{{url('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
        <script src="{{url('assets/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>
		<script src="{{url('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
		<!--end::Page Vendors-->
        <!--begin::Page Scripts(used by this page)-->
		<script src="{{url('assets/js/pages/features/maps/leaflet.js')}}"></script>
        <script src="{{url('assets/js/pages/widgets.js')}}"></script>
        <script src="{{url('assets/js/pages/vpa/property-list.js')}}"></script>
        <script src="{{url('assets/js/pages/crud/file-upload/dropzonejs.js')}}"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>
