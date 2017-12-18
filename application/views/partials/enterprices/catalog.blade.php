
@if(!empty($enterprices))

  <?php $i = 0; ?>

  @foreach($enterprices as $enterprice)

  <div class="media">
    <div class="media-left media-middle">
      <a href="{{ base_url('/index.php/Pages/detail/'.$enterprice->slug)}}">
        @if($images[$i] != 'vacio')
        <img class="media-object" src="{{ base_url('/uploads/img/enterprices/'.$images[$i]) }}" alt="Imagen" style="width:60px">
        @else
        <img class="media-object" src="{{ base_url('/assets/img/default.jpg') }}" alt="Imagen Default" style="width:60px">
        @endif
      </a>
    </div>
    <div class="media-body">
      <div class="col-sm-12">
        <h4 class="media-heading">{{ $enterprice->name }}</h4>
      </div>
      <div class="col-sm-4">
        {{ $enterprice->estado }}, {{ $enterprice->municipio }}
        <br>Tel. {{ $enterprice->telephone }}
      </div>
      <div class="col-sm-8">
        <span class="card-text">{{ $enterprice->description }}</span>
        <br>
        <a href="{{ base_url('/index.php/Pages/detail/'.$enterprice->slug)}}" class="btn btn-primary btn-sm pull-right"> Cononcer más </a>
      </div>
    </div>
    </hr>
  </div>



  <?php $i++ ?>
  @endforeach

@endif
