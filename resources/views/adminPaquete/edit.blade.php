@extends('master')

@section('head')
    Actualizar Paquetes
@endsection




@section('contenido')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Actualizar Paquetes Turisticos</div>

                      <div class="panel-body">
                        <form method="POST" action="{{$paquete->IdPaquete}}" files = "true" enctype="multipart/form-data" >
                        <input name="_method" type="hidden" value="PUT">

                        <div class="col-md-12">
                        <div class="box box-warning">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">

                        <div class="form-group">
                            <label for="nombrepaquete">Nombre de Paquete Turístico</label>
                            <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-automobile"></i></span>
                              <input type="text" name="nombrepaquete" value="{{$paquete->NombrePaquete}}" class="form-control" id="nombrepaquete" placeholder="Nombre paquete" >

                              </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                        <div class="form-group">
                            <label name="idrutaturistica" for="nombrerutaturistica">Nombre de Ruta Turística</label>

                                  @if($ruta !=null)
                                    <select  class="form-control" name="idrutaturistica"  id="idrutaturistica" readonly>
                                    @foreach ($ruta as $ruta)
                                     <option value="{{ $ruta->IdRutaTuristica }}" {{ $ruta->IdRutaTuristica == $ruta->IdRutaTuristica ? 'selected' : '' }}>{{ $ruta->NombreRutaTuristica }}</option>
                                    @endforeach
                                    </select>
                                    <hr>
                                       @else
                                          <label>No hay rutas</label>
                                        @endif
                        </div>
                      </div>
                        <div class="col-md-4">
                        <div class="form-group">
                          <label for="fechadesalida">Fecha de Salida</label>
                         <div class="input-group date">
                           <div class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                           </div>
                          <input name="fechasalida" type="date" class="form-control pull-right" id="fechasalida" placeholder="Fecha de Salida" value="{{ $paquete->FechaSalida}}">

                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                         <div class="form-group">
                          <label for="hora">Hora de Salida</label>
                         <div class="input-group time">
                           <div class="input-group-addon">
                                 <i class="fa fa-history"></i>
                           </div>
                          <input name="hora" type="time" id="hora"  max="24:00:00" min="00:00:00" class="form-control pull-right" value="{{$paquete->HoraSalida}}" >

                        </div>
                        </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                          <label for="fechaderegreso">Fecha de Regreso</label>
                         <div class="input-group date">
                           <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                           </div>
                          <input name="fecharegreso" type="date" class="form-control pull-right" id="fecharegreso" placeholder="Fecha de Regreso" value="{{$paquete->FechaRegreso}}">

                        </div>
                        </div>
                      </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="lugar">Lugar de Salida</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map"></i></span>
                              <input type="text" name="lugarsalida" class="form-control" id="lugarsalida" placeholder="Lugar" value="{{$paquete->LugarRegreso}}">

                            </div>
                        </div>
                      </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-money"></i>
                              $</span><input class="form-control" name="precio" type="number" min="0.01" step="0.01" max="10,0000" placeholder="25,00" id="precio" value="{{$paquete->Precio}}">
                              </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="cupos">Número de Cupos</label>
                          <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-child"></i>
                          </span>
                          <input  class="form-control" name="cupos" type="number" min="1" step="1" max="10,0000" value="{{$paquete->Cupos}}" id="cupos" >
                        </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="tipopaquete">Tipo Paquete</label>
                          <br>
                          <select class="form-control" id="tipopaquete" name="tipopaquete"  readonly>
                              <option value="{{ $paquete->TipoPaquete }}" {{ $paquete->TipoPaquete == $paquete->TipoPaquete ? 'selected' : '' }}>{{$paquete->TipoPaquete }}</option>

                            </select>
                      </div>
                    </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="dificultad">Dificultad Paquete</label>
                          <br>
                          <select class="form-control" id="dificultad" name="dificultad" readonly>
                              <option value="{{ $paquete->Dificultad }}" {{ $paquete->Dificultad == $paquete->Dificultad ? 'selected' : '' }}>{{$paquete->Dificultad }}</option>

                            </select>
                      </div>
                      </div>
                    </div>

                    <label for="exampleInputFile">Mapa</label>
                    <br>
                    <div class="form-group row">
                      <a href="">
                          <img src="{{Storage::url($imagen->Imagen4)}}"  style="width: 800px; height: 400px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar4" >
                      </a>
                      <br>
                      <br>
                      <br>
                      <input class="nuevaFoto4" type="file" name="imagen4" required>
                      <p class="help-block">Subir Imagen del Mapa.</p>
                    </div>

                    <div class="form-group">
                        <label for="iti">Itinerario</label>
                        @php $x='f';
                        @endphp


                        <select class="form-control select2" multiple="multiple" name="itinerario[]" >
                          @for ($i = 0; $i < count($itinerario); $i++)

                           @for ($j = 0; $j < count($itinerariopaquete); $j++)
                           @if($itinerariopaquete[$j]->itinerario_id == $itinerario[$i]->IdItinerario)
                                 <option value="{{ $itinerario[$i]->IdItinerario }}"{{ 'selected'}}> {{$itinerario[$i]->NombreItinerario}}</option>
                                 @php $x='t';
                                 @endphp
                            @endif
                           @endfor
                           @if($x == 't')
                             @php $x ='f';
                             @endphp
                           @else
                            <option value="{{ $itinerario[$i]->IdItinerario }}" > {{$itinerario[$i]->NombreItinerario}}</option>
                           @endif
                          @endfor

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="re">Recomendaciones</label>
                        @php $x='f';
                        @endphp


                        <select class="form-control select2" multiple="multiple" name="recomendaciones[]" >
                          @for ($i = 0; $i < count($recomendaciones); $i++)

                           @for ($j = 0; $j < count($recomendacionespaquete); $j++)
                           @if($recomendacionespaquete[$j]->recomendaciones_id == $recomendaciones[$i]->IdRecomendaciones)
                                 <option value="{{ $recomendaciones[$i]->IdRecomendaciones }}"{{ 'selected'}}> {{$recomendaciones[$i]->NombreRecomendaciones}}</option>
                                 @php $x='t';
                                 @endphp
                            @endif
                           @endfor
                           @if($x == 't')
                             @php $x ='f';
                             @endphp
                           @else
                            <option value="{{ $recomendaciones[$i]->IdRecomendaciones }}" > {{$recomendaciones[$i]->NombreRecomendaciones}}</option>
                           @endif
                          @endfor

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="in">Que incluye</label>
                        @php $x='f';
                        @endphp


                        <select class="form-control select2" multiple="multiple" name="incluye[]" >
                          @for ($i = 0; $i < count($incluye); $i++)

                           @for ($j = 0; $j < count($incluyepaquete); $j++)
                           @if($incluyepaquete[$j]->incluye_id == $incluye[$i]->IdIncluye)
                                 <option value="{{ $incluye[$i]->IdIncluye }}"{{ 'selected'}}> {{$incluye[$i]->NombreIncluye}}</option>
                                 @php $x='t';
                                 @endphp
                            @endif
                           @endfor
                           @if($x == 't')
                             @php $x ='f';
                             @endphp
                           @else
                            <option value="{{ $incluye[$i]->IdIncluye }}" > {{$incluye[$i]->NombreIncluye}}</option>
                           @endif
                          @endfor

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="con">Condiciones</label>
                        @php $x='f';
                        @endphp


                        <select class="form-control select2" multiple="multiple" name="condiciones[]" >
                          @for ($i = 0; $i < count($condiciones); $i++)

                           @for ($j = 0; $j < count($condicionespaquete); $j++)
                           @if($condicionespaquete[$j]->condiciones_id == $condiciones[$i]->IdCondiciones)
                                 <option value="{{ $condiciones[$i]->IdCondiciones }}"{{ 'selected'}}> {{$condiciones[$i]->NombreCondiciones}}</option>
                                 @php $x='t';
                                 @endphp
                            @endif
                           @endfor
                           @if($x == 't')
                             @php $x ='f';
                             @endphp
                           @else
                            <option value="{{ $condiciones[$i]->IdCondiciones }}" > {{$condiciones[$i]->NombreCondiciones}}</option>
                           @endif
                          @endfor

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gastosextras">Gastos Extras</label>
                        @php $x='f';
                        @endphp


                        <select class="form-control select2" multiple="multiple" name="gastosextras[]" >
                          @for ($i = 0; $i < count($gastosextras); $i++)

                           @for ($j = 0; $j < count($gastosextraspaquete); $j++)
                           @if($gastosextraspaquete[$j]->gastosextras_id == $gastosextras[$i]->IdGastosExtras)
                                 <option value="{{ $gastosextras[$i]->IdGastosExtras }}"{{ 'selected'}}> {{$gastosextras[$i]->NombreGastos}}--${{$gastosextras[$i]->Gastos}}</option>
                                 @php $x='t';
                                 @endphp
                            @endif
                           @endfor
                           @if($x == 't')
                             @php $x ='f';
                             @endphp
                           @else
                            <option value="{{ $gastosextras[$i]->IdGastosExtras }}" > {{$gastosextras[$i]->NombreGastos}}{{$gastosextras[$i]->Gastos}}</option>
                           @endif
                          @endfor

                        </select>
                    </div>
                        <h4>
                                        <span class="label label-primary">Imagenes</span>
                                                </h4>
                                                <div class="row">
                                                      <div  id="lightgallery" >
                                                        <div class="row">
                                                          <input class="nuevaFoto" type="file" name="imagen1" id="imagen1">

                                                          <a href="{{Storage::url($imagen->Imagen1)}}">
                                                              <img src="{{Storage::url($imagen->Imagen1)}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar" >
                                                          </a>
                                                        </div>
                                                        <div class="row">
                                                          <input class="nuevaFoto2" type="file" name="imagen2" >

                                                          <a href="{{Storage::url($imagen->Imagen2)}}">
                                                              <img src="{{Storage::url($imagen->Imagen2)}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar2" >
                                                          </a>
                                                        </div>
                                                        <div class="row">
                                                          <input class="nuevaFoto3" type="file" name="imagen3" >

                                                          <a href="{{Storage::url($imagen->Imagen3)}}">
                                                              <img src="{{Storage::url($imagen->Imagen3)}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar3" >
                                                          </a>
                                                        </div>
                                                                                  </div>


                                                                                </div>

                        </div>
                        <!-- /.box-body -->

                         <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>



                        </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
