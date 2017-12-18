@extends('basesystem')


@section('title_section')

<a class="navbar-brand" href="#">{{ isset($text_section) ? $text_section : 'Bienvenidos a Manos a la Obra' }}<div class="ripple-container"></div></a>

@endsection




@section('content')
	<input type="hidden" class="type_form" value="{{ $model }}">
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				@include('msg.create')
				<div class="col-md-12">
					<div class="card">
						<div class="card-header" data-background-color="purple">
							<h4 class="title">{{ $type }}s</h4>
							<p class="category">A continuación se muestran los {{ $type }}s registrados en el sistema</p>
						</div>
						<div class="card-content">
							<div class="row">
								<div class="col-sm-12">

									<a href="{{base_url('index.php/'.$model.'/create')}}" class="btn btn-primary pull-right"> Crear {{ $type }}  <i class="material-icons">face</i></a>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="table-responsive">
										<table class="table table-striped table-bordered" cellspacing="0" width="100%">
											<thead>
											<tr>
												@foreach($columns as $id => $value)
												<th>{{ $id }}</th>
												@endforeach
												<th>Acciones</th>
											</tr>
											</thead>
											<tfoot>
											<tr>
												@foreach($columns as $id => $value)
													<th>{{ $id }}</th>
												@endforeach
													<th>Acciones</th>
											</tr>
											</tfoot>
											<tbody>
											@foreach($data as $entity)
												<tr>
													@foreach($columns as $id => $value)
													<td>{{ $entity->$value }}</td>
													@endforeach
														<td class="td-actions text-right">
															</button>
															<a href="{{ base_url('index.php/'.$model.'/modify/'.$entity->id) }}" rel="tooltip" title="Editar Perfil" class="btn btn-success btn-simple btn-xs">
																<i class="fa fa-edit"></i>
															</a>
															<button type="button" id_element="{{$entity->id}}" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs detele_r">
																<i class="fa fa-times"></i>
															</button>
														</td>
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

		$('.table').DataTable();

	});

	</script>

	<script>

		$(document).ready(function() {

			var type = $('.type_form').val();


			$('.detele_r').click( function(event){
				var element = $(this);
				var id = element.attr('id_element');
				deleteOfModel(id,element);
			});



			//Functions
			function deleteOfModel(id,element){
				modalSystem("Eliminacion","Estas a punto de eliminar el registro");
				$('.t_action_system').click(function(){
						$('#modal_system').modal('hide');
						Ajax_delete(type,id);
						element.parents('tr').remove();
				});
			}


			function modalSystem(title="Alerta",msg="Terminar la operación"){
					$('#modal_system_label').text(title);
					$('#modal_system_msg').text(msg);
					$('#modal_system').modal();
			}

			function Ajax_delete(model,id){


				var respuesta = $.ajax({
	        method: "POST",
	        url: model+"/delete",
	        data: {
	          id: id,
	        },
	        success: function (resp) {

				console.log("Todo ok");

	        },

	        error: function( req, status, err ) {

				console.log(req.responseText);

	        },

	      });


			}

		}); //end

	</script>

@endsection
