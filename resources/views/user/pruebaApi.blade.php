@extends('master')

@section('head')
<h1>Acompañantes</h1>

@endsection
@section('Title')
 Agregar acompañantes a reserva
@endsection

@section('contenido')
      <div class="row">
      	<div class="col-md-7 col-md-offset-1">
      	<form>
        <div class="col-md-3">
          <div class="form-group">
            <div class="checkbox">
              <label><input type="checkbox" name="usuario" value="{{$userTurista[0]->Id}}" checked>
               {{$userTurista[0]->Nombre}} {{$userTurista[0]->Apellido}}
              </label>
            </div>
          </div>
      	 </div>
      	 <div class="col-md-3">
          <div class="form-group">
          	<label>Amigos</label>
      	    <input type="text" name="algo2" id="XXX2">
      	   </div>
      	  </div>
      	 <div class="col-md-3">
           <div class="form-group">
           	<label>Familia</label>
            <input type="text" name="algo" id="XXX">
           </div>
          </div>
        </form>
      </div>
      </div>
<div class="row">
	<div class="col-md-6">
   <div class="">
    <div class="box box-warning collapsed-box">
      <div class="box-header">
         <h3 class="box-title">Familia</h3>
         <div class="box-tools pull-right">
           <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
         </div>
      </div> 
      <div class="box-body">
        <form id="myform2" method="post">
            {{-- <p><b>Selected rows data</b></p>
            <pre id="view-rows2"></pre>
            <p><b>Form data as submitted to the server</b></p>
            <pre id="view-form2"></pre> 
            <p><button class="btn btn-danger">View Selected</button><br/></p> --}}
            <table id="mytable2" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>    
                        <th></th>  
                        <th>Nombre</th>  
                        <th>Apellido</th>  
                        <th>Tipo</th>  
                        <th>Genero</th>  
                    </tr>
                </thead>
                <tbody>
                	@foreach( $familia as $familiar)
                    <tr> 
                        <td>{{$familiar->Id}}</td>  
                        <td>{{ ucfirst(strtolower($familiar->Nombre)) }}</td>  
                        <td>{{ ucfirst(strtolower($familiar->Apellido)) }}</td>  
                        <td>Familia</td>  
                        <td>{{ $familiar->Genero == "M" ?'Masculino' : 'Femenino' }}</td>               
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p><button class="btn btn-info">Reservar</button><br/></p>
        </form>
      </div> 
    </div>
    </div>
 </div>

<div class="col-md-6">
  <div class="">
	<div class="box box-warning collapsed-box">
	  <div class="box-header">
	     <h3 class="box-title">Amigos</h3>
	     <div class="box-tools pull-right">
	       <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
	     </div>
	  </div> 
      <div class="box-body">	   
        <form id="myform" method="post">
            {{-- <p><b>Selected rows data</b></p>
            <pre id="view-rows"></pre>
            <p><b>Form data as submitted to the server</b></p>
            <pre id="view-form"></pre> 
            <p><button class="btn btn-danger">View Selected</button><br/></p> --}}
            <table id="mytable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>    
                        <th></th>  
                        <th>Nombre</th>  
                        <th>Apellido</th>  
                        <th>Tipo</th>  
                        <th>Genero</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach( $amigos as $amigo)
                    <tr>    
                        <td>{{$amigo->Id}}</td>  
                        <td>{{ ucfirst(strtolower($amigo->Nombre)) }}</td>  
                        <td>{{ ucfirst(strtolower($amigo->Apellido)) }}</td>  
                        <td>Amig@</td>  
                        <td>{{ $amigo->Genero == "M" ?'Masculino' : 'Femenino' }}</td>                  
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p><button class="btn btn-info">Reservar</button><br/></p>
        </form>
      </div> 
    </div>
  </div>
</div>
</div>

@endsection
