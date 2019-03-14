@extends('master')

@section('head')
<h1>Editar mi información</h1>

@endsection
@section('Title')
<STRONG>Actualizar mi información de usuario</STRONG>
@endsection
@section('contenido')
        <!-- /.box-header -->
        @if(session()->has('message'))
           <script type="text/javascript">
              alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4> {{ session()->get('message') }} ');
            </script>
         @endif
         @if(session()->has('ErrorEdadMenor'))
          <script type="text/javascript">
              alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{ session()->get('ErrorEdadMenor') }} ');
            </script>
         @endif
   <!-- -->
   <div class="box box-solid">
      <div class="box-body">
       <form id="miForm" method="POST" enctype="multipart/form-data" action="{{route('user.completar.informacion.store') }}">
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-4">
              <div class="form-group has-feedback{{ $errors->has('avatar') ? ' has-error' : '' }}">
                <label for="avatar" class="control-label">Imagen para perfil</label>
                    <input id='input1' type="file" name="avatar" style="width: 100%;">
                    @if ($errors->has('avatar'))
                       <span class="help-block">{{ $errors->first('avatar') }}</span>
                     @endif
              </div>
            </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('PrimerNombrePersona') ? ' has-error' : '' }}" >
                  <label for="input2" class="control-label">Primer nombre*</label>
                   <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                    <input type="text" name="PrimerNombrePersona" class="form-control" id="input2" value="{{ old('PrimerNombrePersona',$usuario->persona->PrimerNombrePersona) }}" placeholder="Primer Nombre" required>
                   </div>
                @if ($errors->has('PrimerNombrePersona'))
                  <span class="help-block">{{ $errors->first('PrimerNombrePersona') }}</span>
                @endif
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('SegundoNombrePersona') ? ' has-error' : '' }}">
                  <label for="input3" class="control-label">Segundo nombre</label>
                   <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                      <input type="text" name="SegundoNombrePersona" class="form-control"  id="input3" value="{{ old('SegundoNombrePersona', $usuario->persona->SegundoNombrePersona) }}" placeholder="josé">
                   </div>
                   @if ($errors->has('SegundoNombrePersona'))
                    <span class="help-block">{{ $errors->first('SegundoNombrePersona') }}</span>
                  @endif
                </div>

          </div>
          <div class="col-md-3">
             <div class="form-group has-feedback{{ $errors->has('PrimerApellidoPersona') ? ' has-error' : '' }}" >
                    <label for="input4" class="control-label">Primer apellido*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                         <i class="fa fa-user"></i>
                        </div>
                       <input type="text" name="PrimerApellidoPersona" class="form-control"  id="input4" value="{{ old('PrimerApellidoPersona',$usuario->persona->PrimerApellidoPersona) }}"  placeholder="Primer Apellido" required>
                      </div>
                       @if ($errors->has('PrimerApellidoPersona'))
                        <span class="help-block">{{ $errors->first('PrimerApellidoPersona') }}</span>
                      @endif
                  </div>

          </div>
          <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('SegundoApellidoPersona') ? ' has-error' : '' }}">
                  <label for="input5" class="control-label">Segundo apellido</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                        <input type="text" name="SegundoApellidoPersona" class="form-control"  id="input5" value="{{ old('SegundoApellidoPersona',$usuario->persona->SegundoApellidoPersona) }}" id="input6" placeholder="Pérez">
                    </div>
                    @if ($errors->has('SegundoApellidoPersona'))
                    <span class="help-block">{{ $errors->first('SegundoApellidoPersona') }}</span>
                  @endif
                </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                <label>Género</label>
                <select name="Genero" class="form-control" style="width: 100%;" disabled>
                  <option {{ $usuario->persona->Genero == "M"   ? 'selected' : '' }}>Masculino</option>
                  <option {{ $usuario->persona->Genero == "F"   ? 'selected' : ''}}>Femenino</option>
                </select>
              </div>
             </div>
             @if( $existeTurista == "si")
                 <div class="col-md-3">
                   <div class="form-group">
                    <label for="fechaNacimiento" class="control-label">Fecha de nacimiento*</label>
                     <div class="input-group date ">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                      <input  id="fechaNacimiento" type="date" name="fechaNacimiento" value="{{ $turista->FechaNacimiento }}" class="form-control" readonly>
                      </div>
                    <!-- /.input group -->
                  </div>
                 </div>
                 @else
                  <div class="col-md-3">
                   <div class="form-group has-feedback{{ ( $errors->has('fechaNacimiento') || session()->has('ErrorFechaNac')) ? ' has-error' : '' }}">
                    <label for="fechaNacimiento" class="control-label">Fecha de nacimiento*</label>
                     <div class="input-group date ">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                      <input  id="fechaNacimiento" type="date" name="fechaNacimiento" value="{{ old('fechaNacimiento')}}" class="form-control" required>
                      </div>
                      @if ($errors->has('fechaNacimiento'))
                       <span class="help-block">{{ $errors->first('fechaNacimiento') }}</span>
                      @endif
                      @if (session()->has('ErrorFechaNac'))
                       <span class="help-block">{{ session()->get('ErrorFechaNac') }}</span>
                      @endif
                  </div>

                 </div>
              @endif

             @if($existeTurista == 'si')
             <div class="col-md-3">
              <div class="form-group ">
                 <label for="dui" class="control-label">DUI</label>
                       @if($documentos == 'duiPasaporte' || $documentos == 'dui')
                       @foreach($turista->documentos as $documento)
                           @if($documento->TipoDocumento == "DUI")
                             <input type="text" name="dui" value="{{$documento->NumeroDocumento}}" class="form-control" id="dui" readonly>
                            @break
                           @endif
                       @endforeach
                       @else
                       <input type="text" name="dui" class="form-control" data-mask="00000000-0" >
                       @endif
                 </div>
             </div>
             <div class="col-md-3">
               <div class="form-group has-feedback{{ ($errors->has('fechaVencimientoD') || session()->has('ErrorFechaVenceD') || session()->has('ErrorFechaVenceD') ) ? ' has-error' : '' }}">

                <label for="inputEmail3" class="control-label">Fecha de vencimiento de DUI</label>
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  @if($documentos == 'duiPasaporte' || $documentos == 'dui')
                       @foreach($turista->documentos as $documento)
                           @if($documento->TipoDocumento == "DUI")
                            <input  id="fechaVencimientoDUI" type="date" name="fechaVencimientoD" value="{{old('fechaVencimientoD', $documento->FechaVenceDocumento) }}" class="form-control" >
                           @break
                           @endif
                       @endforeach
                   @else
                     <input  id="fechaVencimientoDUI" type="date" value="{{ old('fechaVencimientoD')}}" name="fechaVencimientoD" class="form-control" >
                   @endif
                  </div>
                  @if ($errors->has('fechaVencimientoD'))
                       <span class="help-block">{{ $errors->first('fechaVencimientoD') }}</span>
                  @endif
                  @if (session()->has('ErrorFechaVenceD'))
                       <span class="help-block">{{ session()->get('ErrorFechaVenceD') }}</span>
                  @endif
                <!-- /.input group -->
              </div>
             </div>
             @else
              <div class="col-md-3">
                 <div class="form-group has-feedback{{ ( $errors->has('dui') || session()->has('documento') ) ? ' has-error' : '' }}">
                   <label for="dui" class="control-label">DUI</label>
                    <input type="text" name="dui" value="{{ old('dui')}}" class="form-control" data-mask="00000000-0" placeholder="11111111-1">
                     @if ($errors->has('dui'))
                       <span class="help-block">{{ $errors->first('dui') }}</span>
                     @endif
                     @if(session()->has('Errordui'))
                     <span class="help-block">{{ session()->get('Errordui') }}</span>
                     @endif
                     @if(session()->has('documento') )
                        <span class="help-block">Un documento es requerido</span>
                      @endif
                 </div>
             </div>
             <div class="col-md-3">
               <div class="form-group has-feedback{{  ( $errors->has('fechaVencimientoD') || session()->has('ErrorFechaVenceD') ) ? ' has-error' : '' }}">
                <label for="inputEmail3" class="control-label">Fecha de vencimiento de DUI</label>
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  <input  id="fechaVencimientoD" type="date" name="fechaVencimientoD" value="{{ old('fechaVencimientoD')}}" class="form-control" >
                  </div>
                  @if ($errors->has('fechaVencimientoD'))
                       <span class="help-block">{{ $errors->first('fechaVencimientoD') }}</span>
                  @endif
                  @if (session()->has('ErrorFechaVenceD'))
                       <span class="help-block">{{ session()->get('fechaVencimientoD') }}</span>
                  @endif

                <!-- /.input group -->
              </div>
             </div>
             @endif
        </div>

        <div class="row">

            @if($existeTurista == 'si')
             <div class="col-md-3">
              <div class="form-group">
                <label>Nacionalidad</label>
                <select name="nacionalidad" class="form-control" style="width: 100%;" disabled>
                    @foreach($nacionalidad as $origen)
                           <option value="{{ $origen->IdNacionalidad }}"
                            {{ $turista->IdNacionalidad == $origen->IdNacionalidad   ? 'selected' : '' }}> {{ $origen->Nacionalidad }} </option>
                    @endforeach
                </select>
              </div>
             </div>
             @else
              <div class="col-md-3">
               <div class="form-group">
                <label>Nacionalidad</label>
                <select name="nacionalidad" class="form-control" style="width: 100%;">
                    @foreach($nacionalidad as $origen)
                           <option value="{{ $origen->IdNacionalidad }}"
                           {{ old('nacionalidad') == $origen->IdNacionalidad   ? 'selected' : '' }}> {{ $origen->Nacionalidad }} </option>
                    @endforeach
                </select>
               </div>
             </div>
             @endif
             @if($existeTurista == 'si')
                 <div class="col-md-3">
                  <div class="form-group ">
                      <label for="pasaporte" class="control-label">Pasaporte</label>
                      @if($documentos == 'duiPasaporte' || $documentos == 'Pasaporte')
                       @foreach($turista->documentos as $documento)
                           @if($documento->TipoDocumento == "Pasaporte")
                           <input  type="text" name="pasaporte" class="form-control" value="{{ $documento->NumeroDocumento }}" id="pasaporte" placeholder="Pasaporte" readonly>
                           @break
                           @endif
                       @endforeach
                   @else
                      <input  type="text" name="pasaporte" class="form-control" value="{{ old('pasaporte')}}" data-mask="AA0000000" placeholder="Pasaporte">
                   @endif
                    </div>
                 </div>
              <div class="col-md-3">
               <div class="form-group has-feedback{{ ( $errors->has('fechaVencimientoP') || session()->has('ErrorFechaVenceP') ) ? ' has-error' : '' }}">
                <label for="fechaVencimientoP" class="control-label">Fecha de vencimiento de Pasaporte</label>
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>

                  @if($documentos == 'duiPasaporte' || $documentos == 'Pasaporte')
                   @foreach($turista->documentos as $documento)
                    @if($documento->TipoDocumento == "Pasaporte")
                      <input id="fechaVencimientoP" type="date" name="fechaVencimientoP" value="{{$documento->FechaVenceDocumento}}" class="form-control" >
                      @break
                           @endif
                       @endforeach
                   @else
                      <input id="fechaVencimientoP" type="date" name="fechaVencimientoP" value="{{ old('fechaVencimientoP') }}" class="form-control" >
                   @endif
                  </div>
                   @if ($errors->has('fechaVencimientoP'))
                       <span class="help-block">{{ $errors->first('fechaVencimientoP') }}</span>
                  @endif
                  @if (session()->has('ErrorFechaVenceP'))
                       <span class="help-block">{{ session()->get('ErrorFechaVenceP') }}</span>
                  @endif
                <!-- /.input group -->
              </div>
             </div>
              @else
                <div class="col-md-3">
                  <div class="form-group has-feedback{{( $errors->has('pasaporte') || session()->has('documento')) ? ' has-error' : '' }}">
                      <label for="pasaporte" class="control-label">Pasaporte</label>
                        <input  type="text" name="pasaporte" value="{{ old('pasaporte')}}" class="form-control" data-mask="AA0000000" placeholder="AA1111111">
                      @if ($errors->has('pasaporte'))
                        <span class="help-block">Un documento es requerido</span>
                      @endif
                      @if(session()->has('documento') )
                        <span class="help-block">Un documento es requerido</span>
                      @endif
                  </div>
                </div>
              <div class="col-md-3">
               <div class="form-group has-feedback{{ ( $errors->has('fechaVencimientoP') || session()->has('ErrorFechaVenceP') ) ? ' has-error' : '' }}">
                <label for="fechaVencimientoP" class="control-label">Fecha de vencimiento de Pasaporte</label>
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  <input id="fechaVencimientoP" type="date" name="fechaVencimientoP" value="{{ old('fechaVencimientoP')}}" class="form-control" >
                  </div>
                   @if ($errors->has('fechaVencimientoP'))
                       <span class="help-block">{{ $errors->first('fechaVencimientoP') }}</span>
                  @endif
                  @if (session()->has('ErrorFechaVenceP'))
                       <span class="help-block">{{ session()->get('ErrorFechaVenceP') }}</span>
                  @endif
                <!-- /.input group -->
              </div>
             </div>
              @endif
        </div>
        <div class="row">
          <div class="col-md-3">
          <div class="form-group">
            <label for="inputEmail3" class="control-label">Email</label>
            <div class="input-group">
                  <div class="input-group-addon">
                       <i class="fa fa-envelope"></i>
                    </div>
                  <input type="text" name="email" class="form-control" id="input2" value="{{ $usuario->email }}" placeholder="{{ $usuario->email}}" disabled>
                </div>
            </div>
          </div>
           <div class="col-md-2">
              <div class="form-group">
                <label>Código de área </label>
                <select name="AreaTelContacto" class="form-control" >
                  <option value="503" {{ old('AreaTelContacto',$usuario->persona->AreaTelContacto) == "503"  ? 'selected' : '' }}>503 - El Salvador</option>
                  <option value="501" {{ old('AreaTelContacto',$usuario->persona->AreaTelContacto) == "501"  ? 'selected' : '' }}>501 - Belize</option>
                  <option value="502" {{ old('AreaTelContacto',$usuario->persona->AreaTelContacto) == "502"  ? 'selected' : '' }}>502 - Guatemala</option>
                  <option value="504" {{ old('AreaTelContacto',$usuario->persona->AreaTelContacto) == "504"  ? 'selected' : '' }}>504 - Honduras</option>
                  <option value="505" {{ old('AreaTelContacto',$usuario->persona->AreaTelContacto) == "505"  ? 'selected' : '' }}>505 - Nicaragua</option>
                  <option value="506" {{ old('AreaTelContacto',$usuario->persona->AreaTelContacto) == "506"  ? 'selected' : '' }}>506 - Costa Rica</option>
                  <option value="507" {{ old('AreaTelContacto',$usuario->persona->AreaTelContacto) == "507"  ? 'selected' : '' }}>507 - Panamá</option>
                </select>
              </div>
             </div>
             <div class="col-md-4">
                <div class="form-group has-feedback{{ $errors->has('TelefonoContacto') ? ' has-error' : '' }}">
                  <label for="telefono" class="control-label">Teléfono*</label>
                  <div class="input-group">
                   <div class="input-group-addon">
                       <i class="fa fa-phone"></i>
                   </div>
                    <input type="text" maxlength="10" name="TelefonoContacto" class="form-control{{ $errors->has('TelefonoContacto') ? ' is-invalid' : '' }}" onkeypress="return filterInt(event,this);" id="telefono" value="{{ old('TelefonoContacto',$usuario->persona->TelefonoContacto) }}" placeholder="22223333" required>
                </div>
                 @if ($errors->has('TelefonoContacto'))
                  <span class="help-block">{{ $errors->first('TelefonoContacto') }}</span>
                @endif
                </div>
             </div>
        </div>
        <div class="row">
         @if( $existeTurista == 'si')
          <div class="col-md-6">
              <div class="form-group has-feedback{{ $errors->has('direccion') ? ' has-error' : '' }}">
                     <label for="direccion" class="control-label">Dirección*</label>
                     <span class="users-list-date" style=" font-size: 11pt">En caso que varias personas se encuentren en el mismo sector que usted se haría una parada cerca para recogerlos</span>
                     <div class="input-group">
                       <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                       <textarea   class="form-control" name="direccion" maxlength="100" placeholder="Ej. El salvador San Salvador Col. Escalon #34" required>{{ old('direccion',$turista->DomicilioTurista) }}</textarea>
                     </div>
                @if ($errors->has('direccion'))
                  <span class="help-block">{{ $errors->first('direccion') }}</span>
                @endif
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group ">
                     <label for="psalud" class="control-label">Problemas de salud</label>
                     <span class="users-list-date" style=" font-size: 11pt">Con el fin de estar preparados en alguna emergencia y tomar medidas preventivas. Ej: Asma, hipertensión, etc.</span>
                     <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                        <textarea   class="form-control" name="psalud" maxlength="256" placeholder="Problemas de salud..." required>{{ $turista->Problemas_Salud }}</textarea>
                      </div>
                  </div>
          </div>
          @else
            <div class="col-md-6">
              <div class="form-group has-feedback{{ $errors->has('direccion') ? ' has-error' : '' }}">
                <label for="direccion" class="control-label">Dirección*</label>
                <span class="users-list-date" style=" font-size: 11pt">En caso que varias personas se encuentren en el mismo sector que usted se haría una parada cerca para recogerlos</span>
                <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                <textarea  class="form-control" name="direccion" maxlength="100" placeholder="Ej. El salvador San Salvador Col. Escalon #34" required>{{ old('direccion') }}</textarea>
               </div>
              @if ($errors->has('direccion'))
                  <span class="help-block">{{ $errors->first('direccion') }}</span>
                @endif
            </div>
          </div>
          <div class="col-md-6">
              <div class="form-group ">
                <label for="psalud" class="control-label">Problemas de salud</label>
                <span class="users-list-date" style=" font-size: 11pt">Con el fin de estar preparados en alguna emergencia y tomar medidas preventivas. Ej: Asma, hipertensión, etc.</span>
                    <div class="input-group">
                     <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                      <textarea   class="form-control" name="psalud" maxlength="256" placeholder="Problemas de salud..." >{{ old('psalud','Ninguno') }}</textarea>
                     </div>
                  </div>
          </div>
          @endif
        </div>


        <div class="row">

             <div class="col-md-4">
                <div class="form-group">
                     <label for="notificaciones" class="control-label">Desea recibir notificaciones sobre nuevas excursiones por email</label>
                      <div >
                        <label class="custom-control custom-radio">
                          <input id="radio1" name="RecibirNotificacion" value="1" type="radio" class="custom-control-input" {{ $usuario->RecibirNotificacion == '1' ? 'checked' : '' }}>

                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description">Sí</span>
                        </label>
                        <label class="custom-control custom-radio col-md-offset-2">
                          <input id="radio2" name="RecibirNotificacion" value="0" type="radio" class="custom-control-input" {{ $usuario->RecibirNotificacion == '0' ? 'checked' : '' }}>
                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description">No</span>
                        </label>
                      </div>
                   </div>
             </div>

        </div>
          <div class="row">
            <div class="col-xs-12 col-md-6">
            <div class="form-group has-feedback{{ $errors->has('preferencias') ? ' has-error' : '' }}">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <label name="preferencias" for="itinerario">Preferencias (elegir al menos 1) *</label>
                  <select class="form-control select2" multiple="multiple" name="preferencias[]" id="preferencias" required>
                  @foreach ($categorias as $cat)
                  <option value="{{$cat->IdCategoria }}" {{ (collect(old('preferencias', $misPreferencias))->contains($cat->IdCategoria)) ? 'selected':'' }} >{{$cat->NombreCategoria}}</option>
                  @endforeach
                  </select>
                  @if ($errors->has('preferencias'))
                  <span class="help-block">{{ $errors->first('preferencias') }}</span>
                @endif
             </div>
             <input type="checkbox" id="checkbox" >Seleccionar todos</input>
            </div>
          </div>

         <div class="row">
            <br>
            <div class="col-md-12">
              <button type="submit" class="btn btn-info  col-xs-12 col-sm-2 center-block"><STRONG>Actualizar</STRONG></button>
            </div>
          </div>
      </div>
    </form>
  </div>
  <div class="box-footer">
             <p>*Estos campos son obligatorios</p>
             <p>Es necesario ingresar almenos un documento</p>
        </div>
</div>

<script type="text/javascript">
  function filterInt(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {
              return true;
          }else if(key == 46){
                if(filterN(tempValue)=== false){
                    return false;
                }else{
                    return true;
                }
          }else{
              return false;
          }
    }
};
function filterN(__val__){
    var preg = /^[0-9]+$/;//[0-9]/;//^([0-9]/)$/;//patron =/[0-9]/;
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }

};
function numeros(e){
   var tecla = e.keyCode;

    if (tecla==8 || tecla==9 || tecla==13){
        return true;
    }

    var patron =/[0-9]/;
    var tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

$(document).ready(function() {
    $("#checkbox").click(function(){
      if($("#checkbox").is(':checked') ){ //select all
        $("#preferencias").find('option').prop("selected",true);
        $("#preferencias").trigger('change');
      } else { //deselect all
        $("#preferencias").find('option').prop("selected",false);
        $("#preferencias").trigger('change');
      }
  });
});

</script>
@endsection
