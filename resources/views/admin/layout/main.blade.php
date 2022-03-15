<!DOCTYPE html>


<html lang="en">
		<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>Expenses</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Fonts -->

	<!--begin::Page Vendors Styles(used by this page) -->
	<link href="{{asset('backend/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

	<!--end::Page Vendors Styles -->

	<!--begin:: Global Mandatory Vendors -->
	<link href="{{asset('backend/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet"
		type="text/css" />

	<!--end:: Global Mandatory Vendors -->

	<!--begin:: Global Optional Vendors -->
	<link href="{{asset('backend/vendors/general/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('backend/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('backend/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('backend/vendors/general/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('backend/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('backend/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('backend/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('backend/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/general/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/general/nouislider/distribute/nouislider.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/general/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/general/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('backend/vendors/general/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/general/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('backend/vendors/general/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/general/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/general/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/vendors/custom/vendors/fontawesome5/css/all.min.css')}}" rel="stylesheet" type="text/css" />
	{{-- datatable start --}}
   <link href="{{asset('backend/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"  type="text/css" >
   <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet"> <!--load all styles -->

   	{{-- datatable end --}}

	<!--end:: Global Optional Vendors -->

	<!--begin::Global Theme Styles(used by all pages) -->
	<link href="{{asset('backend/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/style.css')}}" rel="stylesheet" type="text/css" />

	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->
	<link href="{{asset('backend/demo/default/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/demo/default/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/demo/default/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/demo/default/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('backend/all-need/css/Chart.min.css')}}"></script>

	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="{{asset('site/images/logo.png')}}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
	class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="{{url('/')}}">
					<img alt="Logo" src="{{asset('media/logos/logo-light.png')}}" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left"
					id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
						class="flaticon-more"></i></button>
			</div>
		</div>
		<!-- end:: Header Mobile -->

		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
					{{-- sidebar --}}
					@include('admin.layout.nav')
					{{-- end sidebar --}}
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
					@yield('content')
					</div>
					</div>
					</div>
					</div>
					<!-- begin:: Footer -->
					<div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
						<div class="kt-footer__copyright">
							2019&nbsp;&copy;&nbsp;<a href="https://www.matrixtranslation.com/" target="_blank" class="kt-link">Matrix-Cloud</a>
						</div>
						<div class="kt-footer__menu">
							<a href="https://www.matrixtranslation.com/" target="_blank" class="kt-footer__menu-link kt-link">About</a>
							<a href="https://www.matrixtranslation.com/" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
							<a href="https://www.matrixtranslation.com/" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
						</div>
					</div>
					<!-- end:: Footer -->

				</div>
			</div>
		<!-- end:: Page -->
		   	{{-- <script>
		var KTAppOptions = {
			"colors": {
				"state": {
					"brand": "#5d78ff",
					"dark": "#282a3c",
					"light": "#ffffff",
					"primary": "#5867dd",
					"success": "#34bfa3",
					"info": "#36a3f7",
					"warning": "#ffb822",
					"danger": "#fd3995"
				},
				"base": {
					"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
					"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
				}
			}
		};
    </script> --}}


    {{-- <script>
        var KTAppSettings = {
"breakpoints": {
    "sm": 576,
    "md": 768,
    "lg": 992,
    "xl": 1200,
    "xxl": 1400
},
"colors": {
    "theme": {
        "base": {
            "white": "#ffffff",
            "primary": "#3699FF",
            "secondary": "#E5EAEE",
            "success": "#1BC5BD",
            "info": "#8950FC",
            "warning": "#FFA800",
            "danger": "#F64E60",
            "light": "#E4E6EF",
            "dark": "#181C32"
        },
        "light": {
            "white": "#ffffff",
            "primary": "#E1F0FF",
            "secondary": "#EBEDF3",
            "success": "#C9F7F5",
            "info": "#EEE5FF",
            "warning": "#FFF4DE",
            "danger": "#FFE2E5",
            "light": "#F3F6F9",
            "dark": "#D6D6E0"
        },
        "inverse": {
            "white": "#ffffff",
            "primary": "#ffffff",
            "secondary": "#3F4254",
            "success": "#ffffff",
            "info": "#ffffff",
            "warning": "#ffffff",
            "danger": "#ffffff",
            "light": "#464E5F",
            "dark": "#ffffff"
        }
    },
    "gray": {
        "gray-100": "#F3F6F9",
        "gray-200": "#EBEDF3",
        "gray-300": "#E4E6EF",
        "gray-400": "#D1D3E0",
        "gray-500": "#B5B5C3",
        "gray-600": "#7E8299",
        "gray-700": "#5E6278",
        "gray-800": "#3F4254",
        "gray-900": "#181C32"
    }
},
"font-family": "Poppins"
};
    </script> --}}
	<!-- end::Global Config -->

	<!--begin:: Global Mandatory Vendors -->
	<script src="{{asset('backend/vendors/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/moment/min/moment.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script>

	<!--end:: Global Mandatory Vendors -->

	<!--begin:: Global Optional Vendors -->
	<script src="{{asset('backend/vendors/general/jquery-form/dist/jquery.form.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"
		type="text/javascript"></script>
	<script src="{{asset('backend/vendors/custom/components/vendors/bootstrap-datepicker/init.js')}}" type="text/javascript">
	</script>
	<script src="{{asset('backend/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}"
		type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript">
	</script>
	<script src="{{asset('backend/vendors/custom/components/vendors/bootstrap-timepicker/init.js')}}" type="text/javascript">
	</script>
	<script src="{{asset('backend/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript">
	</script>
	<script src="{{asset('backend/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}"
		type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js')}}" type="text/javascript">
	</script>
	<script src="{{asset('backend/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}"
		type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/bootstrap-select/dist/js/bootstrap-select.js')}}" type="text/javascript">
	</script>
	<script src="{{asset('backend/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript">
	</script>
	<script src="{{asset('backend/vendors/custom/components/vendors/bootstrap-switch/init.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/ion-rangeslider/js/ion.rangeSlider.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/typeahead.js/dist/typeahead.bundle.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/handlebars/dist/handlebars.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/inputmask/dist/jquery.inputmask.bundle.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js')}}"
		type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}"
		type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/nouislider/distribute/nouislider.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/autosize/dist/autosize.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/clipboard/dist/clipboard.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/dropzone/dist/dropzone.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/markdown/lib/markdown.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/custom/components/vendors/bootstrap-markdown/init.js')}}" type="text/javascript">
	</script>
	<script src="{{asset('backend/vendors/general/bootstrap-notify/bootstrap-notify.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/custom/components/vendors/bootstrap-notify/init.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/jquery-validation/dist/additional-methods.js')}}" type="text/javascript">
	</script>
	<script src="{{asset('backend/vendors/custom/components/vendors/jquery-validation/init.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/toastr/build/toastr.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/raphael/raphael.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/morris.js/morris.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/chart.js/dist/Chart.bundle.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')}}"
		type="text/javascript"></script>
	<script src="{{asset('backend/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/waypoints/lib/jquery.waypoints.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/counterup/jquery.counterup.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/es6-promise-polyfill/promise.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/custom/components/vendors/sweetalert2/init.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/jquery.repeater/src/lib.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/jquery.repeater/src/jquery.input.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/jquery.repeater/src/repeater.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.9.0/full-all/ckeditor.js"></script>

	<!--end:: Global Optional Vendors -->


	<script src="{{asset('backend/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>

	<!--end::Global Theme Bundle -->


	<!--end::Page Vendors -->

	<!--end::Page Scripts -->
	<script src="{{asset('backend/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/app/custom/general/crud/datatables/data-sources/html.js')}}" type="text/javascript"></script>
	<script src="{{ asset('backend/app/custom/general/crud/forms/widgets/bootstrap-timepicker.js')}}" type="text/javascript"></script>

    <!--begin::Page  -->
    <script src="{{asset('backend/app/custom/general/dashboard.js')}}" type="text/javascript"></script>

    {{-- <script src="{{asset('backend/app/bundle/app.bundle.js')}}" type="text/javascript"></script> --}}
    <script src="{{asset('dashboard/datatables/dataTables.js')}}"></script>
    <script src="{{asset('backend/all-need/js/scripts.bundle.js')}}"></script>
    <script src="{{asset('backend/all-need/js/plugins.bundle.js')}}"></script>
    <script src="{{asset('backend/all-need/js/prismjs/prismjs.bundle.js')}}"></script>
    <script src="{{asset('backend/all-need/js/Chart.bundle.min.js')}}"></script>
	<!--begin::Global App Bundle -->
	<script src="{{asset('backend/custom/custom.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/custom/custom2.js')}}" type="text/javascript"></script>
    {{-- <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script> --}}

    	@yield('js')
	<!--end::Global App Bundle -->
</body>

<!-- end::Body -->

</html>
