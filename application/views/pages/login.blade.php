@extends('app')

@section('title', 'Iniciar sesión')
@section('description','Acceder o iniciar sessión')

@section('content')
<body class="signup-page">
	<nav class="navbar navbar-transparent navbar-absolute">
    </nav>
    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('../assets/img/home/portada2.jpg'); background-size: cover; background-position: top center; height: 100vh;">
			<div class="container">
				<div class="row">
					<br><br>
					<br><br>
					<br><br>

					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="POST" action="{{ site_url('index.php/login/login') }}">
								<div class="header header-primary text-center">
									<h4>Iniciar Sesion</h4>
								</div>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" name="email" class="form-control" placeholder="Email...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" name="password" placeholder="Contraseña..." class="form-control" />
										 <a href="{{ site_url('index.php/pages/recovery') }} ">No sé mi contraseña.</a>
									</div>

								</div>
								<div class="footer text-center">

									<button type="submit" class="btn btn-simple btn-primary btn-lg">Iniciar Sesion</button>

								</div>

								<div class="col-sm-12 text-center" style="padding:20px 10px">
									¿Aún no tienes una cuenta?
									<a href="{{ site_url('index.php/User/create') }}"> Registrate.</a>
								</div>

							</form>
						</div>
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
