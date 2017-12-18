@extends('app')

@section('title', 'Registro exitoso')

@section('content')
<body class="signup-page">
	<nav class="navbar navbar-transparent navbar-absolute"></nav>
    <div class="wrapper">
		<div class="header header-filter" style="background-image: url({{base_url('assets/img/city.jpg')}}); background-size: cover; background-position: top center;">
			<div class="container">
				<br><br><br><br><br>
				<div class="row">

					<div class="col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
							<h2 class="text-center" style="color:white">Estas a un paso más </h2>
							<br>
							<h3 class="text-center" style="color:white">Un correo ha sido enviado para confirmar tu identidad</h3>
					</div>

					<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
						@include('msg.create')
					</div>


				</div>
			</div>



		</div>

    </div>


	@endsection


	@section('js')
	        <!--   Core JS Files   -->
	<script src="{{ base_url('assets/js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{ base_url('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{ base_url('assets/js/material.min.js')}}"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="{{ base_url('assets/js/nouislider.min.js')}}" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="{{ base_url('assets/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="{{ base_url('assets/js/material-kit.js')}}" type="text/javascript"></script>

	<script type="text/javascript">

	    $().ready(function(){
	        // the body of this function is in assets/material-kit.js
	        materialKit.initSliders();
	        window_width = $(window).width();

	        if (window_width >= 992){
	            big_image = $('.wrapper > .header');

	            $(window).on('scroll', materialKitDemo.checkScrollForParallax);
	        }

	    });
	</script>
	@endsection
