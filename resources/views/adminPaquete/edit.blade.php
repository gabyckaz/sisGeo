@extends('master')

@section('head')
    Actualizar Paquetes
@endsection



@section('contenido')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Actualizar Paquetes Turisticos</div>

                      <div class="panel-body">
                        <form method="POST" action="{{$paquete->IdPaquete}}" >
                        <input name="_method" type="hidden" value="PUT">
                       
                        <div class="col-md-12">
                        <div class="box box-warning">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                          
                        <div class="form-group">
                            <label for="nombrepaquete">Nombre de Paquete Turístico</label>
                            <div class="input-group">
                              <input type="text" name="nombrepaquete" value="{{$paquete->NombrePaquete}}" class="form-control" id="nombrepaquete" placeholder="Nombre paquete" >
                                      <span class="input-group-addon"><i class="fa fa-automobile"></i></span>
                              </div>
                        </div>
                        <div class="form-group">
                            <label name="idrutaturistica" for="nombrerutaturistica">Nombre de Ruta Turística</label>
                            
                                  @if($ruta !=null)
                                    <select  class="form-inline" name="idrutaturistica"  id="idrutaturistica" data-placeholder="Seleccionar la ruta...">
                                    @foreach ($ruta as $ruta)
                                                        
                                    <option value="{{ $ruta->IdRutaTuristica }}"> {{$ruta->NombreRutaTuristica}}</option>
                                    @endforeach
                                    </select>
                                    <hr>
                                       @else
                                          <label>No hay rutas</label>
                                        @endif 
                        </div>

                        <div class="form-group">
                          <label for="fechadesalida">Fecha de Salida</label>
                         <div class="input-group date">
                 
                          <input name="fechasalida" type="date" class="form-control pull-right" id="fechasalida" placeholder="Fecha de Salida" value="{{ $paquete->FechaSalida}}">
                          <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                          </div>
                        </div>

                         <div class="form-group">
                          <label for="hora">Hora de Salida</label>
                         <div class="input-group time">
                 
                          <input name="hora" type="time" id="hora"  max="24:00:00" min="00:00:00" class="form-control pull-right" value="{{$paquete->HoraSalida}}" >
                          <div class="input-group-addon"> 
                                <i class="fa fa-history"></i>
                          </div>
                        </div>
                        </div>
                        
                        </div>
                        <div class="form-group">
                          <label for="fechaderegreso">Fecha de Regreso</label>
                         <div class="input-group date">
                 
                          <input name="fecharegreso" type="date" class="form-control pull-right" id="fecharegreso" placeholder="Fecha de Regreso" value="{{$paquete->FechaRegreso}}">
                          <div class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                          </div>
                        </div>                        
                        </div>

                        <div class="form-group">
                            <label for="lugar">Lugar de Salida</label>
                            <div class="input-group">
                              <input type="text" name="lugarsalida" class="form-control" id="lugarsalida" placeholder="Lugar" value="{{$paquete->LugarRegreso}}">
                                      <span class="input-group-addon"><i class="fa fa-map"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <div class="input-group">
                              <span class="input-group"><i class="fa fa-money"></i>
                              <span>$</span><input name="precio" type="text" min="0.01" step="0.01" max="10,0000" placeholder="25,00" id="precio" value="{{$paquete->Precio}}"></span>    
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="iti">Itinerario</label>
                            <div class="input-group">
                              <input name="itinerario" class="form-control" id="itinerario" rows="20" value="{{$paquete->Itinerario}}" ></input>
                                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="gastos">Gastos extras</label>
                            <div class="input-group">
                              <input name="gastosextras"class="form-control" id="gastosextras" rows="5" value="{{$paquete->GastosExtras}}"></input>
                                      <span class="input-group-addon"><i class="fa fa-money"></i></span>
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="queincluye">Que incluye</label>
                            <div class="input-group">
                              <input name="queincluye"class="form-control" id="queincluye" rows="5" value="{{$paquete->Incluye}}"></input>
                                      <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="con">Condiciones</label>
                            <div class="input-group">
                              <input type="text" name="condiciones" class="form-control" id="condiciones" rows="5" value="{{$paquete->Condiciones}}"></textarea>
                                      <span class="input-group-addon"><i class="fa fa-server"></i></span>
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="re">Recomendaciones</label>
                            <div class="input-group">
                              <input name="recomendaciones" class="form-control" id="recomendaciones" rows="5" value="{{$paquete->Recomendaciones}}" ></input>
                                      <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                              </div>
                        </div>

                          <div class="form-check">
                              <input type='hidden' name='aprobacionpaquete' value='0'/>
                              <input type='checkbox' name='aprobacionpaquete' value='{{$paquete->AprobacionPaquete}}'/>
                          <label class="form-check-label" for="materialChecked2">Aprobación de Paquete</label>
                        </div>
                        <div class="form-check">
                              <input type='hidden' name='disponibilidadpaquete' value='0'/>
                              <input type='checkbox' name='disponibilidadpaquete' value='{{$paquete->DisponibilidadPaquete}}'/>
                          <label class="form-check-label" for="disponibilidadpaquete">Disponibilidad de paquete</label>
                        </div>
                          
                        </div>
                        <!-- /.box-body -->
                                
                         <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                           
                            

                        </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
