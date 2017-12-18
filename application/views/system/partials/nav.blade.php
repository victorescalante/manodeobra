<nav class="navbar navbar-transparent navbar-absolute">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      @yield('title_section')
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        @if(isset($_SESSION['logged']))
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="material-icons">person</i>
              <span class="notification">0</span>
              <p class="hidden-lg hidden-md">Notifications</p>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{ base_url('index.php/User/modify/'.$_SESSION['user']->id) }}">Mi cuenta</a></li>
              <li><a href="{{ base_url('/index.php/login/logout') }}">Salir</a></li>
            </ul>
          </li>
        @endif
      </ul>

      <form class="navbar-form navbar-right" role="search">
        <div class="form-group  is-empty">
          <input type="text" class="form-control" placeholder="Buscar">
          <span class="material-input"></span>
          <span class="material-input"></span></div>
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
          <i class="material-icons">search</i><div class="ripple-container"></div>
        </button>
      </form>
    </div>
  </div>
</nav>
