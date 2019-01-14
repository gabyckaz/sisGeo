@extends('master')

@section('head')
@endsection

@section('contenido')
<div class="row">
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
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Geoturismo</h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row">
      <div class="col-md-6 col-md-offset-3 invoice-col">
        <h3><b>NAP(Número de Aprobación Pagadito): {{$nap}}</b></h3><br>
        <h4><b>Fecha de transacción: {{$fecharespuesta}}</b></h4><br>
      </div>
      <!-- /.col -->

      <div class="col-md-6 col-md-offset-3 invoice-col">
        <br>
        Para cualquier duda contactarse a:
        <address>
          Geoturismo de El Salvador S.A de C.V. Col. Campestre #17, Pje.3, Calle Circunvalación<br>
          San Salvador, El Salvador, C.A. <br>
          Tel: 2284-8404 / 6302-8424<br>
          Email: ​info@geoturismoelsalvador.com
        </address>
      </div>
    </div>
    <!-- /.row -->
    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-xs-12">
        <!-- <a href="{{ url('reservacion/'.$nap.'/print') }}" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a> -->
        <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
        </button> -->
        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
          <i class="fa fa-download"></i> Generar PDF
        </button>
      </div>
    </div>
  </section>
  <!-- /.content -->
  <div class="clearfix"></div>

</div>

@endsection
