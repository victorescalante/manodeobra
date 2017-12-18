@if(!empty($days))
<div class="panel panel-info">
  <div class="panel-heading">Horario de atención</div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Día</th>
            <th>Abrimos</th>
            <th>Cerramos</th>
          </tr>
        </thead>
        <tbody>
          @foreach($days as $day => $key)
            <tr>
              <td>{{ $day }}</td>
              <td>{{ $key->start }}</td>
              <td>{{ $key->end }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endif
