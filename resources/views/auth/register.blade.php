@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
  <div class="card">
    <div class="card-header">Formulario de Registro</div>
<div class="card-body">
  <form action="{{ route('register') }}" method="POST">
    {{ csrf_field() }}
     <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Primer Nombre') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
     
     <div class="form-group row">
        <label for="SegundoNombrePersona" class="col-md-4 col-form-label text-md-right">{{ __('Segundo Nombre') }}</label>

        <div class="col-md-6">
            <input id="SegundoNombrePersona" type="text" class="form-control{{ $errors->has('SegundoNombrePersona') ? ' is-invalid' : '' }}" name="SegundoNombrePersona" value="{{ old('SegundoNombrePersona') }}" >

            @if ($errors->has('SegundoNombrePersona'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('SegundoNombrePersona') }}</strong>
                </span>
            @endif
        </div>
    </div>
   <div class="form-group row">
        <label for="PrimerApellidoPersona" class="col-md-4 col-form-label text-md-right">{{ __('Primer Apellido') }}</label>

        <div class="col-md-6">
            <input id="PrimerApellidoPersona" type="text" class="form-control{{ $errors->has('PrimerApellidoPersona') ? ' is-invalid' : '' }}" name="PrimerApellidoPersona" value="{{ old('PrimerApellidoPersona') }}" required autofocus>

            @if ($errors->has('PrimerApellidoPersona'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('PrimerApellidoPersona') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="SegundoApellidoPersona" class="col-md-4 col-form-label text-md-right">{{ __('Segundo Apellido') }}</label>

        <div class="col-md-6">
            <input id="SegundoApellidoPersona" type="text" class="form-control{{ $errors->has('SegundoApellidoPersona') ? ' is-invalid' : '' }}" name="SegundoApellidoPersona" value="{{ old('SegundoApellidoPersona') }}">

            @if ($errors->has('SegundoApellidoPersona'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('SegundoApellidoPersona') }}</strong>
                </span>
            @endif
        </div>
    </div>
    

    <div class="form-group row">
      <label for="Genero" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

        <div class="col-md-6">
           <select  class="form-control" name="Genero" id="Genero" value="{{ old('Genero') }}">
               <option value="M">Masculino</option>
               <option value="F">Femenino</option>
           </select>
        </div>
    </div>

    <div class="form-group row">
                <label for="AreaTelContacto" class="col-md-4 col-form-label text-md-right">{{ __('Codigo de Area') }}</label>

                <div class="col-md-6">
                    
                 <select class="form-control" name="AreaTelContacto" id="AreaTelContacto" value="{{ old('AreaTelContacto') }}">
                   <option value="503">503</option>
                    <option value="502">502</option>
                </select>                      
          </div>
      </div>
    
    <div class="form-group row">
          <label for="TelefonoContacto" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

          <div class="col-md-6">
              
         <input id="TelefonoContacto" type="text" class="form-control" name="TelefonoContacto" value="{{ old('TelefonoContacto') }}" required autofocus >
              @if ($errors->has('TelefonoContacto'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('TelefonoContacto') }}</strong>
                  </span>
              @endif
              
          </div>
          
     </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
       <div class="form-check ">
         <label class="form-check-label col-md-6 offset-md-4">
         <input type="radio" class="form-check-input" name="RecibirNotificacion" value="1" {{(old('RecibirNotificacion') == '1') ? 'checked' : ''}}>Recibir Notificacion
        </label>
      </div>
      <div class="form-check mb-3">
       <label class="form-check-label col-md-6 offset-md-4">
       <input type="radio" class="form-check-input" name="RecibirNotificacion" value="2" {{(old('RecibirNotificacion') == '2') ? 'checked' : ''}}>No Recibir Notificacion
       </label>
     </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarme</button>
          </div>
      <!-- /.col -->
        </div>
  </form>
</div>

  {{-- <div class="social-auth-links text-center">
    <p>- OR -</p>
    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
    Facebook</a>
    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
    Google+</a>
  </div> --}}

  <a href="{{ route('login') }}" class="text-center">Ya tengo una cuenta de usuario!!</a>
    </div>
  </div>
  </div>
</div>
<!-- /.form-box -->
@endsection
