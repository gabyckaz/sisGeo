@extends('layouts.app')

@section('content-title', 'Transporte')
@section('content-subtitle', '')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    @if(session('status'))
      <br>
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
    @endif
    @if(session('fallo'))
      <br>
        <div class="alert alert-danger" role="alert">
          {{ session('fallo') }}
      </div>
    @endif
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Transporte</h3>
        <div class="box-tools">
          <button class="btn btn-box-tool"></button>
        </div><!-- /.box-tools -->
        </div>
              <div class="box-body">
                <form role="form" method="POST" action="{{route('adminTransporte.update', $transporte->IdTransporte) }}" >
                   {!! method_field('PUT') !!}
                   {{ csrf_field()  }}
                  <div class="form-group has-feedback{{ $errors->has('tipotransporte') ? ' has-error' : '' }}">
                    <label for="tipotransporte">Agregar tipo de transporte</label>
                      <select class="form-control" name="tipotransporte">
                        @foreach($tipotransportes as $tipotransporte)
                         <option value="{{ $tipotransporte->IdTipoTransporte }}" >{{ $tipotransporte->NombreTipoTransporte }}</option>
                  {{--    <option value="{{ $tipotransporte->IdTipoTransporte }}" {{ $selectedTipo == $tipotransporte->IdTipoTransporte ? 'selected="selected"' : '' }}>{{ $tipotransporte->NombreTipoTransporte }}</option> --}}
                        @endforeach
                      </select>
                 </div>

                 <div class="form-group has-feedback{{ $errors->has('empresalquiler') ? ' has-error' : '' }}">
                   <label for="empresalquiler">De empresa</label>
                     <select class="form-control" name="empresalquiler">
                       @foreach($empresalquiler as $empresa)
                       <option value="{{ $empresa->IdEmpresaTransporte }}" >{{ $empresa->NombreEmpresaTransporte }}</option>
                  {{--  <option value="{{ $empresa->IdEmpresaTransporte }}" {{ $selectedEmpresa ==  $empresa->IdEmpresaTransporte ? 'selected="selected"' : '' }}>{{ $empresa->NombreEmpresaTransporte }}</option> --}}

                       @endforeach
                     </select>
                </div>

                  <div class="col-sm-6 form-group has-feedback{{ $errors->has('marca') ? ' has-error' : '' }}">
                    <label for="marca">Marca</label>
                    <input id="marca" type="text" class=" form-control" value="{{ $transporte->Marca }}"name="marca" placeholder="Ej: Mercedes Benz" required>
                    @if ($errors->has('marca'))
                    <span class="help-block">{{ $errors->first('marca') }}</span>
                    @endif
                  </div>

                  <div class="col-sm-6 form-group has-feedback{{ $errors->has('modelo') ? ' has-error' : '' }}">
                    <label for="modelo">Modelo</label>
                    <input id="modelo" type="text" class=" form-control" value="{{ $transporte->Modelo }}"name="modelo" placeholder="Ej: Citaro K" required>
                    @if ($errors->has('modelo'))
                    <span class="help-block">{{ $errors->first('modelo') }}</span>
                    @endif
                  </div>

                   <div class="col-sm-4 form-group has-feedback{{ $errors->has('color') ? ' has-error' : '' }}">
                    <label for="color">Color</label>
                    <select  class="form-control" name="color">
                      <option value="Negro" style="background-color: Black;color: #FFFFFF;">Negro</option>
                      <option value="Gris" style="background-color: Gray;">Gris</option>
                      <option value="Blanco" style="background-color: White;">Blanco</option>
                      <option value="Aqua" style="background-color: Aquamarine;">Aqua</option>
                      <option value="Azul" style="background-color: Navy;color: #FFFFFF;">Azul</option>
                      <option value="Verde" style="background-color: DarkGreen;color: #FFFFFF;">Verde</option>
                      <option value="Amarillo" style="background-color: Yellow;">Amarillo</option>
                      <option value="Anaranjado" style="background-color: Orange;">Anaranjado</option>
                      <option value="Rojo" style="background-color: Red;">Rojo</option>
                      <option value="Café" style="background-color: #aa6e28	;">Café</option>
                      <option value="Beige" style="background-color: Beige;">Beige</option>
                    </select>
                   </div>

                  <div class="col-sm-4 form-group has-feedback{{ $errors->has('placa') ? ' has-error' : '' }}">
                    <label for="placa">Placa</label>
                    <input id="placa" type="text" class="form-control" name="placa" value="{{ $transporte->Placa_Matricula }}"placeholder="Ej: B776123" min="1" required>
                    @if ($errors->has('placa'))
                    <span class="help-block">{{ $errors->first('placa') }}</span>
                    @endif
                  </div>

                  <div class="col-sm-4 form-group has-feedback{{ $errors->has('numeroasientos') ? ' has-error' : '' }}">
                    <label for="numeroasientos">No. Asientos</label>
                    <input id="numeroasientos" type="number" min="1" class="form-control" value="{{ $transporte->NumeroAsientos }}"name="numeroasientos" placeholder="No. de asientos" required>
                    @if ($errors->has('numeroasientos'))
                    <span class="help-block">{{ $errors->first('numeroasientos') }}</span>
                    <span class="help-block">Tiene que ser de 1 a más asientos</span>
                    @endif
                  </div>
                </br >

                  <div class="form-group">
                    <label class="">
                    <input class="form-group" name="ac" type="checkbox" value="si" @if( $transporte->TieneAC == 'si') checked @endif>
                    <i class="fa fa-thermometer-half"></i> Aire Acondicionado</label>
                  </div>

                  <div class="form-group">
                    <label class="" >
                    <input class="form-group" name="tv" type="checkbox" value="si" @if( $transporte->TieneTV == 'si') checked @endif>
                    <i class="fa fa-television"></i> TV</label>
                  </div>

                  <div class="form-group">
                    <label  class=" form-group">
                    <input  class="form-group" name="wifi" type="checkbox" value="si" @if( $transporte->TieneWifi == 'si') checked @endif>
                    <i class="fa fa-wifi"  title="Wifi"></i> Wifi</label>
                  </div>

                  <div class="form-group has-feedback{{ $errors->has('observacionestransporte') ? ' has-error' : '' }}">
                      <textarea id="observacionestransporte" type="text" class="form-control"  name="observacionestransporte">{{ $transporte->ObservacionesTransporte }}</textarea>
                    @if ($errors->has('observacionestransporte'))
                    <span class="help-block">{{ $errors->first('observacionestransporte') }}</span>
                    @endif
                  </div>



                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Guardar</button>
                    </div>
                  </div>
                </form>


              </div>
      </div>
    </div>
  </div>

@endsection
