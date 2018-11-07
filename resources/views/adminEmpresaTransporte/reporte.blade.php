@extends('reporte')

@section('contenido')
<div class="col-md-7 col-md-offset-2">
  <div class="box box-warning">
    <div class="box-header">
      <div class="row">
      <!--                Titulo del reporte          -->
      <div class="text-center" >
        <img src="./images/logogeo.png">
      </div>
      <h2 class="text-center"><strong>Listado de Empresas</strong></h2>
        <h4 class="text-left">Fecha de emisión: <strong>{{date('d/m/y g:i a')}}</strong></h4>
        <h4 class="text-left">Usuario: <strong>{{Auth::user()->name}}</strong></h4>
     </div>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id='tablaadminEmpresa'>
          <thead class="thead-dark">
            <tr>
              <th class="text-center">Nombre de Empresa</th>
              <th class="text-center">Nombre de Contacto</th>
              <th class="text-center">Teléfono</th>
              <th class="text-center">Email</th>
            </tr>
          </thead>
          <tbody>
            @foreach($empresalquiler as $empresa)
              <tr>
                <td>{{ $empresa->NombreEmpresaTransporte }}</td>
                <td>{{ $empresa->NombreContacto }}</td>
                <td>{{ $empresa->NumeroTelefonoContacto }}</td>
                <td>{{ $empresa->EmailEmpresaTransporte }}</td>
              </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
@endsection
