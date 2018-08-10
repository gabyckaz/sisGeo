@extends('admin-lte::layouts.auth')

@section('content')
<div class="login-box-body">
  <p class="login-box-msg">Iniciar sesión</p>
     @if($errors->any())
       <h4 style="color: #FF4499;">{{$errors->first()}}</h4>
     @endif


  <form action="{{ route('login') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      @if ($errors->has('email'))
      <span class="help-block">{{ $errors->first('email') }}</span>
      @endif
    </div>
    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
      <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      @if ($errors->has('password'))
      <span class="help-block">{{ $errors->first('password') }}</span>
      @endif
    </div>
    <div class="row">
      <div class="col-xs-8">
        <div class="checkbox icheck">
          <label class="form-check-label">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} value="1"> Recordarme
          </label>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  {{-- <div class="social-auth-links text-center">
    <p>- OR -</p>
    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
    Facebook</a>
    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
    Google+</a>
  </div>
  <!-- /.social-auth-links --> --}}

  <a href="{{ route('password.request') }}">Recuperar mi password</a><br>
  <a href="{{ route('register') }}" class="text-center">Registrarme</a>

</div>
@endsection
