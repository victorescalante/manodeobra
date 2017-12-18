<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ base_url('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{ base_url('assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Manos de obra | @yield('title','Inicio')</title>


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="description" content="Manos de obra es un directorio digital para encontrar constructores, alabañiles, arquietecto, ingenieros y más, si necesitas remodelar o hacer una nueva construcción busca los mejores perfiles sin necesidad de recomendaciones, facíl y rápido.">

     <meta name="keywords" content="Directorio web, construciones en Toluca, Constructoras en México albañiles en querretaro">
    <meta name="autor" content="Victor Escalante @victorlt - Pamela Badillo">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{ base_url('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ base_url('assets/css/material-kit.css')}}" rel="stylesheet"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ base_url('assets/css/demo_site.css')}}" rel="stylesheet" />

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="{{ base_url('/assets/css/lity.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ base_url('/bower_components/lightgallery/dist/css/lightgallery.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ base_url('/assets/css/app.css') }}">

</head>

<body class="index-page">

<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ base_url('/') }}">
                <div class="logo-container">
                    <div class="logo">
                        <img src="{{ base_url('assets/img/logo1.jpg')}}"  >
                    </div>
                    <div class="brand">
                        Manos de Obra
                    </div>


                </div>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navigation-index">
            <ul class="nav navbar-nav navbar-right">
                @if(!isset($_SESSION['logged']))
                <li>
                    <a href="{{ base_url('index.php/User/create') }}">
                        <i class="material-icons">dashboard</i> Registrate
                    </a>
                </li>
                <li>
                    <a href="{{ base_url('index.php/login') }}">
                        <i class="material-icons">unarchive</i> Inicia sessión
                    </a>
                </li>
                @else
                  <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                          <i class="material-icons">person</i>
                          <!-- <span class="notification">0</span> -->
                          {{ $_SESSION['user']->first_name }}
                          <p class="hidden-lg hidden-md">Notificaciones</p>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ base_url('index.php/Admin') }}">Escritorio</a></li>
                          <li><a href="{{ base_url('index.php/User/modify/'.$_SESSION['user']->id) }}">Mi cuenta</a></li>
                          <li><a href="{{ base_url('/index.php/login/logout') }}">Salir</a></li>
                        </ul>
                      </li>
                  </ul>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->


@yield('content')


</body>

@yield('js')



<!-- Start of manosdeobra Zendesk Widget script -->
<script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(e){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var o=this.createElement("script");n&&(this.domain=n),o.id="js-iframe-async",o.src=e,this.t=+new Date,this.zendeskHost=t,this.zEQueue=a,this.body.appendChild(o)},o.write('<body onload="document._l();">'),o.close()}("https://assets.zendesk.com/embeddable_framework/main.js","manosdeobra.zendesk.com");
/*]]>*/</script>
<!-- End of manosdeobra Zendesk Widget script -->

</html>
