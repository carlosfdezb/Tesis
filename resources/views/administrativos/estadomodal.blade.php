<div class="modal fade bd-example-modal-lg" id="estado-modal-{{$administrativo->id}}" role="dialog">
<div class="modal-dialog">
 {!!Form::model($administrativo,['method'=>'put', 'route'=>['administrativo_estado',$administrativo->id]])!!}
  {{ csrf_field() }}
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"  
        aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span> 
                </button>
                @if($administrativo->estado == 'Activo')
                <h3 class="modal-title" align="center"> Deshabilitar {{$administrativo->primer_nombre.' '.$administrativo->apellido_paterno}}</h3>
                @else
                <h3 class="modal-title" align="center"> Habilitar {{$administrativo->primer_nombre.' '.$administrativo->apellido_paterno}}
                @endif

      </div>
        <div class="modal-body">

          @if($administrativo->estado == 'Activo')
          <div class="form-group has-warning">
            <span class="help-block" style="text-align: center;">
              <i class="fa fa-warning"></i> ¿Está seguro que desea deshabilitar a {{$administrativo->primer_nombre.' '.$administrativo->apellido_paterno}}?
            </span>
          </div>
          @else
          <div class="form-group has-warning">
            <span class="help-block" style="text-align: center;">
              <i class="fa fa-warning"></i> ¿Está seguro que desea habilitar a {{$administrativo->primer_nombre.' '.$administrativo->apellido_paterno}}?
            </span>
          </div>
          @endif

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

            @if($administrativo->estado == 'Activo')
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
    </div>
  {{Form::Close()}}
  </div>  
</div>  