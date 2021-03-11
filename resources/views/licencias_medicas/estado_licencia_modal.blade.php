<div class="modal fade bd-example-modal-lg" id="modal-estado-{{$licencia->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($licencia,['method'=>'put','files'=>'true','route'=>['licencias_medicas.administrador.estado',$licencia->id]])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Revisión Licencia Médica</h3> 
			</div>
			    <div class="modal-body">
				    <div class="form-group">

						<label for ="">Licencia</label>
				     	<div class="form-group">
				     		<div class="form-control">
				     			{{$licencia->archivo}}
				     		</div>
				     	</div>

				     	<label for ="">Fecha Licencia</label>
				     	<div class="form-group">
				     		<div class="form-control">
				     			{{$licencia->fecha_licencia}}
				     		</div>
				     	</div>	

				     	<label for ="">Descripción</label>
				     	<div class="form-group">
				     	<textarea class="form-control" cols="5" rows="5" readonly="true" style="max-width: 100%;background-color: white">{{$licencia->descripcion}}</textarea>
				     	</div>

				     	<label for ="">Estado Licencia</label>
				     	<div class="form-group">
				     		<select name="estado" class="form-control" required="true">
				     			<option value="{{$licencia->estado}}">Estado actual: {{$licencia->estado}}</option>
				     			<option value="Aprobado">Aprobado</option>
				     			<option value="Rechazado">Rechazado</option>
				     		</select>
				     	</div>	

				     	<label for ="">Observación</label>
				     	<div class="form-group">
				     		<textarea name="observacion" class="form-control" cols="5" rows="5" style="max-width: 100%;background-color: white">{{$licencia->observacion}}</textarea>
				     		<div class="form-group has-warning">
					    		<span class="help-block"><i class="fa fa-exclamation-circle"></i>Si no presenta observaciones, omita esta campo</span> 
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

