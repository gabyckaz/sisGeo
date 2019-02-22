@extends('master')

@section('head')

@endsection

@section('contenido')
<div class="row">
  <div class="col-md-6">
    @if(session('status'))
      <br>
       <script type="text/javascript">
      alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4> {{ session("status") }}');
      </script>
    @endif
    @if(session('fallo'))
      <br>
      <script type="text/javascript">
     alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{session("fallo") }}');
     </script>
    @endif
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Tipos de transporte</h3>
        <div class="box-body">
          <form action="{{ route('adminTipoTransporte.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group has-feedback{{ $errors->has('tipotransporte') ? ' has-error' : '' }}">
              <div class="input-group">
              <span class="input-group-addon"><span class="fa fa-bus"></span></span>
              <input id="tipotransporte" type="text" class="form-control" name="tipotransporte" value="{{ old('tipotransporte') }}" required autofocus>
              </div>
              @if ($errors->has('tipotransporte'))
              <span class="help-block">{{ $errors->first('tipotransporte') }}</span>
              @endif
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-info center-block">Agregar</button>
              </div>
          </form>
          <br>
            <div class="row">
              <h3 class="box-title"> </h3>
              <table class="table table-striped table-bordered table-hover" id="tablatipotransporte">
                <thead class="thead-dark">
                  <tr>
                  <th align="center">Nombre</th>
                  <th align="center">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($tipotransporte as $tipo)
                   <tr>
                     <td>{{ $tipo->NombreTipoTransporte }}</td>
                     <td align="center" width="100px"> <a href="{{route('adminTipoTransporte.eliminar', $tipo['IdTipoTransporte'])}}"
                       class="btn btn-danger btn-sm"> <font color="white" size="2"> <b> X</b>
                       </font>
                     </a> </td>
                   </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
