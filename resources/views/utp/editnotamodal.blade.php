<div class="modal fade bd-example-modal-lg" id="editnotamodal-{{$nota->id}}" role="dialog">
<div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">
                    Modificar Nota {{$nota->nota}}
                </h3>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-social bg-green" type="submit">
                    <i class="fa fa-floppy-o"></i>Guardar
                </button>
            </div>
        </div>
     
    </div>
</div>
