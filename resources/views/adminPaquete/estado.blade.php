
@extends('master')

@section('head')
    Ver Paquete
@endsection
@section('contenido')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">

				            <div class="panel panel-default">
					          <div class="panel-heading"> Listado de paquetes </div>
					<br>
					 <div class="panel-body">
					 	<table class="table table-striped table-bordered table-hover" id="tablaActualizarPaquete">
					 		<thead class="thead-dark">
                <tr>
                  <th>Id</th>
					 				<th>Nombre Paquete</th>
					 				<th>Fecha Salida</th>
					 				<th>Hora Salida</th>
					 				<th>Precio Paquete</th>
                  <th>Opciones</th>
					 			</tr>
					 		</thead>
					 		<tbody>

					 			@foreach($paquetes as $paquete)
					 				<tr>
                    <td>{{$paquete->IdPaquete}}</td>
					 					<td>{{$nombrepaquete=$paquete->NombrePaquete}}</td>
					 					<td>{{$fechasalida=$paquete->FechaSalida}}</td>
					 					<td>{{$horasalida=$paquete->HoraSalida}}</td>
					 					<td>{{$preciopaquete=$paquete->Precio}}</td>
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
              {!! $paquetes->appends(\Request::except('page'))->render() !!}

					 		</div>
					 	</div>
					 </div>

				</div>

@endsection
