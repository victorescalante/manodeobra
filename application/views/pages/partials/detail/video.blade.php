@if(!empty($enterprice->youtube_presentation))
	<div class="panel panel-success">
		<div class="panel-heading">Video de presentación</div>
		<div class="panel-body">
		<div class="embed-responsive embed-responsive-16by9">
		  <iframe id="iframeyoutube" class="embed-responsive-item" src="//www.youtube.com/embed/{{$enterprice->youtube_presentation}}"></iframe>
		  </div>
		</div>
	</div>
@endif