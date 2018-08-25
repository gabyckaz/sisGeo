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

@section('contenido')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Usuarios</h3>
              <div class="box-body">
             <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Actualizar Mi Informacion de Usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form class="form-horizontal" id="miForm" method="POST" enctype="multipart/form-data" action="{{route('user.update', $usuario->id) }}">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
               
                
                <div class="card-body">
                  <div class="form-group">
                  <label for="avatar" class="col-sm-2 control-label">Avatar</label>
                    <div class="col-sm-10">
                   <input id='input1' type="file" name="avatar">
                     </div>
                     @if ($errors->has('avatar'))
                       <span class="help-block">{{ $errors->first('avatar') }}</span>
                     @endif
                </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="input2" value="{{ $usuario->email }}" placeholder="{{ $usuario->email}}" disabled="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Primer Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" name="PrimerNombrePersona" class="form-control" value="{{ $usuario->persona->PrimerNombrePersona }}" id="input3" placeholder="Primer Nombre">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Segundo Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" name="SegundoNombrePersona" class="form-control" value="{{ $usuario->persona->SegundoNombrePersona }}" id="input4" placeholder="Primer Apellido">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Primer Apellido</label>

                    <div class="col-sm-10">
                      <input type="text" name="PrimerApellidoPersona" class="form-control" value="{{ $usuario->persona->PrimerApellidoPersona }}" id="input5" placeholder="Primer Apellido">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Segundo Apellido</label>

                    <div class="col-sm-10">
                      <input type="text" name="SegundoApellidoPersona" class="form-control" value="{{ $usuario->persona->SegundoApellidoPersona }}" id="input6" placeholder="Segundo Apellido">
                    </div>
                  </div>
                  
                  <div class="form-group ">
                    <label for="inputEmail3" class="col-sm-2 control-label">Area de Telefono</label>

                    <div class="col-sm-10">
                      <input type="text" name="AreaTelContacto" class="form-control" value="{{ $usuario->persona->AreaTelContacto }}" id="input7" placeholder="Area de Telefono">
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="inputEmail3" class="col-sm-2 control-label">telefono</label>

                    <div class="col-sm-10">
                      <input type="text" name="TelefonoContacto" class="form-control" value="{{ $usuario->persona->TelefonoContacto }}" id="input8" placeholder="Telefono">
                    </div>
                  </div>
                
                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Genero</label>

                    <div class="col-sm-10">
                      <input type="text" name="Genero" class="form-control" value="{{ $usuario->persona->Genero }}" id="input9" placeholder="Genero" disabled="true">
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Notificaciones</label>
                    <div class="col-sm-10">
                   <label class="custom-control custom-radio">
                   <input id="radio1" name="RecibirNotificacion" value="1" type="radio" class="custom-control-input" checked="{{ $usuario->RecibirNotificacion == '1' ? 'checked' : '' }}">
                   <span class="custom-control-indicator"></span>
                   <span class="custom-control-description">Recibir</span>
                   </label>
                   <label class="custom-control custom-radio">
                   <input id="radio2" name="RecibirNotificacion" value="2" type="radio" class="custom-control-input"
                   {{ $usuario->RecibirNotificacion == '0' ? 'checked' : '' }}>
                   <span class="custom-control-indicator"></span>
                   <span class="custom-control-description">No recibir</span>
                  </label>
                   </div>
                   </div>
                  
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Actualizar</button>
                  
                </div>
                <!-- /.card-footer -->
              </form>
            
            
              </div>
              <!-- /.card-body -->
    </div> 
 
          


      </div>
      </div>
    </div>
  </div>
</div>
@endsection