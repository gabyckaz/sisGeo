@extends('master')

@section('head')
    Ver Paquete
@endsection
@section('Title')
  <strong>Administracion de paquetes turisticos</strong>
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

              <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                    <a href="{{route('adminPaquete.create')}}" class="btn btn-primary" > <font color="black" style=""> <b>Agregar nuevo Paquete</b> </font>  </a>
                   </div>
                  </div>
                </div>
           <div class="table-responsive">
				  <div class="panel panel-default">
           <div class="panel-heading">
            <h3 class="panel-title">Listado de paquetes</h3>
              <div class="box-tools pull-right">
                <a class="btn btn-info" title="Descargar como PDF" href="{{ route('adminPaquete.reporte') }}"><i class="fa Example of download fa-download"></i></a>
              </div>
           </div>
              <div class="panel-body">
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
                    <td>{{$fechasalida=$paquete->FechaSalida}}</td>
                    <td>{{$horasalida=$paquete->HoraSalida}}</td>
                    <td>{{$preciopaquete=$paquete->Precio}}</td>
                    <td>
                      <a href="{{route('adminPaquete.edit', $paquete['IdPaquete'])}}"
                      class="btn btn-warning fa fa-cog" title="Editar">
                      </a>
                      <a href="{{route('adminPaquete.show', $paquete['IdPaquete'])}}"
                      class="btn btn-info" title="Completar Información"><span class="fa fa-user-plus" ></span><span class="fa fa-bus"></span>
                      </a>
                      <a href="{{route('adminPaquete.createcopia', $paquete['IdPaquete'])}}"
                      class="btn btn-info fa fa-files-o" title="Crear copia de paquete">
                      </a>
                      </td>
                   </tr>
                    @endforeach
                  </tbody>
                </table>
              {{-- {!! $paquetes->appends(\Request::except('page'))->render() !!} --}}
               </form>
              </div>
          </div>
			     </div>
        </div>
       </div>



@endsection
