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
    <div class="col-md-12 ">
        <h2 class="headline text-yellow"><center>AL  PARTICIPAR EN ESTE TIPO DE VIAJE ACEPTO:</center></h2>
        <ol>
          <li>Convivir con toda persona que al igual que yo desean viajar y adultos hasta 80 años.</li>
          <li>Balance emocional, madurez, espíritu de aventura, entre otros son cualidades necesarias para éste tipo de viaje.</li>
          <li>Salida de gasolinera Uno frente al Mundo Feliz.</li>
          <li>Cancelación con 7 dias de anticipacion se devolverá el 50% , 2 días solo el 30%.</li>
          <li>Geoturismo no se hace responsable por atrasos, huelgas, temblores, huracanes ó alguna otra situación inesperada.</li>
          <li>Geoturismo no se hace responsable por accidentes ó lesiones en los pasajeros.</li>
          <li>Geoturismo no se hace responsable por pérdidas, daños ó alguna otra situación irregular que le pueda suceder a las pertenencias de los pasajero.</li>
          <li>La empresa excluirá a toda persona que interrumpa o ponga en riesgo la integridad física y psicológica de nuestros turistas o de nuestro equipo de trabajo.</li>
          <li>Viaje Garantizado con cupo de 10 Pax.</li>
          <li>Si el turista no se presenta el día y hora indicada de la actividad no habrá devolucion alguna.</li>
          <li>Si nos vemos obligados a cancelar una actividad por algún imprevisto, seremos responsables de reintegrar lo abonado a su totalidad.</li>
          <li>La empresa no se hará responsable por daños físicos, accidentes que estén fuera de nuestro alcance.</li>
          <li>Nuestra empresa no se hace responsable por problemas legales en la frontera con alguno de los turistas en ser caso así no se hará ningún tipo de devolución.</li>
          <li>Si nuestros clientes reservan y por algún problema o circunstancia no asisten el día del tours tendrán la opciones de devolver el 50% siempre y cuando se notifique 2 dias antes del viaje, de lo contrario no se realizarán devoluciones de ningún tipo.</li>
        </ol>
    </div>
</div>
@endsection
