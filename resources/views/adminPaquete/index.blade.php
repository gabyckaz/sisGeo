@extends('master')

@section('head')
    Ver Paquete
@endsection
@section('contenido')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
              @if(session('status'))
              <br>
               <script type="text/javascript">
                alertify.success("{{ session('status') }}");
               </script>
              @endif
              @if(session('fallo'))
              <br>
               <script type="text/javascript">
                alertify.error("{{ session('fallo') }}");
               </script>
               @endif
              <div class="table-responsive">
              <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                 <a href="{{route('adminPaquete.create')}}" class="btn btn-primary" > <font color="black" style=""> <b>Agregar nuevo Paquete</b> </font>  </a>
               </div>
             </div>
                <div class="col-md-6">
              <form class="navbar-form navbar-left " action="{{ route('adminPaquete.index') }}" method="get" role="search">
                     <div class="form-group">

                       <input type="text" name="nombre" class="form-control" placeholder="Nombre Paquete">
                        <button type="submit" class="btn btn-default" >Buscar<span class="glyphicon glyphicon-search"></span></button>
                     </div>
               </form>
             </div>

        </div>

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

					 				<th>Nombre Paquete</th>
					 				<th>Fecha Salida</th>
					 				<th>Hora Salida</th>
					 				<th>Precio Paquete</th>
					 			</tr>
					 		</thead>
					 		<tbody>
					 			@foreach($paquetes as $paquete)
					 				<tr>
					 					<td>{{$nombrepaquete=$paquete->NombrePaquete}}</td>
					 					<td>{{$fechasalida=$paquete->FechaSalida}}</td>
					 					<td>{{$horasalida=$paquete->HoraSalida}}</td>
					 					<td>{{$preciopaquete=$paquete->Precio}}</td>
					 					<td>
					 						<a href="{{route('adminPaquete.edit', $paquete['IdPaquete'])}}"
					 						class="btn btn-warning"> <font color="black" size="2"> <b> Editar</b>
					 						</font>
					 						</a>
                      <a href="{{route('adminPaquete.show', $paquete['IdPaquete'])}}"
                      class="btn btn-info"> <font color="black" size="2"> <b> Asignaciones</b>
                      </font>
                      </a>

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

			</form>
@endsection
