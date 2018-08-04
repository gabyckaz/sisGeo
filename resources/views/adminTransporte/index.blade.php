@extends('layouts.app')

@section('content-title', 'Transporte')
@section('content-subtitle', '')

@section('content')
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
        <h3 class="box-title">Agregar Transporte</h3>
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
                    <label for="marca">Marca</label>
                    <input id="marca" type="text" class=" form-control" name="marca" placeholder="Ej: Mercedes Benz" required>
                    @if ($errors->has('marca'))
                    <span class="help-block">{{ $errors->first('marca') }}</span>
                    @endif
                  </div>

                  <div class="col-sm-6 form-group has-feedback{{ $errors->has('modelo') ? ' has-error' : '' }}">
                    <label for="modelo">Modelo</label>
                    <input id="modelo" type="text" class=" form-control" name="modelo" placeholder="Ej: Citaro K" required>
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
                    <input id="placa" type="text" class="form-control" name="placa" placeholder="Ej: B776123" size="7" required>
                    @if ($errors->has('placa'))
                    <span class="help-block">{{ $errors->first('placa') }}</span>
                    @endif
                  </div>

                  <div class="col-sm-4 form-group has-feedback{{ $errors->has('numeroasientos') ? ' has-error' : '' }}">
                    <label for="numeroasientos">No. Asientos</label>
                    <input id="numeroasientos" type="number" min="1" class="form-control" name="numeroasientos" placeholder="No. de asientos" required>
                    @if ($errors->has('numeroasientos'))
                    <span class="help-block">{{ $errors->first('numeroasientos') }}</span>
                    <span class="help-block">Tiene que ser de 1 a más asientos</span>
                    @endif
                  </div>
                </br >

                  <div class="form-group">
                    <label class="">
                    <input class="form-group" name="ac" type="checkbox" value="si">
                    <i class="fa fa-thermometer-half"></i> Aire Acondicionado</label>
                  </div>

                  <div class="form-group">
                    <label class="" >
                    <input class="form-group" name="tv" type="checkbox" value="si">
                    <i class="fa fa-television"></i> TV</label>
                  </div>

                  <div class="form-group">
                    <label  class=" form-group">
                    <input  class="form-group" name="wifi" type="checkbox" value="si">
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
          <h3 class="box-title"></h3>
          </div>
                <div class="box-body">

                  <table class="table table-striped table-bordered" >
                    <thead class="thead-dark">
                      <tr>

                      <th>@sortablelink('TipoTransporte.NombreTipoTransporte','Tipo')</th>
                      <th>@sortablelink('EmpresaAlquilerTransporte.NombreEmpresaTransporte','Empresa')</th>
                  <!--    <th>Info</th> -->
                  <!--    <th>Matrícula</th>-->
                      <th>@sortablelink('NumeroAsientos','No. Asientos')</th>
                      <th>Extras</th>
                      <th>Observaciones</th>
                <!--  <th>Conductor</th> -->
                      <th>Opciones</th>

                      </tr>
                    </thead>
                    <tbody>

                    @foreach($transportes as $transporte)
                       <tr>
                         <td>{{ $transporte->tipotransporte->NombreTipoTransporte}}</td>
                         <td>{{ $transporte->empresaalquilertransporte->NombreEmpresaTransporte }} </td>
                    <!--        <td>{{ $transporte->Marca }} {{ $transporte->Modelo }} {{ $transporte->Color }} </td>-->
                    <!--     <td>{{ $transporte->Placa_Matricula }}</td>-->
                         <td>{{ $transporte->NumeroAsientos }}</td>
                         <td>@if($transporte->TieneAC=='si') <i class="fa fa-thermometer-half" aria-hidden="true" title="Aire acondicionado" ></i>@endif @if($transporte->TieneTV=='si') <i class="fa fa-television" aria-hidden="true" title="TV"></i>@endif @if($transporte->TieneWifi=='si') <i class="fa fa-wifi" aria-hidden="true" title="Wifi"></i>@endif</td>
                         <td>{{ $transporte->ObservacionesTransporte }}</td>
                      <!--      <td>   @foreach($conductores as $conductor)
                               <option>{{ $conductor->NombreConductor }}</option>
                           @endforeach </td>
                              -->
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
