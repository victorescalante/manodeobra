@extends('app')


@section('title', $enterprice->name_enterprice )
@section('description','Encuentra todo tipo de contructoras en México')

@section('content')

<div class="wrapper">
        <div class="header header-filter" style="height: 250px;background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        </div>

		<div class="main main-raised">
			<div class="container">
		    	<div class="section section-landing">

            @include('pages.partials.detail.messages')

                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="text-center">{{ $enterprice->name_enterprice }}</h2>
                            @if(!empty($category->name))
                              <ol class="breadcrumb">
                                <li><a href="{{base_url('/')}}">Inicio</a></li>
                                <li><a href="{{base_url('/')}}">Categorias</a></li>
                                <li class="active">{{$category->name}}</li>
                              </ol>
                            @endif
                            <hr>
                            <div class="row">
                              <div class="col-sm-11" style="padding: 25px 0px">
                                <p class="text-center">{{ $enterprice->basic_description }}</p>
                              </div>
                            </div>
                            <div class="row">

                              <!-- First section - LEFT -->
                                <div class="col-sm-6">

                                    <div class="col-sm-12">

                                      @include('pages.partials.detail.carousel')

                                    </div>

                                    <div class="col-sm-12">
                                        </br></br>
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <h3 class="panel-title">Acerca de {{ $enterprice->name_enterprice }}</h3>
                                        </div>
                                        <div class="panel-body">
                                          {!! $enterprice->large_description !!}
                                        </div>
                                      </div>

                                    </div>

                                    <div class="col-sm-12">

                                      @include('pages.partials.detail.proyects')

                                    </div>
                                </div>
                                <!-- End first section - LEFT -->

                                <!-- Second  section - RIGTH -->
                                <div class="col-sm-5">

                                      @include('pages.partials.detail.video')

                                      @include('pages.partials.detail.information')

                                      @include('pages.partials.detail.services')

                                      @include('pages.partials.detail.schedule')

                                      @include('pages.partials.detail.map')

                                      @include('pages.partials.detail.comments')

                                  </div>

                          </div>
                        </div>
                      </div>

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

<!-- Lity js -->
<script src="{{ base_url('assets/js/lity.min.js')}}"></script>

<!-- Plugins -->
<script src="{{ base_url('/bower_components/lightgallery/dist/js/lightgallery.min.js') }}"></script>

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

    $('.container_images_proyect').lightGallery({
        thumbnail:true,
        animateThumb: false,
        showThumbByDefault: false
    });



</script>

<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = '{{ base_url("/")."index.php/Pages/detail/".$enterprice->id }}';
this.page.identifier = '{{ $enterprice->id."enterprice" }}';
};


(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//manos-de-obra.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<!-- Google maps -->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3f51CKdNudyXp2M9d6lcpJJXcAYXH2Rw&callback=map_create">
</script>

@endsection
