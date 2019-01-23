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
      <h2 class="headline text-yellow">Misión</h2>
      <p>Somos una Tour Operadora enfocados en proveer interesantes opciones de cultura
        y diversión en El Salvador y demás países del mundo.</p>
    </div>
    <div class="col-md-6">
      <h2 class="headline text-yellow">Visión</h2>
      <p>Trabajamos por ser una empresa con compromiso e innovación continua que hace las cosas bien en todos los niveles,
        siempre buscando nuevos destinos para nuestros clientes, y con un aporte para nuestras comunidades.</p>
    </div>
    <div class="col-md-12 ">
        <h2 class="headline text-yellow"><center>Valores</center></h2>
        <p><center>Seguridad, Respeto, Iniciativa, Compromiso, Organiación</center></p>
    </div>
      <div class="col-md-12">
        <h2 class="headline text-yellow"><center>Contacto</center></h2>
        <p>
          <center>
          <a href="https://www.instagram.com/GeoturismoAventuras/"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a> /
          <a href="https://www.facebook.com/geoturismo/"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
          </center>
        <center><i class="fa fa-phone" aria-hidden="true"></i> Tel : (+503) 22848404 / 2130-9030</center>
        <center><i class="fa fa-mobile" aria-hidden="true"></i> Cel: (+503) 6302-8424</center>
        <center>Col. Campestre #17, Pje.3, Calle Circunvalación, San Salvador, El Salvador, C.A.</center>
        <center>info@geoturismoelsalvador.com</center>
        <br>
        <center><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1938.1330672738175!2d-89.24771996038247!3d13.702324737046224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f63302ea01cbb5f%3A0x9fcabc048a6e6dff!2sGeoturismo+El+Salvador!5e0!3m2!1ses-419!2ssv!4v1548194698450" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></center>
    </div>
</div>
@endsection
