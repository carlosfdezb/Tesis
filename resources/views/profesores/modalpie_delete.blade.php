<div class="modal fade bd-example-modal-lg" id="modalpie_delete-{{$profesores->id}}" role="dialog">
    <div class="modal-dialog">
        {!!Form::model($profesores,['method'=>'PUT','route'=>['profesores.pie',$profesores->id]])!!}
    {{ csrf_field() }}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>  
                <h4 class="modal-title">
                    Quitar profesor de PIE
                </h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <input class="form-control" name="id" type="hidden" value="{{ $profesores->id}}">
                    <input class="form-control" name="operacion" type="hidden" value="2">
                    <h3 class="modal-title">
                    Está seguro de remover a {{$profesores->primer_nombre.' '.$profesores->apellido_paterno}} de PIE?
                        </h3>
              
                </div>

                
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-danger" type="submit">
                    Aceptar
                </button>
            </div>
        </div>
        {{Form::Close()}}
    </div>
</div>
