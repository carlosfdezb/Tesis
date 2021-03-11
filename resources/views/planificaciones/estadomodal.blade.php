<div class="modal fade bd-example-modal-lg" id="modal-estado-{{$planificacion->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($planificacion,['method'=>'put','files'=>'true','route'=>['planificaciones.estado',$planificacion->id]])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Planificación de {{$planificacion->profesor->primer_nombre.' '.$planificacion->profesor->apellido_paterno}}</h3> 
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


				     	<label for ="">Aprobar/Rechazar</label>
				     	<div class="form-group">
				     		<select name="estado" class="form-control" required="true">
				     			<option value="{{$planificacion->estado}}">Estado actual: {{$planificacion->estado}}</option>
				     			<option value="Aprobado">Aprobado</option>
				     			<option value="Rechazado">Rechazado</option>
				     		</select>
				     	</div>	

				     	<label for ="">Observaciones </label>
				     	<div class="form-group">
				     		<textarea name="observaciones" class="form-control" style="resize: none;" rows="5" cols="10">{{$planificacion->observaciones}}</textarea>
				     		<div class="form-group has-warning">
					    		<span class="help-block"><i class="fa fa-exclamation-circle"></i>Si no presenta observaciones, omita esta campo.</span> 
					    	</div>
				     	</div>

	                 </div>
			     </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button class="btn btn-social bg-green" type="submit">
                    <i class="fa fa-save"></i>Guardar
                </button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>  
</div>

