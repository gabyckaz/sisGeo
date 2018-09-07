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
           alertify.success("{{ session()->get('message') }}");
           // alertify.set('notifier','position', 'top-center');
           // alertify.success('Current position : ' + alertify.get('notifier','position'));
            </script>
         @endif
    <form id="miForm" method="POST" action="{{route('user.agregar.familiarAmigo.store') }}">
      {!! method_field('PUT') !!}
      {!! csrf_field() !!}
       <div class="row">
         <div class="col-md-2">
          <div class="form-group">
            <label for="tipo" class="control-label">Tipo</label>
              <div class="">
                <select  class="form-control" name="tipo" id="tipo" >    
                 <option value="a">Amigo</option>
                 <option value="f">Familiar</option>
               </select>
             </div>
           </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <label for="PrimerNombrePersona" class="control-label">Nombre</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                    <input type="text" name="PrimerNombrePersona" class="form-control"  id="PrimerNombrePersona" placeholder="*Nombre" value="{{old('PrimerNombrePersona')}}" >
                  </div>
                  @if ($errors->has('PrimerNombrePersona'))
                       <span class="help-block">{{ $errors->first('PrimerNombrePersona') }}</span>
                    @endif
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
              <label for="PrimerApellidoPersona" class="control-label">Apellido</label>
                <div class="input-group">
                  <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                  <input type="text" name="PrimerApellidoPersona" class="form-control" id="PrimerApellidoPersona" placeholder="*Apellido" value="{{ old('PrimerApellidoPersona') }}">                  
                </div>
                @if ($errors->has('PrimerNombrePersona'))
                       <span class="help-block">{{ $errors->first('PrimerApellidoPersona') }}</span>
                  @endif
            </div>
         </div>
         <div class="col-md-2">
           <div class="form-group">
              <label for="Genero" class="col-sm-2 control-label">Genero</label>
              
              <div class="">
                <select  class="form-control" name="genero" id="genero" >    
                     <option value="m">Masculino</option>
                     <option value="f">Femenino</option>
                  </select>
              </div>
            </div>
         </div>
         <div class="col-md-2">
          <div class="form-group">
            <label for="nacionalidad" class="control-label">Nacionalidad</label>
              <div class="">
                  <select  class="form-control" name="nacionalidad" id="nacionalidad" >             
                    @foreach($nacionalidad as $origen)
                     <option value="{{ $origen->IdNacionalidad }}">{{ $origen->Nacionalidad }}</option>
                    @endforeach
                  </select>
              </div>
          </div>
        </div>
       </div>
      <div class="row">
        <div class="col-md-2">
          <div class="form-group">
            <label for="fechaNacimiento" class="control-label">Fecha de Nacimiento</label>
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
        <div class="col-md-3">
          <div class="form-group ">
              <label for="dui" class="control-label">DUI</label>
                <div class="">
                  <input type="text" name="dui" class="form-control" id="dui" placeholder="Dui" value="{{ old('dui') }}">
                   @if ($errors->has('dui'))
                       <span class="help-block">{{ $errors->first('dui') }}</span>
                  @endif
                </div>
           </div>
        </div>
        <div class="col-md-2">
           <div class="form-group">
            <label for="fechaVencimentoD" class="control-label">Fecha de Vencimiento DUI</label>
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
        <div class="col-md-3">
           <div class="form-group">
              <label for="pasaporte" class="control-label">Pasaporte</label>
                <div class="">
                  <input type="text" name="pasaporte" class="form-control" id="pasaporte" placeholder="Pasaporte" value="{{ old('pasaporte') }}">
                    @if ($errors->has('pasaporte'))
                       <span class="help-block">{{ $errors->first('pasaporte') }}</span>
                    @endif
                </div>
            </div>
        </div>
          <div class="col-md-2">
           <div class="form-group">
            <label for="fechaVencimentoP" class="control-label">Fecha de Vencimiento Pasaporte</label>
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
        <div class="col-md-6">
          <div class="form-group ">
            <label for="direccion" class="control-label">Direccion</label>
              <div class="">                                   
                <textarea  class="form-control" name="direccion" placeholder="Direccion...">
                  {{ old('direccion')}}
                </textarea>
                  @if ($errors->has('direccion'))
                       <span class="help-block">{{ $errors->first('direccion') }}</span>
                  @endif
              </div>
          </div>
        </div>
        <div class="col-md-6">
           <div class="form-group">
              <label for="psalud" class="control-label">Problemas de salud</label>
                <div class="">                                   
                  <textarea  class="form-control" name="psalud" placeholder="Problemas de salud...">
                    {{ old('psalud') }}
                  </textarea>
                  @if ($errors->has('psalud'))
                       <span class="help-block">{{ $errors->first('psalud') }}</span>
                  @endif
                </div>
            </div>
        </div>
      </div>        
          <button type="submit" class="btn btn-info">Guardar</button>
      </form>
            
@endsection