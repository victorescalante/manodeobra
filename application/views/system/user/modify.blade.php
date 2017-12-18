@extends('basesystem')

@section('title_section', 'Creando Usuario')


@section('content')

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header" data-background-color="purple">
							<h3 class="title">Crear cuenta de usuario</h3>
						</div>
						<div class="card-content">
							<div class="row">
								<div class="col-sm-12">
									<div class="row">
										@include('msg.create')
										<div class="col-sm-12">
											<p>Hola, el equipo de  <b>Manos de Obra</b> estamos muy contentos por que seas parte de nuestra red de contactos, en donde podrás de forma facíl y rapida
												publicar los servicios que ofreces y asi expandir tu negocio a más lugares y mucho más clientes.</p>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<label class="control-label">Foto de Perfil</label>
											@if(isset($user->avatar))
													<div class="img-avatar" style="max_width:200px">
														<img class="img-responsive" src="{{ base_url('/uploads/img/avatars/'.$user->avatar) }}" >
													</div>
													<a href="#" class="delete_image_user"> Subir otra imagen </a>
											@endif
											<div class="form_perfil" <?php if(isset($user->avatar)){echo "style='display:none'";}else{echo "style='display:block'";} ?> >
												<form enctype="multipart/form-data" class="dropzone" id="myDropzone">
												<input type="hidden" class="form-control" name="id" value="{{ $user->id }}" required>
											</form>
										</div>
										</div>
									</div>
									<form enctype="multipart/form-data"
										  action="{{ base_url('index.php/User/update')}}" method="post">

										<div class="row">
											<div class="col-sm-3">
												<div class="form-group ">
													<label class="control-label">E-mail: *</label>
													<input type="email" class="form-control" name="email_user" value="{{ $user->email_user }}" required>
													<input type="hidden" class="form-control" name="id" value="{{ $user->id }}" required>
													<span class="material-input"></span>
												</div>
											</div>

											<div class="col-sm-3">
												<div class="form-group ">
													<label class="control-label">Contraseña: *</label>
													<input type="password" class="form-control" value="{{ $user->password }}" name="password">
													<span class="material-input"></span>
												</div>
											</div>

											<div class="col-sm-3">
												<div class="form-group ">
													<label class="control-label">Repite Contraseña: *</label>
													<input type="password" class="form-control" value="{{ $user->password }}"   name="confirm_password">
													<span class="material-input"></span>
												</div>
											</div>

										</div>

										<div class="row">

											<div class="col-sm-3">

												<div class="form-group ">
													<label class="control-label">Nombre: *</label>
													<input type="text" class="form-control" name="first_name"
														   value="{{ $user->first_name }}" required>
													<span class="material-input"></span>
												</div>
											</div>

											<div class="col-sm-3">
												<div class="form-group ">
													<label class="control-label">Apellido: *</label>

													<input type="text" class="form-control" name="last_name"
														   value="{{ $user->last_name }}" required>
													<span class="material-input"></span></div>
											</div>



										</div>

										<div class="row">
											<div class="col-md-10">

												<div class="form-group ">
													<label class="control-label">Dirección:: *</label>

													<input type="text" class="form-control" name="address_user"
														   value="{{ $user->address_user }}" >
													<span class="material-input"></span></div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-3">

												<div class="form-group ">
													<label class="control-label">Telefono: *</label>

													<input type="tel" class="form-control" name="telephone_user"
														   value="{{ $user->telephone_user }}"
														   pattern="[0-9]{10}">
													<span class="material-input"></span></div>
											</div>

										</div>

										<div class="row">
											<div class="col-sm-3">

												<div class="form-group">
													<label class="control-label">Seleciona sexo: </label>

													@if( $user->sex_user  == "M"  )
														<div class="radio">
															<label>
																<input type="radio" name="sex_user" value="M"
																	   checked="true">
																Masculino
															</label>
														</div>
														<div class="radio">
															<label>
																<input type="radio" name="sex_user" value="F">
																Femenino
															</label>
														</div>
													@elseif( $user->sex_user  == "F"  )
														<div class="radio">
															<label>
																<input type="radio" name="sex_user" value="M">
																Masculino
															</label>
														</div>
														<div class="radio">
															<label>
																<input type="radio" name="sex_user" value="F"
																	   checked="true">
																Femenino
															</label>
														</div>

														@else
															<div class="radio">
																<label>
																	<input type="radio" name="sex_user" value="M">
																	Masculino
																</label>
															</div>
															<div class="radio">
																<label>
																	<input type="radio" name="sex_user" value="F">
																	Femenino
																</label>
															</div>
													@endif
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

	<script>

		$(document).ready(function () {
			$('.table').DataTable({
				"language": {
					"lengthMenu": "Se muestran _MENU_ registros por página",
					"zeroRecords": "No hay registros con el criterio de busqueda",
					"info": "Estas viendo la p'agina _PAGE_ de _PAGES_",
					"infoEmpty": "No hay registros",
					"infoFiltered": "(filtered from _MAX_ total records)",
					"loadingRecords": "Cargando ...",
					"processing": "Procesando ...",
					"search": "Buscar:"
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
			});
		});

	</script>

	<script>

		$('.delete_image_user').click(function(event){
			event.preventDefault();
			$('.img-avatar,.delete_image_user').hide();
			$('.form_perfil').show();
		});

		$('.select_locality').change(function (event) {

			console.log($(".select_locality").val());
			$('#zipcode_user').val($(".select_locality").val());
		});


		$('#zip_code').focusout(function (event) {
			var zip_code = $(this).val();
			find_zip(zip_code);
		});

		callDropzone();


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
			Dropzone.options.myDropzone = {
				url: '{{ base_url('index.php/User/upload') }}',
				paramName: "file", // The name that will be used to transfer the file
				maxFilesize: 1, // MB
				acceptedFiles: 'image/*',
				maxFiles: 1,
				dictDefaultMessage: "Agrega la imagen de perfil",
				dictMaxFilesExceeded: "Solo es posible agregar una imagen",
				success: function (file, response) {
					if (file.previewElement) {
						return file.previewElement.classList.add("dz-success");
					}
				},
			}
		}

	</script>


@endsection
