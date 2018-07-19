@extends('layouts.app')

@section('content-title', 'Home')
@section('content-subtitle', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Registrar empresa de transporte</h3>
              <div class="box-body">

                <form action="{{ route('adminTransporte.create') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group has-feedback{{ $errors->has('nombreempresa') ? ' has-error' : '' }}">
                    <input id="nombreempresa" type="text" class="form-control" name="nombreempresa" value="{{ old('nombreempresa') }}" placeholder="Nombre de la empresa" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('nombreempresa'))
                    <span class="help-block">{{ $errors->first('nombreempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('nombrecontacto') ? ' has-error' : '' }}">
                    <input id="nombrecontacto" type="nombrecontacto" class="form-control" name="nombrecontacto" value="{{ old('nombrecontacto') }}" placeholder="Nombre del contacto" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('nombrecontacto'))
                    <span class="help-block">{{ $errors->first('nombrecontacto') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('numerotelefono') ? ' has-error' : '' }}">
                    <input id="numerotelefono" type="numerotelefono" class="form-control" name="numerotelefono" placeholder="Teléfono de contacto" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('numerotelefono'))
                    <span class="help-block">{{ $errors->first('numerotelefono') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('emailempresa') ? ' has-error' : '' }}">
                    <input id="emailempresa" type="emailempresa" class="form-control" name="emailempresa" placeholder="Email" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('emailempresa'))
                    <span class="help-block">{{ $errors->first('emailempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('observacionesempresa') ? ' has-error' : '' }}">
                    <input id="observacionesempresa" type="observacionesempresa" class="form-control" name="observacionesempresa" placeholder="Observaciones" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('observacionesempresa'))
                    <span class="help-block">{{ $errors->first('observacionesempresa') }}</span>
                    @endif
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>


              </div>
      </div>
    </div>
  </div>
</div>
@endsection
