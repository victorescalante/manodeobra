@if(!empty($images_proyects))
<div class="col-sm-12"> 
  @foreach($images_proyects as $key =>  $image)
    @if($image != "vacio")
    <div class="container_images_proyect"> 
      @foreach($image as $single)
        @if($single->Proyect_idProyect == $proyect->id)
          
            <a href="{{base_url('/uploads/img/proyects/').'/'.$single->name_file}}">
            <img src="{{base_url('/uploads/img/proyects/').'/'.$single->name_file}}" class="img-thumbnail" style="max-width:100px"></a>
          
        @endif
      @endforeach
      </div>
    @endif  
  @endforeach
  </div>
@endif