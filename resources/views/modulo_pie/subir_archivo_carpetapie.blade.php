<div class="modal fade bd-example-modal-lg" id="subir_archivo_carpetapie" role="dialog">
<div class="modal-dialog">
	{{!!Form::open(['url'=>'modulo_pie/alumno_pies/create','method'=>'put' ,'name'=> 'modulo_pie.subir_archivo_carpetapie', 'files'=>'true'])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Nueva Documentación</h3> 
			</div>
			     <div class="modal-body">
				     <div class="form-group">

				     	<input hidden="true" name="id_alumno_pie" value="{{$alumno_pie->id}}">
				     	<input hidden="true" name="id_nee_pie" value="{{$alumno_pie->nee->id}}">
				     	<input hidden="true" name="id_equipo_pie" value="{{auth()->user()->rut}}">

						<label for ="">Tipo de Documento</label>
				        <div type="text" class="form-group">
				            <select name="tipo_documento" class="form-control" required="true">
				                <option value="">-- Seleccione --</option>
				                    @foreach ($titulo_documentos->sortBy('descripcion') as $tipo_documento)
				                        <option value="{{$tipo_documento->id}}"->{{$tipo_documento->descripcion}}</option>
				                    @endforeach
				            </select>
				          </div>

					    <label for ="">Documento</label>
					    <div class="form-group">
					    <input type="file" name="documentos" class="form-control" required="Campo Requerido">
					      <div class="form-group has-warning">
					    	<span class="help-block"><i class="fa fa-exclamation-circle"></i> Este documento será asociado al alumno</span> 
					    	</div>
					    </div>

	                 </div>
			     </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button class="btn btn-social bg-green" type="submit">
                    <i class="fa fa-cloud-upload"></i>Agregar
                </button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>  
</div>   