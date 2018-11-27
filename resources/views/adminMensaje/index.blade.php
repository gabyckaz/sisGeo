@extends('master')

@section('head')
<h1>Actualizar mensaje</h1>
@endsection
@section('Title')
 <STRONG>Administrar Mensaj</STRONG>
@endsection
@section('contenido')

@if(session('status'))
  <br>
   <script type="text/javascript">
  alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4>{{ session("status") }}');

  </script>
@endif
@if(session('fallo'))
  <br>
  <script type="text/javascript">
 alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{session("fallo") }}');
 </script>
@endif

<div class="box box-solid">
  <div class="box-header">
        <h3 class="box-title"><strong>Actualizar mensaje</strong></h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
        </div>
      </div> 
      <div class="box-body">
  
<div class="row">
	<form id="miForm" method="POST" action="{{route('adminMensaje.update',$mensaje->id) }}">
		      {!! method_field('PUT') !!}
		      {!! csrf_field() !!}

 <div class="col-md-7 col-md-offset-2">
  <div class="row">
  	<div class="row">
         <div class="col-md-12">
            <div class="form-group has-feedback{{ $errors->has('de') ? ' has-error' : '' }}">
                  <label for="de" class="control-label">De :</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
                    <input type="text" name="de" class="form-control"  id="de" placeholder="De" value="{{old('de', $mensaje->de )}}" required>
                  </div>
                  @if ($errors->has('de'))
                       <span class="help-block">{{ $errors->first('de') }}</span>
                    @endif
            </div>
         </div>
  </div>
	  <div class="row">

          <div class="form-group col-md-8 has-feedback{{ $errors->has('cuerpoMensaje') ? ' has-error' : '' }}">
            <label for="observacionestransporte">Mensaje :</label>
            <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
              <textarea id="cuerpoMensaje" type="text" class="form-control" name="cuerpoMensaje" placeholder="Mensaje" required autofocus>{{ old('cuerpoMensaje',$mensaje->cuerpoMensaje) }}</textarea>
            </div>
            @if ($errors->has('cuerpoMensaje'))
            <span class="help-block">{{ $errors->first('cuerpoMensaje') }}</span>
            @endif
          </div>      
	  </div>
 </div>

</div>
    <div class="row">
      <div class="col-md-10 col-md-offset-4">
           <button type="submit" class="btn btn-info "><STRONG>Actualizar</STRONG></button>
      </div>
    </div>
  </form>
 </div>
</div>
</div>
@endsection