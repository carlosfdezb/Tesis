<div class="modal fade bd-example-modal-lg" id="asignardocente-{{$alumno->id}}" role="dialog">
<div class="modal-dialog">
 {!!Form::model($alumno,['method'=>'put', 'route'=>['modulo_pie.asignardocente',$alumno->id]])!!}
  {{ csrf_field() }}
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"  
        aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span> 
                </button>
                <h3 class="modal-title" align="center"> Incorporación Estudiante PIE </h3>
      </div>
           <div class="modal-body">
             <div class="form-group">

        <label for ="">Nombre</label>
        <div type="text" class="form-group">
        <div type="text" class="form-control"> {{$alumno->primer_nombre.' '.$alumno->segundo_nombre.' '.$alumno->apellido_paterno.' '.$alumno->apellido_materno}}</div>
        </div>
        
        <label for ="">Rut</label>
        <div type="text" class="form-group">
        <div type="text" class="form-control" name="rut" placeholder="rut"> {{$alumno->rut}} </div>
        </div>

        <label for ="">Curso</label>
        <div type="text" class="form-group">
        <div type="text" class="form-control" name="curso" placeholder="curso"> {{$alumno->curso->nivel.' ° '.$alumno->curso->grado.'  '.$alumno->curso->letra}} </div>
        </div>

        <label for ="">Fecha de nacimiento</label>
        <div type="text" class="form-group">
        <input type="date" class="form-control" name="fecha_nacimiento" required="true"></input>
        </div>

        <label for ="">Diagnóstico asociado a NEE</label>
        <div type="text" class="form-group">
            <select name="nee" class="form-control" required="true">
                <option value="">-- Seleccione --</option>
                    @foreach ($nees->sortBy('descripcion') as $nee)
                        <option value="{{$nee->id}}"->{{$nee->descripcion}}</option>
                    @endforeach
            </select>
          </div>

        <label for ="">Fecha de diagnóstico</label>
        <div type="text" class="form-group">
        <input type="date" class="form-control" name="fecha_diagnostico" placeholder=" Fecha emisión de diagnóstico"></input>
        </div>

        <label for ="">Fecha de reevaluación</label>
        <div type="text" class="form-group">
        <input type="date" class="form-control" name="fecha_reevaluacion" placeholder=" Fecha de reevaluación"></input>
        </div>

        <label for ="">Equipo Multidisciplinario</label>
        <div type="text" class="form-group">
            <select name="id_equipo_pie" class="form-control">
                <option value="">-- Seleccione --</option>
                      @foreach ($docentes as $docente)
                            <option value="{{$docente->id}}"->{{$docente->especialista->primer_nombre.' '.$docente->especialista->apellido_paterno.' - '.$docente->especialista->especialidad}}</option>
                      @endforeach 
            </select>
            <div class="form-group has-warning">
            <span class="help-block"><i class="fa fa-exclamation-circle"></i> Se asignará al estudiante. </span> 
            </div>
          </div>

        <label for ="">Otros Profesionales</label>
        <div type="text" class="form-group">
        <input type="text" class="form-control" name="otros_profesionales" placeholder="Ej.Kinesiólogo"></input>
            <div class="form-group has-warning">
                <span class="help-block"><i class="fa fa-exclamation-circle"></i> Si no registra otros profesionales, omitir. </span> 
            </div>
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