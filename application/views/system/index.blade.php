@extends('basesystem')

@section('title_section', 'Panel de Control')

@section('content')

	<div class="content">
		<div class="col-sm-12">
			<div class="card" style="padding:40px;">
				<div class="card-block">
					<h3 class="step1">Hola,  {{ $_SESSION['user']->first_name }}</h3>
          <p class="step2"> A partir de este momento puedes dar de alta tu negocio en la plataforma. </p>
          <a href="#" class="btn btn-large btn-success hidden-xs hidden-sm startIntro_desktop">Click para empezar</a>
          <a href="#" class="btn btn-large btn-info hidden-md hidden-lg startIntro_mobile">Click para empezar</a>
				</div>
			</div>
		</div>
	</div>

@endsection


@section('js')

	<script type="text/javascript">
		$(document).ready(function(){
			// Javascript method's body can be found in assets/js/demos.js
			demo.initDashboardPageCharts();

		});
	</script>

  <script type="text/javascript">

      $('.startIntro_desktop').click(function(){
        startIntro_desktop();
      });

      function startIntro_desktop(){
        var intro = introJs();
          intro.setOptions({
            doneLabel : "Entendido",
            steps: [
              {
                element: document.querySelector('.step-enterprice'),
                intro: "Para dar de alta tu empresa, da click en el botón empresas",
                position: 'right'
              },
            ]
          });

          intro.start();
      }

      $('.startIntro_mobile').click(function(){
        startIntro_mobile();
      });

      function startIntro_mobile(){
        var intro = introJs();
          intro.setOptions({
            doneLabel : "Entendido",
            steps: [
              {
                element: document.querySelector('.navbar-toggle'),
                intro: "Para dar de alta tu empresa, da click en el botón empresas",
                position: 'left'
              },
            ]
          });

          intro.start();
      }



    </script>

@endsection
