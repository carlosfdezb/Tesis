<div class="modal fade bd-example-modal-lg" id="subir-licencia-{{$alumno->id}}" role="dialog">
<div class="modal-dialog">
    {{!!Form::open(['url'=>'licencias_medicas/alumno/index/subir_archivo_licencia','method'=>'put', 'files'=>'true'])!!}
    {{ csrf_field() }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Nueva Licencia Médica</h3> 
            </div>
                 <div class="modal-body">
                     <div class="form-group">

            <label for ="">Nombre Alumno</label>
            <div type="date" class="form-control" name="nombre_alumno">{{$alumno->primer_nombre.' '.$alumno->apellido_paterno.' '.$alumno->apellido_materno}}</div>

            <label for ="">Curso</label>
            <div type="date" class="form-control">
                @if($alumno->curso->nivel == 'Kinder')
                    {{ $alumno->curso->nivel.' '.$alumno->curso->letra }}
                @else
                    {{ $alumno->curso->nivel.' ° '.$alumno->curso->grado.' '.$alumno->curso->letra }}
                @endif
            </div>
            <input hidden="true" name="id_curso" value="{{$alumno->curso->id}}">

            <label for ="">Fecha de la licencia</label>
            <input type="date" class="form-control" name="fecha_licencia" required="true">
            <div class="form-group has-warning">
            <span class="help-block"><i class="fa fa-exclamation-circle"></i> Ingrese fecha inicio de la licencia médica</span> 
            </div>

            <label for ="">Descripción</label>
            <textarea class="form-control" name="descripcion" cols="5" rows="10" style="max-width: 100%" placeholder="Describa aquí el motivo,razón,etc..."></textarea>
            <div class="form-group has-warning">
            <span class="help-block"><i class="fa fa-exclamation-circle"></i> Si no desea agregar descripción, omita este campo</span> 
            </div>

            <label for ="">Documento</label>
            <input type="file" name="documentos" class="form-control" required="true">
            <div class="form-group has-warning">
            <span class="help-block"><i class="fa fa-exclamation-circle"></i> La licencia médica será revisada por UTP</span> 
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