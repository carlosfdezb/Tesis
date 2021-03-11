<div class="modal fade bd-example-modal-lg" id="modalalumno-{{$asignatura->asignatura_id}}-{{$alumno->first()->id}}" role="dialog">
    <div class="modal-dialog">


        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">
                    {{$asignatura->nombre}}
                </h3>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <h5><b>Profesor/a. </b>{{$asignatura->primer_nombre.' '.$asignatura->apellido_paterno.' '.$asignatura->apellido_materno}}</h5>
                    
                    <?php 
                        $notas = DB::table('notas')->where('id_alumno',$alumno->first()->id)->where('id_asignatura',$asignatura->asignatura_id)->where('ano',date('Y'))->get();
                        $promedio = DB::table('notas')->where('id_alumno',$alumno->first()->id)->where('id_asignatura',$asignatura->asignatura_id)
                                    ->where('ano',date('Y'))->avg('nota');
                    ?>
                    <div class="col-md-12">
                    <div class="box-body table-responsive">
                        <div class="scrollable">
                            <table class="table table-bordered table-striped" id="my-table">
                                
                                <tr>                     
                                    <td class="col-md-1" align="center">1</td>
                                    <td class="col-md-1" align="center">2</td>
                                    <td class="col-md-1" align="center">3</td>
                                    <td class="col-md-1" align="center">4</td>
                                    <td class="col-md-1" align="center">5</td>
                                    <td class="col-md-1" align="center">6</td>
                                    <td class="col-md-1" align="center">7</td>
                                    <td class="col-md-1" align="center">8</td>
                                    <td class="col-md-1" align="center">9</td>
                                    <td class="col-md-1" align="center">10</td>
                                </tr>
                                
                                <tr>
                                @if(!is_null($promedio))                       
                                    @foreach($notas as $nota)
                                        @if($nota->nota>3.9)
                                            <th><span class="pull-right badge bg-blue btn-block">{{$nota->nota}}</span></th>
                                        @else
                                            @if($nota->nota == "P")
                                            <th><span class="pull-right badge bg-yellow btn-block">{{$nota->nota}}</span></th>
                                            @else    
                                            <th><span class="pull-right badge bg-red btn-block">{{$nota->nota}}</span></th>
                                            @endif
                                        @endif
                                    @endforeach 
                                @else
                                    <td colspan="10" align="center">No hay notas registradas</td>
                                @endif                          
                                </tr>
                                <tr>
                                    @if(!is_null($promedio))
                                        <td colspan="8" align="right">Promedio parcial</td>
                                        @if(round($promedio,1) > 3.9)
                                            <th colspan="2"><span class="pull-right badge bg-blue btn-block">{{number_format(round($promedio, 1), 1, '.', '.')}}</span></th>
                                        @else    
                                            <th colspan="2"><span class="pull-right badge bg-red btn-block">{{number_format(round($promedio, 1), 1, '.', '.')}}</span></th>
                                        @endif
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    @if(!is_null($promedio))

                        <ul class="list-group">
                            <li class="list-group-item active"><b>Detalle evaluación</b></li>
                            @foreach($notas as $nota)
                                <li class="list-group-item">
                                    <b>{{$nota->numero}}.</b> {{$nota->descripcion}} 
                                </li>
                            @endforeach
                        </ul>
                    @endif                  
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cerrar
                </button>

            </div>
        </div>

    </div>
</div>
