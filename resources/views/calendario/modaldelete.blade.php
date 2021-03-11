<div class="modal fade bd-example-modal-lg" id="modaldelete-{{$evaluacion->id}}" role="dialog">
    <div class="modal-dialog">
        {!!Form::model($evaluacion,['method'=>'PUT','route'=>['calendario.delete',$evaluacion->id]])!!}
    {{ csrf_field() }}
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title">
                    Eliminar evaluación "{{$evaluacion->descripcion}}"
                </h4>
                <input class="form-control" name="id" type="hidden" value="{{ $evaluacion->id}}">
                </input>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cancelar
                </button>
                <button class="btn btn-social btn-danger" type="submit">
                    <i class="fa fa-trash"></i>Eliminar
                </button>
            </div>
        </div>
        {{Form::Close()}}
    </div>
</div>