<div class="modal fade bd-example-modal-lg" id="create" role="dialog">
<div class="modal-dialog">
    {{!!Form::open(['url'=>'planificaciones','method'=>'POST' , 'name'=> 'FormularioPlanificacionCreate', 'files'=>'true'])!!}
    {{ csrf_field() }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Nueva Planificación</h3> 
            </div>
                 <div class="modal-body">
                     <div class="form-group">  

           
            <label for ="">Asignaturas impartidas</label>
            <select type="text" name="asignatura" class="form-control" required="Campo Requerido">
                <option value="">-- Seleccione --</option>
                @foreach($ide->asignaturas as $asignatura)
                    <option value="{{$asignatura->nombre.' '.$asignatura->pivot->nivel.' '.$asignatura->pivot->grado.' '.$asignatura->pivot->letra}}">{{$asignatura->nombre.' '.$asignatura->pivot->nivel.' '.$asignatura->pivot->grado.' '.$asignatura->pivot->letra}}</option>
                @endforeach
            </select>


            <label for ="">Unidad</label>
            <input type="text" class="form-control" name="unidad" placeholder="">

            <label for ="">Fecha de Plazo</label>
            <input type="date" class="form-control" name="fecha">

            <label for ="">Documento</label>
            <input type="file" name="documentos" class="form-control" required="Campo Requerido">
            <div class="form-group has-warning">
            <span class="help-block"><i class="fa fa-exclamation-circle"></i> El documento será revisado por UTP</span> 
            </div>

                     </div>
                 </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-social bg-green" type="submit">
                    <i class="fa fa-floppy-o"></i>Guardar
                </button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>  
</div> 