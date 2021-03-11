<div class="modal fade bd-example-modal-lg" id="estado-modal-{{$alumno_pie->id}}" role="dialog">
	<div class="modal-dialog">
	 {!!Form::model($alumno_pie,['method'=>'put', 'route'=>['modulo_pie.estado_pie',$alumno_pie->id]])!!}
	 {{ csrf_field() }}
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"  
	        aria-label="Close">
	           <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
	        </button>
	            @if($alumno_pie->estado == 'Activo')
                <h3 class="modal-title" align="center"> Alta a {{$alumno_pie->alumno->primer_nombre.' '.$alumno_pie->alumno->apellido_paterno}}</h3>
                @else
                <h3 class="modal-title" align="center"> Incorporar a {{$alumno_pie->alumno->primer_nombre.' '.$alumno_pie->alumno->apellido_paterno}}
                @endif 
	      </div>
	      <div class="modal-body">


          @if($alumno_pie->estado == 'Activo')
          <div class="form-group has-warning">
            <span class="help-block" style="text-align: center;">
              <i class="fa fa-exclamation-circle"></i> ¿Está seguro que desea dar el alta a {{$alumno_pie->alumno->primer_nombre.' '.$alumno_pie->alumno->apellido_paterno}}?
              </span>
            </div>
          @else
          <div class="form-group has-warning">
            <span class="help-block" style="text-align: center;">
              <i class="fa fa-exclamation-circle"></i> ¿Está seguro que desea incorporar a PIE a {{$alumno_pie->alumno->primer_nombre.' '.$alumno_pie->alumno->apellido_paterno}}?
              </span>
          </div>
          @endif
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          @if($alumno_pie->estado == 'Activo')
            <button class="btn btn-social bg-yellow" type="submit">
              <i class="fa fa-check-square-o"></i>Confirmar
            </button>
          @else
            <button class="btn btn-social bg-yellow" type="submit">
              <i class="fa fa-plus-square-o"></i>Confirmar
            </button>
          @endif

	      </div>
	    </div>
	  </div>
	  {{Form::Close()}}
	</div>  
</div>  