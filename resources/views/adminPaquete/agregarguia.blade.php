@extends('master')

@section('head')
<h1>Guia Paquete</h1>

@endsection
@section('Title')
<strong>Asignar guía</strong>
@endsection
@section('contenido')
   @if(session()->has('message'))
          <script type="text/javascript">
           alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4>{{ session()->get('message') }} ');
          </script>
    @endif
    @if(session()->has('error'))
        <script type="text/javascript">
           alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4>{{ session()->get('error') }} ');
        </script>
    @endif
<div class="row">
    <div class="col-md-offset-2 col-md-7 ">				 									   
 <div class="box box-solid">
  <div class="box-header">
        <h3 class="box-title"><strong><h3>{{ $paquete->NombrePaquete }}</h3></strong></h3>
      </div>
      <div class="box-body">
       <form id="miForm" method="POST" action="{{ route('adminPaquete.saveUpGuia',$paquete->IdPaquete) }}">
	      {!! method_field('PUT') !!}
	      {!! csrf_field() !!}
	      {{-- <input type="hidden" name="idTurista" value="xx"/> --}}

         <div class="row">
            <div class="col-xs-12 col-md-6">
            <div class="form-group has-feedback{{ $errors->has('guiasP') ? ' has-error' : '' }}">
                <label name="guiasP" for="guiasP">Guias</label>
                  <select class="form-control select2" multiple="multiple" name="guiasP[]" id="guiasP"  data-placeholder="Seleccionar guia" style="width: 100%;">
                  @foreach ($guias as $guia)
                  <option value="{{$guia->IdEmpleadoGEO }}" {{ (collect(old('guiasP'))->contains($guia->IdEmpleadoGEO)) ? 'selected':'' }} >{{ $guia->PrimerNombrePersona }} {{ $guia->PrimerApellidoPersona}} +({{ $guia->AreaTelContacto }}){{ $guia->TelefonoContacto}}</option>
                  @endforeach
                  </select>
                  @if ($errors->has('guiasP'))
                  <span class="help-block">{{ $errors->first('guiasP') }}</span>
                @endif
             </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-info  col-xs-12 col-sm-2 center-block" @if($paquete->compara_fechas == 1 ) disabled @else '' @endif><STRONG>Registrar</STRONG></button>
            </div>
          </div>
       </form>
       <hr>
      @if($pIdguias != null)
      
       <form id="miForm" method="POST" action="{{ action('PaqueteController@eliminarGuiaPaquete',$paquete->IdPaquete) }}">
        {!! csrf_field() !!}
       <input name="_method" type="hidden" value="PATCH">
       <div class="row">
        <div class="col-md-6">
          <table class="table">
           <thead>
             <th>Nombres</th>
             <th>Apellidos</th>
             <th>Telefono</th>
            @if($paquete->compara_fechas != 1 )
             <th><center>Eliminar</center></th>
             @endif
           </thead>
           @foreach ($pIdguias as $g)
           <tr>
           <td>{{ $g->pn }} {{ $g->sn }}</td>
           <td>{{ $g->pap }} {{ $g->sap }}</td>
           <td>+({{ $g->atel }}) {{ $g->tel }}</td>
           @if($paquete->compara_fechas != 1 )
           <td><div class="checkbox">
                <center><label><input type="checkbox" name="IdGP[]" value="{{ $g->idgpt }}"></label></center>
               </div>
           </td>
           @endif
           </tr>
           @endforeach

          </table>
        </div>
       </div>
       <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-danger  col-xs-12 col-sm-2 center-block" @if($paquete->compara_fechas == 1 ) disabled @else '' @endif><STRONG>Actualizar</STRONG></button>
            </div>
          </div>
     </form>
     @endif
      </div>
         <div class="box-footer">

        </div>
   </div>
 </div>
</div>
@endsection
