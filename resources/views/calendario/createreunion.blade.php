<div class="modal fade bd-example-modal-lg" id="createreunion-{{$curso->id}}" role="dialog">
    <div class="modal-dialog">
        {!!Form::open(['url'=>'calendario','method'=>'POST','name'=> 'FormularioCalendarioCreate', 'files'=>'true'])!!}
  {{csrf_field()}}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title" align="center">
                    Agendar nueva reunión de apoderados
                </h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <input type="hidden" name="id_curso" value="{{$curso->id}}">
                    <input type="hidden" name="id_asignatura" value="10">
                    <div class="form-group">
                        <div class="input-group date">
                          <input type="hidden" class="form-control pull-right" value="Reunión de apoderados" name="descripcion">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Fecha
                        </label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="date" class="form-control pull-right" name="fecha" required>
                        </div>
                
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-social bg-green" type="submit">
                    <i class="fa fa-floppy-o"></i>Agendar
                </button>
            </div>
        </div>
        {{Form::Close()}}

    </div>
</div>
