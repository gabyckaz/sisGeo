@extends('master')

@section('head')
<h1>Acompañantes</h1>

@endsection
@section('Title')
Agregar familiares o amigos
@endsection
@section('contenido')
          @if(session()->has('message'))
            <!--div class="alert alert-success">
              { session()->get('message') }}
            </div -->
           <script type="text/javascript"> 
            console.log("Hola");
             alertify.success('<p class="fa fa-check" style="color: white"></p>{{ session()->get('message') }} ');
           // alertify.set('notifier','position', 'top-center');
           // alertify.success('Current position : ' + alertify.get('notifier','position'));
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
         $errors->first('Direccion') 

      )
      <div class="box box-solid">
     @else
     <div class="box box-warning collapsed-box">
     @endif
      <div class="box-header">
        <h3 class="box-title">Agregar familiares o amigos</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
        </div>
      </div> 
      <div class="box-body">
   
    <form id="miForm" method="POST" action="{{ route('user.agregar.familiarAmigo.store') }}">
      {!! method_field('PUT') !!}
      {!! csrf_field() !!}
       <div class="row">
         <div class="col-md-2">
          <div class="form-group">
            <label for="tipo" class="control-label">Tipo*</label>
              <div class="">
                <select  class="form-control" name="tipo" id="tipo" >    
                 <option value="A" @if (old('tipo') == "A") {{ 'selected' }} @endif>Amigo</option>
                 <option value="F" @if (old('tipo') == "F") {{ 'selected' }} @endif>Familiar</option>
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
                    <input type="text" name="Nombre" class="form-control"  id="Nombre" placeholder="Nombre" value="{{old('Nombre')}}" >
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
                  <input type="text" name="Apellido" class="form-control" id="Apellido" placeholder="Apellido" value="{{ old('Apellido') }}">                  
                </div>
                @if ($errors->has('Apellido'))
                       <span class="help-block">{{ $errors->first('Apellido') }}</span>
                  @endif
            </div>
         </div>
         
       </div>
       <div class="row">
         <div class="col-md-2">
           <div class="form-group">
              <label for="Genero" class="col-sm-2 control-label">Genero*</label>
              
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
          <div class="form-group has-feedback{{ $errors->has('fechaNacimiento') ? ' has-error' : '' }}">
            <label for="fechaNacimiento" class="control-label">Fecha de Nacimiento*</label>
               <div class="">
                 <div class="input-group date ">
                    <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                    </div>
                  <input type="date" name="fechaNacimiento" class="form-control pull-right" value="{{ old('fechaNacimiento') }}">          
                  </div>
                  @if ($errors->has('fechaNacimiento'))
                       <span class="help-block">{{ $errors->first('fechaNacimiento') }}</span>
                  @endif
                </div>
          </div>
        </div>
       </div>
             <div class="row">
          <div class="form-group col-md-8 has-feedback{{ $errors->has('Direccion') ? ' has-error' : '' }}">
            <label for="observacionestransporte">Direccion*</label>
            <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
              <textarea id="Direccion" type="text" class="form-control" name="Direccion" placeholder="Direccion">{{ old('Direccion') }}</textarea>
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
                  <input type="text" name="dui" class="form-control" id="dui" placeholder="Dui" value="{{ old('dui') }}">
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
                  <input type="date" name="fechaVencimentoD" class="form-control pull-right" value="{{ old('fechaVencimentoD') }}" >                  
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
                  <input type="text" name="pasaporte" class="form-control" id="pasaporte" placeholder="Pasaporte" value="{{ old('pasaporte') }}">
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
              <textarea id="psalud" type="text" class="form-control" name="psalud" placeholder="ninguno">{{ old('psalud') }}</textarea>
            </div>
            @if ($errors->has('psalud'))
            <span class="help-block">{{ $errors->first('psalud') }}</span>
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
              <p>Es necesario ingresar almenos un documento</p>
              </div>
      </div>
     </div> 
       <div class="col-md-8  col-md-offset-2">
        <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">Familiares y amigos</h3>
          </div>
                <div class="box-body">                  
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" >
                        <thead class="thead-dark">
                         <th>Tipo</th>
                         <th>Nombre</th>
                         <th>Apellido</th>
                         <th>Genero</th>
                         <th>Nacionalidad</th>
                         <th>Opciones</th>                        
                        </thead>
                          <tbody>
                            @foreach($familiaAmigos as $a)
                             <tr>
                               @if(strtoupper($a->EsFamiliar) == strtoupper("a"))
                                <td>Amigo</td>
                               @endif
                               @if(strtoupper($a->EsFamiliar) == strtoupper("f"))
                                <td>Familia</td>
                               @endif
                               @if(strtoupper($a->EsFamiliar) == strtoupper("af"))
                                <td>*</td>
                               @endif         
                               <td>{{ $a->PrimerNombrePersona }}</td>
                               <td>{{ $a->PrimerApellidoPersona }}</td>
                               @if($a->Genero == "M")
                                <td>Masculino</td>
                               @else
                                <td>Femenino</td>
                               @endif                   
                               <td>{{ $a->Nacionalidad }}</td>
                               <td>
                                 <a class="btn btn-warning btn-sm fa fa-cog btn-block" title="Editar"
                                 href="{{ route('user.editar.informacion.familaAmigo', $a->IdTurista) }}"></a>
                               </td>                             
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                      <center>{{ $familiaAmigos->links() }}</center>
                       
                  </div>
                </div> 

@endsection