@extends('master')

@section('head')
<h1>Guías turísticios</h1>

@endsection
@section('Title')
<STRONG>Registrar Guías Turísticos</STRONG>
@endsection
@section('contenido')

          @if(session()->has('message'))
           <script type="text/javascript">
            console.log("Hola");
             alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4>{{ session()->get('message') }} ');
            </script>
          @endif
   <div class="col-md-8 col-md-offset-2">
    @if($errors->first('Nombre') ||
        $errors->first('segundoNombre') ||
         $errors->first('apellido') ||
         $errors->first('segundoApellido') ||
         $errors->first('fechaNacimiento') ||
         $errors->has('pasaporte') ||
         $errors->has('dui') ||
         $errors->has('fechaVencimentoD') ||
         $errors->first('fechaVencimentoP') ||
         $errors->first('Direccion') ||
         $errors->first('TelefonoContacto') ||
         $errors->first('idiomasGuia') ||
         session()->has('ErrorFechaNac') ||
         session()->has('Errordui') ||
         session()->has('ErrorFechaVenceD') ||
         session()->has('ErrorFechaVenceP')

      )
      <div class="box box-solid">
      @else
     <div class="box box-warning collapsed-box">
     @endif

      <div class="box-header">
        <h3 class="box-title"><STRONG>Registrar</STRONG></h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
        </div>
      </div>
      <div class="box-body">

    <form id="miForm" method="POST" action="{{route('admin.agregar.guiaTuristico.store') }}">
      {!! method_field('PUT') !!}
      {!! csrf_field() !!}
       <div class="row">
         <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('Nombre') ? ' has-error' : '' }}">
               <label for="Nombre" class="control-label">Primer nombre*</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                    <input type="text" name="Nombre" class="form-control"  id="Nombre" placeholder="Juan" value="{{old('Nombre')}}" required>
                  </div>
                  @if ($errors->has('Nombre'))
                       <span class="help-block">{{ $errors->first('Nombre') }}</span>
                    @endif
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('segundoNombre') ? ' has-error' : '' }}">
               <label for="segundo Nombre" class="control-label">Segundo nombre</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                    <input type="text" name="segundoNombre" class="form-control"  id="segundoNombre" placeholder="José" value="{{old('segundoNombre')}}" >
                  </div>
                  @if ($errors->has('segundoNombre'))
                       <span class="help-block">{{ $errors->first('segundoNombre') }}</span>
                    @endif
            </div>
         </div>
          <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('apellido') ? ' has-error' : '' }}">
              <label for="Apellido" class="control-label">Primer apellido*</label>
                <div class="input-group">
                  <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                  <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Pérez" value="{{ old('apellido') }}" required>
                </div>
                @if ($errors->has('apellido'))
                       <span class="help-block">{{ $errors->first('apellido') }}</span>
                  @endif
            </div>
         </div>
          <div class="col-md-3">
            <div class="form-group has-feedback{{ $errors->has('segundoApellido') ? ' has-error' : '' }}">
              <label for="SegundoApellido" class="control-label">Segundo apellido</label>
                <div class="input-group">
                  <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                  <input type="text" name="segundoApellido" class="form-control" id="SegundoApellido" placeholder="López" value="{{ old('segundoApellido') }}" >
                </div>
                @if ($errors->has('segundoApellido'))
                       <span class="help-block">{{ $errors->first('segundoApellido') }}</span>
                  @endif
            </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-3">
           <div class="form-group">
              <label for="Genero" class="col-sm-2 control-label">Género*</label>

              <div class="">
                <select  class="form-control" name="genero" id="genero" >
                     <option value="M" @if (old('genero') == "M") {{ 'selected' }} @endif>Masculino</option>
                     <option value="F" @if (old('genero') == "F") {{ 'selected' }} @endif>Femenino</option>
                  </select>
              </div>
            </div>
         </div>
         <div class="col-md-3">
          <div class="form-group">
            <label for="nacionalidad" class="control-label">Nacionalidad*</label>
              <div class="">
                  <select  class="form-control" name="nacionalidad" id="nacionalidad" >
                    @foreach($nacionalidad as $origen)
                     <option value="{{ $origen->IdNacionalidad }}" @if (old('nacionalidad') == $origen->IdNacionalidad ) {{ 'selected' }} @endif>{{ $origen->Nacionalidad }}</option>
                    @endforeach
                  </select>
              </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-feedback{{ ($errors->has('fechaNacimiento') || session()->has('ErrorFechaNac') ) ? ' has-error' : '' }}">
            <label for="fechaNacimiento" class="control-label">Fecha de nacimiento*</label>
               <div class="form-group">
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  <input type="date" name="fechaNacimiento" class="form-control pull-right" value="{{ old('fechaNacimiento') }}" required>
                  </div>
                  @if ($errors->has('fechaNacimiento'))
                       <span class="help-block">{{ $errors->first('fechaNacimiento') }}</span>
                  @endif
                  @if (session()->has('ErrorFechaNac'))
                      <span class="help-block">{{ session()->get('ErrorFechaNac') }}</span>
                  @endif
                </div>
          </div>
        </div>
       </div>
       <div class="row">
           <div class="col-md-3">
              <div class="form-group">
                <label>Código de área</label>
                <select name="AreaTelContacto" class="form-control" >
                  <option value="503" >503 - El Salvador</option>
                  <option value="501" >501 - Belize</option>
                  <option value="502" >502 - Guatemala</option>
                  <option value="504" >504 - Honduras</option>
                  <option value="505" >505 - Nicaragua</option>
                  <option value="506" >506 - Costa Rica</option>
                  <option value="507" >507 - Panamá</option>
                </select>
              </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group has-feedback{{ $errors->has('TelefonoContacto')  ? ' has-error' : '' }}">
                  <label for="telefono" class="control-label">Teléfono*</label>
                  <div class="input-group">
                   <div class="input-group-addon">
                       <i class="fa fa-phone"></i>
                   </div>
                    <input type="number" name="TelefonoContacto" class="form-control"  id="telefono" value="{{ old('TelefonoContacto')}}" placeholder="22223333">
                </div> @if ($errors->has('TelefonoContacto'))
            <span class="help-block">{{ $errors->first('TelefonoContacto') }}</span>
            @endif

             </div>

       </div>
       </div>
        <div class="row">
          <div class="form-group col-md-6 has-feedback{{ $errors->has('Direccion') ? ' has-error' : '' }}">
            <label for="observacionestransporte">Dirección*</label>
            <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
              <textarea id="Direccion" type="text" class="form-control" name="Direccion" placeholder="Ej. El salvador San Salvador Col. Escalon #34" required autofocus>{{ old('Direccion') }}</textarea>
            </div>
            @if ($errors->has('Direccion'))
            <span class="help-block">{{ $errors->first('Direccion') }}</span>
            @endif
          </div>
          <div class="col-xs-6 col-md-6">
          <div class="form-group has-feedback{{ $errors->has('idiomasGuia') ? ' has-error' : '' }}">
              <label name="idiomasGuia" for="idioma">Idiomas(elegir al menos 1) *</label>
                <select class="form-control select2" multiple="multiple" name="idiomasGuia[]" id="idiomasGuia"  data-placeholder="Select a State" style="width: 100%;">
                @foreach ($idiomas as $idioma)
                <option value="{{$idioma->IdIdioma }}" {{ (collect(old('idiomasGuia'))->contains($idioma->IdIdioma)) ? 'selected':'' }} >{{$idioma->Idioma}}</option>
                @endforeach
                </select>
                @if ($errors->has('idiomasGuia'))
                <span class="help-block">{{ $errors->first('idiomasGuia') }}</span>
              @endif
           </div>
          </div>
      </div>
       <hr>
      <div class="row">

        <div class="col-md-3 col-md-offset-2">
          <div class="form-group has-feedback{{ ( $errors->has('dui') || session()->has('Errordui') ) ? ' has-error' : '' }}">
              <label for="dui" class="control-label">DUI</label>
                  <input type="text" name="dui" class="form-control" id="dui" placeholder="11111111-1" value="{{ old('dui') }}">
                   @if ($errors->has('dui'))
                       <span class="help-block">Un documento es requerido</span>
                  @endif
                  @if(session()->has('Errordui'))
                     <span class="help-block">{{ session()->get('Errordui') }}</span>
                     @endif
           </div>
        </div>
        <div class="col-md-3">
           <div class="form-group has-feedback{{ ( $errors->has('fechaVencimentoD') || session()->get('ErrorFechaVenceD')) ? ' has-error' : '' }}">
            <label for="fechaVencimentoD" class="control-label">Fecha de vencimiento</label>
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  <input type="date" name="fechaVencimentoD" class="form-control pull-right" value="{{ old('fechaVencimentoD') }}" >
                  </div>
                  @if ($errors->has('fechaVencimentoD'))
                       <span class="help-block">{{ $errors->first('fechaVencimentoD') }}</span>
                  @endif
                  @if (session()->has('ErrorFechaVenceD'))
                       <span class="help-block">{{ session()->get('ErrorFechaVenceD') }}</span>
                  @endif

          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-3 col-md-offset-2">
           <div class="form-group has-feedback{{ $errors->has('pasaporte') ? ' has-error' : '' }}">
              <label for="pasaporte" class="control-label">Pasaporte</label>
                <div class="">
                  <input type="text" name="pasaporte" class="form-control" id="pasaporte" placeholder="BB1111111" value="{{ old('pasaporte') }}">
                    @if ($errors->has('pasaporte'))
                       <span class="help-block">Un documento es requerido</span>
                    @endif
                </div>
            </div>
        </div>
          <div class="col-md-3">
           <div class="form-group has-feedback{{ ( $errors->has('fechaVencimentoP') || session()->has('ErrorFechaVenceP')) ? ' has-error' : '' }}">
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
                    @if (session()->has('ErrorFechaVenceP'))
                       <span class="help-block">{{ session()->get('ErrorFechaVenceP') }}</span>
                    @endif
                </div>
          </div>
        </div>
      </div>
       <div class="row">
          <div class="col-md-12 col-md-offset-4">
            <br>
              <button type="submit" class="btn btn-info "><STRONG>Registrar</STRONG></button>
              <button type="reset" class="btn btn-warning "><STRONG>Limpiar</STRONG></button>
          </div>
        </div>
        </form>
      </div>
        <div class="box-footer">
           <p>*Estos campos son obligatorios</p>
        </div>
      </div>
     </div>
       <div class="col-md-8  col-md-offset-2">
        <div class="box box-warning">
        <div class="box-header">
          <!-- <h3 class="box-title"><STRONG></STRONG></h3> -->
          </div>
                <div class="box-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="tblAgregarGuia" >
                        <thead class="thead-dark">
                         <th>Nombre</th>
                         <th>Teléfono</th>
                         <th>Nacionalidad</th>
                         <th>Opciones</th>
                        </thead>
                          <tbody>
                             @foreach($guias as $guia)
                             <tr>
                                <td>{{ ucfirst(strtolower($guia->PrimerNombrePersona)) }}  {{ ucfirst(strtolower($guia->PrimerApellidoPersona)) }}</td>
                                <td>({{$guia->AreaTelContacto}}){{$guia->TelefonoContacto}}</td>
                                <td>{{$guia->Nacionalidad}}</td>
                                <td><a class="btn btn-warning btn-sm fa fa-cog btn-block" title="Editar guia"
                                href="{{ route('user.editar.informacion.guia', $guia->IdEmpleadoGEO) }}"></a></td>
                            </tr>
                             @endforeach
                          </tbody>
                      </table>
                      <center>{{ $guias->links() }} </center>

                  </div>
                </div>
              </div>
            </div>
@endsection
