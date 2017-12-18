@extends('basesystem')

@section('title_section', 'Modificar Proyecto')


@section('content')

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						@include('msg.create')
						<div class="card-header" data-background-color="purple">
							<h4 class="title">Modificar Proyecto - {{ $proyect->title }}</h4>
						</div>
						<div class="card-content">
							<div class="row">

								<div class="col-sm-12">
										<label class="control-label">Agrega una galería de imagenes</label>
										<form enctype="multipart/form-data" class="dropzone" id="myDropzoneGallery">
											<input type="hidden" value="{{ $proyect->id}}" name="id">
										</form>
								</div>
							</div>

							@if(!empty($files))
								<div class="row">
										<div class="col-sm-12">
											<div class="container" style="padding: 15px;">
												@foreach($files as $file)
												<div class="img {{ ($file->status_file == 1) ? 'img-active' : 'img-disabled' }}" style="max-width:150px;display: inline-block;padding: 0px 5px;">
													<img src="{{ base_url('/uploads/img/proyects/'.$file->name_file) }}">
													<a href="#" file="{{$file->id}}" class="delete_img">Elimar la imagen</a>
												</div>
												@endforeach
											</div>
										</div>

								</div>
							@endif

							<div class="row">
								<div class="col-sm-12">
									<form class="" action="{{ base_url('index.php/Proyect/update')}}" method="post">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group label-floating is-empty">
													<label class="">Titulo: *</label>
													<input id="id_enterprice_hidden" type="hidden" value="{{$proyect->Enterprice_idEnterprice}}">
													<input type="hidden" class="form-control id_enterprice" name="id"  value="{{ $proyect->id }}" >
													<input type="text" class="form-control title_proyect" name="title"  value="{{ $proyect->title }}" required>
													<span class="material-input"></span>
												</div>
											</div>

											<!-- .-->
											<div class="col-md-4">
												<div class="form-group label-floating is-empty">
													<label class="">Encabezado:</label>
													<input type="text" class="form-control" name="header" value="{{ $proyect->header }}" required>
													<span class="material-input"></span>
												</div>
											</div>


											<div class="col-md-4">
												<div class="form-group label-floating is-empty">
													<label class="">Lugar de Proyecto</label>
													<input type="text" class="form-control" name="place_of_proyect" value="{{ $proyect->place_of_proyect }}" required>
													<span class="material-input"></span>
												</div>
											</div>

										</div>







									<div class="row">

										<div class="col-md-4">

											<div class="form-group label-floating is-empty">
												<label class="">Tiempo de Proyecto: </label>
												<input type="text" class="form-control" name="time_of_proyect" value="{{ $proyect->time_of_proyect }}" required>
												<span class="material-input"></span>
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label>Metodos de pago</label>
											<select name="method_of_payment" class="selectpicker form-control" >
												@if($proyect->method_of_payment == 'Efectivo')
												<option>Tipo de Pago :</option>
												<option value="Efectivo" selected>Efectivo</option>
												<option value="Otro">Otro</option>
												@elseif($proyect->method_of_payment == 'Otro')
												<option>Tipo de Pago :</option>
												<option value="Efectivo" >Efectivo</option>
												<option value="Otro" selected>Otro</option>
												@else
												<option>Tipo de Pago :</option>
												<option value="Efectivo" >Efectivo</option>
												<option value="Otro">Otro</option>
												@endif
												</select>
												</div>
									</div>

								</div>



									<div class="row">
									<div class="col-md-12">
										<div class="form-group label-floating is-empty">
											<label class="">Descripción: </label>
											<textarea name="description" style="width: 100%;" required>
												{{ $proyect->description }}
											</textarea>
											<span class="material-input"></span></div>
									</div>
								</div>



								</div>
								<button type="submit" class="btn btn-primary pull-right">Enviar</button>

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

<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
//]]>
</script>

	<script>


	callDropzone();

	$('.delete_img').click(function (event) {
		event.preventDefault();
		var element = $(this);
		var id = $(this).attr("file");
		deleteimg(id,element);
	});


	function deleteimg(id_file,element){

		$.ajax({
			method: "POST",
			url: "{{ base_url('/index.php/Proyect/detele_img') }}",
			data: { id_name: id_file }
		})
			.done(function( msg ) {
			element.parents('.img').remove();
		});

	}

		$(document).ready(function() {
			$('.table').DataTable( {
				"language": {
					"lengthMenu": "Se muestran _MENU_ registros por página",
					"zeroRecords": "No hay registros con el criterio de busqueda",
					"info": "Estas viendo la p'agina _PAGE_ de _PAGES_",
					"infoEmpty": "No hay registros",
					"infoFiltered": "(filtered from _MAX_ total records)",
					"loadingRecords": "Cargando ...",
					"processing":     "Procesando ...",
					"search":         "Buscar:"
				},
				buttons: [
					{
						extend: 'pdf',
						text: 'Save current page',
						exportOptions: {
							modifier: {
								page: 'current'
							}
						}
					}
				]
			} );
		} );


		function callDropzone() {
				Dropzone.options.myDropzoneGallery = {
						url: '{{ base_url('index.php/Proyect/upload') }}',
						paramName: "file", // The name that will be used to transfer the file
						maxFilesize: 2, // MB
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

@endsection
