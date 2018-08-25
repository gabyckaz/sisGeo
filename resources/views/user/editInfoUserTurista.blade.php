@extends('master')

@section('head')
<h1>Acompañantes</h1>

@endsection

@section('contenido')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Editar</h3>
              <div class="box-body">
             <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Editar mi Informacion de Turista</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form class="form-horizontal" id="miForm" method="POST" action="">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}
               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nacionalidad</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="nacionalidad" id="nacionalidad" >                  
                          @foreach( $nacionalidad as $origen )
                           <option value="{{ $origen->id }}" 
                            {{ $turista->IdNacionalidad  ==  $origen->IdNacionalidad  ? 'selected' : '' }}>{{ $origen->Nacionalidad }}</option>
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
                   <input value="{{ $turista->FechaNacimiento }}" type="text" name="fechaNacimiento" class="form-control pull-right" id="datepicker" disabled>
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              
                 <div class="form-group ">
                   @if( $turista->TipoDocumento == "t1")
                    <label for="inputEmail3" class="col-sm-2 control-label">DUI</label>
                   @else
                   <label for="inputEmail3" class="col-sm-2 control-label">Pasaporte</label>
                   @endif
                    <div class="col-sm-10">
                      <input type="text" name="documento" class="form-control" value="{{ $turista->Dui_Pasaporte }}" id="input8" placeholder="documento" disabled="true">
                    </div>
                  </div>
              
                 <div class="form-group">
                   <label for="inputEmail3" class="col-sm-2 control-label">Fecha de vencimiento de documento</label>

                        <div class="col-sm-10">
                         <div class="input-group date ">
                            <div class="input-group-addon">
                               <i class="fa fa-calendar"></i>
                            </div>
                          <input type="text" value="{{$turista->FechaVenceDocumen}}" name="fvencimiento" class="form-control pull-right" id="datepicker">
                          </div>
                        </div>
                   <!-- /.input group -->
                 </div>
                 <div class="form-group ">
                     <label for="inputEmail3" class="col-sm-2 control-label">Direccion</label>

                     <div class="col-sm-10">                                   
                      <textarea  class="form-control" name="direccion" >{{$turista->DomicilioTurista}}</textarea>
                    </div>
                  </div>
                  <div class="form-group ">
                     <label for="inputEmail3" class="col-sm-2 control-label">Problemas de salud</label>

                     <div class="col-sm-10">                                   
                      <textarea  class="form-control" name="psalud">{{ trim($turista->Problemas_Salud) }}</textarea>
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