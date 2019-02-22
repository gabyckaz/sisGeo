@extends('master')

@section('head')
<h1>Acompañantes</h1>

@endsection
@section('Title')
<strong>Editar familiar o amigo</strong>
@endsection
@section('contenido')
   @if(session()->has('message'))
          <script type="text/javascript">
           alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4>{{ session()->get('message') }} ');
          </script>
    @endif
    @if(session()->has('error'))
        <script type="text/javascript">
           alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4>{{ session()->get('error') }} ');
        </script>
    @endif
<div class="col-md-9 col-md-offset-2">
 <div class="box box-solid">
  <div class="box-header">
        <!-- <h3 class="box-title"><strong></strong></h3> -->
  </div>
  <div class="box-body">

    <form id="miForm" method="POST" action="{{route('user.guardar.informacion.familaAmigoEditado') }}">
      {!! method_field('PUT') !!}
      {!! csrf_field() !!}
      <input type="hidden" name="idTurista" value="{{ $turista->IdTurista}}"/>
       <div class="row">
         <div class="col-md-3">
          <div class="form-group">
            <label for="tipo" class="control-label">Tipo*</label>
              <div class="">
                <select  class="form-control" name="tipo" id="tipo" disabled>
                 <option value="A" @if ($tipo == "A") {{ 'selected' }} @endif>Amigo</option>
                 <option value="F" @if ($tipo == "F") {{ 'selected' }} @endif>Familiar</option>
               </select>
             </div>
           </div>
         </div>
         <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('Nombre') ? ' has-error' : '' }}">
               <label for="Nombre" class="control-label">Nombre*</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                    <input type="text" name="Nombre" value="{{ $turista->persona->PrimerNombrePersona }}" class="form-control"  id="Nombre" placeholder="Nombre" value="{{old('Nombre')}}" >
                  </div>
                  @if ($errors->has('Nombre'))
                       <span class="help-block">{{ $errors->first('Nombre') }}</span>
                    @endif
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('Apellido') ? ' has-error' : '' }}">
              <label for="Apellido" class="control-label">Apellido*</label>
                <div class="input-group">
                  <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                  <input type="text" name="Apellido" value="{{ $turista->persona->PrimerApellidoPersona }}" class="form-control" id="Apellido" placeholder="Apellido" value="{{ old('Apellido') }}">
                </div>
                @if ($errors->has('Apellido'))
                       <span class="help-block">{{ $errors->first('Apellido') }}</span>
                  @endif
            </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-3">
           <div class="form-group">
              <label for="Genero" class="col-sm-2 control-label">Género*</label>
                <select  class="form-control" name="genero" id="genero" disabled >
                     <option value="M" @if (old('genero', $turista->persona->Genero) == "M") {{ 'selected' }} @endif>Masculino</option>
                     <option value="F" @if (old('genero', $turista->persona->Genero) == "F") {{ 'selected' }} @endif>Femenino</option>
                </select>
            </div>
         </div>
         <div class="col-md-3">
           <div class="form-group">
            <label for="nacionalidad" class="control-label">Nacionalidad*</label>
                  <select  class="form-control" name="nacionalidad" id="nacionalidad"  disabled>
                    @foreach($nacionalidad as $origen)
                     <option value="{{ $origen->IdNacionalidad }}" @if ($turista->IdNacionalidad == $origen->IdNacionalidad ) {{ 'selected' }} @endif>{{ $origen->Nacionalidad }}</option>
                    @endforeach
                  </select>
           </div>
         </div>
         <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('fechaNacimiento') ? ' has-error' : '' }}">
             <label for="fechaNacimiento" class="control-label">Fecha de Nacimiento</label>
                 <div class="input-group date ">
                    <!-- <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div> -->
                  <input type="date" name="fechaNacimiento" class="form-control pull-right" value="{{ $turista->FechaNacimiento}}" readonly>
                  </div>
                  @if ($errors->has('fechaNacimiento'))
                       <span class="help-block">{{ $errors->first('fechaNacimiento') }}</span>
                  @endif
            </div>
         </div>
       </div>
        <div class="row">
          <div class="form-group col-md-9 has-feedback{{ $errors->has('Direccion') ? ' has-error' : '' }}">
            <label for="observacionestransporte">Dirección*</label>
            <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
              <textarea id="Direccion" type="text" class="form-control" name="Direccion" placeholder="Direccion">{{ old('Direccion',$turista->DomicilioTurista) }}</textarea>
            </div>
            @if ($errors->has('Direccion'))
            <span class="help-block">{{ $errors->first('Direccion') }}</span>
            @endif
          </div>
        </div>
       <hr>
      <div class="row">

        <div class="col-md-3">
          <div class="form-group has-feedback{{ $errors->has('dui') ? ' has-error' : '' }}">
              <label for="dui" class="control-label">DUI</label>
                <div class="">
                  @if( ($documentos == 'duiPasaporte') || ($documentos == 'dui') )
                   @foreach($turista->documentos as $documento)
                           @if($documento->TipoDocumento == "DUI")
                             <input type="text" name="dui" value="{{$documento->NumeroDocumento}}" class="form-control" id="dui" readonly>
                            @break
                           @endif
                       @endforeach
                   @else
                   <input type="text" name="dui" value="{{ old('dui')}}" class="form-control" id="dui" >
                   @endif

                   @if ($errors->has('dui'))
                       <span class="help-block">Un documento es requerido</span>
                  @endif
                </div>
           </div>
        </div>
        <div class="col-md-3">
           <div class="form-group has-feedback{{ $errors->has('fechaVencimentoD') ? ' has-error' : '' }}">
            <label for="fechaVencimentoD" class="control-label">Fecha de vencimiento</label>
               <div class="">
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                   @if( ($documentos == 'duiPasaporte') || ($documentos == 'dui') )
                     @foreach($turista->documentos as $documento)
                           @if($documento->TipoDocumento == "DUI")
                      <input type="date" name="fechaVencimentoD" class="form-control pull-right" value="{{ old('fechaVencimentoD',$documento->FechaVenceDocumento) }}" >
                         @break
                           @endif
                     @endforeach
                   @else
                    <input type="date" name="fechaVencimentoD" class="form-control pull-right" value="{{ old('fechaVencimentoD') }}" >
                   @endif
                  </div>
                  @if ($errors->has('fechaVencimentoD'))
                       <span class="help-block">{{ $errors->first('fechaVencimentoD') }}</span>
                  @endif
                </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-3">
           <div class="form-group has-feedback{{ $errors->has('pasaporte') ? ' has-error' : '' }}">
              <label for="pasaporte" class="control-label">Pasaporte</label>
                <div class="">
                  @if( ($documentos == 'duiPasaporte') || ($documentos == 'pasaporte') )
                   @foreach($turista->documentos as $documento)
                           @if($documento->TipoDocumento == "Pasaporte")
                  <input type="text" name="pasaporte" class="form-control" id="pasaporte" placeholder="Pasaporte" value="{{ $documento->NumeroDocumento }}" readonly>
                        @break
                        @endif
                    @endforeach
                  @else
                  <input type="text" name="pasaporte" class="form-control" id="pasaporte" value="{{ old('pasaporte') }}">
                  @endif
                    @if ($errors->has('pasaporte'))
                       <span class="help-block">Un documento es requerido</span>
                    @endif
                </div>
            </div>
        </div>
          <div class="col-md-3">
           <div class="form-group has-feedback{{ $errors->has('fechaVencimentoP') ? ' has-error' : '' }}">
            <label for="fechaVencimentoP" class="control-label">Fecha de vencimiento</label>
               <div class="">
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  <input type="date" name="fechaVencimentoP" class="form-control pull-right" value="{{ old('fechaVencimentoP') }}">
                  </div>
                   @if ($errors->has('fechaVencimentoP'))
                       <span class="help-block">{{ $errors->first('fechaVencimentoP') }}</span>
                    @endif
                </div>
          </div>
        </div>
      </div>

       <div class="row">
          <div class="form-group col-md-8 has-feedback{{ $errors->has('psalud') ? ' has-error' : '' }}">
            <label for="psalud">Problemas de salud</label>
            <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
              <textarea id="psalud" type="text" class="form-control" name="psalud" placeholder="ninguno">{{ old('psalud', $turista->Problemas_Salud) }}</textarea>
            </div>
            @if ($errors->has('psalud'))
            <span class="help-block">{{ $errors->first('psalud') }}</span>
            @endif
          </div>
      </div>

           <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-info  col-xs-12 col-sm-2 center-block"><STRONG>Actualizar</STRONG></button>
            </div>
            <!-- /.col -->
          </div>

         </form>
         </div>
         <div class="box-footer">
             <p>*Estos campos son obligatorios</p>
             <p>Es necesario ingresar almenos un documento si es mayor de edad</p>
        </div>
      </div>
     </div>
</div>
@endsection
