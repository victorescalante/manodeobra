@extends('basesystem')

@section('title_section', 'Modificando Empresa')


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Empresa - {{ $enterprice->name_enterprice}}
                                <div class="title pull-right"><a target="_blank"
                                                                 href="{{ base_url('index.php/Pages/detail/'.$enterprice->slug) }}">Ver
                                        Publicada <i class="fa fa-paper-plane-o" aria-hidden="true"></i> </a></div>
                            </h4>

                        </div>
                        <div class="card-content">

                            @include('msg.create')

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Galería de imagenes</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <div class="col-sm-12">
                                                <label class="control-label">Agrega una galería de imagenes</label>
                                                <form enctype="multipart/form-data" class="dropzone"
                                                      id="myDropzoneGallery">
                                                    <input type="hidden" value="{{ $enterprice->id}}" name="id">
                                                </form>
                                            </div>
                                        </div>

                                        @if(!empty($files))
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="container" style="padding: 15px;">
                                                        @foreach($files as $file)
                                                            <div class="img {{ ($file->status_file == 1) ? 'img-active' : 'img-disabled' }}"
                                                                 style="max-width:150px;display: inline-block;padding: 0px 5px;">
                                                                <img src="{{ base_url('/uploads/img/enterprices/'.$file->name_file) }}">
                                                                <a href="#" file="{{$file->id}}" class="delete_img">Eliminar
                                                                    la imagen</a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <form class="" action="{{ base_url('index.php/Enterprice/update')}}" method="post">

                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Empresa</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="">Nombre de Empresa: *</label>
                                                    <input type="hidden" class="form-control" name="id"
                                                           value="{{ $enterprice->id }}">
                                                    <input type="text" class="form-control" name="name_enterprice"
                                                           value="{{ $enterprice->name_enterprice }}" required>
                                                    <span class="material-input"></span>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Codigo Postal</label>

                                                        <input id="zip_code" type="text" class="form-control zip_code"
                                                               value="{{ $zipcode[0]->cp }}" name="zip_code">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 divlocality">
                                                    <div class="form-group label-floating ">
                                                        <label> Colonia Seleccionada</label><br>
                                                        <select class="select_locality" name="codigo_id">
                                                            @foreach($colonies as $colony)
                                                                @if($colony->id == $enterprice->codigo_id)
                                                                    <option value="{{$colony->id}}"
                                                                            selected>{{ $colony->asentamiento }}</option>
                                                                @else
                                                                    <option value="{{$colony->id}}">{{ $colony->asentamiento }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
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
                                            <div class="col-md-10">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="">Dirección: *</label>
                                                    <input type="text" class="form-control manual-submit"
                                                           name="address_enterprice"
                                                           value="{{ $enterprice->address_enterprice }}" required>
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="#" class="search-btn btn btn-primary search-address"><i
                                                            class="fa fa-search"></i></a>
                                            </div>
                                        </div>
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
                                            <input type="hidden" name="latitude_enterprice"
                                                   value="{{ $enterprice->latitude_enterprice }}">
                                            <input type="hidden" name="longitude_enterprice"
                                                   value="{{ $enterprice->longitude_enterprice }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Detalle de la empresa</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="">Correo Electrónico *</label>
                                                    <input type="email" class="form-control" name="email_enterprice"
                                                           value="{{ $enterprice->email_enterprice }}" required>
                                                    <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="">Teléfono </label>
                                                    <input type="text" class="form-control"
                                                           name="telephone_enterprice"
                                                           value="{{ $enterprice->telephone_enterprice }}"
                                                    >
                                                    <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label>Selecciona una Categoría</label>
                                                    <select class="form-control" name="category">
                                                        <option value="all" selected>Selecciona categoría</option>
                                                        @foreach($categories as $category)
                                                            @if($category->id == $enterprice->category)
                                                                <option value="{{ $category->id }}"
                                                                        selected>{{ $category->name }}</option>
                                                            @else
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Formas de Pago: </label>
                                                    <select name="payments_types" class="selectpicker form-control">
                                                        @if($enterprice->payments_types == 'Efectivo')
                                                            <option>Tipo de Pago :</option>
                                                            <option value="Efectivo" selected>Efectivo</option>
                                                            <option value="Otro">Cualquier tipo</option>
                                                        @elseif($enterprice->payments_types == 'Otro')
                                                            <option>Tipo de Pago :</option>
                                                            <option value="Efectivo">Efectivo</option>
                                                            <option value="Otro" selected>Cualquier tipo</option>
                                                        @else
                                                            <option>Tipo de Pago :</option>
                                                            <option value="Efectivo">Efectivo</option>
                                                            <option value="Otro">Cualquier tipo</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <p class="text-primary">¿Quieres agregar un video de Youtube en tu
                                                    presentación?</p>
                                                <label class="sr-only" for="youtube">Copía y pega el codígo del
                                                    video</label>
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <div class="input-group-addon">www.youtube.com/watch?v=</div>
                                                    <input type="text" class="form-control change-video" id="youtube"
                                                           name="youtube_presentation"
                                                           value="{{ $enterprice->youtube_presentation }}"
                                                           placeholder="kHHmd3pLaPU">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                @if(!empty($enterprice->youtube_presentation))
                                                    <div class="container-video-youtube">
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            <p class="text-success">¿Esté es tu video?</p>
                                                            <iframe id="iframeyoutube" class="embed-responsive-item"
                                                                    src="//www.youtube.com/embed/{{$enterprice->youtube_presentation}}"></iframe>
                                                        </div>
                                                    </div>
                                                @endif
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
                                            @if(!empty($services))
                                                @foreach($services as $service)
                                                    <div class="new_service col-sm-3 col-md-3">
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="">Servicio: </label>
                                                            <input type="text" class="form-control form-services"
                                                                   value="{{$service->name_service}}" required>
                                                            <i class="fa fa-trash delete_service"
                                                               id_service="{{ $service->id }}"></i>
                                                            <span class="material-input"></span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Proyectos</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="{{base_url('index.php/Proyect/create/?id_enterprice='.$enterprice->id)}}"
                                                   class="btn btn-primary" data-lity>Agregar Proyecto</a>
                                            </div>
                                        </div>
                                        <div class="row container_proyects">
                                            <div class="col-sm-12 proyects-link">
                                                @if(!empty($proyects))
                                                    @foreach($proyects as $proyect)
                                                        <a href="{{base_url('index.php/Proyect/modify/'.$proyect->id)}}"
                                                           id_proyect="{{$proyect->id}}"
                                                           class="btn btn-info btn-proyect"
                                                           data-lity>{{ $proyect->title }}
                                                            <i class="fa fa-trash delete-proyect"
                                                               id_proyect="{{$proyect->id}}" aria-hidden="true"></i>
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Descripción de la empresa</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="">Descripción Corta: *</label>
                                                    <input type="text" class="form-control" name="basic_description"
                                                           value="{{ $enterprice->basic_description }}" required>
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="">Descripción Larga: *</label>
										<textarea name="large_description" style="width: 100%;" required>
											{{ $enterprice->large_description }}
										</textarea>
                                            <span class="material-input"></span></div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary pull-right">Actualizar</button>

                            </form>

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

    <script>


        callDropzone();


        $('.delete_img').click(function (event) {
            event.preventDefault();
            var element = $(this);
            var id = $(this).attr("file");
            deleteimg(id, element);
        });


        function deleteimg(id_file, element) {

            $.ajax({
                method: "POST",
                url: "{{ base_url('/index.php/Enterprice/detele_img') }}",
                data: {id_name: id_file}
            })
                    .done(function (msg) {
                        element.parents('.img').remove();
                    });

        }


        $('.select_locality').change(function (event) {
            $('#codigo_id').val($(".select_locality").val());
        });


        $('#zip_code').focusout(function (event) {
            var zip_code = $(this).val();
            find_zip(zip_code);
        });


        function find_zip(zip_code) {
            $.ajax({
                method: "GET",
                url: "{{ base_url('index.php/'.$model.'/zip_code') }}",

                data: {
                    zip: zip_code,
                },
                success: function (resp) {
                    console.log(resp);
                    var tam = resp.length;
                    var select = $('.select_locality');
                    if (tam >= 1) {
                        $('#state').val(resp[0].estado);
                        $('#municipality').val(resp[0].municipio);
                        select.html('');
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

        function callDropzone() {
            Dropzone.options.myDropzoneGallery = {
                url: '{{ base_url('index.php/Enterprice/upload') }}',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 8, // MB
                acceptedFiles: 'image/*',
                maxFiles: 10,
                dictDefaultMessage: "Agrega imagenes",
                dictMaxFilesExceeded: "Solo es posible agregar 10 imagenes",
                success: function (file, response) {
                    if (file.previewElement) {
                        return file.previewElement.classList.add("dz-success");
                    }
                },
            }
        }

    </script>


    <!-- Google maps -->
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3f51CKdNudyXp2M9d6lcpJJXcAYXH2Rw&callback=map_create">
    </script>

    <script>
        $('.add_service').click(function () {
            $('.container_services').append('<div class="col-sm-3 col-md-3 new_service"><div class="form-group label-floating is-empty"><label class="">Servicio: </label><input type="text" class="form-control"name="name_service[]" required><i class="fa fa-trash delete_service"></i><span class="material-input"></span></div></div>');
        });

        $('.container_services').on('click', '.delete_service', function () {
            //$(this).parents('.new_service').remove();
            var element = $(this).parents('.new_service');
            var id_s = $(this).attr('id_service');
            deleteservice(id_s, element);
        });

        function deleteservice(id_s, element2) {

            $.ajax({
                method: "POST",
                url: "{{ base_url('/index.php/Service/delete') }}",
                data: {id: id_s}
            })
                    .done(function (msg) {
                        element2.remove();
                    });

        }


        $(document).on('lity:close', function (event, instance) {
            var prueba = $('.lity-iframe').contents().find('.lity-iframe-container');
            var title_proyect = prueba.find('iframe').contents().find('.title_proyect').val();
            var id_proyect = prueba.find('iframe').contents().find('.id_enterprice').val();
            console.log(id_proyect);
            console.log(title_proyect);

            if (typeof id_proyect != 'undefined') {
                var ids = [];
                $('.btn-proyect').each(function (index) {
                    //console.log($( this ).attr('id_proyect'));
                    //console.log(parseInt(id_proyect));
                    console.log($(this).attr('id_proyect'));
                    ids.push($(this).attr('id_proyect'));
                });
                console.log(ids);

                console.log($.inArray(id_proyect, ids));

                if ($.inArray(id_proyect, ids) == -1) {
                    $('.proyects-link').append('<a href="{{ base_url('index.php/Proyect/modify') }}/' + id_proyect + '" id_proyect="' + id_proyect + '" class="btn btn-info btn-proyect" data-lity>' + title_proyect + ' <i class="fa fa-trash delete-proyect" id_proyect="' + id_proyect + '" aria-hidden="true"></i></a>');
                    ids.push(id_proyect);
                }
            }

        });


        $(document).on('click', '.delete-proyect', function (event) {
            event.stopPropagation();
            event.preventDefault();
            var id_proyect = $(this).attr('id_proyect');
            deleteProyect(id_proyect, $(this));

            function deleteProyect(id_s, element) {

                $.ajax({
                    method: "POST",
                    url: "{{ base_url('/index.php/Proyect/delete') }}",
                    data: {id: id_s}
                })
                        .done(function (msg) {
                            element.parents('.btn-proyect').remove();
                        });

            }

        });


        $('.change-video').focusout(function (event) {
            $('.container-video-youtube').stop().fadeOut();
            var code_youtube = $(this).val();
            change_video(code_youtube);
        });

        function change_video(code) {
            url = '//www.youtube.com/embed/' + code;
            $('#iframeyoutube').attr('src', url);
            $('.container-video-youtube').stop().fadeIn();
        }


    </script>


@endsection
