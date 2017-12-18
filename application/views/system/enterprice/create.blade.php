@extends('basesystem')

@section('title_section', 'Creando Empresa')


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Crear Empresa</h4>
                        </div>
                        <div class="card-content">
                            @include('msg.create')
                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="" action="{{ base_url('index.php/Enterprice/register')}}"
                                          method="post">

                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Empresa</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="">Nombre de Empresa: *</label>
                                                            <input type="text" class="form-control"
                                                                   name="name_enterprice"
                                                                   required>
                                                            <span class="material-input"></span>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-sm-10">
                                                            <div class="form-group">
                                                                <label>Codigo Postal</label>
                                                                <input id="zip_code" type="text" class="form-control zip_code" name="zip_code" required>
                                                            </div>
                                                          </div>
                                                          <div class="col-sm-12 divlocality" style="display:none">
                                                              <div class="form-group label-floating ">
                                                                  <label> Selecciona Colonia</label><br>
                                                                  <select class="select_locality" name="locality" required></select>
                                                                  <input type="hidden" class="codigo_id" name="codigo_id" value="">
                                                              </div>
                                                          </div>
                                                        </div>
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="">Dirección: *</label>
                                                            <input type="text" class="form-control manual-submit"
                                                                   name="address_enterprice" required>
                                                            <span class="material-input"></span>
                                                        </div>

                                                        <button href="#" class="search-btn btn btn-primary search-address">Buscar mi dirección</button>
                                                    </div>
                                                    <div class="col-md-7">
                                                      <h4>Horario de atención</h4>
                                                      <div class="table-responsive">
                                                        <table class="table table-striped">
                                                          <thead>
                                                            <tr>
                                                              <th>Día</th>
                                                              <th>Hora Inicio</th>
                                                              <th>Hora Fin</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            @foreach($days as $day => $key)
                                                              <tr>
                                                                <td>{{ $day }}</td>
                                                                <td><input type="text" name="schedule[]" class="timepicker start" value="{{ $key->start }}"></td>
                                                                <td><input type="text" name="schedule[]" class="timepicker end" value="{{ $key->end }}"></td>
                                                              </tr>
                                                            @endforeach
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-11">
                                                                <div class="errors_map" style="display:none">
                                                                    <div class="alert alert-danger alert-dismissible"
                                                                         role="alert">
                                                                        <p>No se encontro la ubicación</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="map" class="map" style="height: 350px;"></div>
                                                        <div class="text-center">
                                                            <a href="#" class="map-road btn btn-primary"><i
                                                                        class="fa fa-road"></i></a>
                                                            <a href="#" class="map-terrain btn btn-primary"><i
                                                                        class="fa fa-globe "></i></a>
                                                            <a href="#" class="map-reload btn btn-primary"><i
                                                                        class="fa fa-refresh"></i></a>
                                                            <a href="#" class="map-zoom-plus btn btn-primary"><i
                                                                        class="fa fa-search-plus"></i></a>
                                                            <a href="#" class="map-zoom-minus btn btn-primary"><i
                                                                        class="fa fa-search-minus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="hidden">
                                                        <input type="hidden" name="latitude_enterprice">
                                                        <input type="hidden" name="longitude_enterprice">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Detalle de la empresa</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="">Correo electrónico *</label>
                                                            <input type="email" class="form-control"
                                                                   name="email_enterprice"
                                                                   required>
                                                            <span class="material-input"></span></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="">Teléfono *</label>
                                                            <input type="text" class="form-control"
                                                                   name="telephone_enterprice"
                                                                   required>
                                                            <span class="material-input"></span></div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="form-group label-floating">
                                                        <label>Selecciona una Categoría</label>
                                                        <select class="form-control" name="category">
                                                          <option value="all" selected>Selecciona categoría</option>
                                                          @foreach($categories as $category)
                                                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                          @endforeach
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">

                                                        <div class="form-group label-floating is-empty">
                                                            <label class="">Forma de pago:</label>
                                                            <select name="payments_types"
                                                                    class="selectpicker form-control">
                                                                <option>Tipo de pago:</option>
                                                                <option value="Efectivo">Efectivo</option>
                                                                <option value="Otro">Cualquier tipo
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <p class="text-primary">¿Quieres agregar un video de Youtube en tu presentación?</p>
                                                    <label class="sr-only" for="youtube">Copía y pega el codígo del video</label>
                                                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <div class="input-group-addon">www.youtube.com/watch?v=</div>
                                                        <input type="text" class="form-control change-video" name="youtube_presentation" id="youtube" placeholder="kHHmd3pLaPU">
                                                      </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="container-video-youtube" style="display: none">
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <p class="text-success">¿Esté es tu video?</p>
                                                                <iframe id="iframeyoutube" class="embed-responsive-item" src=""></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Servicios</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                  <div class="col-sm-12">
                                                    <a class="btn btn-primary add_service">Agregar Servicio</a>
                                                  </div>
                                                </div>
                                                <div class="row container_services">

                                                </div>
                                            </div>
                                        </div>


                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Descripción de la empresa</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="">Descripción Corta: *</label>
                                                            <input type="text" class="form-control"
                                                                   name="basic_description"
                                                                   required>
                                                            <span class="material-input"></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="">Descripción Larga: *</label>
                                                      <textarea name="large_description" style="width: 100%;" required>
                                                        Escribe la descripción completa de tu negocio
                                                      </textarea>
                                                    <br/>
                                                    <span class="material-input"></span></div>
                                            </div>
                                        </div>



                                        <button type="submit" class="btn btn-primary pull-right">Siguiente ></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')

    <script type="text/javascript" src="{{base_url('/assets/js/app.js')}}"></script>
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        //<![CDATA[
        bkLib.onDomLoaded(function () {
            nicEditors.allTextAreas()
        });
        //]]>
    </script>

    <!-- Google maps -->
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3f51CKdNudyXp2M9d6lcpJJXcAYXH2Rw&callback=map_create">
    </script>

    <script>
    $('.add_service').click(function(){
      $('.container_services').append('<div class="col-sm-3 col-md-3 new_service"><div class="form-group label-floating is-empty"><label class="">Servicio: </label><input type="text" class="form-control form-services"name="name_service[]" required><i class="fa fa-trash delete_service"></i><span class="material-input"></span></div></div>');
    });

    $('.container_services').on('click','.delete_service',function(){
      $(this).parents('.new_service').remove();
    })


    </script>

    <script>
        $('.select_locality').change(function (event) {
            $('.codigo_id').val($(".select_locality").val());
        });


        $('.zip_code').focusout(function (event) {
            var zip_code = $(this).val();
            find_zip(zip_code);
        });


        $('.change-video').focusout(function (event) {
            $('.container-video-youtube').stop().fadeOut();
            var code_youtube = $(this).val();
            change_video(code_youtube);
        });

        function change_video(code){
            url = '//www.youtube.com/embed/'+code;
            $('#iframeyoutube').attr('src',url);
            $('.container-video-youtube').stop().fadeIn();
        }


        function find_zip(zip_code) {
            $.ajax({
                method: "GET",
                url: "{{ base_url('index.php/'.$model.'/zip_code') }}",
                data: {
                    zip: zip_code,
                },
                success: function (resp) {
                    var tam = resp.length;
                    var select = $('.select_locality');
                    if (tam >= 1) {
                        //$('#state').val(resp[0].estado);
                        //$('#municipality').val(resp[0].municipio);
                        select.html(''); //borrar los elementos existentes
                        $('.divlocality').fadeOut();
                        select.append('<option value="">Seleccione una opción</option>');
                        $.each(resp, function (index) {
                            select.append('<option value="' + resp[index].id + '">' + resp[index].asentamiento.toUpperCase() + '</option>');
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



@endsection
