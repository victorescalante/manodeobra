<form class="" action="{{ base_url('index.php/Pages/enterprices')}}" method="get">

    <div class="container-fluid">

      <div class="section-search row">

        <div class="col-sm-3">
            <div class="form-group ">
              <label class="control-label" style="color:#9c27b0;">Selecciona una Categoría</label>
              <select class="form-control" name="category_id" required>
                <option value="" selected>Selecciona una categoría</option>
                <option value="all">Todas las categorias</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group ">
              <label class="control-label" style="color:#9c27b0;">Selecciona un Estado</label>
              <select class="form-control select_states" name="state_id" required>
                <option value="" selected>Selecciona un Estado</option>
                <option value="all" >Todos los Estados</option>
                @foreach($states as $state)
                <option value="{{ $state->idEstado }}">{{ $state->estado }}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group ">
              <label class="control-label" style="color:#9c27b0;">Selecciona un Municipio</label>
              <select class="form-control select_municipality_id"  name="municipality_id">
              <option value="0">En todos los municipios</option>
              </select>
            </div>
        </div>

        <div class="col-sm-2" style="padding-top: 45px;">
          <button class="btn btn-primary btn-small">Buscar
            <div class="ripple-container"></div></button>
        </div>
      </div>
    </div>

  </form>
