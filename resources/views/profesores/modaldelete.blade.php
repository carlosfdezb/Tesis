<div class="modal fade bd-example-modal-lg" id="modaldelete-{{$profesores->id}}" role="dialog">
    <div class="modal-dialog">
        {!!Form::model($profesores,['method'=>'PUT','route'=>['profesores.delete',$profesores->id]])!!}
    {{ csrf_field() }}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title"  align="center">
                    @if($profesores->estado == 'Activo')
                    <h3 class="modal-title" align="center"> Deshabilitar a {{$profesores->primer_nombre.' '.$profesores->apellido_paterno}}</h3>
                    @else
                    <h3 class="modal-title" align="center"> Habilitar a {{$profesores->primer_nombre.' '.$profesores->apellido_paterno}}
                    @endif
                </h4>
            </div>
            <div class="modal-body">
                @if($profesores->estado == 'Activo')
                  <div class="form-group has-warning">
                    <span class="help-block" style="text-align: center;">
                      <i class="fa fa-warning"></i> ¿Está seguro que desea deshabilitar a {{$profesores->primer_nombre.' '.$profesores->apellido_paterno}}?
                    </span>
                  </div>
                  @else
                  <div class="form-group has-warning">
                    <span class="help-block" style="text-align: center;">
                      <i class="fa fa-warning"></i> ¿Está seguro que desea habilitar a {{$profesores->primer_nombre.' '.$profesores->apellido_paterno}}?
                    </span>
                  </div>
                  @endif
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                 @if($profesores->estado == 'Activo')
                <button class="btn btn-social bg-yellow" type="submit">
                  <i class="fa fa-close"></i>Deshabilitar
                </button>
                @else
                <button class="btn btn-social bg-yellow" type="submit">
                  <i class="fa fa-check"></i>Habilitar
                </button>
                @endif
            </div>
        </div>
        {{Form::Close()}}
    </div>
</div>