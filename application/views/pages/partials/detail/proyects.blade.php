@if(!empty($proyects))
  <h4>Proyectos realizados</h4>
  <br>
  <div class="panel-group" id="accordion">
    @foreach($proyects as $key => $proyect)
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}">{{ $proyect->title }}</a>
          </h4>
        </div>
          <div id="collapse{{$key}}" class="panel-collapse collapse {{ $key == 0 ? 'in' : '' }}">
          <div class="panel-body">
            <p><strong class="text-primary">Lugar del proyecto:</strong> {{ $proyect->place_of_proyect }}</p>
            <p><strong class="text-primary">Duración del proyecto:</strong> {{ $proyect->time_of_proyect }}</p>
            <br>
            <p>{{ $proyect->description }}</p><br>

            <div class="row">
              @include('pages.partials.detail.imageproducts')
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

@endif