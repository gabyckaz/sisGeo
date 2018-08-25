@extends('master')

@section('head')
<h1>Hola Mundo</h1>

@endsection

@section('contenido')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Usuarios</h3>
              <div class="box-body">
             <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                @if($existe == 'n') 
                 <h3 class="card-title">Completar Mi Informacion de Turista</h3>
                @else
                 <h3 class="card-title">Editar Mi Informacion de Turista</h3>
                @endif

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form class="form-horizontal" id="miForm" method="POST" action="{{route('user.complete.info.store') }}">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
               
              @if($existe == 'n') 
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="input2" value="{{ $usuario->email }}" placeholder="{{ $usuario->email}}" disabled="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Primer Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" name="PrimerNombrePersona" class="form-control" value="{{ $usuario->persona->PrimerNombrePersona }}" id="input3" placeholder="Primer Nombre" disabled="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Segundo Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" name="SegundoNombrePersona" class="form-control" value="{{ $usuario->persona->SegundoNombrePersona }}" id="input4" placeholder="Primer Apellido" disabled="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Primer Apellido</label>

                    <div class="col-sm-10">
                      <input type="text" name="PrimerApellidoPersona" class="form-control" value="{{ $usuario->persona->PrimerApellidoPersona }}" id="input5" placeholder="Primer Apellido" disabled="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Segundo Apellido</label>

                    <div class="col-sm-10">
                      <input type="text" name="SegundoApellidoPersona" class="form-control" value="{{ $usuario->persona->SegundoApellidoPersona }}" id="input6" placeholder="Segundo Apellido" disabled="true">
                    </div>
                  </div>
                  
                  <div class="form-group ">
                    <label for="inputEmail3" class="col-sm-2 control-label">Area de Telefono</label>

                    <div class="col-sm-10">
                      <input type="text" name="AreaTelContacto" class="form-control" value="{{ $usuario->persona->AreaTelContacto }}" id="input7" placeholder="Area de Telefono" disabled="true">
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="inputEmail3" class="col-sm-2 control-label">telefono</label>

                    <div class="col-sm-10">
                      <input type="text" name="TelefonoContacto" class="form-control" value="{{ $usuario->persona->TelefonoContacto }}" id="input8" placeholder="Telefono" disabled="true">
                    </div>
                  </div>
                
                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Genero</label>

                    <div class="col-sm-10">
                      <input type="text" name="Genero" class="form-control" value="{{ $usuario->persona->Genero }}" id="input9" placeholder="Genero" disabled="true">
                    </div>
                  </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nacionalidad</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="nacionalidad" id="nacionalidad" >                  
                          @foreach($nacionalidad as $origen)
                           <option value="{{ $origen->IdNacionalidad }}" 
                             {{ old('nacionalidad') ==  $origen->IdNacionalidad  ? 'selected' : '' }}
                            > {{ $origen->Nacionalidad }} </option>
                          @endforeach
                        </select>
                    </div>
                </div>
              
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Nacimiento</label>

                <div class="col-sm-10">
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  <!--input type="text" name="fechaNacimiento" class="form-control pull-right" id="datepicker" required -->
                  <input value="{{ old('fechaNacimiento') }}" id="fechaNacimiento" type="text" name="fechaNacimiento" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tipo de Documento</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="tdocumento" id="tdocumento" required>                  
                           <option value="">Documento</option>
                           <option value="t1">Dui</option>
                           <option value="t2">Pasaporte</option>
                        </select>
                        @if ($errors->has('dui'))
                           <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('dui') }}</strong>
                           </span>
                        @endif
                        @if ($errors->has('pasaporte'))
                           <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('pasaporte') }}</strong>
                           </span>
                        @endif
                    </div>
              </div>
                  <div id="documentos">
                      <div id="t1">
                          <div class="form-group ">
                                 <label for="inputEmail3" class="col-sm-2 control-label">DUI</label>

                                 <div class="col-sm-10">
                                   <input type="text" name="dui" class="form-control" id="dui" >
                                   
                                </div>
                          </div>   
                      </div>
                      <div id="t2">
                          <div class="form-group ">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Pasaporte</label>

                                 <div class="col-sm-10">
                                   <input  type="text" name="pasaporte" class="form-control" id="input8" placeholder="Pasaporte">
                                </div>
                          </div>   
                      </div>  
                  </div>
                 <div class="form-group">
                   <label for="inputEmail3" class="col-sm-2 control-label">Fecha de vencimiento de documento</label>

                        <div class="col-sm-10">
                         <div class="input-group date ">
                            <div class="input-group-addon">
                               <i class="fa fa-calendar"></i>
                            </div>
                        <!--<input type="text" name="fvencimiento" class="form-control pull-right" id="datepicker2" required> -->
                        <input value="{{ old('fvencimiento') }}" id="fechaVencimientoDoc" type="text" name="fvencimiento" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>
                          </div>
                        </div>
                   <!-- /.input group -->
                 </div>
                 <div class="form-group ">
                     <label for="inputEmail3" class="col-sm-2 control-label">Direccion</label>

                     <div class="col-sm-10">                                   
                      <textarea   class="form-control" name="direccion" maxlength="100" placeholder="Direccion..." required>{{ old('direccion') }}</textarea>
                    </div>
                  </div>
                  
                  <div class="form-group ">
                     <label for="inputEmail3" class="col-sm-2 control-label">Problemas de salud</label>

                     <div class="col-sm-10">                                   
                      <textarea class="form-control" name="psalud" maxlength="256" placeholder="Problemas de salud...">{{ old('psalud') }}</textarea>
                    </div>
                  </div>
                
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Completar mi Informacion de turista</button>
                </div>
                @endif
                <!-- /.card-footer -->
              </form>
              @if($existe == 's')
               <div class="card-footer">
                  <a class="btn btn-info" title="Actualizar mi Informacion de turista" 
                      href="{{ route('user.edit.info') }}/{{ $usuario->IdPersona }}">Actualizar mi Informacion de turista</a>
                </div>
              @endif
               
            
              </div>
              <!-- /.card-body -->
    </div> 
 
          


      </div>
      </div>
    </div>
  </div>
</div>
@endsection