@extends('master')

@section('head')
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

<div class="text-center" >
  <img alt="Geoturismo logo" src="..\images\logogeo.png">
</div>
<div class="row">
    <div class="col-md-6">
      <h2 class="headline text-yellow">DOCUMENTACION MIGRATORIA NIÑOS</h2>
      <p>Menores de 3 años viajan GRATIS.</p>
      <p>Niños menores de edad deberán presentar pasaporte y permiso migratorio si viajan solo con 1 de sus padres u otro familiar.
         Necesario tener DUI vigente.</p>
      <p>• Menores de edad con ambos padres solamente necesitan pasaporte.</p>
    </div>
    <div class="col-md-6">
      <h2 class="headline text-yellow">DOCUMENTACION MIGRATORIA ADULTOS</h2>
      <p>Se requiere de documentación migratoria de ley para salir del país</p>
      <p>• DUI o pasaporte vigente para salvadoreños</p>
      <p>• Pasaporte vigente para extranjeros </p>
      <p>• Extranjeros con residencia con carnet de residente vigente</p>
    </div>
    <div class="col-md-12">
     México y Perú requieren Visa
    </div>
</div>
@endsection
