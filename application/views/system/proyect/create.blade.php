@extends('basesystem')

@section('title_section', 'Creando Proyecto')


@section('content')

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header" data-background-color="purple">
							<h4 class="title">Crear Proyecto</h4>
						</div>
						<div class="card-content">
							<div class="col-sm-11">
								<div class="row">
									<div class="col-sm-12">
										<form class="" action="{{ base_url('index.php/Proyect/register')}}" method="post">
											<input  type="hidden" value="{{$id_enterprice}}" name="id_enterprice">
											<div class="row">
												@include('msg.create')
												<div class="col-md-4">
													<div class="form-group label-floating is-empty">
														<label class="">Titulo: *</label>
														<input type="text" class="form-control" name="title" required>
														<span class="material-input"></span>
													</div>
												</div>

												<!-- .-->
												<div class="col-md-4">
													<div class="form-group label-floating is-empty">
														<label class="">Encabezado:</label>
														<input type="text" class="form-control" name="header" required>
														<span class="material-input"></span>
													</div>
												</div>


												<div class="col-md-4">
													<div class="form-group label-floating is-empty">
														<label class="">Lugar de Proyecto</label>
														<input type="text" class="form-control" name="place_of_proyect" required>
														<span class="material-input"></span>
													</div>
												</div>

											</div>



										<div class="row">

											<div class="col-md-4">

												<div class="form-group label-floating is-empty">
													<label class="">Tiempo de Proyecto: </label>
													<input type="text" class="form-control" name="time_of_proyect" required>
													<span class="material-input"></span>
												</div>

											</div>



										<div class="col-sm-4">
											<div class="form-group">
												<label>Formas de pago</label>
											<select name="method_of_payment" class="selectpicker form-control" required>
		  									<option >Tipo de Pago:</option>
											  <option value="Efectivo" >Efectivo</option>
		  									<option value="Tarjeta de Credito" >Tarjeta de Debito</option>
												</select>
												</div>
										</div>

									</div>

									<div class="row">

										<div class="col-sm-12">
												<div class="form-group label-floating is-empty">
													<label class="">Descripción: </label>
													<textarea name="description" style="width: 100%;" required>
														Escribe la descripción completa de tu negocio
													</textarea>
													<span class="material-input"></span></div>
										</div>
									</div>



									</div>

									<div class="row">
										<div class="col-sm-10">
											<button type="submit" class="btn btn-primary pull-right">Siguiente ...</button>
										</div>
									</div>

									</form>
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

<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
//]]>
</script>

@endsection
