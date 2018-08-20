@extends('master')

@section('head')
    Crear Paquetes
@endsection



@section('contenido')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Paquetes Turisticos</div>

                      <div class="panel-body">
                        <form method="post" action="{{action('PaqueteController@store')}}">
                         

                        <div class="col-md-12">
                            <div class="box-header with-border">
                                <h3 class="box-title">Crear paquetes turísticos</h3>
                            </div>
                        </div>
                        
                        <div class="box box-warning">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                          
                        <div class="form-group">
                            <label for="nombrepaquete">Nombre de Paquete Turístico</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="nombrepaquete" placeholder="Nombre paquete" >
                                      <span class="input-group-addon"><i class="fa fa-automobile"></i></span>
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="nombrerutaturistica">Nombre de Ruta Turística</label>
                            
                                  @if($ruta != null)
                                    <select  class="form-inline"   id="idrutaturistica" data-placeholder="Seleccionar la ruta...">
                                    @foreach ($ruta as $ruta)
                                                        
                                    <option value="{{ $ruta->IdRutaTuristica }}" >{{$ruta->NombreRutaTuristica}}</option>
                                    @endforeach
                                    </select>
                                    <hr>
                                       @else
                                          <label>No hay rutas</label>
                                        @endif 
                        </div>
                        <div class="form-group">
                          <label for="fechadesalida">Fecha de Creación</label>
                        <div class="input-group date">
                 
                          <input name="fecha" type="date" class="form-control pull-right" id="fechacreacion" placeholder="Fecha de Creación">
                          <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                          </div>
                        </div>
                        </div>

                        <div class="form-group">
                          <label for="fechadesalida">Fecha de Salida</label>
                         <div class="input-group date">
                 
                          <input name="fecha" type="date" class="form-control pull-right" id="fechasalida" placeholder="Fecha de Salida">
                          <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                          </div>
                        </div>
                        
                        </div>
                        <div class="form-group">
                          <label for="fechadesalida">Fecha de Regreso</label>
                         <div class="input-group date">
                 
                          <input name="fecha" type="date" class="form-control pull-right" id="fecharegreso" placeholder="Fecha de Regreso">
                          <div class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                          </div>
                        </div>                        
                        </div>

                        <div class="form-group">
                          <label for="hora">Hora de Salida</label>
                         <div class="input-group time">
                 
                          <input name="hora" type="time" id="hora" class="form-control pull-right" >
                          <div class="input-group-addon"> 
                                <i class="fa fa-history"></i>
                          </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="lugar">Lugar de Salida</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="lugarsalida" placeholder="Lugar" >
                                      <span class="input-group-addon"><i class="fa fa-map"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <div class="input-group">
                              <span class="input-group"><i class="fa fa-money"></i>
                              <span>$</span><input type="number" min="0.01" step="0.01" max="10,0000" placeholder="25,00" id="precio"></span>    
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="iti">Itinerario</label>
                            <div class="input-group">
                              <textarea class="form-control" id="itinerario" rows="20" ></textarea>
                                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="gastos">Gastos extras</label>
                            <div class="input-group">
                              <textarea class="form-control" id="gastos" rows="5" ></textarea>
                                      <span class="input-group-addon"><i class="fa fa-money"></i></span>
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="con">Condiciones</label>
                            <div class="input-group">
                              <textarea class="form-control" id="condiciones" rows="5" ></textarea>
                                      <span class="input-group-addon"><i class="fa fa-server"></i></span>
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="re">Recomendaciones</label>
                            <div class="input-group">
                              <textarea class="form-control" id="recomendaciones" rows="5" ></textarea>
                                      <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                              </div>
                        </div>

                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="materialChecked2" checked>
                          <label class="form-check-label" for="materialChecked2">Aprobación de Paquete</label>
                        </div>
                        
                          
                        </div>
                        <!-- /.box-body -->
                                
                         <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="reset" class="btn btn-warning">Limpiar</button>
                                    <a  class="btn btn-danger" >Cancelar</a>
                                </div>
                           
                            

                        </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
