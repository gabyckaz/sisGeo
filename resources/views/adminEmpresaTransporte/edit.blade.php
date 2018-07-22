@extends('layouts.app')

@section('content-title', 'Transporte')
@section('content-subtitle', 'Editar Empresa')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Registrar empresa de transporte</h3>
              <div class="box-body">
                <form method="post" action="{{action('EmpresaAlquilerTransporteController@update', $IdEmpresaAlquilerTransporte)}}">
                  @csrf
                  <input name="_method" type="hidden" value="PATCH">
                  <div class="form-group has-feedback{{ $errors->has('nombreempresa') ? ' has-error' : '' }}">
                    <input id="nombreempresa" value="{{ $empresalquiler->NombreEmpresaTransporte }}" placeholder="{{ $empresalquiler->NombreEmpresaTransporte }}" type="text" class="form-control" name="nombreempresa" value="{{ old('nombreempresa') }}" required autofocus>
                    <span class="glyphicon glyphicon-road form-control-feedback"></span>
                    @if ($errors->has('nombreempresa'))
                    <span class="help-block">{{ $errors->first('nombreempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('nombrecontacto') ? ' has-error' : '' }}">
                    <input id="nombrecontacto" value="{{ $empresalquiler->NombreContacto }}" placeholder="{{ $empresalquiler->NombreContacto }}" type="nombrecontacto" class="form-control" name="nombrecontacto" value="{{ old('nombrecontacto') }}" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('nombrecontacto'))
                    <span class="help-block">{{ $errors->first('nombrecontacto') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('numerotelefono') ? ' has-error' : '' }}">
                    <input id="numerotelefono" value="{{ $empresalquiler->NumeroTelefonoContacto }}" placeholder="{{ $empresalquiler->NumeroTelefonoContacto }}" type="numerotelefono" class="form-control" name="numerotelefono"  required>
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                    @if ($errors->has('numerotelefono'))
                    <span class="help-block">{{ $errors->first('numerotelefono') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('emailempresa') ? ' has-error' : '' }}">
                    <input id="emailempresa" value="{{ $empresalquiler->EmailEmpresaTransporte }}" placeholder="{{ $empresalquiler->EmailEmpresaTransporte }}" type="emailempresa" class="form-control" name="emailempresa"  required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('emailempresa'))
                    <span class="help-block">{{ $errors->first('emailempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('observacionesempresa') ? ' has-error' : '' }}">
                    <input id="observacionesempresa" value="{{ $empresalquiler->ObservacionesEmpresaTransporte }}" placeholder="{{ $empresalquiler->ObservacionesEmpresaTransporte }}" type="observacionesempresa" class="form-control" name="observacionesempresa"  required>
                    <span class="glyphicon glyphicon-bookmark form-control-feedback"></span>
                    @if ($errors->has('observacionesempresa'))
                    <span class="help-block">{{ $errors->first('observacionesempresa') }}</span>
                    @endif
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Guardar</button>
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
