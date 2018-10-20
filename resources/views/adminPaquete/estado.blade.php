
@extends('master')

@section('head')
      @section('Title','Aprobación de Paquetes Turísticos')
@endsection
@section('contenido')
    
        <div class="row">
            <div class="col-md-9 col-md-offset-1">

				            <div class="panel panel-default">
					          <div class="panel-heading"> Registro de Aprobación de Paquete Turistico </div>
					<br>
					 <div class="panel-body">
					 	<table class="table table-striped table-bordered table-hover" id="tablaActualizarPaquete">
					 		<thead class="thead-dark">
                <tr>

					 				<th>Nombre Paquete</th>
					 				<th>Fecha Salida</th>
                  <th>Aprobar</th>
					 			</tr>
					 		</thead>
					 		<tbody>

					 			@foreach($paquetes as $paquete)
					 				<tr>

					 					<td><a href="{{ route('adminPaquete.single', $paquete->IdPaquete) }}">{{$nombrepaquete=$paquete->NombrePaquete}}</a></td>
					 					<td>{{$fechasalida=$paquete->FechaSalida}}</td>
					 					<td>
                      <form class="btn-block" role="form" method="POST" action="{{ route('adminPaquete.estado2', $paquete->IdPaquete) }}">
                        {!! method_field('PUT') !!}
                        {{ csrf_field()  }}

                      @if($paquete->AprobacionPaquete == '1' )

                      <div style="text-align: center;" >
                      <button type="submit"  class="btn btn-info btn-sm fa fa-smile-o btn-block" title="Cambiar estado"></button>
                      </div>
                      @else
                      <div style="text-align: center;">
                      <button type="submit" class="btn btn-danger btn-sm fa fa-frown-o btn-block" title="Cambiar estado"></button>
                      </div>
                      @endif
                    </form>
					 				    </td>
					 				 </tr>
                    @endforeach

					 				</tbody>
					 			</table>
            <center>  {!! $paquetes->appends(\Request::except('page'))->render() !!}</center>

					 		</div>
					 	</div>
					 </div>

				</div>

@endsection
