@extends('master')

@section('head')
@section('Title','Rutas Turísticas')

@endsection

@section('contenido')
<div class="row">
  <div class="col-md-7 col-md-offset-2">
    @if(session('status'))
      <br>
       <script type="text/javascript">
      alertify.success('<p class="fa fa-check" style="color: white"></p> {{ session("status") }}');
      </script>
    @endif
    @if(session('fallo'))
      <br>
      <script type="text/javascript">
     alertify.error('<p class="fa fa-close" style="color: white"></p> {{session("fallo") }}');
     </script>
    @endif
    @if($errors->has(''))
      <div class="box box-solid">
    @else
      <div class="box box-solid collapsed-box">
    @endif

      <div class="box-header">
        <h3 class="box-title">Registrar nueva Ruta Turística</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
        </div>
        </div>
              <div class="box-body">

                <form action="{{ route('adminRutaTuristica.store') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="row">
                  <div class="form-group col-md-6 has-feedback{{ $errors->has('nombrerutaturistica') ? ' has-error' : '' }}">
                    <label for="nombrerutaturistica">Nombre de la ruta *</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-road"></span></span>
                     <input id="nombrerutaturistica" type="text" class="form-control" name="nombrerutaturistica" value="{{ old('nombrerutaturistica') }}" placeholder="Nombre" required autofocus>
                   </div>
                    @if ($errors->has('nombrerutaturistica'))
                    <span class="help-block">{{ $errors->first('nombrerutaturistica') }}</span>
                    @endif
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="pais">País *</label>
                      <select class="form-control" name="pais">
                        @foreach($paises as $pais)
                          <option value="{{ $pais->IdPais }}" {{ old('pais') == $pais->IdPais ? 'selected' : '' }}>{{ $pais->nombrePais }}</option>
                        @endforeach
                      </select>
                    </div>
                 </div>

                  <div class="form-group col-sm-12 has-feedback{{ $errors->has('datosgenerales') ? ' has-error' : '' }}">
                    <label for="datosgenerales">Datos generales *</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                    <textarea id="datosgenerales" type="datosgenerales" class="form-control" name="datosgenerales" value="{{ old('datosgenerales') }}" placeholder="Datos generales..." >{{ old('datosgenerales') }}</textarea>
                  </div>
                    @if ($errors->has('datosgenerales'))
                    <span class="help-block">{{ $errors->first('datosgenerales') }}</span>
                    @endif
                  </div>

                  <div class="form-group col-sm-12 has-feedback{{ $errors->has('descripcionrutaturistica') ? ' has-error' : '' }}">
                    <label for="descripcionrutaturistica">Descripción *</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                    <textarea id="descripcionrutaturistica" type="descripcionrutaturistica" class="form-control" name="descripcionrutaturistica" value="{{ old('descripcionrutaturistica') }}" placeholder="Descripción" >{{ old('descripcionrutaturistica') }}</textarea>
                  </div>
                    @if ($errors->has('descripcionrutaturistica'))
                    <span class="help-block">{{ $errors->first('descripcionrutaturistica') }}</span>
                    @endif
                  </div>


                </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-4">
                      <button type="submit" class="btn btn-info ">Registrar</button>
                      <button type="reset" class="btn btn-warning ">Limpiar</button>
                    </div>

                    <!-- /.col -->
                  </div>
              </form>



      </div>
      <div class="box-footer">
      * Estos campos son obligatorios
      </div>
    </div>
  </div>

  <div class="col-md-7 col-md-offset-2">
    <div class="">
      <div class="box-header">
        <h3 class="box-title">Listado de Rutas</h3>
        </div>
              <div class="box-body">

                <table class="table table-striped table-bordered" >
                  <thead class="thead-dark">
                    <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Datos Generales</th>
                    <th class="text-center">País</th>
                    <th class="text-center">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($rutaturistica as $ruta)
                     <tr>
                       <td>{{$ruta->NombreRutaTuristica}}</td>
                       <td>{{$ruta->DatosGenerales}}</td>
                       <td>{{$ruta->pais->nombrePais}}</td>
                           <td>

                             <a class="btn btn-warning btn-sm fa fa-cog btn-block" title="Editar"
                                href="{{ route('adminRutaTuristica.edit', $ruta )}}"></a>
                            </td>
                        </tr>
                        @endforeach

                  </tbody>
                </table>

              </div>
      </div>
      <center>{!! $rutaturistica->appends(\Request::except('page'))->render() !!}</center>
    </div>
</div>
@endsection
