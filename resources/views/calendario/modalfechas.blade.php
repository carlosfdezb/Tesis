<div class="modal fade bd-example-modal-lg" id="modalfechas-{{$var->id}}-{{$asignatura->first()->id}}-{{$curso->id}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">
                    Evaluaciones agendadas - {{$asignatura->first()->nombre.' '.$curso->nivel.'° '.$curso->grado.' '.$curso->letra}}
                </h3>
            </div>
            <div class="modal-body">
                <div class="box-body">

                    <ul class="list-group">
                        <?php $evaluaciones = DB::table('calendarios')->where('id_profesor',$var->id)->where('id_curso',$curso->id)->where('id_asignatura',$asignatura->first()->id)
                        ->where('fecha','>=',date('Y-m-d'))->get();?>

                    @if($evaluaciones->count()!=0)
                        @foreach($evaluaciones as $evaluacion)
                            <li class="list-group-item">
                                <div class="row"> 
                                    <div class="col-md-10">
                                        {{$evaluacion->descripcion.' - Fecha: '.date('d-m-Y', strtotime($evaluacion->fecha))}}
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger" data-target="#modaldelete-{{$evaluacion->id}}" data-toggle="modal"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                           </li>
                           @include('calendario.modaldelete')
                       @endforeach
                    @else
                        <h4 align="center">No hay evaluaciones agendadas</h4>
                    @endif
                    </ul>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>