@extends('app')

@section('title', 'Lista de empresas')
@section('description','Directorio de noticias')

@section('content')

    <div class="wrapper">
        <div class="header header-filter"
             style="height: 250px;background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
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
                        @include('pages.partials.search')
                      </div>

                      <div class="col-sm-8">
                        @include('pages.partials.list.catalog')
                      </div>

                      <div class="col-sm-4">
                        @include('pages.partials.list.map_all_markes')
                        @include('pages.partials.list.sponsored')
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="#">
                            Inicio
                        </a>
                    </li>
                </ul>
            </nav>
            <p class="copyright pull-right">
                &copy;
                <script>document.write(new Date().getFullYear())</script>
                UTVT - developers 82
            </p>
        </div>
    </footer>
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

    <!-- Google maps -->
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3f51CKdNudyXp2M9d6lcpJJXcAYXH2Rw">
    </script>

    <script type="text/javascript" src="{{base_url('/assets/js/app.js')}}"></script>

    <script type="text/javascript">


        $( window ).load(function() {
          generate_map('{{json_encode((array)$enterprices)}}');
        });



        $().ready(function () {

            // the body of this function is in assets/material-kit.js
            //materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992) {
                big_image = $('.wrapper > .header');

                $(window).on('scroll', materialKitDemo.checkScrollForParallax);
            }

        });

        $('.select_states').change(function (event) {
            //alert("cambio");
            id_state = $(this).val();
            if ($.isNumeric(id_state)) {
                get_municipalities(id_state);
            }
            //get_municipalities(id_state);
        });

        function get_municipalities(id_state) {
            $.ajax({
                method: "GET",
                url: "{{ base_url('index.php/Pages/municipalities_for_state') }}",
                data: {
                    idEstado: id_state,
                },
                success: function (resp) {
                    var tam = resp.length;
                    var select = $('.select_municipality_id');
                    if (tam >= 1) {
                        //$('#state').val(resp[0].estado);
                        //$('#municipality').val(resp[0].municipio);
                        select.html(''); //borrar los elementos existentes
                        $('.divlocality').fadeOut();
                        select.append('<option value="">Todos los municipios</option>');
                        $.each(resp, function (index) {
                            select.append('<option value="' + resp[index].idMunicipio + '">' + resp[index].municipio + '</option>');
                        });
                        $('.divlocality').fadeIn();
                    }

                    if (tam == 0) {

                        $('.codigodiv').addClass('has-error');

                    }

                },

                error: function (req, status, err) {
                    console.log(err);
                },

            });

        }
    </script>

    <script src="{{ base_url('bower_components/jQuery.dotdotdot/src/jquery.dotdotdot.min.js')}}"></script>

    <script>


        $(".card-text").dotdotdot({
            ellipsis: '... ',
            height	: 60,
        });

    </script>
@endsection
