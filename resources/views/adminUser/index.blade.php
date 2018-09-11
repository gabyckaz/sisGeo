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
@extends('master')

@section('head')
<h1>Hola Mundo</h1>

@endsection
@section('Title')
Administracion de usuarios
@endsection
@section('contenido')
 
   
        @if(session('status'))
                      <!--<br>
                      <div  class="alert alert-success content2" role="alert">
                        { session('status') }}
                      </div -->
                      <script type="text/javascript"> 
                         console.log("Hola");
                         alertify.success("{{session('status') }}");
                       </script>
                    @endif
                    @if(session('fallo'))
                     <!-- <br>
                      <div  class="alert alert-danger content2" role="alert">
                        { session('fallo') }}
                      </div -->
                      <script type="text/javascript"> 
                         console.log("Hola");
                         alertify.warning("{{session('fallo')  }}");
                       </script>
                    @endif
<<<<<<< HEAD
                  </p>

=======
                  
    <div class="col-md-7 col-md-offset-2">   
>>>>>>> 794b3b4d14bc38ed4d4c13d7d38726cafa2689f2
       <form class="navbar-form navbar-left pull-right" action="{{ route('adminUser.index') }}" method="get" role="search">
              <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                <input type="text" name="email" class="form-control" placeholder="Email">
                <select  class="form-control" name="estado" id="estado" >
                  <option value="">Estado</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
              </select>
              <select  class="form-control" name="rol" id="rol" >
                <option value="">Rol</option>
                <option value="2">User</option>
                <option value="1">Admin</option>
              </select>
              </div>
<<<<<<< HEAD
              <button type="submit" class="btn btn-default" >Buscar<span class="glyphicon glyphicon-search"></span></button>

        </form>
=======
              <button type="submit" class="btn btn-default" >Buscar<span class="glyphicon glyphicon-search"></span></button>  
          </form>
        </div>
          
>>>>>>> 794b3b4d14bc38ed4d4c13d7d38726cafa2689f2
           <!-- <form action="" method="get" class="sidebar-form">
              <div class="input-group">
              <input type="text" name="nombre" class="form-control" placeholder="Nombre">
              </div>


            <div class="input-group">
              <input type="text" name="email" class="form-control" placeholder="Email">

                  </div>



            <div class="input-group">
              <select  class="form-control" name="estado" id="estado" >
                <option value="">Estado</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>

                  </div>


            <div class="input-group">

              <select  class="form-control" name="rol" id="rol" >
                <option value="">Rol</option>
                <option value="2">User</option>
                <option value="1">Admin</option>
              </select>

               <button type="submit" value="Buscar" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button >

                  </div>
          </form> -->
<div class="row"> 
<div class="col-md-7 col-md-offset-2">
<div class="table-responsive">
 <table class="table table-striped table-bordered" >
  <thead class="thead-dark">
    <tr>
    <th class="text-center">id</th>
    <th class="text-center">@sortablelink('name', 'name')</th>
    <th class="text-center">Correo</th>
    <th class="text-center">Estado</th>
    <th class="text-center">Rol</th>
    <th class="text-center">Opciones</th>

    </tr>
  </thead>
  <tbody>
    @foreach($usuarios as $usuario)
     <tr>
      <td class="text-center">{{ $usuario->id }}</td>
           <!--td>{ $usuario->persona->PrimerNombrePersona }} </td -->
           <td>{{ $usuario->name }} </td>
           <td>{{ $usuario->email }}</td>
           <td>
              <form class="btn-block" role="form" method="POST" action="{{route('adminUser.state.change', $usuario->id) }}">
        {!! method_field('PUT') !!}
        {{ csrf_field()  }}

         @if($usuario->EstadoUsuario === '1' )
             <div class="form-group">
            <div>
             <button type="submit"  class="btn btn-info btn-sm btn-block">Activo</button>

           </div>
          </div>
            @else
              <div class="form-group">
            <div>
             <button type="submit" class="btn btn-danger btn-sm btn-block">Inactivo</button>
           </div>
          </div>
            @endif
        </form>

              </td>
            <td class="text-center">
            @foreach($usuario->roles as $role )
            {{ $role->display_name }}<br>
            @endforeach
             </td>
            <td>
                      <!--  <form action="#" method="POST">
                             csrf_field()
                             method_field('DELETE')

                            <button id="eliminar" type="submit" class="btn btn-danger btn-block" title="Eliminar usuario"
                              onclick="return confirm('¿Está seguro?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form> -->
                      <a class="btn btn-warning btn-sm fa fa-cog btn-block" title="Editarar usuario"
                      href="{{ route('adminUser.edit', $usuario )}}"></a>

            </td>

         </tr>
    @endforeach

  </tbody>

 </table>
 {!! $usuarios->appends(\Request::except('page'))->render() !!}
 <!--div align="center">!! $usuarios->appends([ 'nombre' =>  $nombre,'email' =>  $email,'estado' =>  $estado ,'rol' => $rol ])->render() !!} </div>
 </div -->
 </div>
        <!--  $usuarios->links()}} -->
</div>
</div>
@endsection
 

<!--
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
</div> -->
