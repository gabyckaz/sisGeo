@extends('master')

@section('head')
<h1>Hola Mundo</h1>

@endsection
@section('Title')
Editar mi informacion de usuario
@endsection
@section('contenido')
<!-- SELECT2 EXAMPLE -->

        <!-- /.box-header -->
        @if(session()->has('message'))
           <script type="text/javascript">
            console.log("Hola");
              alertify.success('<p class="fa fa-check" style="color: white"></p> {{ session()->get('message') }} ');
            </script>
         @endif
   <!-- -->
       <form id="miForm" method="POST" enctype="multipart/form-data" action="{{route('user.completar.informacion.store') }}">
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="avatar" class="control-label">Imagen Para Perfil</label>
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
                  <label for="input2" class="control-label">Primer Nombre</label>
                   <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                    <input type="text" name="PrimerNombrePersona" class="form-control" id="input2" value="{{ $usuario->persona->PrimerNombrePersona }}" placeholder="Primer Nombre">
                   </div>
                </div>
                @if ($errors->has('PrimerNombrePersona'))
                       <span class="help-block">{{ $errors->first('PrimerNombrePersona') }}</span>
                     @endif
          </div>
          <div class="col-md-3">
            <div class="form-group">
                  <label for="input3" class="control-label">Segundo Nombre</label>
                   <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                      <input type="text" name="SegundoNombrePersona" class="form-control"  id="input3" value="{{ $usuario->persona->SegundoNombrePersona }}" placeholder="Segundo Nombre">
                   </div>
                </div>
          </div>
          <div class="col-md-3">
             <div class="form-group has-feedback{{ $errors->has('PrimerApellidoPersona') ? ' has-error' : '' }}" >
                    <label for="input4" class="control-label">Primer Apellido</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                         <i class="fa fa-user"></i>
                        </div>
                       <input type="text" name="PrimerApellidoPersona" class="form-control"  id="input4" value="{{ $usuario->persona->PrimerApellidoPersona }}"  placeholder="Primer Apellido">
                      </div>
                  </div>
                  @if ($errors->has('PrimerApellidoPersona'))
                       <span class="help-block">{{ $errors->first('PrimerApellidoPersona') }}</span>
                     @endif
          </div>
          <div class="col-md-3">
            <div class="form-group">
                  <label for="input5" class="control-label">Segundo Apellido</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                        <input type="text" name="SegundoApellidoPersona" class="form-control"  id="input5" value="{{ $usuario->persona->SegundoApellidoPersona }}" id="input6" placeholder="Segundo Apellido">
                    </div>
                </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                <label>Genero</label>
                <select name="Genero" class="form-control" style="width: 100%;" disabled>
                  <option {{ $usuario->persona->Genero == "M"   ? 'selected' : '' }}>Masculino</option>
                  <option {{ $usuario->persona->Genero == "F"   ? 'selected' : ''}}>Femenino</option>
                </select>
              </div>
             </div>
             @if( $existeTurista == "si")
                 <div class="col-md-3">
                   <div class="form-group ">
                    <label for="fechaNacimiento" class="control-label">Fecha de Nacimiento</label>
                     <div class="input-group date ">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                      <!--input type="text" name="fechaNacimiento" class="form-control pull-right" id="datepicker" required -->
                      <input  id="fechaNacimiento" type="date" name="fechaNacimiento" value="{{ $turista->FechaNacimiento }}" class="form-control" readonly>
                      </div>
                    <!-- /.input group -->
                  </div>
                 </div>
                 @else
                  <div class="col-md-3">
                   <div class="form-group">
                    <label for="fechaNacimiento" class="control-label">Fecha de Nacimiento</label>
                     <div class="input-group date ">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                      <!--input type="text" name="fechaNacimiento" class="form-control pull-right" id="datepicker" required -->
                      <!--input  id="fechaNacimiento" type="text" name="fechaNacimiento" value="{old('fechaNacimiento')}}" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required -->
                      <input  id="fechaNacimiento" type="date" name="fechaNacimiento" value="{{ old('fechaNacimiento')}}" class="form-control" >
                      </div>
                    <!-- /.input group -->
                  </div>
                 </div>
              @endif

             @if($existeTurista == 'si')
             <div class="col-md-3">
              <div class="form-group ">
                 <label for="dui" class="control-label">DUI </label>
                       @if($documentos == 'duiPasaporte' || $documentos == 'dui')
                       @foreach($turista->documentos as $documento)
                           @if($documento->TipoDocumento == "DUI")
                             <input type="text" name="dui" value="{{$documento->NumeroDocumento}}" class="form-control" id="dui" readonly>
                            @break
                           @endif
                       @endforeach
                       @else
                       <input type="text" name="dui" class="form-control" id="dui" >
                       @endif
                 </div>
             </div>
             <div class="col-md-3">
               <div class="form-group">
                <label for="inputEmail3" class="control-label">Fecha de Vencimiento de DUI</label>
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  <!--input type="text" name="fechaNacimiento" class="form-control pull-right" id="datepicker" required -->
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
                  @if ($errors->has('fechaVencimientoD'))
                       <span class="help-block">{{ $errors->first('fechaVencimientoD') }}</span>
                  @endif
                  </div>
                <!-- /.input group -->
              </div>
             </div>
             @else
              <div class="col-md-3">
                 <div class="form-group ">
                   <label for="dui" class="control-label">DUI</label>
                    <input type="text" name="dui" value="{{ old('dui')}}" class="form-control" id="dui">
                 </div>
             </div>
             <div class="col-md-3">
               <div class="form-group has-feedback{{ $errors->has('fechaVencimientoD') ? ' has-error' : '' }}">
                <label for="inputEmail3" class="control-label">Fecha de Vencimiento de DUI</label>
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  <!--input type="text" name="fechaNacimiento" class="form-control pull-right" id="datepicker" required -->
                  <input  id="fechaVencimientoD" type="date" name="fechaVencimientoD" value="{{ old('fechaVencimientoD')}}" class="form-control" >
                  </div>
                  @if ($errors->has('fechaVencimientoD'))
                       <span class="help-block">{{ $errors->first('fechaVencimientoD') }}</span>
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
                <select name="nacionalidad" class="form-control" style="width: 100%;">
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
                      <input  type="text" name="pasaporte" class="form-control" value="{{ old('pasaporte')}}" id="pasaporte" placeholder="Pasaporte">
                   @endif
                    </div>
                 </div>
              <div class="col-md-3">
               <div class="form-group has-feedback{{ $errors->has('fechaVencimientoP') ? ' has-error' : '' }}">
                <label for="fechaVencimientoP" class="control-label">Fecha de Vencimiento de Pasaporte</label>
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  <!--input type="text" name="fechaNacimiento" class="form-control pull-right" id="datepicker" required -->
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
                <!-- /.input group -->
              </div>
             </div>
              @else
                <div class="col-md-3">
                  <div class="form-group ">
                      <label for="pasaporte" class="control-label">Pasaporte</label>
                        <input  type="text" name="pasaporte" value="{{ old('pasaporte')}}" class="form-control" id="pasaporte" placeholder="Pasaporte">
                  </div>
                </div>
              <div class="col-md-3">
               <div class="form-group has-feedback{{ $errors->has('fechaVencimientoP') ? ' has-error' : '' }}">
                <label for="fechaVencimientoP" class="control-label">Fecha de Vencimiento de Pasaporte</label>
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  <!--input type="text" name="fechaNacimiento" class="form-control pull-right" id="datepicker" required -->
                  <input id="fechaVencimientoP" type="date" name="fechaVencimientoP" value="{{ old('fechaVencimientoP')}}" class="form-control" >
                  </div>
                   @if ($errors->has('fechaVencimientoP'))
                       <span class="help-block">{{ $errors->first('fechaVencimientoP') }}</span>
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
                <label>Cod. Area </label>
                <select name="AreaTelContacto" class="form-control" >
                  <option value="503" {{ $usuario->persona->AreaTelContacto == "503"  ? 'selected' : '' }}>503 - El Salvador</option>
                  <option value="501" {{ $usuario->persona->AreaTelContacto == "501"  ? 'selected' : '' }}>501 - Belize</option>
                  <option value="502" {{ $usuario->persona->AreaTelContacto == "502"  ? 'selected' : '' }}>502 - Guatemala</option>
                  <option value="504" {{ $usuario->persona->AreaTelContacto == "504"  ? 'selected' : '' }}>504 - Honduras</option>
                  <option value="505" {{ $usuario->persona->AreaTelContacto == "505"  ? 'selected' : '' }}>505 - Nicaragua</option>
                  <option value="506" {{ $usuario->persona->AreaTelContacto == "506"  ? 'selected' : '' }}>506 - Costa Rica</option>
                  <option value="507" {{ $usuario->persona->AreaTelContacto == "507"  ? 'selected' : '' }}>507 - Panama</option>
                </select>
              </div>
             </div>
             <div class="col-md-4">
                  <label for="telefono" class="control-label">Telefono</label>
                  <div class="input-group">
                   <div class="input-group-addon">
                       <i class="fa fa-phone"></i>
                   </div>
                    <input type="text" name="TelefonoContacto" class="form-control"  id="telefono" value="{{ $usuario->persona->TelefonoContacto }}" placeholder="Telefono">
                </div>
             </div>
        </div>
        <div class="row">
         @if( $existeTurista == 'si')
          <div class="col-md-6">
              <div class="form-group has-feedback{{ $errors->has('direccion') ? ' has-error' : '' }}">
                     <label for="direccion" class="control-label">Direccion</label>
                      <textarea   class="form-control" name="direccion" maxlength="100" placeholder="Direccion..." required>{{ $turista->DomicilioTurista }}</textarea>
                  </div>
          </div>
          <div class="col-md-6">
              <div class="form-group ">
                     <label for="psalud" class="control-label">Problemas de salud</label>
                      <textarea   class="form-control" name="psalud" maxlength="256" placeholder="Problemas de salud..." >{{ $turista->Problemas_Salud }}</textarea>
                  </div>
          </div>
          @else
            <div class="col-md-6">
              <div class="form-group ">
                <label for="direccion" class="control-label">Direccion</label>
                <textarea  class="form-control" name="direccion" maxlength="100" placeholder="Direccion..." required>{{ old('direccion') }}</textarea>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group ">
                     <label for="psalud" class="control-label">Problemas de salud</label>
                      <textarea   class="form-control" name="psalud" maxlength="256" placeholder="Problemas de salud..." >{{ old('psalud') }}</textarea>
                  </div>
          </div>
          @endif
        </div>


        <div class="row">

             <div class="col-md-4">
                <div class="form-group">
                     <label for="notificaciones" class="control-label">Notificaciones</label>
                      <div >
                        <label class="custom-control custom-radio">
                          <input id="radio1" name="RecibirNotificacion" value="1" type="radio" class="custom-control-input" {{ $usuario->RecibirNotificacion == '1' ? 'checked' : '' }}>

                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description">Recibir</span>
                        </label>
                        <label class="custom-control custom-radio col-md-offset-2">
                          <input id="radio2" name="RecibirNotificacion" value="2" type="radio" class="custom-control-input" {{ $usuario->RecibirNotificacion == '2' ? 'checked' : '' }}>
                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description">No recibir</span>
                        </label>
                      </div>
                   </div>
             </div>

        </div>

         <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-info center-block">Actualizar</button>
            </div>
            <!-- /.col -->
          </div>
      </div>
    </form>
     <!--div class="box-footer">
        * Estos campos son obligatorios
       <p>Es necesario ingresar almenos un documento</p>
      </div -->
   <!--  ->
@endsection
