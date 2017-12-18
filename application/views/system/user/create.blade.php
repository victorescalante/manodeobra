@extends('basesystem')

@section('title_section', 'Creando Usuario')


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h3 class="title text-center">Crear cuenta de usuario</h3>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-2">
                                    <div class="row">
                                        @include('msg.create')
                                        <div class="col-sm-12">
                                            <br/><br/>
                                            <p>Bienvenido, el equipo de  <b>Manos de Obra</b> estamos muy contentos por que seas parte de nuestra red de contactos, en donde podrás de forma facíl y rapida
                                                publicar los servicios que ofreces y asi expandir tu negocio a más lugares y mucho más clientes.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label">Foto de Perfil</label>
                                            <form enctype="multipart/form-data" class="dropzone" id="myDropzone"></form>
                                        </div>
                                        <div class="col-sm-5">
                                            <br><br>
                                            <p>Puedes agregar tu Foto de perfil despues de registrarte si así lo deseas.</p>
                                            <p><b>Recuerda que los negocios con imagenes regularmente son más visitados por los suuarios.</b></p>
                                        </div>
                                    </div>
                                    <form enctype="multipart/form-data"
                                          action="{{ base_url('index.php/User/register')}}" method="post">

                                        <div class="row">

                                            <div class="col-sm-3">

                                                <div class="form-group ">
                                                    <label class="control-label">Nombre(s): *</label>
                                                    <input type="text" class="form-control" name="first_name"
                                                           value="{{ set_value('first_name') }}" required>
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group ">
                                                    <label class="control-label">Apellido(s): *</label>

                                                    <input type="text" class="form-control" name="last_name"
                                                           value="{{ set_value('last_name') }}" required>
                                                    <span class="material-input"></span></div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label">Elige un Username: *</label>
                                                    <input type="text" class="form-control" name="username"
                                                           value="{{ set_value('username') }}" required>
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-sm-3">
                                                <div class="form-group ">
                                                    <label class="control-label">E-mail: *</label>
                                                    <input type="email" class="form-control" name="email_user"
                                                           value="{{ set_value('email_user') }}" required>
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group ">
                                                    <label class="control-label">Contraseña: *</label>
                                                    <input type="password" class="form-control"
                                                           value="{{ set_value('pass') }}" name="password" required>
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group ">
                                                    <label class="control-label">Repite Contraseña: *</label>
                                                    <input type="password" class="form-control"
                                                           value="{{ set_value('pass') }}" name="confirm_password" required>
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>

                                        </div>




                                        <div class="row">
                                            <div class="col-sm-3">

                                                <div class="form-group">
                                                    <label class="control-label">Seleciona sexo: </label>

                                                    @if(  set_value('sex_user')  == "M"  )
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
                                                    @else
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



                                                    @endif
                                                </div>

                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary btn-lg pull-right">Registrarme Ahora</button>

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


@endsection
