@extends('app')

@section('title', 'Inicio')

@section('content')

    <div class="wrapper">
        <div class="header header-filter" style="background-image: url({{ base_url('assets/img/constructor.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="brand">
                            <h1> Manos de obra </h1>
                            <h3 id="maquinas"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="main main-raised">
        <div class="section section-basic">
            <div class="container">

            @include('pages.partials.home.icons-categories')

            @include('pages.partials.home.description')

          </div>
        </div>
    </div>





        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                      <!--
                        <li>
                            <a href="#">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
              -->
                <div class="copyright pull-right">
                    &copy; 2017, Created for Victor Escalante and Pamela Badillo
                </div>
            </div>
        </footer>
    </div>

    <!-- Sart Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-simple">Nice Button</button>
                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->
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

        $('.select_states').change(function (event) {
            //alert("cambio");
             id_state = $(this).val();
             if($.isNumeric(id_state)){
                get_municipalities(id_state);
             }
            //get_municipalities(id_state);
        });

        function get_municipalities(id_state) {
            $.ajax({
                method: "GET",
                url: "{{ base_url('index.php/Pages/municipalities_for_state') }}",
                data: {
                        idEstado : id_state,
                },
                success: function (resp) {
                    var tam = resp.length;
                    var select = $('.select_municipality_id');
                    if (tam >= 1) {
                        //$('#state').val(resp[0].estado);
                        //$('#municipality').val(resp[0].municipio);
                        select.html(''); //borrar los elementos existentes
                        $('.divlocality').fadeOut();
                        select.append('<option value="0">Todos los municipios</option>');
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

        function maquina(contenedor,texto,intervalo){
   // Calculamos la longitud del texto
   longitud = texto.length;
   // Obtenemos referencia del div donde se va a alojar el texto.
   cnt = document.getElementById(contenedor);
   var i=0;
   // Creamos el timer
   timer = setInterval(function(){
      // Vamos añadiendo letra por letra y la _ al final.
      cnt.innerHTML = cnt.innerHTML.substr(0,cnt.innerHTML.length-1) + texto.charAt(i) + "_";
      // Si hemos llegado al final del texto..
      if(i >= longitud){
         // Salimos del Timer y quitamos la barra baja (_)
         clearInterval(timer);
         cnt.innerHTML = cnt.innerHTML.substr(0,longitud);
         return true;
      } else {
         // En caso contrario.. seguimos
         i++;
      }},intervalo);
};

var texto = "Busca, encuentra, compara y contrata hoy mismo.";
// 100 es el intervalo de minisegundos en el que se escribirá cada letra.
maquina("maquinas",texto,100);

    </script>
@endsection
