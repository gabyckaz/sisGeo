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
@role('Admin') 
<STRONG>Administracion de usuarios</STRONG>
@endrole
@endsection
@section('contenido')

@role('Admin') 
@if(session('status'))
  <br>
   <script type="text/javascript">
  alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4>{{ session("status") }}');

  </script>
@endif
@if(session('fallo'))
  <br>
  <script type="text/javascript">
 alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{session("fallo") }}');
 </script>
@endif
    <div class="row">
    <div class="col-md-offset-2 col-md-7 ">
       <form class="" action="{{ route('adminUser.index') }}" method="get" role="search">
              <div class="row"> 
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-sm-6 col-md-6"> 
              <div class="form-group">
                <select  class="form-control" name="estado" id="estado" >
                  <option value="">Estado</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
              </select>
            </div>
            </div>
            <div class="col-sm-6 col-md-6"> 
            <div class="form-group">
              <select  class="form-control" name="rol" id="rol" >
                <option value="">Rol</option>
                <option value="2">User</option>
                <option value="1">Admin</option>
                <option value="3">Director</option>
                <option value="4">Agente</option>
              </select>
            </div>
            </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-default col-xs-12 col-sm-3" ><span class="glyphicon glyphicon-search"></span>Buscar</button>
            </div>
          </form>
        </div>
     </div>
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
 <table class="table table-striped table-bordered table-hover" id="tablaAdminUser">
  <thead class="thead-dark">
    <tr>

    <th class="text-center">Nombre</th>{{-- @sortablelink('name', 'Nombre')</th> --}}
    <th class="text-center">Correo</th>
    <th class="text-center">Estado</th>
    <th class="text-center">Rol</th>
    <th class="text-center">Opciones</th>

    </tr>
  </thead>
  <tbody>
    @foreach($usuarios as $usuario)
     <tr>

           <!--td>{ $usuario->persona->PrimerNombrePersona }} </td -->
           <td> {{ ucfirst(strtolower($usuario->name)) }}  {{ ucfirst(strtolower($usuario->persona->PrimerApellidoPersona)) }}</td>
           <td>{{ $usuario->email }}</td>
           <td>
              <form class="btn-block" role="form" method="POST" action="{{route('adminUser.state.change', $usuario->id) }}">
        {!! method_field('PUT') !!}
        {{ csrf_field()  }}

         @if($usuario->EstadoUsuario === '1' )
             
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
                      <a class="btn btn-warning btn-sm fa fa-cog btn-block" title="Editar usuario"
                      href="{{ route('adminUser.edit', $usuario )}}"></a>

            </td>

         </tr>
    @endforeach

  </tbody>

 </table>
 <center>{!! $usuarios->appends(\Request::except('page'))->render() !!}</center>
 <!--div align="center">!! $usuarios->appends([ 'nombre' =>  $nombre,'email' =>  $email,'estado' =>  $estado ,'rol' => $rol ])->render() !!} </div>
 </div -->
 </div>
        <!--  $usuarios->links()}} -->
</div>
</div>
@endrole
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
