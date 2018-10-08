@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white " style="text-align: center; font-weight: bold;">{{ __('Iniciar') }}</div>

                <div class="card-body">
                    @if($errors->any())
                      <h4 style="color: #FF4499;">{{$errors->first()}}</h4>
                    @endif
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Iniciar') }}">
                        @csrf

                        <div class="form-group row">
                            
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Direccion de Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="algo@ejemplo.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="******" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-secondary btn-block btn-flat">
                                    <strong>{{ __('Iniciar sesión') }}</strong>
                                </button>

                                
                            </div>                            
                        </div>
                        <center><a style="text" class="btn btn-link" href="{{ route('password.request') }}">
                                    <strong>{{ __('Olvide mi contraseña?') }}</strong>
                                </a></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
