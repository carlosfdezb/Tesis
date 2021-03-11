 <div class="modal fade bd-example-modal-lg" id="modal-update-{{$planificacion->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($planificacion,['method'=>'put','files'=>'true','route'=>['planificaciones.actualizar_archivo',$planificacion->id]])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Actualizar Documento</h3> 
			</div>
			     <div class="modal-body">
				     <div class="form-group">

				     	<label for ="">Documento a actualizar </label>
				     	<div class="form-group">
				     		<div class="form-control">
				     			{{$planificacion->archivo}}
				     		</div>
				     	</div>

				     	<label for ="">Fecha Plazo </label>
				     	<div class="form-group">
				     		<input name="fecha" type="date" class="form-control" value="{{$planificacion->fecha}}"></input>
				     	</div>

				     	<label for ="">Unidad </label>
				     	<div type="text" class="form-group">
				     		<input name="unidad" class="form-control" value="{{$planificacion->unidad}}"></input>
				     	</div>

					    <label for ="">Nuevo Documento</label>
					    <div class="form-group">
					    <input type="file" name="documentos" class="form-control">
					      <div class="form-group has-warning">
					    	<span class="help-block"><i class="fa fa-exclamation-circle"></i> Este documento reemplazará al que ya está en el sistema</span> 
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