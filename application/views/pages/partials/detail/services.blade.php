@if(!empty($services))
<div class="panel panel-info">
<div class="panel-heading">Servicios</div>
  <div class="panel-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th colspan="2" class="text-center">Lista de Servicios</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        @foreach($services as $key => $service)
          <td>{{ $key + 1 }}</td>
          <td>{{ $service->name_service }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif