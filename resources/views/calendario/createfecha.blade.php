<div class="modal fade bd-example-modal-lg" id="createfecha-{{$curso->id}}-{{$asignatura->first()->id}}" role="dialog">
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
                    {{$asignatura->first()->nombre}} - Agregar nueva evaluación
                </h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <input type="hidden" name="id_curso" value="{{$curso->id}}">
                    <input type="hidden" name="id_asignatura" value="{{$asignatura->first()->id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Descripción
                        </label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-pencil-square-o"></i>
                          </div>
                          <input type="text" class="form-control pull-right" placeholder="Ingrese breve descripción de la evaluación" name="descripcion" autocomplete="off" required>
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
                    <i class="fa fa-floppy-o"></i>Agregar
                </button>
            </div>
        </div>
        {{Form::Close()}}

    </div>
</div>
