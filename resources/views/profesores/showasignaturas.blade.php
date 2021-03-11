<div class="modal fade bd-example-modal-lg" id="showasignaturas-{{$profesores->id}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Asignaturas dictadas por {{ $profesores->primer_nombre.' '.$profesores->apellido_paterno }}
                </h4>
            </div>
            <div class="modal-body">
                <?php

        $asignaturas= DB::table('profesors')
            ->
                join('asignatura_profesor','profesors.id','=','asignatura_profesor.profesor_id')
            ->join('asignaturas','asignatura_profesor.asignatura_id','=','asignaturas.id')
            ->where('profesors.id','=',$profesores->id)
            ->get();

      ?>
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <ul class="list-group list-group-flush">
                            @foreach($asignaturas as $asignatura)
                            <li class="list-group-item">
                                <i class="fa fa-angle-right text-aqua">
                                </i>
                                {{ ' '.$asignatura->nombre.' '.$asignatura->nivel.' '.$asignatura->grado.'\n' }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </form>
                <!-- /.box-body -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
