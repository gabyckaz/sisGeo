@extends('master')

@section('head')
<h1>Acompañantes</h1>

@endsection

@section('contenido')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Acompañantes</h3>
              <div class="box-body">
             <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Agregar Acompañantes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form class="form-horizontal" id="miForm" method="POST" action="{{route('user.update', $usuario->id) }}">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
               
                
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tipo</label>

                    <div class="col-sm-10">
                      <select  class="form-control" name="tipo" id="tipo" >    
                           <option value="a">Amigo</option>
                           <option value="f">Familiar</option>
                        </select>
                    </div>
                  </div>
                

                    
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Primer Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" name="PrimerNombrePersona" class="form-control"  id="input3" placeholder="Primer Nombre" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Segundo Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" name="SegundoNombrePersona" class="form-control" id="input4" placeholder="Primer Apellido">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Primer Apellido</label>

                    <div class="col-sm-10">
                      <input type="text" name="PrimerApellidoPersona" class="form-control"  id="input5" placeholder="Primer Apellido">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Segundo Apellido</label>

                    <div class="col-sm-10">
                      <input type="text" name="SegundoApellidoPersona" class="form-control"  id="input6" placeholder="Segundo Apellido" >
                    </div>
                  </div>        
                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Genero</label>

                    <div class="col-sm-10">
                      <select  class="form-control" name="genero" id="nacionalidad" >    
                           <option value="m">Masculino</option>
                           <option value="f">Femenino</option>
                        </select>
                    </div>
                  </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nacionalidad</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="nacionalidad" id="nacionalidad" >                  
                          @foreach($nacionalidad as $origen)
                           <option value="{{ $origen->id }}">{{ $origen->Nacionalidad }}</option>
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
                  <input type="text" name="fechaNacimiento" class="form-control pull-right" id="datepicker">
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tipo de Documento</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="tdocumento" id="tdocumento" >                  
                           <option value="">Documento</option>
                           <option value="t1">Dui</option>
                           <option value="t2">Pasaporte</option>
                          
                        </select>
                    </div>
              </div>
                  <div id="documentos">
                      <div id="t1">
                          <div class="form-group ">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Dui</label>

                                 <div class="col-sm-10">
                                   <input type="text" name="dui" class="form-control" id="input8" placeholder="Dui" >
                                </div>
                          </div>   
                      </div>
                      <div id="t2">
                          <div class="form-group ">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Pasaporte</label>

                                 <div class="col-sm-10">
                                   <input type="text" name="pasaporte" class="form-control" id="input8" placeholder="Pasaporte">
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
                          <input type="text" name="fvencimiento" class="form-control pull-right" id="datepicker">
                          </div>
                        </div>
                   <!-- /.input group -->
                 </div>
                 <div class="form-group ">
                     <label for="inputEmail3" class="col-sm-2 control-label">Direccion</label>

                     <div class="col-sm-10">                                   
                      <textarea  class="form-control" name="direccion" placeholder="Direccion..."></textarea>
                    </div>
                  </div>
                  <div class="form-group ">
                     <label for="inputEmail3" class="col-sm-2 control-label">Problemas de salud</label>

                     <div class="col-sm-10">                                   
                      <textarea  class="form-control" name="psalud" placeholder="Problemas de salud..."></textarea>
                    </div>
                  </div>
                </div>
             
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Actualizar</button>
                  
                </div>
                <!-- /.card-footer -->
              </form>
            
            
              </div>
              <!-- /.card-body -->
    </div> 
 
          


      </div>
      </div>
    </div>
  </div>
</div>
@endsection