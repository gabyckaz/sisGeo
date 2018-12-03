
@extends('master')

@section('head')
      @section('Title','Aprobación de Paquetes Turísticos')
@endsection
@section('contenido')

<div class="row">
  <div class="col-md-9 col-md-offset-1">
    @if (count($paquetes) == 0)
      <p>No hay paquetes pendientes por aprobar<p>
    @elseif (count($paquetes) >= 1)
      <div class="panel panel-default">
        <div class="panel-heading"> Registro de Aprobación de Paquete Turistico </div>
  	    <br>
        <div class="panel-body">
      	 	<table class="table table-striped table-bordered table-hover" id="tablaActualizarPaquete">
      	 		<thead class="thead-dark">
              <tr>
      	 				<th>Nombre Paquete</th>
      	 				<th>Fecha Salida</th>
                @role('Director')
                <th>Aprobar</th>
                @endrole
                @role(['Director','Agente'])
                <th>Publicar</th>
                @endrole
      	 			</tr>
      	 		</thead>
      	 		<tbody>
      	 			@foreach($paquetes as $paquete)
                @if($paquete->compara_fechas==2)
        	 				<tr>
        	 					<td><a href="{{ route('adminPaquete.single', $paquete->IdPaquete) }}">{{$paquete->NombrePaquete}}</a></td>
        	 					<td>{{ \Carbon\Carbon::parse($paquete->FechaSalida)->format('d/m/Y')}}</td>
                    @role('Director')
          	 					<td>
                        <form class="btn-block" role="form" method="POST" action="{{ route('adminPaquete.estado2', $paquete->IdPaquete) }}">
                          {!! method_field('PUT') !!}
                          {{ csrf_field()  }}

                          @if($paquete->AprobacionPaquete == '1' )
                            <div style="text-align: center;" >
                              <button type="submit"  class="btn btn-success btn-sm fa fa-smile-o btn-block" title="Aprobado" disabled></button>
                            </div>
                          @else
                            <div style="text-align: center;">
                              <button type="submit" class="btn btn-success btn-sm fa fa-frown-o btn-block" title="Aprobar"></button>
                            </div>
                          @endif
                      </form>
          	 				  </td>
                    @endrole
                    @role(['Director','Agente'])
                      <td>
                        <form class="btn-block" role="form" method="POST" action="{{ route('adminPaquete.publicarpaquete', $paquete->IdPaquete) }}">
                          {!! method_field('PUT') !!}
                          {{ csrf_field()  }}

                          @if($paquete->AprobacionPaquete == '1' && $paquete->DisponibilidadPaquete == '0' )
                            <div style="text-align: center;" >
                              <button type="submit"  class="btn btn-success btn-sm fa fa-smile-o btn-block" title="Publicar" ></button>
                            </div>
                          @elseif($paquete->AprobacionPaquete == '0')
                            <div style="text-align: center;">
                              <button type="submit" class="btn btn-success btn-sm fa fa-frown-o btn-block" title="No ha sido aprobado" disabled></button>
                            </div>
                          @elseif($paquete->AprobacionPaquete == '1' && $paquete->DisponibilidadPaquete == '1')
                              <div style="text-align: center;">
                                <button type="submit" class="btn btn-success btn-sm fa fa-frown-o btn-block" title="Publicado" disabled></button>
                              </div>
                          @endif
                      </form>
                      </td>
                    @endrole
        	 				</tr>
                @endif
              @endforeach
      	 		</tbody>
      	 	</table>
        </div>
      </div>
    @endif
	</div>
</div>

@endsection
