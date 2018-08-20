@extends('master')

@section('head')
<h1>Hola Mundo</h1>

@endsection

@section('contenido')
<div class="row">
  <div class="col-md-8 col-md-offset-2"><!-- Vista create -->
    @if(session('status'))
      <br>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none">&times;</a>
          {{ session('status') }}
        </div>
    @endif
    @if(session('fallo'))
      <br>
        <div class="alert alert-danger  alert-dismissible fade in" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none">&times;</a>
          {{ session('fallo') }}
      </div>
    @endif
    <div class="box box-primary collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Agregar unidad de transporte</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div><!-- /.box-tools -->
        </div>
              <div class="box-body">
                <form action="{{ route('adminTransporte.store') }}" method="POST">
                  {{ csrf_field() }}

                  <div class="form-group has-feedback{{ $errors->has('empresalquiler') ? ' has-error' : '' }}">
                    <label for="empresalquiler">Empresa</label>
                      <select class="form-control" name="empresalquiler">
                        @foreach($empresalquiler as $empresa)
                          <option value="{{ $empresa->IdEmpresaTransporte }}" {{ old('empresalquiler') == $empresa->IdEmpresaTransporte ? 'selected' : '' }}>{{ $empresa->NombreEmpresaTransporte }}</option>
                        @endforeach
                      </select>
                 </div>

                  <div class="form-group has-feedback{{ $errors->has('tipotransporte') ? ' has-error' : '' }}">
                    <label for="tipotransporte">Tipo de transporte</label>
                      <select class="form-control" name="tipotransporte">
                        @foreach($tipotransportes as $tipotransporte)
                          <option value="{{ $tipotransporte->IdTipoTransporte }}" {{ old('tipotransporte') == $tipotransporte->IdTipoTransporte ? 'selected' : '' }} >{{ $tipotransporte->NombreTipoTransporte }}</option>
                        @endforeach
                      </select>
                 </div>

                  <div class="col-sm-6 form-group has-feedback{{ $errors->has('marca') ? ' has-error' : '' }}">
                    <label for="marca">Marca</label>
                    <input id="marca" type="text" class=" form-control" name="marca" value="{{ old('marca') }}" placeholder="Ej: Mercedes Benz" required>
                    @if ($errors->has('marca'))
                    <span class="help-block">{{ $errors->first('marca') }}</span>
                    @endif
                  </div>

                  <div class="col-sm-6 form-group has-feedback{{ $errors->has('modelo') ? ' has-error' : '' }}">
                    <label for="modelo">Modelo</label>
                    <input id="modelo" type="text" class=" form-control" name="modelo" value="{{ old('modelo') }}" placeholder="Ej: Citaro K" required>
                    @if ($errors->has('modelo'))
                    <span class="help-block">{{ $errors->first('modelo') }}</span>
                    @endif
                  </div>

                   <div class="col-sm-4 form-group has-feedback{{ $errors->has('color') ? ' has-error' : '' }}">
                    <label for="color">Color</label>
                    <select  class="form-control" name="color">
                      <option value="Negro" {{ old('color') == 'Negro' ? 'selected' : '' }} style="background-color: Black;color: #FFFFFF;">Negro</option>
                      <option value="Gris" {{ old('color') == 'Gris' ? 'selected' : '' }} style="background-color: Gray;">Gris</option>
                      <option value="Blanco" {{ old('color') == 'Blanco' ? 'selected' : '' }} style="background-color: White;">Blanco</option>
                      <option value="Aqua" {{ old('color') == 'Aqua' ? 'selected' : '' }} style="background-color: Aquamarine;">Aqua</option>
                      <option value="Azul" {{ old('color') == 'Azul' ? 'selected' : '' }} style="background-color: Navy;color: #FFFFFF;">Azul</option>
                      <option value="Verde" {{ old('color') == 'Verde' ? 'selected' : '' }} style="background-color: DarkGreen;color: #FFFFFF;">Verde</option>
                      <option value="Amarillo" {{ old('color') == 'Amarillo' ? 'selected' : '' }} style="background-color: Yellow;">Amarillo</option>
                      <option value="Anaranjado" {{ old('color') == 'Anaranjado' ? 'selected' : '' }} style="background-color: Orange;">Anaranjado</option>
                      <option value="Rojo" {{ old('color') == 'Rojo' ? 'selected' : '' }} style="background-color: Red;">Rojo</option>
                      <option value="Café" {{ old('color') == 'Café' ? 'selected' : '' }} style="background-color: #aa6e28  ;">Café</option>
                      <option value="Beige"{{ old('color') == 'Beige' ? 'selected' : '' }}  style="background-color: Beige;">Beige</option>
                    </select>
                   </div>

                  <div class="col-sm-4 form-group has-feedback{{ $errors->has('placa') ? ' has-error' : '' }}">
                    <label for="placa">Placa</label>
                    <input id="placa" type="text" class="form-control" name="placa" placeholder="Ej: B776123" size="7" required>
                    @if ($errors->has('placa'))
                    <span class="help-block">{{ $errors->first('placa') }}</span>
                    @endif
                  </div>

                  <div class="col-sm-4 form-group has-feedback{{ $errors->has('numeroasientos') ? ' has-error' : '' }}">
                    <label for="numeroasientos">No. Asientos</label>
                    <input id="numeroasientos" type="number" min="1" class="form-control" name="numeroasientos" value="{{ old('numeroasientos') }}" placeholder="No. de asientos" required>
                    @if ($errors->has('numeroasientos'))
                    <span class="help-block">{{ $errors->first('numeroasientos') }}</span>
                    <span class="help-block">Tiene que ser de 1 a más asientos</span>
                    @endif
                  </div>
                </br >

                  <div class="form-group">
                    <label class="">
                    <input class="form-group" name="ac" type="checkbox" value="si" @if(old('ac')=="si") checked @endif>
                    <i class="fa fa-thermometer-half"></i> Aire Acondicionado</label>
                  </div>

                  <div class="form-group">
                    <label class="" >
                    <input class="form-group" name="tv" type="checkbox" value="si" @if(old('tv')=="si") checked @endif>
                    <i class="fa fa-television"></i> TV</label>
                  </div>

                  <div class="form-group">
                    <label  class=" form-group">
                    <input  class="form-group" name="wifi" type="checkbox" value="si" @if(old('wifi')=="si") checked @endif>
                    <i class="fa fa-wifi"  title="Wifi"></i> Wifi</label>
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
    </div>      <!-- Fin de vista create -->

    <div class="col-md-8  col-md-offset-2"><!-- Vista index -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Unidades de transporte</h3>
          </div>
                <div class="box-body">

                  <table class="table table-striped table-bordered" >
                    <thead class="thead-dark">
                      <tr>

                      <th>@sortablelink('EmpresaAlquilerTransporte.NombreEmpresaTransporte','Empresa')</th>
                      <th>@sortablelink('TipoTransporte.NombreTipoTransporte','Tipo')</th>
                  <!--    <th>Info</th> -->
                  <!--    <th>Matrícula</th>-->
                      <th>@sortablelink('NumeroAsientos','No. Asientos')</th>
                      <th>Extras</th>
                      <th>Observaciones</th>
                      <th>Opciones</th>

                      </tr>
                    </thead>
                    <tbody>

                    @foreach($transportes as $transporte)
                       <tr>
                         <td>{{ $transporte->empresaalquilertransporte->NombreEmpresaTransporte }}</td>
                         <td>{{ $transporte->tipotransporte->NombreTipoTransporte}} </td>
                    <!--        <td>{{ $transporte->Marca }} {{ $transporte->Modelo }} {{ $transporte->Color }} </td>-->
                    <!--     <td>{{ $transporte->Placa_Matricula }}</td>-->
                         <td>{{ $transporte->NumeroAsientos }}</td>
                         <td>@if($transporte->TieneAC=='si') <i class="fa fa-thermometer-half" aria-hidden="true" title="Aire acondicionado" ></i>@endif @if($transporte->TieneTV=='si') <i class="fa fa-television" aria-hidden="true" title="TV"></i>@endif @if($transporte->TieneWifi=='si') <i class="fa fa-wifi" aria-hidden="true" title="Wifi"></i>@endif</td>
                         <td>{{ $transporte->ObservacionesTransporte }}</td>
                             <td>

                               <a class="btn btn-primary btn-sm glyphicon glyphicon-pencil btn-block" title="Editar"
                                       href="{{ route('adminTransporte.edit', $transporte )}}"></a>
                              </td>
                          </tr>
                      @endforeach


                    </tbody>
                  </table>
                  {!! $transportes->appends(\Request::except('page'))->render() !!}
                </div>
        </div>
      </div><!-- Fin de vista index -->

  </div>
@endsection
