@extends('basesystem')

@section('title_section', 'Administración de Usuarios')


@section('content')

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header" data-background-color="purple">
							<h4 class="title">Usuarios</h4>
							<p class="category">A continuación se muestran los usuarios registrados en el sistema</p>
						</div>
						<div class="card-content">
							<div class="row">
								<div class="col-sm-12">
									<a href="{{base_url('index.php/User/create')}}" class="btn btn-primary pull-right"> Crear Usuario  <i class="material-icons">face</i></a>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="table-responsive">
										<table class="table table-striped table-bordered" cellspacing="0" width="100%">
											<thead>
											<tr>
												<th>id</th>
												<th>Nombre</th>
												<th>Usuario</th>
												<th>Correo</th>
												<th>Ciudad</th>
												<th>Acciones</th>
											</tr>
											</thead>
											<tfoot>
											<tr>
												<th>id</th>
												<th>Nombre</th>
												<th>Usuario</th>
												<th>Correo</th>
												<th>Ciudad</th>
												<th>Acciones</th>
											</tr>
											</tfoot>
											<tbody>
											@foreach($users as $user)
											<tr>
												<td>{{ $user->idUser }}</td>
												<td>{{ $user->first_name." ".$user->last_name }}</td>
												<td>{{ $user->username }}</td>
												<td>{{ $user->email_user }}</td>
												<td>{{ $user->city_user }}</td>
												<td>Botones</td>
											</tr>
											@endforeach
											</tbody>
										</table>
									</div>
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
