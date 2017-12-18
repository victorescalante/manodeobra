@extends('app')

@section('title', 'Nueva contraseña')
@section('description',' Quieres una nueva contraseña')

@section('content')
<body class="signup-page">
	<nav class="navbar navbar-transparent navbar-absolute">
    </nav>
    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('../assets/img/city.jpg'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<br><br>
					<br><br>
					<br><br>

					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="POST" action="{{ site_url('index.php/Recovery') }}">
								<div class="header header-primary text-center">
									<h4>No sé mi Contraseña</h4>
								</div>
								<div class="content">
                  <p ><center>Ingresa el e-mail con el que te registraste y te ayudaremos</p>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" name="email" class="form-control" placeholder="Email...">
									</div>



								</div>
								<div class="footer text-center">

									<button type="submit"  class="btn btn-simple btn-primary btn-lg">Continuar</button>
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
