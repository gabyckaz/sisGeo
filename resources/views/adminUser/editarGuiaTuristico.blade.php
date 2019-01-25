@extends('master')

@section('head')
<h1>Guías turísticos</h1>

@endsection
@section('Title')
<strong>Actualizar guía turístico</strong>
@endsection
@section('contenido')
   @if(session()->has('message'))
          <script type="text/javascript"> 
           console.log("Hola");
           alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4>{{ session()->get('message') }} ');
          </script>
    @endif
    @if(session()->has('error'))
        <script type="text/javascript"> 
           console.log("Hola");
           alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4>{{ session()->get('error') }} ');
        </script>
    @endif
 <div class="box box-solid">
  <div class="box-header">
        <h3 class="box-title"><strong></strong></h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
        </div>
      </div> 
      <div class="box-body">
   
    <form id="miForm" method="POST" action="{{route('user.guardar.informacion.guiaEditado') }}">
      {!! method_field('PUT') !!}
      {!! csrf_field() !!}
      {{-- 
         SELECT e."IdEmpleadoGEO", e."IdPersona", p."PrimerNombrePersona", p."SegundoNombrePersona",
              p."PrimerApellidoPersona", p."SegundoApellidoPersona", p."Genero", p."AreaTelContacto",
              p."TelefonoContacto", n."Nacionalidad", t."FechaNacimiento", t."DomicilioTurista" , t."IdTurista", n."IdNacionalidad"

              'turista','documentos','nacionalidad','guia'
       --}}
      <input type="hidden" name="idTurista" value="{{ $turista->IdTurista}}"/>
      <input type="hidden" name="idGuia" value="{{ $guia[0]->IdEmpleadoGEO}}"/>
       <div class="row">
         <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('Nombre') ? ' has-error' : '' }}">
               <label for="Nombre" class="control-label">Primer nombre*</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                    <input type="text" name="Nombre" class="form-control"  id="Nombre" placeholder="Nombre" value="{{old('Nombre',$turista->persona->PrimerNombrePersona)}}" >
                  </div>
                  @if ($errors->has('Nombre'))
                       <span class="help-block">{{ $errors->first('Nombre') }}</span>
                    @endif
            </div>
         </div>
          <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('segundoNombre') ? ' has-error' : '' }}">
               <label for="SegundoNombre" class="control-label">Segundo nombre*</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                    <input type="text" name="SegundoNombre" class="form-control"  id="SegundoNombre" placeholder="Segundo Nombre" value="{{old('segundoNombre',$turista->persona->SegundoNombrePersona)}}" >
                  </div>
                  @if ($errors->has('SegundoNombre'))
                       <span class="help-block">{{ $errors->first('SegundoNombre') }}</span>
                    @endif
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('Apellido') ? ' has-error' : '' }}">
              <label for="Apellido" class="control-label">Primer apellido*</label>
                <div class="input-group">
                  <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                  <input type="text" name="Apellido" class="form-control" id="Apellido" placeholder="Apellido" value="{{ old('Apellido', $turista->persona->PrimerApellidoPersona ) }}">                  
                </div>
                @if ($errors->has('Apellido'))
                       <span class="help-block">{{ $errors->first('Apellido') }}</span>
                  @endif
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('SegundoApellido') ? ' has-error' : '' }}">
              <label for="SegundoApellido" class="control-label">Segundo apellido</label>
                <div class="input-group">
                  <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                  <input type="text" name="SegundoApellido" class="form-control" id="SegundoApellido" placeholder="Segundo Apellido" value="{{ old('SegundoApellido', $turista->persona->SegundoApellidoPersona ) }}">                  
                </div>
                @if ($errors->has('SegundoApellido'))
                       <span class="help-block">{{ $errors->first('SegundoApellido') }}</span>
                  @endif
            </div>
         </div>
         
       </div>
       <div class="row">
         <div class="col-md-3">
           <div class="form-group">
              <label for="Genero" class="col-sm-2 control-label">Genero*</label>
              
              <div class="">
                <select  class="form-control" name="genero" id="genero" disabled >    
                     <option value="M" @if (old('genero', $turista->persona->Genero) == "M") {{ 'selected' }} @endif>Masculino</option>
                     <option value="F" @if (old('genero', $turista->persona->Genero) == "F") {{ 'selected' }} @endif>Femenino</option>
                  </select>
              </div>
            </div>
         </div>
        <div class="col-md-3">
          <div class="form-group has-feedback{{ $errors->has('fechaNacimiento') ? ' has-error' : '' }}">
            <label for="fechaNacimiento" class="control-label">Fecha de Nacimiento</label>
               <div class="">
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  <input type="date" name="fechaNacimiento" class="form-control pull-right" value="{{ $turista->FechaNacimiento}}" readonly>          
                  </div>
                  
                  @if ($errors->has('fechaNacimiento'))
                       <span class="help-block">{{ $errors->first('fechaNacimiento') }}</span>
                  @endif
                </div>
          </div>
        </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Cod. Area </label>
                <select name="AreaTelContacto" class="form-control" >
                  <option value="503" {{ $guia[0]->AreaTelContacto == "503"  ? 'selected' : '' }} >503 - El Salvador</option>
                  <option value="501" {{ $guia[0]->AreaTelContacto == "501"  ? 'selected' : '' }} >501 - Belize</option>
                  <option value="502" {{ $guia[0]->AreaTelContacto == "502"  ? 'selected' : '' }} >502 - Guatemala</option>
                  <option value="504" {{ $guia[0]->AreaTelContacto == "504"  ? 'selected' : '' }} >504 - Honduras</option>
                  <option value="505" {{ $guia[0]->AreaTelContacto == "505"  ? 'selected' : '' }} >505 - Nicaragua</option>
                  <option value="506" {{ $guia[0]->AreaTelContacto == "506"  ? 'selected' : '' }} >506 - Costa Rica</option>
                  <option value="507" {{ $guia[0]->AreaTelContacto == "507"  ? 'selected' : '' }} >507 - Panama</option>                  
                </select>
              </div>
             </div>
             <div class="col-md-3">
                <div class="form-group has-feedback{{ $errors->has('TelefonoContacto')  ? ' has-error' : '' }}">
                <label for="telefono" class="control-label">Telefono*</label>
                  <div class="input-group">
                   <div class="input-group-addon">
                       <i class="fa fa-phone"></i>
                   </div>
                    <input type="text" name="TelefonoContacto" class="form-control"  id="telefono" value="{{ old('TelefonoContacto',$guia[0]->TelefonoContacto)}}" placeholder="Telefono">
                </div> 
                @if ($errors->has('TelefonoContacto'))
                 <span class="help-block">{{ $errors->first('TelefonoContacto') }}</span>
               @endif
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="nacionalidad" class="control-label">Nacionalidad*</label>
                <div class="">
                    <select  class="form-control" name="nacionalidad" id="nacionalidad"  disabled>             
                      @foreach($nacionalidad as $origen)
                       <option value="{{ $origen->IdNacionalidad }}" @if ($turista->IdNacionalidad == $origen->IdNacionalidad ) {{ 'selected' }} @endif>{{ $origen->Nacionalidad }}</option>
                      @endforeach
                    </select>
                </div>
            </div>
          </div>
       </div>

             <div class="row">
          <div class="form-group col-md-8 has-feedback{{ $errors->has('Direccion') ? ' has-error' : '' }}">
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
                   @if( ($documentos == 'duiPasaporte') || ($documentos == 'pasaporte') )
                     @foreach($turista->documentos as $documento)
                           @if($documento->TipoDocumento == "Pasaporte")
                      <input type="date" name="fechaVencimentoP" class="form-control pull-right" value="{{ old('fechaVencimentoP',$documento->FechaVenceDocumento) }}" >
                         @break
                           @endif
                     @endforeach
                   @else 
                    <input type="date" name="fechaVencimentoP" class="form-control pull-right" value="{{ old('fechaVencimentoP') }}" >
                   @endif            
                  </div>
                  @if ($errors->has('fechaVencimentoP'))
                       <span class="help-block">{{ $errors->first('fechaVencimentoP') }}</span>
                  @endif
                </div>
          </div>
        </div>
         
      </div>
      <div class="row">
            <div class="col-xs-12 col-md-6">
            <div class="form-group has-feedback{{ $errors->has('idiomasGuia') ? ' has-error' : '' }}">
                <label name="idiomasGuia" for="idioma">Idiomas</label>
                  <select class="form-control select2" multiple="multiple" name="idiomasGuia[]" id="idiomasGuia"  data-placeholder="Select a diomas" >
                  @foreach ($idiomas as $idioma)
                  <option value="{{$idioma->IdIdioma }}" {{ (collect(old('idiomasGuia',$idiomasGuia))->contains($idioma->IdIdioma)) ? 'selected':'' }} >{{$idioma->Idioma}}</option>
                  @endforeach
                  </select>
                  @if ($errors->has('idiomasGuia'))
                  <span class="help-block">{{ $errors->first('idiomasGuia') }}</span>
                @endif
             </div>
            </div>
          </div>
       
           <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-info  col-xs-12 col-sm-2 center-block"><STRONG>Actualizar</STRONG></button>
            </div>
          </div>
         </form>
         </div>
         <div class="box-footer">
             <p>*Estos campos son obligatorios</p>
             <p>Es necesario ingresar almenos un documento si es mayor de edad</p>
          </div>
      </div>
     </div> 
@endsection