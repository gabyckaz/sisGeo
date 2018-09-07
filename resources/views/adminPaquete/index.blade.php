@extends('master')

@section('head')
    Ver Paquete
@endsection
@section('contenido')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <form class="navbar-form navbar-left pull-right" action="{{ route('adminPaquete.index') }}" method="get" role="search">
                     <div class="form-group">
                       <input type="text" name="nombre" class="form-control" placeholder="Nombre Paquete">
                     </div>
                     <button type="submit" class="btn btn-default" >Buscar<span class="glyphicon glyphicon-search"></span></button>

               </form>
                <div align="right">
							<a href="{{route('adminPaquete.create')}}" class="btn btn-primary" > <font color="black" size="2" style=""> <b>Agregar nuevo Paquete</b> </font>  </a>

					</div>

					<br>
				<div class="panel panel-default">

					<div class="panel-heading"> Listado de paquetes
					</div>
					<br>
					 <form method="get" action="/MostrarPaquete">
					 <div class="input-group">
					 	<form placeholder="Busqueda por nombre">
					 </div>
					 	</form>
					 <div class="panel-body">
					 	<table class="table table-striped">
					 		<thead>
					 			<tr>
					 				<th>Id</th>
					 				<th>Nombre Paquete</th>
					 				<th>Fecha de Salida</th>
					 				<th>Hora de Salida</th>
					 				<th>Precio Paquete</th>
					 			</tr>
					 		</thead>
					 		<tbody>
					 			@foreach($paquete->sortBy('IdPaquete') as $paquete)
					 				<tr>
					 					<td>{{$id=$paquete->IdPaquete}}</td>
					 					<td>{{$nombrepaquete=$paquete->NombrePaquete}}</td>
					 					<td>{{$fechasalida=$paquete->FechaSalida}}</td>
					 					<td>{{$horasalida=$paquete->HoraSalida}}</td>
					 					<td>{{$preciopaquete=$paquete->Precio}}</td>
					 					<td>
					 						<a href="{{route('adminPaquete.edit', $paquete['IdPaquete'])}}"
					 						class="btn btn-warning"> <font color="black" size="2"> <b> Editar</b>
					 						</font>
					 						</a>

					 				    </td>
					 				 </tr>
					 				 @endforeach
					 				</tbody>
					 			</table>
					 		</div>
					 	</div>
					 </div>
				</div>


			</form>
@endsection
