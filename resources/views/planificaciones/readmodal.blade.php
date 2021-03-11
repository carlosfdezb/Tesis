<div class="modal fade bd-example-modal-lg" id="modal-ver-{{$planificacion->id}}" role="dialog">
<div class="modal-dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Estado Planificación</h3> 
			</div>
			     <div class="modal-body">
				     <div class="form-group">

				     	<label for ="">Asignatura</label>
				     	<div class="form-group">
				     		<div class="form-control">
				     			{{$planificacion->asignatura.' '.$planificacion->nivel.' ° '.$planificacion->grado.' '.$planificacion->letra}}
				     		</div>
				     	</div>	

				     	<label for ="">Unidad</label>
				     	<div class="form-group">
				     		<div class="form-control">
				     			{{$planificacion->unidad}}
				     		</div>
				     	</div>	

				     	<label for ="">Revisión</label>
				     	<div class="form-group">
				     		<div class="form-control">{{$planificacion->estado}}</div>
				     		</select>
				     	</div>	

				     	<label for ="">Observaciones</label>
				     	<div class="form-group">
				     		<textarea name="observaciones" class="form-control" style="max-width: 100%; background-color: white" rows="5" cols="10" readonly="true">{{$planificacion->observaciones}}</textarea>
				     	</div>

	                 </div>
			     </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>  
</div>

