<div class="panel panel-info">
  <div class="panel-heading">Contacto</div>
    <div class="panel-body">
      <h5>Medios de contacto</h5>
      @if(!empty($enterprice->address_enterprice))
      	<p style="text-transform: capitalize;"><strong class="text-primary">Dirección:</strong> {{ $enterprice->address_enterprice }}</p>
      @endif
      @if(!empty($enterprice->telephone_enterprice))
      <p><strong class="text-primary">Teléfono:</strong>  {{ $enterprice->telephone_enterprice }} </p>
      @endif
      @if(!empty($enterprice->email_enterprice))
      <p><strong class="text-primary">Correo electrónico:</strong>  {{ $enterprice->email_enterprice }} </p>
      @endif
  </div>
</div>