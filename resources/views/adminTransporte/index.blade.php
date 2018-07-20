@extends('layouts.app')

@section('content-title', 'Home')
@section('content-subtitle', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    @if(session('status'))
      <br>
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
    @endif
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Empresas</h3>
        <a href="{{ route('adminTransporte.create') }}" class="btn btn-block btn-primary">Agregar</a>
              <div class="box-body">

                <table class="table table-striped table-bordered" >
                	<thead class="thead-dark">
                		<tr>

                		<th>Nombre</th>
                		<th>NombreContacto</th>
                		<th>NumeroTelefonoContacto</th>
                		<th>Opciones</th>

                		</tr>
                	</thead>
                	<tbody>
              		@foreach($empresasTransporte as $empresa)
                		 <tr>
                       <td>{{ $empresa->NombreEmpresaTransporte }}</td>
                       <td>{{ $empresa->NombreContacto }}</td>
                       <td>{{ $empresa->NumeroTelefonoContacto }}</td>
                           <td>
                                       <form action="#" method="POST">
                                           {{ csrf_field() }}
                                           {{ method_field('DELETE') }}

                                           <button id="eliminar" type="submit" class="btn btn-danger btn-block" title="Eliminar "
                                             onclick="return confirm('¿Está seguro?')">
                                               <i class="fa fa-trash"></i>
                                           </button>
                                       </form>
                                     <a class="btn btn-primary btn-sm glyphicon glyphicon-pencil btn-block" title="Editar"
                                     href="{{ route('adminUser.edit', $empresa )}}"></a>

                                     </td>

                        </tr>
                		@endforeach

                	</tbody>
                </table>




              </div>
      </div>
    </div>
  </div>
</div>
@endsection
