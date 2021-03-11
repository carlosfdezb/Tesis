  <div class="modal fade bd-example-modal-lg" id="modal-delete-{{$licencia->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($licencia,['method'=>'POST','files'=>'true','route'=>['licencias_medicas.eliminar_archivo_licencia',$licencia->id]])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                	<h3 class="modal-title" align="center">Eliminar Licencia</h3>
			</div>
			     <div class="modal-body">
				     <div class="form-group">

				     	<label for ="">Licencia a eliminar </label>
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

				    	<div class="form-group has-error">
					    	<div class="help-block"><i class="fa fa-exclamation-circle"></i> ¿Está seguro que desea eliminar esta licencia médica?</div> 
					    </div>

	                 </div>
			     </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button class="btn btn-social bg-red" type="submit">
                    <i class="fa fa-trash"></i>Eliminar
                </button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>  
</div>   