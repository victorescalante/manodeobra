<div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
<!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

      Tip 2: you can also add an image using data-image tag
  -->

<div class="logo">
  <a href="{{ base_url('index.php/')}}" class="simple-text">
    Manos de Obra
  </a>


</div>

  <div class="sidebar-wrapper">
        <ul class="nav">
            @if(isset($_SESSION['user']) && $_SESSION['user']->type_user == ('1' || '1000'))
                <li class="active">
                    <a href="{{ base_url('index.php/admin')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li>
                    <a class="step-enterprice" href="{{ base_url('index.php/Enterprice')}}">
                        <i class="material-icons">content_paste</i>
                        <p>Empresas</p>
                    </a>
                </li>

                 @endif
                @if(isset($_SESSION['user']) && $_SESSION['user']->type_user == '1000')

              <li>
                  <a href="{{ base_url('index.php/Proyect')}}">
                      <i class="material-icons">library_books</i>
                      <p>Proyectos</p>
                  </a>
              </li>


                <li>
                    <a href="{{ base_url('index.php/User')}}">
                        <i class="material-icons">person</i>
                        <p>Usuarios</p>

                    </a>
                </li>
                <li>
                    <a href="{{ base_url('index.php/Service')}}">
                        <i class="material-icons">bubble_chart</i>
                        <p>Servicios</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons">location_on</i>
                        <p>Archivos</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons text-gray">notifications</i>
                        <p>Páginas</p>
                    </a>
                </li>
             @endif
        </ul>
  </div>
</div>
