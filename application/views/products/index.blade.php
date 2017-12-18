@extends('app')

@section('title', 'Inicio')

@section('content')



<div class="wrapper">
    <div class="header header-filter"
         style="height: 250px;background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
          <div class="pricing-2 pricing-manos">
            <div class="row">

            <div class="col-md-4">
              <div class="card card-pricing card-plain">
                <div class="card-content">
                  <h6 class="category text-info">Basico</h6>
                  <h1 class="card-title"><small>$</small>50<small>/año</small></h1>
                  <ul>
                    <li><b>1</b> Empresa</li>
                    <li><b>10</b> Proyectos</li>
                    <li><b>Si</b> Contacto Personal</li>
                    <li><b>5</b> Contenido Multimedia</li>
                  </ul>
                  <a href="{{ base_url('index.php/products/buy/1') }}" class="btn btn-rose btn-raised btn-round">
                    Comprar ahora
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-pricing card-raised">
                <div class="card-content content-rose">
                  <h6 class="category text-info">Premium</h6>
                  <h1 class="card-title text-primary"><small class="text-primary">$</small>200<small class="text-primary">/año</small></h1>
                  <ul>
                    <li><b>5</b> Empresa</li>
                    <li><b>100</b> Proyectos</li>
                    <li><b>Si</b> Contacto Personal</li>
                    <li><b>100</b> Contenido Multimedia</li>
                  </ul>
                  <a href="{{ base_url('index.php/products/buy/2') }}" class="btn btn-primary btn-raised btn-round">
                    Comprar ahora
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-pricing card-plain">
                <div class="card-content">
                  <h6 class="category text-info">Platinum</h6>
                  <h1 class="card-title"><small>$</small>750<small>/año</small></h1>
                  <ul>
                    <li><b>25</b> Empresa</li>
                    <li><b>ilimitado</b> Proyectos</li>
                    <li><b>Si</b> Contacto Personal</li>
                    <li><b>1500</b> Contenido Multimedia</li>
                  </ul>
                  <a href="{{ base_url('index.php/products/buy/3') }}" class="btn btn-rose btn-raised btn-round">
                    Comprar ahora
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
                        Inicio
                    </a>
                </li>
            </ul>
        </nav>
        <p class="copyright pull-right">
            &copy;
            <script>document.write(new Date().getFullYear())</script>
            UTVT - developers 82
        </p>
    </div>
</footer>
</div>
</div>




@endsection
