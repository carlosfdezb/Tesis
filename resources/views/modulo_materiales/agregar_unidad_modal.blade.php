<div class="modal fade bd-example-modal-lg" id="agregar_unidad" role="dialog">
<div class="modal-dialog">
    {{!!Form::open(['url'=>'modulo_materiales/profesor/{id_curso}/{id_asignatura}/vista_curso/agregar_unidad','method'=>'put'])!!}
    {{ csrf_field() }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Nueva Sección</h3> 
            </div>
                 <div class="modal-body">

            <input type="text" name="id_profesor" hidden="true" value="{{$profesor->id}}">
            <input type="text" name="id_curso" hidden="true" value={{$curso->id}}>
            <input type="text" name="id_asignatura" hidden="true" value="{{$asignatura->id}}">

            <label for ="">Asignatura</label> 
            <div class="form-group"> 
                <div type="text" class="form-control">
                    {{$asignatura->nombre}}
                </div>
            </div>

            <label for ="">Curso</label> 
            <div class="form-group"> 
                <div type="text" class="form-control" >
                    {{$curso->nivel.' ° '.$curso->grado.' '.$curso->letra}}
                </div>
            </div>

            <label for ="">Nombre de la Sección</label> 
            <div class="form-group">
                    <input type="text" name="titulo_unidad" required="true" class="form-control">
            <div class="form-group has-warning">
                <span class="help-block"><i class="fa fa-exclamation-circle"></i> 
                    Se creará una nueva sección asociada a la asignatura {{$asignatura->nombre}}
                </span> 
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
    </div>
    {{Form::Close()}}

</div>  
</div>  

