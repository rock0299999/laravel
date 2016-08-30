<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Pin2Wall | Dashboard</title>
<!-- ================== page-css ================== -->
@yield('page-css')
<!-- ================== /page-css ================== -->
<!-- Sweet Alert -->
<link href="{{asset('web_assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
</head>
<body class="pace-done">
	<div id="wrapper">
		<!-- Public NAV -->
		
		<!-- end -->
		<div id="page-wrapper" class="gray-bg dashbard-1">

			<!-- Content -->
			@yield('content')
			<!--// Content -->

		</div>

	</div>

	<!-- ================== page-js ================== -->
	@yield('page-js')
	<!-- ================== /page-js ================== -->
	<!-- Sweet alert -->
	<script src="{{asset('web_assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
	<!-- ================== page-js ================== -->
	@yield('inline-js')
	<!-- ================== /page-js ================== -->

</body>
</html>
