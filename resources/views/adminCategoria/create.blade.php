@extends('master')

@section('head')

@endsection
@section('Title')
<strong>Categoria</strong>
@endsection
@section('contenido')
@if(session('status'))
        <script type="text/javascript">
          alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4> {{ session("status") }}');
          </script>
      @endif
      @if(session('fallo'))
          <script type="text/javascript">
         alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{session("fallo") }}');
         </script>
      @endif
<div class="row">

  <div class="col-md-6">

    <div class="box box-warning ">
      <div class="box-header">
        <h3 class="box-title"><STRONG>Agregar Categoria</STRONG></h3>
        <div class="box-tools pull-right">
          <button type="submit" class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
        </div>
      </div>
      <div class="box-body">
          <form class="form-horizontal" action=""  method="POST">
            {{ csrf_field() }}
            <fieldset>
              <div class="col-md-12" >
                <div class="form-group has-feedback{{ $errors->has('categoria') ? ' has-error' : '' }}">
                  <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-money"></span></span>
                      <input id="categoria" type="text" class="form-control" name="categoria" value="{{ old('categoria') }}" required autofocus>
                  </div>
                  @if ($errors->has('categoria'))
                    <span class="help-block">{{ $errors->first('categoria') }}</span>
                  @endif
                </div>
              </div>
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <button type="submit" class="btn btn-info center-block" id="btn_categoria" >Agregar Categoria</button>
            </fieldset>
          </form>
            <h3 class="box-title"> </h3>
            <div class="row">
               <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover" id="tablaCategoria">
                  <thead class="thead-dark">
                    <tr>
                      <th align="center">NombreCategoria</th>
                      <th align="center">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categoria as $cat)
                      <tr>
                        <td align="center">{{ $cat->NombreCategoria }}</td>
                        <td align="center"> <a href="{{route('adminCategoria.eliminarcategoria', $cat['IdCategoria'])}}"
                          class="btn btn-danger btn-sm"> <font color="white" size="2"> <b> X</b>
                          </font>
                        </a> </td>
                      </tr>
                    @endforeach
                    </tbody>
                 </table>
                    {{-- {!! $categoria->appends(\Request::except('page'))->render() !!}--}}
              </div>
            </div>
        </div>

    </div>
  </div>
</div>
</div>
@endsection
