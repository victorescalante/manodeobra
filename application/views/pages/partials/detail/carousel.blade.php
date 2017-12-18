<div class="card card-raised card-carousel">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel slide" data-ride="carousel">

            <!-- Indicators -->

            <ol class="carousel-indicators">
              <?php $i=0 ?>
              @foreach($images as $image)
                @if($i==0)
                  <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="active"></li>
                @else
                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
                @endif
                <?php $i++ ?>
              @endforeach
            </ol>


            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <?php $i=0 ?>
                @foreach($images as $image)

                @if($i==0)
                <div class="item active">
                    <img class="img-responsive" style="width:100%" src="{{ base_url('/uploads/img/enterprices/'.$image->name_file) }}" alt="Awesome Image">
                    <div class="carousel-caption">
                        <h4><i class="material-icons">location_on</i>{{ $enterprice->name_enterprice}}</h4>
                    </div>
                </div>
                @else
                <div class="item">
                    <img class="img-responsive" style="width:100%" src="{{ base_url('/uploads/img/enterprices/'.$image->name_file) }}" alt="Awesome Image">
                    <div class="carousel-caption">
                        <h4><i class="material-icons">location_on</i>{{ $enterprice->name_enterprice}}</h4>
                    </div>
                </div>

                @endif
                <?php $i++ ?>
                @endforeach
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <i class="material-icons">keyboard_arrow_left</i>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <i class="material-icons">keyboard_arrow_right</i>
            </a>
        </div>
    </div>
</div>