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
             <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Actualizar Mi Informacion</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form class="form-horizontal" method="POST" action="{{route('user.update', $usuario->id) }}">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="inputEmail3" value="{{ $usuario->email }}" placeholder="{{ $usuario->email}}" disabled="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Primer Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" name="PrimerNombrePersona" class="form-control" value="{{ $usuario->persona->PrimerNombrePersona }}" id="inputEmail3" placeholder="Primer Nombre">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Segundo Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" name="SegundoNombrePersona" class="form-control" value="{{ $usuario->persona->SegundoNombrePersona }}" id="inputEmail3" placeholder="Primer Apellido">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Primer Apellido</label>

                    <div class="col-sm-10">
                      <input type="text" name="PrimerApellidoPersona" class="form-control" value="{{ $usuario->persona->PrimerApellidoPersona }}" id="inputEmail3" placeholder="Primer Apellido">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Segundo Apellido</label>

                    <div class="col-sm-10">
                      <input type="text" name="SegundoApellidoPersona" class="form-control" value="{{ $usuario->persona->SegundoApellidoPersona }}" id="inputEmail3" placeholder="Segundo Apellido">
                    </div>
                  </div>
                  
                  <div class="form-group ">
                    <label for="inputEmail3" class="col-sm-2 control-label">Area de Telefono</label>

                    <div class="col-sm-10">
                      <input type="text" name="AreaTelContacto" class="form-control" value="{{ $usuario->persona->AreaTelContacto }}" id="inputEmail3" placeholder="Area de Telefono">
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="inputEmail3" class="col-sm-2 control-label">telefono</label>

                    <div class="col-sm-10">
                      <input type="text" name="TelefonoContacto" class="form-control" value="{{ $usuario->persona->TelefonoContacto }}" id="inputEmail3" placeholder="Telefono">
                    </div>
                  </div>
                
                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Genero</label>

                    <div class="col-sm-10">
                      <input type="text" name="Genero" class="form-control" value="{{ $usuario->persona->Genero }}" id="inputEmail3" placeholder="Genero" disabled="true">
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Notificaciones</label>
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
<script type="text/javascript">
$(document).ready(function() {   
    setTimeout(function() {
        $(".content2").fadeIn(1500);
    },3000);
});
</script>

</script>