@extends('reporte')

@section('contenido')
<div class="col-md-7 col-md-offset-2">
  <div class="box box-warning">
    <div class="box-header">
      <h3 class="box-title"><STRONG>Listado de Empresas</STRONG></h3>
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
