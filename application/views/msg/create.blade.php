@if(!empty($msg))

    <div class="alert alert-success">
        <div class="container-fluid">
            <div class="alert-icon">
                <i class="material-icons">check</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <b>Alerta exitosa</b> El registro ha sido guardado exitosamente.
        </div>
    </div>

@endif


@if(!empty($errors))

    <div class="alert alert-danger">
        <div class="container-fluid">
            <div class="alert-icon">
                <i class="material-icons">check</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            @foreach($errors as $error)
							<p>{{ $error }}</p>
						@endforeach
        </div>
    </div>

@endif


@if(!empty($error_msg))

    <div class="alert alert-danger">
        <div class="container-fluid">
            <div class="alert-icon">
                <i class="material-icons">check</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
                <p>{{ $error_msg }}</p>
        </div>
    </div>

@endif