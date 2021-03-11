@extends('layouts.index')

@section('title', 'Planificaciones')  

@section('content')

<!-- INDEX PLANIFICACIONES PROFESORES -->
<section class="content-header">
    <h1>
       Planificaciones
        <small>
            CEISP
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/inicio')}}">
                <i class="fa fa-home"> 
                </i>
                Inicio
            </a>
        </li>
        <li class="active">
            Planificaciones
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
        @include('alerts.success')
        @include('alerts.warning')
        @include('alerts.danger')
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title text-light-blue">
                        Perfil del Profesor
                    </h3>
                </div>
                    <!-- /.box-header -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <br>
                            <ul class="list-group">
                                <li class="list-group-item active"><h4><strong>{{ $ide->primer_nombre.' '.$ide->segundo_nombre.' '.$ide->apellido_paterno.' '.$ide->apellido_materno}}</strong></h4></li>
                                <li class="list-group-item">
                                    Rut : {{$ide->rut}}
                                </li>
                                <li class="list-group-item">
                                    Correo : {{$ide->correo}}
                                </li>
                            </ul>
                            <div>
                                <ul class="list-group">
                                    @if($ide->asignaturas->count() > 0)
                                    <li class="list-group-item active"><h4><strong>Asignaturas Impartidas</strong></h4>
                                        @foreach($ide->asignaturas as $asignatura)
                                            
                                                <li class="list-group-item">
                                                    @if($asignatura->cursos->first()->nivel == 'Kinder')
                                                        {{ $asignatura->cursos->first()->nivel.' '.$asignatura->cursos->first()->letra }}
                                                    @else
                                                        {{$asignatura->nombre.' '.$asignatura->pivot->nivel.' ° '.$asignatura->pivot->grado.' '.$asignatura->pivot->letra}}
                                                    @endif
                                                </li>
                                        @endforeach
                                    </li>
                                    @else
                                    <li class="list-group-item active"><h4><strong>Asignaturas Impartidas</strong></h4>
                                        <li class="list-group-item">
                                            ¡Profesor no tiene asignaturas asignadas!
                                        </li>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <div>
                                <ul class="pagination pagination-sm no-margin pull-left">
                                    @if(auth()->user()->rol == '5')
                                    <a href="/planificaciones" class="btn btn-app">
                                        <i class="fa fa-arrow-circle-left">
                                        </i>
                                        Atrás
                                    </a>
                                    @elseif(auth()->user()->rol == '3')
                                    <a class="btn btn-app" data-target="#create1" data-toggle="modal">
                                        <i class="fa fa-cloud-upload">
                                        </i>
                                        Planificación
                                    </a>
                                    @endif
                                </ul>
                            </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        </div>
                        <br>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    @if(DB::table('planificacions')->where('id_profesor',$ide->id)->count() > 0)
                                    <!-- Custom Tabs -->
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab_1" data-toggle="tab">Planificaciones</a></li>
                                        </ul>                                        
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1">                                
                                                <div class="box-body table-responsive">                                            
                                                    <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid" style="font-size: 14px;">
                                                        <thead>
                                                            <th>
                                                                Asignatura 
                                                            </th>
                                                            <th>
                                                                Unidad
                                                            </th>
                                                            <th>
                                                                Documento
                                                            </th>
                                                            <th>
                                                                Fecha de Entrega
                                                            </th>
                                                            <th>
                                                                Fecha de Subida
                                                            </th>
                                                            @if(auth()->user()->rol == '5')
                                                            <th>
                                                                Última Actualización
                                                            </th>
                                                            
                                                            <th>
                                                                Revisado por
                                                            </th>
                                                            @endif
                                                            <th>
                                                                Revisión
                                                            </th>
                                                            <th width="10%">
                                                                Opciones
                                                            </th>
                                                        </thead>
                                                        @foreach($planificaciones as $planificacion)
                                                        <tr>
                                                            <td>
                                                                {{ $planificacion->asignatura.' - '.$planificacion->nivel.' º '.$planificacion->grado.' '.$planificacion->letra}}
                                                            </td>
                                                            <td>
                                                                {{ $planificacion->unidad}}
                                                            </td>
                                                            <td>
                                                                {{ $planificacion->archivo}}
                                                            </td>
                                                            <td>
                                                                {{ date('d-m-Y',strtotime($planificacion->fecha))}}
                                                            </td>
                                                            <td>
                                                                {{ date('d-m-Y',strtotime($planificacion->created_at))}}
                                                            </td>
                                                            @if(auth()->user()->rol == '5')
                                                            <td>
                                                                {{ date('d-m-Y',strtotime($planificacion->updated_at))}}
                                                            </td>
                                                            </td>
                                                            <td>
                                                                {{$planificacion->nombre_administrativo}}
                                                            </td>
                                                            @endif
                                                            <td>
                                                                @if($planificacion->estado == 'Pendiente')
                                                                <div class="text-yellow">{{ $planificacion->estado}}</div>
                                                                @elseif($planificacion->estado == 'Aprobado')
                                                                <div class="text-green">{{ $planificacion->estado}}</div>
                                                                @elseif($planificacion->estado == 'Rechazado')
                                                                <div class="text-red">{{ $planificacion->estado}}</div>
                                                                @endif
                                                            </td>
                                                            <!-- botones  -->
                                                            <td>
                                                                <div class="btn-group">
                                                                    <!-- principal  -->
                                                                    <a class="btn btn-flat" style=" height: 34px; width: 40px;background-color: #EFEFEF;" type="button" href=/planificaciones/download/{{$planificacion->archivo}}>
                                                                        <i class="fa fa-download">
                                                                        </i>
                                                                    </a>
                                                                    <!-- dropdown  -->
                                                                    <button class="btn btn-flat dropdown-toggle" data-toggle="dropdown" style="height: 34px;" type="button">
                                                                        <span class="caret">
                                                                        </span>
                                                                        <span class="sr-only">
                                                                            Toggle Dropdown
                                                                        </span>
                                                                    </button>
                                                                    <!-- botones del dropdown, donde cada 'li' es un boton  -->
                                                                    <ul class="dropdown-menu dropdown-menu-right " role="menu" >
                                                                        @if(auth()->user()->rol == '3')
                                                                            <li>
                                                                                <a data-target="#modal-ver-{{$planificacion->id}}" data-toggle="modal" href="#">
                                                                                    <i class="fa fa-eye">
                                                                                    </i>
                                                                                    Ver
                                                                                </a>
                                                                            </li>
                                                                                @if($planificacion->estado == 'Pendiente')
                                                                                    <li>
                                                                                        <a data-target="#modal-update-{{$planificacion->id}}" data-toggle="modal" href="#">
                                                                                            <i class="fa fa-edit">
                                                                                            </i>
                                                                                            Actualizar
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a data-target="#modal-delete-{{$planificacion->id}}" data-toggle="modal" href="#">
                                                                                            <i class="fa fa-trash btn-">
                                                                                            </i>
                                                                                            Eliminar
                                                                                        </a>
                                                                                    </li>
                                                                                @endif
                                                                        @else
                                                                            <li>
                                                                                <a data-target="#modal-estado-{{$planificacion->id}}" data-toggle="modal" href="#">
                                                                                    <i class="fa fa-flag-o">
                                                                                    </i>
                                                                                    Revisión
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                            <!-- botones  -->
                                                            @if(auth()->user()->rol == '3')
                                                                @include('planificaciones.createmodal1')
                                                                @include('planificaciones.editmodal')
                                                                @include('planificaciones.readmodal')
                                                                @include('planificaciones.deletemodal')
                                                            @else
                                                                @include('planificaciones.estadomodal')
                                                                @include('planificaciones.deletemodal')
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                    <ul class="pagination pagination-sm no-margin pull-right">
                                                        {{ $planificaciones->render() }}
                                                    </ul>
                                                    <br>
                                                </div>
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="tab_2">
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="tab_3">
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div>
                                    <!-- .Custom Tabs -->
                                    @else
                                        @if($ide->asignaturas->count() > 0)
                                            @if(auth()->user()->rol == '5')
                                            <div class="callout callout-info">
                                                <h4>¡Profesor no presenta planificaciones! <i class="fa fa-bullhorn"></i></h4>
                                                <p><i class="icon fa fa-info-circle"></i> El profesor no ha añadido ninguna planificación.</p>
                                            </div>
                                            @elseif(auth()->user()->rol == '3')
                                                <div class="callout callout-info">
                                                <h4>¡No presenta planificaciones! <i class="fa fa-bullhorn"></i></h4>
                                                <p><i class="icon fa fa-info-circle"></i> Puede añadir una nueva planificación con el botón Planificación.</p>
                                            </div>
                                            @endif
                                        @else
                                            @if(auth()->user()->rol == '5')
                                                <div class="callout callout-info">
                                                    <h4>¡Profesor no presenta asignaturas asignadas! <i class="fa fa-frown-o"></i></h4>
                                                    <p><i class="icon fa fa-info-circle"></i> El profesor debe tener mínimo 1 asignatura asignada.</p>
                                                </div>
                                            @elseif(auth()->user()->rol == '3')
                                                <div class="callout callout-info">
                                                    <h4>¡No tiene ninguna asignatura asignada aún! <i class="fa fa-frown-o"></i></h4>
                                                    <p><i class="icon fa fa-info-circle"></i> Debe tener mínimo 1 asignatura asignada.</p>
                                                </div>
                                            @endif  
                                        @endif
                                    @endif
                                </div>
                                <!-- .col-md-12 -->
                            </div>
                            <!-- .row --> 
                        </div>
                        <!-- .col-md-9 -->
                    </div>
                    <!-- .col-md-12 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .panel box primary -->
        </div>
        <!-- .col-md-12 -->
    </div>
    <!-- .row -->
</section>
<!-- .Main content -->



@if(auth()->user()->rol == '3')
<div class="modal fade bd-example-modal-lg" id="create1" role="dialog">
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
                @foreach ($ide->asignaturas as $asignatura)
                    <option value="{{$asignatura->id.' '.$asignatura->pivot->nivel.' '.$asignatura->pivot->grado.' '.$asignatura->pivot->letra}}">{{$asignatura->nombre.' '.$asignatura->pivot->nivel.' ° '.$asignatura->pivot->grado.' '.$asignatura->pivot->letra}}</option>
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
                    <i class="fa fa-cloud-upload"></i>Agregar
                </button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>  
</div>
@endif


@endsection


<style type="text/css">
    .table-responsive {
  overflow-x: inherit !important;
}
@media screen and (max-width:768px){
.scrollable{
  height: 500px;
  overflow: scroll;
} 
}
</style>