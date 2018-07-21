@extends('admin-lte::layouts.auth')

@section('content')
<div class="login-box-body">
  <p class="login-box-msg" >Formulario de Registro</p>

  <form action="{{ route('register') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Primer Nombre" >
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
      @if ($errors->has('name'))
      <span class="help-block">{{ $errors->first('name') }}</span>
      @endif
    </div>
    <div class="form-group has-feedback{{ $errors->has('segundoNombre') ? ' has-error' : '' }}">
      <input id="segundoNombre" type="text" class="form-control" name="segundoNombre" value="{{ old('segundoNombre') }}" placeholder="Segundo Nombre" >
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
      @if ($errors->has('segundoNombre'))
      <span class="help-block">{{ $errors->first('segundoNombre') }}</span>
      @endif
    </div>
    <div class="form-group has-feedback{{ $errors->has('primerApellido') ? ' has-error' : '' }}">
      <input id="primerApellido" type="text" class="form-control" name="primerApellido" value="{{ old('primerApellido') }}" placeholder="Primer Apellido" >
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
      @if ($errors->has('primerApellido'))
      <span class="help-block">{{ $errors->first('primerApellido') }}</span>
      @endif
    </div>
    <div class="form-group has-feedback{{ $errors->has('segundoApellido') ? ' has-error' : '' }}">
      <input id="segundoApellido" type="text" class="form-control" name="segundoApellido" value="{{ old('segundoApellido') }}" placeholder="Segundo Apellido" >
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
      @if ($errors->has('segundoApellido'))
      <span class="help-block">{{ $errors->first('segundoApellido') }}</span>
      @endif
    </div>
    <div class="form-group">
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
    <select  class="form-control" name="sexo" id="sexo" value="{{ old('sexo') }}">
        <option value="F">Femenino</option>
        <option value="M">Masculino</option>
    </select>
    </div>
     <div class="form-group">
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
    <select  class="form-control" name="codigoArea" id="codigoArea" value="{{ old('codigoArea') }}">
        <option value="502">502</option>
        <option value="503">503</option>
    </select>
    </div>
    <div class="form-group has-feedback{{ $errors->has('telefono') ? ' has-error' : '' }}">
      <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" placeholder="Telefono" >
      <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      @if ($errors->has('telefono'))
      <span class="help-block">{{ $errors->first('telefono') }}</span>
      @endif
    </div>

    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      @if ($errors->has('email'))
      <span class="help-block">{{ $errors->first('email') }}</span>
      @endif
    </div>
     <div class="form-group ">
     <label class="custom-control custom-radio">
  <input id="radio1" name="notificacion" value="1" type="radio" class="custom-control-input">
  <span class="custom-control-indicator"></span>
  <span class="custom-control-description">Recibir Notificaciones</span>
</label>
<label class="custom-control custom-radio">
  <input id="radio2" name="notificacion" value="2" type="radio" class="custom-control-input">
  <span class="custom-control-indicator"></span>
  <span class="custom-control-description">No recibir Notificaciones</span>
</label>
     </div>
    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
      <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      @if ($errors->has('password'))
      <span class="help-block">{{ $errors->first('password') }}</span>
      @endif
    </div>
    <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype Password" required>
      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarme</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  {{-- <div class="social-auth-links text-center">
    <p>- OR -</p>
    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
    Facebook</a>
    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
    Google+</a>
  </div> --}}

  <a href="{{ route('login') }}" class="text-center">Ya tengo una cuenta de usuario!!</a>
</div>
<!-- /.form-box -->
@endsection
