@extends('basesystem')

@section('title_section', 'Creando Servicio')


@section('content')

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header" data-background-color="purple">
							<h4 class="title">Crear Servicio</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<div class="col-sm-12">
									<form class="" action="{{ base_url('index.php/Service/register')}}" method="post">
										<div class="row">
											@include('msg.create')
											<div class="col-md-4">
												<div class="form-group label-floating is-empty">
													<label class="">Nombre de Servicio: *</label>
													<input type="text" class="form-control" name="name_service" required>
													<span class="material-input"></span>
												</div>
											</div>

											<!-- .-->
											<div class="col-md-4">
												<div class="form-group label-floating is-empty">
													<label class="">Costo Minimo:</label>
													<input type="number" class="form-control" name="cost_service_min">
													<span class="material-input"></span>
												</div>
											</div>


											<div class="col-md-4">
												<div class="form-group label-floating is-empty">
													<label class="">Costo Maximo:</label>
													<input type="number" class="form-control" name="cost_service_max">
													<span class="material-input"></span>
												</div>
											</div>

										</div>







										<div class="col-md-4">

											<div class="form-group label-floating is-empty">
												<label class="">Tiempo de Servicio: </label>
												<input type="text" class="form-control" name="time_service"  required>
												<span class="material-input"></span></div>
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

	</script>

@endsection
