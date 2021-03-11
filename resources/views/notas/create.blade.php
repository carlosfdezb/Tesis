<div class="modal fade bd-example-modal-lg" id="create" role="dialog">
    <div class="modal-dialog">
        {!!Form::open(['url'=>'notas','method'=>'POST','name'=> 'FormularioNotasCreate', 'files'=>'true'])!!}
  {{csrf_field()}}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">
                    Agregar nueva nota
                </h3>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group has-warning">
                    <span class="help-block"><i class="fa fa-exclamation-circle"></i> Si hay alumnos con nota pendiente, dejar el respectivo espacio en blanco </span> 
                    </div>
                    <input type="text" class="form-control" placeholder="Descripción nota (ej. unidades, contenidos evaluados, 'Primera nota', 'Test', etc.)" name="titulo" value="{{ old('titulo') }}" autocomplete="off" required>
                    </br>
                    <ul class="list-group">
                        @foreach($alumnos as $alumno)
                            <li class="list-group-item">
                                <div class="row"> 
                                    <div class="col-md-10">
                                      {{$alumno->rut.' - '.$alumno->apellido_paterno.' '.$alumno->apellido_materno.', '.$alumno->primer_nombre.' '.$alumno->segundo_nombre}}
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control nota" placeholder="Nota" name="{{$alumno->id}}" value="{{ old($alumno->id) }}" min="0" max="10" autocomplete="off">
                                        <input type="hidden" class="form-control" name="id_curso" value="{{$alumno->id_curso}}">
                                        <input type="hidden" class="form-control" name="id_profesor" value="{{auth()->user()->rut}}">
                                        <input type="hidden" class="form-control" name="id_asignatura" value="{{$asignatura->first()->id}}">
                                    </div>
                                </div>
                           </li>
                       @endforeach
                    </ul>
                    
                    <div class="form-group">
                        <div class="col-sm-3">
                            <p>{!! Captcha::img(); !!}</p>
                        </div>
                        <div class="col-sm-4">
                            <p>{!! Form::text('captcha', null, ['class' => 'form-control', 'placeholder' => 'Ingrese captcha', 'required' => 'Campo requerido', 'autocomplete' => 'off']) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-social bg-green" type="submit">
                    <i class="fa fa-floppy-o"></i>Agregar
                </button>
            </div>
        </div>
        {{Form::Close()}}
    </div>
</div>

<script type="text/javascript">
    var notas = document.getElementsByClassName("nota"); 

var onNotaInput = function (event) {
  var regexp = new RegExp("[^0-9]", "g");
  var value = event.target.value.replace(regexp, "");
  value = parseInt(value) / 10;
  if (value >= event.target.min && value <= event.target.max) {
    event.target.dataset.value = value;
  } else {
    value = parseFloat(event.target.dataset.value);
  }
  if (isNaN(value)) {
    value = 0;
  }

  event.target.value = value.toLocaleString(undefined, { minimumFractionDigits: 1 });
};

[].forEach.call(notas, function (nota) {
  nota.addEventListener("input", onNotaInput);
});
</script>