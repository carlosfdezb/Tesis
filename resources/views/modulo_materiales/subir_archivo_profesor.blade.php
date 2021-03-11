<div class="modal fade bd-example-modal-lg" id="subir_archivo_profesor" role="dialog">
<div class="modal-dialog">
	{{!!Form::open(['url'=>'modulo_materiales/profesor/{id_curso}/{id_asignatura}/vista_curso/subir_archivo','method'=>'put' , 'files'=>'true'])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Nuevo Documento</h3> 
			</div>
			     <div class="modal-body">
				     <div class="form-group">

			            <input type="text" name="id_profesor" hidden="true" value="{{$profesor->id}}">
			            <input type="text" name="id_curso" hidden="true" value={{$curso->id}}>
			            <input type="text" name="id_asignatura" hidden="true" value="{{$asignatura->id}}">

						<label for ="">Sección</label>
				        <div type="text" class="form-group">
				            <select name="id_unidad" class="form-control" required="true">
				                <option value="">-- Seleccione --</option>
				                    @foreach ($titulos->sortBy('titulo_unidad') as $titulo)
				                        <option value="{{$titulo->id}}">{{$titulo->titulo_unidad}}</option>
				                    @endforeach
				            </select>
				          </div>

				          <label for="">Título del documento</label>
				         <div class="form-group">
				         	<input class="form-control" type="text" name="titulo_documento" placeholder="Ej.Guía N° 1" required="true">	         
				         </div>

				       	<label for="">Descripción</label>
				         	<div class="form-group">
				         		<textarea class="form-control" cols="5" rows="10" type="text" name="descripcion" style="max-width: 100%;" placeholder="Ej.Resolver guia con materia de: materia 1 y 2"></textarea>
				         	<div class="form-group has-warning">
					    		<span class="help-block"><i class="fa fa-exclamation-circle"></i> Si no desea agregar descripción omita este campo</span> 
					    	</div>       	
				         	</div>

					    <label for ="">Documento</label>
					    <div class="form-group">
					    <input type="file" name="documentos" class="form-control" required="Campo Requerido">
					      <div class="form-group has-warning">
					    	<span class="help-block"><i class="fa fa-exclamation-circle"></i> Este documento será asociado a la unidad seleccionada</span> 
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