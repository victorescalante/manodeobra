@extends('app')

@section('title', 'Registro')
@section('description',' Registrarme en la plataforma')

@section('content')
<body class="signup-page">
	<nav class="navbar navbar-transparent navbar-absolute"></nav>
    <div class="wrapper">
		<div class="header header-filter" style="height: 100vh;">

			<video poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" playsinline autoplay muted loop>
			  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
			<source src="http://thenewcode.com/assets/videos/polina.webm" type="video/webm">
			<source src="http://thenewcode.com/assets/videos/polina.mp4" type="video/mp4">
		</video>
			<div class="container">
				<br><br><br><br><br>
				<div class="row">

					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="POST" action="{{ base_url('index.php/User/register') }}">
								<div class="header header-primary text-center">
									<h4>Registro</h4>
								</div>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input type="text" name="first_name" class="form-control" placeholder="Nombre(s)" value="{{ set_value('first_name') }}" required>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input type="text" name="last_name" class="form-control" placeholder="Apellidos(s)" value="{{ set_value('last_name') }}" required>
									</div>


									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" name="email_user" class="form-control" placeholder="Email..." value="{{ set_value('email_user') }}" required>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_open</i>
										</span>
										<input type="password" name="password" placeholder="Contraseña..." class="form-control" required>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" name="confirm_password" placeholder="Repite Contraseña..." class="form-control" required>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">local_phone</i>
										</span>
										<input type="text" name="telephone_user" placeholder="700 1 34 78 80" class="form-control" required>
									</div>

								</div> <!-- End container -->

								<div class="footer text-center">
									<button type="submit"  class="btn btn-simple btn-primary btn-lg">Registrarme</button>
								</div>

							</form>
						</div>
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
