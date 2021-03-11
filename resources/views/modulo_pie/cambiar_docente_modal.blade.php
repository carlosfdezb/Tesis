<div class="modal fade bd-example-modal-lg" id="cambiar_docente-{{$alumno_pie->id}}" role="dialog">
<div class="modal-dialog">
 {!!Form::model($alumno_pie,['method'=>'put', 'route'=>['modulo_pie.cambiar_docente',$alumno_pie->id]])!!}
  {{ csrf_field() }}
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"  
        aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span> 
                </button>
                <h3 class="modal-title" align="center"> Cambiar Especialista a {{$alumno_pie->alumno->primer_nombre.' '.$alumno_pie->alumno->apellido_paterno}}</h3>
      </div>
           <div class="modal-body">
             <div class="form-group">


        <label for ="">Especialista Actual</label>
        <div type="text" class="form-group">
        <div type="text" class="form-control">{{$alumno_pie->especialista_pie->especialista->primer_nombre.' '.$alumno_pie->especialista_pie->especialista->segundo_nombre.' '.$alumno_pie->especialista_pie->especialista->apellido_paterno.' '.$alumno_pie->especialista_pie->especialista->apellido_materno}}</div>
        </div>

        <label for ="">Especialidad</label>
        <div type="text" class="form-group">
        <div type="text" class="form-control">{{$alumno_pie->especialista_pie->especialista->especialidad}}</div>
        </div>


        <label for ="">Especialista</label>
        <div type="text" class="form-group">
            <select name="id_equipo_pie" class="form-control">
                <option value="">-- Especialista Actual: {{$alumno_pie->especialista_pie->especialista->primer_nombre.' '.$alumno_pie->especialista_pie->especialista->apellido_paterno}} --</option>
                        @foreach ($docentes as $docente)
                            <option value="{{$docente->id}}"->{{$docente->especialista->primer_nombre.' '.$docente->especialista->apellido_paterno.' - '.$docente->especialista->especialidad}}</option>
                        @endforeach
            </select>
            <div class="form-group has-warning">
            <span class="help-block"><i class="fa fa-exclamation-circle"></i> Se asignará este nuevo especialista al estudiante </span> 
            </div>
          </div>
              </div>
           </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-social bg-yellow" type="submit">
                    <i class="fa fa-exchange"></i>Confirmar
                </button>
            </div>
    </div>
  </div>
  {{Form::Close()}}

</div>  
</div>  