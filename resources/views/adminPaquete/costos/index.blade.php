@extends('master')

@section('head')

@endsection
@section('Title')
  <strong>Costos de transporte de paquetes</strong>
@endsection
@section('contenido')

  <div class="row">
    <div class="col-md-9 col-md-offset-1">
      @if(session('status'))
        <script type="text/javascript">
          alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4> {{ session("status") }}');
        </script>
      @endif
      @if(session('fallo'))
        <script type="text/javascript">
          alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{session("fallo") }}');
        </script>
      @endif

  <div class="box-body">
    <div class="box box-warning">
      <div class="box-header">
        <div class="box-tools pull-right">
          <a class="btn btn-info" title="Descargar como PDF" href="{{ route('adminPaquete.costos.reporte')}}"><i class="fa Example of download fa-download"></i></a>
        </div>
      </div>
      <br>
    <div class="table-responsive">
      <form method="get" action="/MostrarPaquete">
        <table class="table table-striped table-bordered table-hover" id="tablaAdminPaquetes">
          <thead>
            <tr>
              <th>Nombre Paquete</th>
              <th>Fecha Salida</th>
              <th>Hora Salida</th>
              <th>Precio Paquete</th>
              <th>Opciones Paquete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($paquetes as $paquete)
              <tr>
                <td><a href="{{ route('adminPaquete.single', $paquete->IdPaquete) }}">{{$nombrepaquete=$paquete->NombrePaquete}}</a></td>
                <td>{{ \Carbon\Carbon::parse($paquete->FechaSalida)->format('d/m/Y')}}</td>
                <td>{{ \Carbon\Carbon::parse($paquete->HoraSalida)->format('h:i a')}}</td>
                <td>$ {{$paquete->Precio}}</td>
                <td>
                  <a href="{{route('adminPaquete.costos.create', $paquete)}}"
                  class="btn btn-warning btn-sm fa fa-plus btn-block" title="Editar"></a>
                </td>
              </tr>
            @endforeach
          </tbody>
          </table>
        </form>
      </div>
    </div>
    </div>
    </div>
    </div>
  </div>
@endsection
