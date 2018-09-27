@extends('master')

@section('head')

@endsection
@section('Title','Editar Ruta Turística')

@section('contenido')
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
    <div class="">
      <div class="box-header">
        <h3 class="box-title"></h3>
        <div class="box-tools">
          <button class="btn btn-box-tool"></button>
        </div><!-- /.box-tools -->
        </div>
              <div class="box-body">
                <form role="form" method="POST" action="{{route('adminRutaTuristica.update', $rutaturistica->IdRutaTuristica) }}" >
                   {!! method_field('PUT') !!}
                   {{ csrf_field()  }}

                   <div class="row">
                     <div class="form-group col-md-6 has-feedback{{ $errors->has('nombrerutaturistica') ? ' has-error' : '' }}">
                       <label for="nombrerutaturistica">Nombre de la ruta *</label>
                       <div class="input-group">
                       <span class="input-group-addon"><span class="fa fa-road"></span></span>
                        <input id="nombrerutaturistica" title="Nombre" class="form-control" name="nombrerutaturistica" value="{{$rutaturistica->NombreRutaTuristica }}" placeholder="Nombre" required autofocus>

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
                             <option value="{{ $pais->IdPais }}"  {{ $pais->IdPaais == $pais->IdPais ? 'selected' : '' }}>{{$pais->nombrePais}}</option>
                           @endforeach
                         </select>
                       </div>
                   </div>


                 <div class="form-group col-sm-12 has-feedback{{ $errors->has('datosgenerales') ? ' has-error' : '' }}">
                   <label for="datosgenerales">Datos generales *</label>
                   <div class="input-group">
                   <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                   <textarea id="datosgenerales" type="datosgenerales" class="form-control" name="datosgenerales" value="{{ old('datosgenerales') }}" placeholder="Datos generales..." >{{ $rutaturistica->DatosGenerales }}</textarea>
                 </div>
                   @if ($errors->has('datosgenerales'))
                   <span class="help-block">{{ $errors->first('datosgenerales') }}</span>
                   @endif
                 </div>

                 <div class="form-group col-sm-12 has-feedback{{ $errors->has('descripcionrutaturistica') ? ' has-error' : '' }}">
                   <label for="descripcionrutaturistica">Descripción *</label>
                   <div class="input-group">
                   <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                   <textarea id="descripcionrutaturistica" type="descripcionrutaturistica" class="form-control" name="descripcionrutaturistica" value="{{ old('descripcionrutaturistica') }}" placeholder="Descripción" >{{ $rutaturistica->DescripcionRutaTuristica }}</textarea>
                 </div>
                   @if ($errors->has('descripcionrutaturistica'))
                   <span class="help-block">{{ $errors->first('descripcionrutaturistica') }}</span>
                   @endif
                 </div>
</div>


                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-info center-block">Guardar</button>
                    </div>
                  </div>
                </form>


              </div>
      </div>
    </div>
  </div>

@endsection
