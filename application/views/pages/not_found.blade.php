@extends('app')


@section('content')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="wrapper">
        <div class="header header-filter" style="height: 250px;background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>

		<div class="main main-raised">
			<div class="container">
		    	<div class="section section-landing">
                    <div class="row">
												<div class="col-sm-12">
                          <h2>Disculpa</h2>
                            <p>No encontramos empresas con las caracteristicas que indicaste</p>
                            <br><br>
                                        <h3>Puedes buscar otras opciones</h3>
                        </div>

                        @include('pages.partials.search')

                    </div>


					</div>
	            </div>
	        </div>
		</div>


			<footer class="footer">
				<div class="container-fluid">
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.manosdeobra.com">Manos de obra.com</a>
					</p>
				</div>
			</footer>
		</div>
	</div>

-->
@endsection


@section('js')
        <!--   Core JS Files   -->
<script type="text/javascript" src="{{base_url('/assets/js/app.js')}}"></script>

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

<!-- Google maps -->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3f51CKdNudyXp2M9d6lcpJJXcAYXH2Rw&callback=map_create">
</script>

@endsection
