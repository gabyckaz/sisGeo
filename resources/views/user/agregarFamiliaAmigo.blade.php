@extends('master')

@section('head')
<h1>Acompañantes</h1>

@endsection
@section('Title')
<STRONG>Registrar familiares y amigos</STRONG>
@endsection
@section('contenido')
  @if($idTuristaUsuario == 'si')
          @if(session()->has('message'))
           <script type="text/javascript">
             alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4>{{ session()->get('message') }} ');
            </script>
      @endif
   <div class="col-md-8 col-md-offset-2">
     @if($errors->first('Nombre') ||
         $errors->first('Apellido') ||
         $errors->first('fechaNacimiento') ||
         $errors->has('pasaporte') ||
         $errors->has('dui') ||
         $errors->has('fechaVencimentoD') ||
         $errors->first('fechaVencimentoP') ||
         $errors->first('Direccion') ||
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

    <form id="miForm" method="POST" action="{{route('user.agregar.familiarAmigo.store') }}">
      {!! method_field('PUT') !!}
      {!! csrf_field() !!}
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="tipo" class="control-label">Tipo*</label>
            <select  class="form-control" name="tipo" id="tipo" >
              <option value="A" @if (old('tipo') == "A") {{ 'selected' }} @endif>Amigo</option>
              <option value="F" @if (old('tipo') == "F") {{ 'selected' }} @endif>Familiar</option>
            </select>
           </div>
        </div>
        <div class="col-md-4">
            <div class="form-group has-feedback{{ $errors->has('Nombre') ? ' has-error' : '' }}">
                <label for="Nombre" class="control-label">Nombre*</label>
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
        <div class="col-md-4">
          <div class="form-group has-feedback{{ $errors->has('Apellido') ? ' has-error' : '' }}">
            <label for="Apellido" class="control-label">Apellido*</label>
              <div class="input-group">
                <div class="input-group-addon">
                     <i class="fa fa-user"></i>
                  </div>
                <input type="text" name="Apellido" class="form-control" id="Apellido" placeholder="Pérez" value="{{ old('Apellido') }}" required>
              </div>
              @if ($errors->has('Apellido'))
                     <span class="help-block">{{ $errors->first('Apellido') }}</span>
                @endif
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
           <div class="form-group">
              <label for="Genero" class="col-sm-2 control-label">Género*</label>
                <select  class="form-control" name="genero" id="genero" >
                     <option value="M" @if (old('genero') == "M") {{ 'selected' }} @endif>Masculino</option>
                     <option value="F" @if (old('genero') == "F") {{ 'selected' }} @endif>Femenino</option>
                </select>
            </div>
         </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="nacionalidad" class="control-label">Nacionalidad*</label>
                  <select  class="form-control" name="nacionalidad" id="nacionalidad" >
                    @foreach($nacionalidad as $origen)
                     <option value="{{ $origen->IdNacionalidad }}" @if (old('nacionalidad') == $origen->IdNacionalidad ) {{ 'selected' }} @endif>{{ $origen->Nacionalidad }}</option>
                    @endforeach
                  </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group has-feedback{{ ($errors->has('fechaNacimiento') || session()->has('ErrorFechaNac') ) ? ' has-error' : '' }}">
            <label for="fechaNacimiento" class="control-label">Fecha de Nacimiento*</label>
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
      <div class="row">
          <div class="form-group col-md-12 has-feedback{{ $errors->has('Direccion') ? ' has-error' : '' }}">
            <label for="observacionestransporte">Dirección*</label>
            <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
              <textarea id="Direccion" type="text" class="form-control" name="Direccion" placeholder="Ej. El salvador San Salvador Col. Escalon #34" required autofocus>{{ old('Direccion') }}</textarea>
            </div>
            @if ($errors->has('Direccion'))
            <span class="help-block">{{ $errors->first('Direccion') }}</span>
            @endif
          </div>
      </div>
       <hr>
      <div class="row">
        <div class="col-md-4 col-md-offset-1">
          <div class="form-group has-feedback{{ ( $errors->has('dui') || session()->has('Errordui') ) ? ' has-error' : '' }}">
              <label for="dui" class="control-label">DUI</label>
                <div class="">
                  <input type="text" name="dui" class="form-control" id="dui" value="{{ old('dui') }}" placeholder="11111111-1">
                   @if ($errors->has('dui'))
                       <span class="help-block">Un documento es requerido</span>
                  @endif
                  @if(session()->has('Errordui'))
                     <span class="help-block">{{ session()->get('Errordui') }}</span>
                     @endif
                </div>
           </div>
        </div>
        <div class="col-md-2">
          <center>ó</center>
        </div>
        <div class="col-md-4">
           <div class="form-group has-feedback{{ $errors->has('pasaporte') ? ' has-error' : '' }}">
              <label for="pasaporte" class="control-label">Pasaporte</label>
                <div class="">
                  <input type="text" name="pasaporte" class="form-control" id="pasaporte" placeholder="BB11111111" value="{{ old('pasaporte') }}">
                    @if ($errors->has('pasaporte'))
                       <span class="help-block">Un documento es requerido</span>
                    @endif
                </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-md-offset-1">
           <div class="form-group has-feedback{{ ( $errors->has('fechaVencimentoD') || session()->get('ErrorFechaVenceD')) ? ' has-error' : '' }}">
            <label for="fechaVencimentoD" class="control-label">Fecha de vencimiento</label>
               <div class="">
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
        <div class="col-md-2">
        </div>
        <div class="col-md-4">
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
          <div class="form-group col-md-12 has-feedback{{ $errors->has('psalud') ? ' has-error' : '' }}">
            <label for="psalud">Problemas de salud</label>
            <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
              <textarea id="psalud" type="text" class="form-control" name="psalud" >{{ old('psalud','Ninguno') }}</textarea>
            </div>
            @if ($errors->has('psalud'))
            <span class="help-block">{{ $errors->first('psalud') }}</span>
            @endif
          </div>
      </div>

           <div class="row">
              <div class="col-md-10 col-md-offset-4">
                      <button type="submit" class="btn btn-info "><STRONG>Registrar</STRONG></button>
                      <button type="reset" class="btn btn-warning "><STRONG>Limpiar</STRONG></button>
              </div>
                    <!-- /.col -->
            </div>
         </form>
         </div>
         <div class="box-footer">
               <p>*Estos campos son obligatorios</p>
              <p>Es necesario un documento para mayores de edad</p>
         </div>
      </div>
     </div>
       <div class="col-md-8  col-md-offset-2">
        <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title"><STRONG></STRONG></h3>
          </div>
                <div class="box-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="tblAgregarFamiliarAmigo" >
                        <thead class="thead-dark">
                         <th>Tipo</th>
                         <th>Nombre</th>
                         <th>Género</th>
                         <th>Nacionalidad</th>
                         <th>Opciones</th>
                        </thead>
                          <tbody>
                            @foreach($familiaAmigos as $familiaAmigo)
                             <tr>
                               @if(strtoupper($familiaAmigo->EsFamiliar) == strtoupper("a"))
                                <td>Amigo</td>
                               @endif
                               @if(strtoupper($familiaAmigo->EsFamiliar) == strtoupper("f"))
                                <td>Familia</td>
                               @endif
                               @if(strtoupper($familiaAmigo->EsFamiliar) == strtoupper("af"))
                                <td>Usuario</td>
                               @endif
                               <td>{{ ucfirst(strtolower($familiaAmigo->PrimerNombrePersona)) }}  {{ ucfirst(strtolower($familiaAmigo->PrimerApellidoPersona)) }}</td>
                               @if($familiaAmigo->Genero == "M")
                                <td>Masculino</td>
                               @else
                                <td>Femenino</td>
                               @endif
                               <td>{{ $familiaAmigo->Nacionalidad }}</td>
                               <td>
                                @if(strtoupper($familiaAmigo->EsFamiliar) == strtoupper("af"))
                                <a href="{{ route('usuario.completar.informacion') }}" class="btn btn-warning btn-sm fa fa-cog btn-block" title="Editar"></a>
                                @else
                                 <a class="btn btn-warning btn-sm fa fa-cog btn-block" title="Editar"
                                 href="{{ route('user.editar.informacion.familaAmigo', $familiaAmigo->IdTurista) }}"></a>
                                 @endif
                               </td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                      <center>{{ $familiaAmigos->links() }}</center>

                  </div>
                </div>
@else
<div class="row">
  <div class="col-md-12 col-md-offset-2">
   <h2><a href="{{ route('usuario.completar.informacion') }}">
     Debes completar tu informacion para poder continuar. :)
   </a></h2>
  </div>
</div>
@endif
@endsection
