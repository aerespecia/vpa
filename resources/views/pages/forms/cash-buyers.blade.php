
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
									<h3 class="d-flex align-items-center text-dark mr-5 mb-0">Cash Buyers</h3>
								</div>
							</div>
						</div>
                        <!--end::Subheader-->
                        <div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Dashboard-->
								<!--begin::Row-->
								<div class="row">
									<div class="col-xl-12">
                                        <!--begin::Card-->
                                        <div class="card card-custom gutter-b example example-compact">

                                            <!--begin::Form-->
                                            <form id="cashBuyersForm" method="post" enctype="multipart/form-data">

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" class="form-control" id="firstName" placeholder="Enter First Name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Email Address</label>
                                                                <input type="numtextber" class="form-control" id="emailAddress" placeholder="Enter Email Address" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Phone</label>
                                                                <input type="text" class="form-control" id="phone" placeholder="Enter Phon" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>How much is your budget?</label>
                                                                <input type="text" class="form-control" id="budget" placeholder="Enter Budget" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>What areas do you invest in?</label>
                                                                <div>
                                                                    <select class="form-control select2" id="kt_select2_3" name="param" multiple="multiple">
                                                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                                                            <option value="AK">Alaska</option>
                                                                            <option value="HI">Hawaii</option>
                                                                        </optgroup>
                                                                        <optgroup label="Pacific Time Zone">
                                                                            <option value="CA">California</option>
                                                                            <option value="NV">Nevada</option>
                                                                            <option value="OR">Oregon</option>
                                                                            <option value="WA">Washington</option>
                                                                        </optgroup>
                                                                        <optgroup label="Mountain Time Zone">
                                                                            <option value="AZ">Arizona</option>
                                                                            <option value="CO">Colorado</option>
                                                                            <option value="ID">Idaho</option>
                                                                            <option value="MT">Montana</option>
                                                                            <option value="NE">Nebraska</option>
                                                                            <option value="NM">New Mexico</option>
                                                                            <option value="ND">North Dakota</option>
                                                                            <option value="UT">Utah</option>
                                                                            <option value="WY">Wyoming</option>
                                                                        </optgroup>
                                                                        <optgroup label="Central Time Zone">
                                                                            <option value="AL">Alabama</option>
                                                                            <option value="AR">Arkansas</option>
                                                                            <option value="IL">Illinois</option>
                                                                            <option value="IA">Iowa</option>
                                                                            <option value="KS">Kansas</option>
                                                                            <option value="KY">Kentucky</option>
                                                                            <option value="LA">Louisiana</option>
                                                                            <option value="MN">Minnesota</option>
                                                                            <option value="MS">Mississippi</option>
                                                                            <option value="MO">Missouri</option>
                                                                            <option value="OK">Oklahoma</option>
                                                                            <option value="SD">South Dakota</option>
                                                                            <option value="TX">Texas</option>
                                                                            <option value="TN">Tennessee</option>
                                                                            <option value="WI">Wisconsin</option>
                                                                        </optgroup>
                                                                        <optgroup label="Eastern Time Zone">
                                                                            <option value="CT">Connecticut</option>
                                                                            <option value="DE">Delaware</option>
                                                                            <option value="FL">Florida</option>
                                                                            <option value="GA">Georgia</option>
                                                                            <option value="IN">Indiana</option>
                                                                            <option value="ME">Maine</option>
                                                                            <option value="MD">Maryland</option>
                                                                            <option value="MA">Massachusetts</option>
                                                                            <option value="MI">Michigan</option>
                                                                            <option value="NH">New Hampshire</option>
                                                                            <option value="NJ">New Jersey</option>
                                                                            <option value="NY">New York</option>
                                                                            <option value="NC">North Carolina</option>
                                                                            <option value="OH">Ohio</option>
                                                                            <option value="PA">Pennsylvania</option>
                                                                            <option value="RI">Rhode Island</option>
                                                                            <option value="SC">South Carolina</option>
                                                                            <option value="VT">Vermont</option>
                                                                            <option value="VA">Virginia</option>
                                                                            <option value="WV">West Virginia</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Do you invest in out of state properties</label>
                                                                <div class="radio-list">
                                                                    <label class="radio">
                                                                    <input type="radio" value="1" name="sources">
                                                                    <span></span>Yes</label>
                                                                    <label class="radio">
                                                                    <input type="radio" value="2" name="sources" checked>
                                                                    <span></span>No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>What type of properties do you invest in?</label>
                                                                <div class="checkbox-list">
                                                                    <label class="checkbox">
                                                                    <input type="checkbox" name="typeOfProperty">
                                                                    <span></span>Default</label>
                                                                    <label class="checkbox">
                                                                    <input type="checkbox" name="typeOfProperty">
                                                                    <span></span>Development Opportunities</label>
                                                                    <label class="checkbox">
                                                                    <input type="checkbox" name="typeOfProperty">
                                                                    <span></span>Commercial Properties</label>
                                                                    <label class="checkbox">
                                                                    <input type="checkbox" name="typeOfProperty">
                                                                    <span></span>Single Family homes</label>
                                                                    <label class="checkbox">
                                                                    <input type="checkbox" name="typeOfProperty">
                                                                    <span></span>Others</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleTextarea">Comments/Questions
                                                        </label>
                                                        <textarea class="form-control" id="comments" rows="3" placeholder="Enter Notes"></textarea>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="reset" id="saveCashBuyer" class="btn btn-primary mr-2">Submit</button>
                                                </div>
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
								</div>
								<!--end::Row-->



								<!--end::Dashboard-->
							</div>
							<!--end::Container-->
						</div>
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
        <script src="{{url('assets/js/pages/vpa/forms/cash-buyers.js')}}"></script>
        <script src="{{url('assets/js/pages/crud/file-upload/dropzonejs.js')}}"></script>
        <script src="{{url('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>
