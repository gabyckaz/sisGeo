@extends('reporte')

@section('contenido')
<div class="col-md-7 col-md-offset-2">
  <div class="box box-warning">
    <div class="box-header">
      <div class="row">
      <!--Titulo del reporte-->
      <div class="text-center" >
        <img src="./images/logogeo.png">
      </div>
      <h2 class="text-center"><strong>Listado de Rutas Turísticas</strong></h2>
        <h4 class="text-left">Fecha de emisión: <strong>{{date('d/m/y g:i a')}}</strong></h4>
        <h4 class="text-left">Usuario: <strong>{{Auth::user()->name}}</strong></h4>
     </div>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered"  style="table-layout: fixed" id='tablaadminRutaTuristica'>
          <thead>
            <tr>
              <th class="text-center">Nombre de Ruta</th>
              <th class="text-center">Datos Generales</th>
              <th class="text-center">Descripción</th>
              <th class="text-center">País</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rutas as $ruta)
              <tr>
                <td style="max-width: 10px; overflow: hidden; white-space: wrap;">{{$ruta->NombreRutaTuristica}}</td>
                <td style="max-width: 100px; overflow: hidden; white-space: wrap;">{{$ruta->DatosGenerales }}</td>
                <td style="max-width: 100px; overflow: hidden; white-space: wrap;" >{{$ruta->DescripcionRutaTuristica }}</td>
                <td>{{$ruta->pais->nombrePais}}</td>
              </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
@endsection
