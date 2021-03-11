 <div class="modal fade bd-example-modal-lg" id="actualizar-archivo-{{$licencia->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($licencia,['method'=>'put','files'=>'true','route'=>['licencias_medicas.actualizar_archivo_licencia',$licencia->id]])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Actualizar Licencia</h3> 
			</div>
			     <div class="modal-body">
				     <div class="form-group">

				     	<label for ="">Licencia Actual </label>
				     	<div class="form-group">
				     		<div class="form-control">
				     			{{$licencia->archivo}}
				     		</div>
				     	</div>

				     	<label for ="">Fecha Licencia </label>
				     	<div class="form-group">
				     		<div name="fecha_licencia" type="date" class="form-control">{{$licencia->fecha_licencia}}</div>
				     	</div>

				     	<label for ="">Descripción</label>
			            <textarea class="form-control" name="descripcion" cols="5" rows="10" style="max-width: 100%" placeholder="Describa aquí el motivo,razón,etc...">{{$licencia->descripcion}}</textarea>
			            <div class="form-group has-warning">
			            <span class="help-block"><i class="fa fa-exclamation-circle"></i> Si no desea agregar descripción, omita este campo</span> 
			            </div>

					    <label for ="">Nuevo Documento</label>
					    <div class="form-group">
					    <input type="file" name="documentos" class="form-control">
					      <div class="form-group has-warning">
					    	<span class="help-block"><i class="fa fa-exclamation-circle"></i> Este documento reemplazará al que ya está en el sistema, si no desea reemplazar el documento omita este campo</span> 
					    	</div>
					    </div>

	                 </div>
			     </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button class="btn btn-social bg-yellow" type="submit">
                    <i class="fa fa-cloud-upload"></i>Actualizar
                </button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>  
</div>   