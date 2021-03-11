<div class="modal fade bd-example-modal-lg" id="modal-update-{{$carpeta->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($carpeta,['method'=>'put','files'=>'true','route'=>['modulo_pie.actualizar_archivo',$carpeta->id_alumno_pie,$carpeta->id]])!!}
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
				     	<div type="text" class="form-group">
				     		<div class="form-control">
				     			{{$carpeta->archivo}}
				     		</div>
				     	</div>

						<label for ="">Tipo de Documento</label>
				        <div type="text" class="form-group">
				        	<div class="form-control">
				 				{{$carpeta->documento_pie->descripcion}}
				            </div>
				          </div>


					    <label for ="">Nuevo Documento</label>
					    <div class="form-group">
					    <input type="file" name="documentos" class="form-control" required="Campo Requerido">
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