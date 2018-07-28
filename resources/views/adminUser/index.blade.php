<!--
< if( auth()->user()->roles()->first()->name === 'Admin')
	
	<p>hola mundo</p>

else
<p>Adios Mundo Cruel </p>

endif -->  



<!-- Para Ocultar cosas me puede servir -->
<!--role('Admin')
    <p>This is visible to users with the admin role. Gets translated to 
    \Entrust::role('admin')</p>
    <h1>Como Admin</h1>
endrole

role('User')
    <p>This is visible to users with the admin role. Gets translated to 
    \Entrust::role('User')</p>
    <h1>Como Usuario</h1>
endrole -->


 @extends('layouts.app')

@section('content-title', 'Home')
@section('content-subtitle', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Usuarios</h3>
              <div class="box-body">
              	<h1>Todos los Usuarios</h1>
        @if(session('status'))
                      <br>
                      <div  class="alert alert-success content2" role="alert">
                        {{ session('status') }}
                      </div>
                    @endif
                    @if(session('fallo'))
                      <br>
                      <div  class="alert alert-danger content2" role="alert">
                        {{ session('fallo') }}
                      </div>
                    @endif
                  </p></div>
 <table class="table table-striped table-bordered" >
 	<thead class="thead-dark">
 		<tr>
 		<th class="text-center">id</th>
 		<th class="text-center">Nombre</th>
 		<th class="text-center">Email</th>
    <th class="text-center">Estado</th>
 		<th class="text-center">Rol</th>
 		<th class="text-center">Opciones</th>
 		
 		</tr>
 	</thead>
 	<tbody>
 		@foreach($usuarios as $usuario)
 		 <tr class="text-center">
 		  <td>{{ $usuario->id }}</td>
           <td>{{ $usuario->name }}</td>
           <td>{{ $usuario->email }}</td>
           <td>
              <form class="form-horizontal" role="form" method="POST" action="{{route('adminUser.state.change', $usuario->id) }}">
        {!! method_field('PUT') !!}
        {{ csrf_field()  }}

         @if($usuario->EstadoUsuario === '1' )
             <div class="form-group">
            <div>
             <button type="submit"  class="btn btn-primary "><p>Activo</p></button>               
           </div>
          </div>
            @else
              <div class="form-group">
            <div>
             <button type="submit" class="btn btn-danger"><p>Inactivo</p></button>               
           </div>
          </div>
            @endif
        </form>

              </td>
            <td>
            @foreach($usuario->roles as $role )
            {{ $role->display_name }}<br>
            @endforeach
            -
           
            {{ $usuario->persona->AreaTelContacto }}<br>
            
             </td>
            <td>
                        <form action="#" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button id="eliminar" type="submit" class="btn btn-danger btn-block" title="Eliminar usuario"
                              onclick="return confirm('¿Está seguro?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                      <a class="btn btn-primary btn-sm glyphicon glyphicon-pencil btn-block" title="Editarar usuario" 
                      href="{{ route('adminUser.edit', $usuario )}}"></a>
                      
            </td>
          
         </tr>
 		@endforeach
 	</tbody>
 </table>

          

 <caption>
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
        Agregar nuevo 
        <span class="glyphicon glyphicon-plus"></span>
      </button>
    </caption>

<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega nueva persona</h4>
      </div>
      <div class="modal-body">
          <label>Nombre</label>
          <input type="text" name="" id="nombre" class="form-control input-sm">
          <label>Apellido</label>
          <input type="text" name="" id="apellido" class="form-control input-sm">
          <label>Email</label>
          <input type="text" name="" id="email" class="form-control input-sm">
          <label>telefono</label>
          <input type="text" name="" id="telefono" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
        Agregar
        </button>
       
      </div>
    </div>
  </div>
</div>



      </div>
      </div>
    </div>
  </div>
</div>
@endsection
<script type="text/javascript">
$(document).ready(function() {   
    setTimeout(function() {
        $(".content2").fadeIn(1500);
    },3000);
});
</script>
<script type="text/javascript">
$(document).ready(function() {   
    setTimeout(function() {
        $(".content2").fadeIn(1500);
    },3000);
});
</script>