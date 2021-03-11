<div class="modal fade bd-example-modal-lg" id="modificar-modal-{{$alumno_pie->id}}" role="dialog">
<div class="modal-dialog">
 {!!Form::model($alumno_pie,['method'=>'put', 'route'=>['modulo_pie.modificar_alumno_pie',$alumno_pie->id]])!!}
  {{ csrf_field() }}
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"  
        aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title text-yellow" align="center">Modificar {{$alumno_pie->alumno->primer_nombre.' '.$alumno_pie->alumno->apellido_paterno}}</h3> 
      </div>
      <div class="modal-body">
            
        <label for ="">Nombre</label>
        <div class="form-group">
          <div type="text" class="form-control" required="true">{{$alumno_pie->alumno->primer_nombre.' '.$alumno_pie->alumno->segundo_nombre.' '.$alumno_pie->alumno->apellido_paterno.' '.$alumno_pie->alumno->apellido_materno}}</div>
        </div>

        <label for ="">Fecha de nacimiento</label>
        <div class="form-group">
          <input value="{{$alumno_pie->edad}}" name="edad" type="date" class="form-control" required="true">
        </div>

        <label for ="">Fecha diagnóstico</label>
        <div class="form-group">
          <input value="{{$alumno_pie->fecha_diagnostico}}" name="fecha_diagnostico" type="date" class="form-control" required="true">
        </div>

        <label for ="">Fecha reevaluación</label>
        <div class="form-group">
          <input value="{{$alumno_pie->fecha_reevaluacion}}" name="fecha_reevaluacion" type="date" class="form-control" required="true">
        </div>

        <label for ="">Diagnóstico asociado a NEE</label>
        <div type="text" class="form-group">
            <select name="nee" class="form-control" required="true">
                <option value="{{$alumno_pie->nee->id}}">Actual : {{$alumno_pie->nee->descripcion}}</option>
                    @foreach ($nees->sortBy('descripcion') as $nee)
                        <option value="{{$nee->id}}"->{{$nee->descripcion}}</option>
                    @endforeach
            </select>
          </div>

        <label for ="">Otros profesionales</label>
        <div class="form-group">
        <input value="{{$alumno_pie->otros_profesionales}}" type="text" class="form-control" name="otros_profesionales" placeholder="">
        <div class="form-group has-warning">
        <span class="help-block"><i class="fa fa-exclamation-circle"></i> Si no cuenta con otros profesionales,omita este campo</span> 
        </div>
       </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-social bg-yellow" type="submit">
              <i class="fa fa-edit"></i>Confirmar
        </button>
      </div>
    </div>
  </div>
  {{Form::Close()}}

</div>  
</div>  