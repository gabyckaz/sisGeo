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
    <div class="box box-primary collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Transporte</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div><!-- /.box-tools -->
        </div>
              <div class="box-body">
                <form action="{{ route('adminTransporte.store') }}" method="POST">
                  {{ csrf_field() }}

                  <div class="form-group has-feedback{{ $errors->has('tipotransporte') ? ' has-error' : '' }}">
                    <label for="tipotransporte">Agregar tipo de transporte</label>
                      <select class="form-control" name="tipotransporte">
                        @foreach($tipotransportes as $tipotransporte)
                          <option value="{{ $tipotransporte->IdTipoTransporte }}" >{{ $tipotransporte->NombreTipoTransporte }}</option>
                        @endforeach
                      </select>
                 </div>

                 <div class="form-group has-feedback{{ $errors->has('empresalquiler') ? ' has-error' : '' }}">
                   <label for="empresalquiler">De empresa</label>
                     <select class="form-control" name="empresalquiler">
                       @foreach($empresalquiler as $empresa)
                         <option value="{{ $empresa->IdEmpresaTransporte }}" >{{ $empresa->NombreEmpresaTransporte }}</option>
                       @endforeach
                     </select>
                </div>

                  <div class="col-sm-6 form-group has-feedback{{ $errors->has('marca') ? ' has-error' : '' }}">
                    <input id="marca" type="text" class="col-sm-6 form-control" name="marca" placeholder="Marca" required>
                    @if ($errors->has('marca'))
                    <span class="help-block">{{ $errors->first('marca') }}</span>
                    @endif
                  </div>

                  <div class="col-sm-6 form-group has-feedback{{ $errors->has('modelo') ? ' has-error' : '' }}">
                    <input id="modelo" type="text" class="col-sm-6 form-control" name="modelo" placeholder="Modelo" required>
                    @if ($errors->has('modelo'))
                    <span class="help-block">{{ $errors->first('modelo') }}</span>
                    @endif
                  </div>

                  <div class="col-sm-4 form-group has-feedback{{ $errors->has('color') ? ' has-error' : '' }}">
                    <input id="color" type="text" class="form-control" name="color" placeholder="Color" required>
                    @if ($errors->has('color'))
                    <span class="help-block">{{ $errors->first('color') }}</span>
                    @endif
                  </div>

                  <div class="col-sm-4 form-group has-feedback{{ $errors->has('placa') ? ' has-error' : '' }}">
                    <input id="placa" type="text" class="form-control" name="placa" placeholder="No. Placa" required>
                    @if ($errors->has('placa'))
                    <span class="help-block">{{ $errors->first('placa') }}</span>
                    @endif
                  </div>

                  <div class="col-sm-4 form-group has-feedback{{ $errors->has('numeroasientos') ? ' has-error' : '' }}">
                    <input id="numeroasientos" type="number" class="form-control" name="numeroasientos" placeholder="No. de asientos" required>
                    @if ($errors->has('numeroasientos'))
                    <span class="help-block">{{ $errors->first('numeroasientos') }}</span>
                    @endif
                  </div>

                  <div class="form-group">
                    <input class="form-group" name="ac" type="checkbox" value="si">
                    <label class="form-group" for="ac">Aire Acondicionado</label>
                  </div>

                  <div class="form-group">
                    <input class="form-group" name="tv" type="checkbox" value="si">
                    <label class="form-group" for="tv">TV</label>
                  </div>

                  <div class="form-group">
                    <input  class="form-group" name="wifi" type="checkbox" value="si">
                    <label  class="form-group" for="wifi">Wifi</label>
                  </div>

                  <div class="form-group has-feedback{{ $errors->has('observacionestransporte') ? ' has-error' : '' }}">
                      <textarea id="observacionestransporte" type="text" class="form-control" name="observacionestransporte" placeholder="Observaciones"></textarea>
                    @if ($errors->has('observacionestransporte'))
                    <span class="help-block">{{ $errors->first('observacionestransporte') }}</span>
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

    <div class="col-md-8  col-md-offset-2">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Empresas</h3>
          </div>
                <div class="box-body">

                  <table class="table table-striped table-bordered" >
                    <thead class="thead-dark">
                      <tr>

                      <th>Tipo</th>
                      <th>Empresa</th>
                      <th>Info</th>
                      <th>Matrícula</th>
                      <th>No. asientos</th>
                      <th>Extras</th>
                      <th>Observaciones</th>
                      <th>Conductor</th>
                      <th>Opciones</th>

                      </tr>
                    </thead>
                    <tbody>

                    @foreach($transportes as $transporte)
                       <tr>
                         <td>{{ $transporte->tipotransporte->NombreTipoTransporte}}</td>
                         <td>{{ $transporte->IdEmpresaTransporte }} </td>
                         <td>{{ $transporte->Marca }} {{ $transporte->Modelo }} {{ $transporte->Color }} </td>
                         <td>{{ $transporte->Placa_Matricula }}</td>
                         <td>{{ $transporte->NumeroAsientos }}</td>
                         <td>{{ $transporte->TieneAC }} {{ $transporte->TieneTV }} {{ $transporte->TieneWifi }}</td>
                         <td>{{ $transporte->ObservacionesTransporte }}</td>
                         <td>   @foreach($conductores as $conductor)
                               <option>{{ $conductor->NombreConductor }}</option>
                           @endforeach </td>
                             <td>
                               <a class="btn btn-primary btn-sm glyphicon glyphicon-pencil btn-block" title="Editar"
                                       href="{{ route('adminTransporte.edit', $transporte )}}"></a>
                              </td>
                          </tr>
                      @endforeach


                    </tbody>
                  </table>

                </div>
        </div>
      </div>

  </div>

@endsection
