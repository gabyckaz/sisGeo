@extends('master')

@section('head')
@endsection

@section('contenido')
<div class="col-md-12 col-md-offset-2">
  <h1 class="headline text-yellow"><b> {{$msgPrincipal}} </b></h1>

  <h2><i class="headline fa fa-warning text-yellow"></i> {{$msgSecundario}}</h2>

  <!-- /.error-content -->
  <br><br>
  <div>
    Para cualquier duda contactarse a:
    <br>
      Geoturismo de El Salvador S.A de C.V. Col. Campestre #17, Pje.3, Calle Circunvalación<br>
      San Salvador, El Salvador, C.A. <br>
      Tel: 2284-8404 / 6302-8424<br>
      Email: ​info@geoturismoelsalvador.com

  </div>
</div>
<!-- /.error-page -->
@endsection
