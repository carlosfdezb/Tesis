@extends('layouts.index')

@section('title', 'Carpeta PIE')  

@section('content')
<!-- INDEX ADMINISTRATIVOS -->
<section class="content-header">
    <h1>
        Carpeta de Alumno PIE
            <small>
                CEISP
            </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/">
                <i class="fa fa-home"> 
                </i>
                Inicio
            </a>
        </li>
        <li class="active">
            Carpeta Alumno PIE
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
            @include('modulo_pie.subir_archivo_carpetapie')
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title text-light-blue">
                        Perfil del Alumno
                    </h3>
                </div>
                    <!-- /.box-header -->
                    <div class="row">
                        <div class="col-md-12">
                    <?php
                    $nacimiento = new DateTime($alumno_pie->edad);
                    $ahora = new DateTime(date("Y-m-d"));
                    $diferencia = $ahora->diff($nacimiento);
                    ?>
                    <div class="col-md-3">
                        <br>
                        <ul class="list-group">
                            <li class="list-group-item active"><h4><strong>{{$alumno_pie->alumno->primer_nombre.' '.$alumno_pie->alumno->segundo_nombre.' '.$alumno_pie->alumno->apellido_paterno.' '.$alumno_pie->alumno->apellido_materno}} </strong></h4></li>
                            <li class="list-group-item">
                                 Estado en PIE : <strong>{{$alumno_pie->estado}} </strong>
                            </li>
                            <li class="list-group-item">
                                 Rut : {{$alumno_pie->alumno->rut}}
                            </li>
                            <li class="list-group-item">
                                 Fecha de Nacimiento : {{ date('d-m-Y',strtotime($alumno_pie->edad)) }}
                            </li>
                            <li class="list-group-item">
                                 Edad : {{$diferencia->format("%y").' años '.' y '.$diferencia->format("%m").' meses '}}
                            </li>
                            <li class="list-group-item">
                                NEE : {{$alumno_pie->nee->abreviacion.' - '.$alumno_pie->nee->descripcion}}
                            </li>
                            <li class="list-group-item">
                                Fecha de Diagnóstico : {{ date('d-m-Y',strtotime($alumno_pie->fecha_diagnostico))}}
                            </li>
                            <li class="list-group-item">
                                Fecha de Reevaluación : {{ date('d-m-Y',strtotime($alumno_pie->fecha_reevaluacion))}}
                            </li>
                            <li class="list-group-item">
                                Otros Profesionales : {{$alumno_pie->otros_profesionales}}
                            </li>
                            <li class="list-group-item">
                                Curso : @if($alumno_pie->alumno->curso->nivel == 'Kinder')
                                          {{ $alumno_pie->alumno->curso->nivel.' '.$alumno_pie->alumno->curso->letra }}
                                        @else
                                          {{ $alumno_pie->alumno->curso->nivel.' ° '.$alumno_pie->alumno->curso->grado.' '.$alumno_pie->alumno->curso->letra }}
                                        @endif
                            </li>     
                            <li class="list-group-item">
                                Profesor Jefe : {{$alumno_pie->alumno->curso->profesor->primer_nombre.' '.$alumno_pie->alumno->curso->profesor->apellido_paterno.' '.$alumno_pie->alumno->curso->profesor->apellido_materno}}
                            </li>
                            <li class="list-group-item">
                                Rut Profesor Jefe : {{$alumno_pie->alumno->curso->profesor->rut}}  
                            </li>
                            <li class="list-group-item">
                                Especialista : {{$alumno_pie->especialista_pie->especialista->primer_nombre.' '.$alumno_pie->especialista_pie->especialista->apellido_paterno.' '.$alumno_pie->especialista_pie->especialista->apellido_materno}} 
                            </li>
                            <li class="list-group-item">
                                Rut Especialista : {{$alumno_pie->especialista_pie->especialista->rut}}
                            </li>
                            <li class="list-group-item">
                                N° registro secreduc : {{$alumno_pie->especialista_pie->especialista->numero_secreduc}}
                            </li>
                        </ul>
                        <div>
                        <ul class="pagination pagination-sm no-margin pull-left">

                            <a href="{{ url()->previous() }}" class="btn btn-app">
                                <i class="fa fa-arrow-circle-left">
                                </i>
                                Atrás
                            </a>
                            @if(auth()->user()->rol == "6")
                             <a class="btn btn-app" data-target="#subir_archivo_carpetapie" data-toggle="modal">
                                <i class="fa fa-cloud-upload">
                                </i>
                                Documento
                            </a>
                            @endif
                        </ul>
                        <br>
                        <br>
                        <br>
                        <br>
                        </div>
                    </div>
                    <br>

                <div class="col-md-9">
                    <div class="row">
                            <div class="col-md-12">
                                <!-- Custom Tabs -->
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_1" data-toggle="tab">Documentación Actual</a></li>
                                        <li><a href="#tab_2" data-toggle="tab">Historial</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1">
                                            <div class="box-body table-responsive">
                                            @foreach($titulo_documentos->sortBy('descripcion') as $titulo) <!-- foreach titulo -->
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-caret-right text-blue"></i>
                                                    </div>
                                                    <span class="form-control pull-right">
                                                        <a aria-expanded="false" class="" data-parent="#accordion" data-toggle="collapse" href="#1collapse{{$titulo->id}}">
                                                        {{$titulo->descripcion}} 
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div aria-expanded="false" class="panel-collapse collapse" id="1collapse{{$titulo->id}}" style="">
                                                <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid">
                                                    <thead>
                                                        <th width="30%">
                                                            Documentos
                                                        </th>
                                                        <th width=20%>
                                                            Especialista
                                                        </th>
                                                        <th width=20%>
                                                            Fecha de subida
                                                        </th>
                                                        <th width=20%>
                                                            Última actualización
                                                        </th>
                                                        <th width=10%>
                                                            Opciones
                                                        </th>
                                                    </thead>
                                                    @foreach($carpeta_pie_actual as $carpeta) <!-- foreach carpeta --> 
                                                    <tr>
                                                        @if($carpeta->documento_pie != NULL)
                                                            @if($carpeta->documento_pie->id == $titulo->id)
                                                            @include('modulo_pie.actualizar_archivo_carpetapie')
                                                            @include('modulo_pie.eliminar_archivo_carpetapie')
    
                                                            <td>
                                                                {{$carpeta->archivo}}

                                                            </td>
                                                            <td>
                                                                {{$carpeta->especialista_pie->especialista->primer_nombre.' '.$carpeta->especialista_pie->especialista->apellido_paterno.' '.$carpeta->especialista_pie->especialista->apellido_materno}}
                                                            </td>
                                                            <td>
                                                               {{ date('d-m-Y',strtotime($carpeta->created_at)) }}
                                                            </td>
                                                            <td>
                                                               {{ date('d-m-Y',strtotime($carpeta->updated_at)) }}
                                                            </td>
                                                        <!-- botones -->
                                                        <td>
                                                            <div class="btn-group">
                                                                <!-- principal  -->
                                                                <button class="btn btn-flat"style="height: 34px;" type="button"><a href="{{route('modulo_pie.descargar_archivo', ['id' => $carpeta->id_alumno_pie,'file' => $carpeta->archivo])}}">
                                                                    <i class="fa fa-download">
                                                                    </i>
                                                                </a></button>
                                                                <!-- dropdown  -->
                                                                <button class="btn btn-flat dropdown-toggle" data-toggle="dropdown" style="height: 34px;" type="button">
                                                                    <span class="caret">
                                                                    </span>
                                                                    <span class="sr-only">
                                                                        Toggle Dropdown
                                                                    </span>
                                                                </button>
                                                                <!-- botones del dropdown, donde cada 'li' es un boton  -->
                                                                <ul class="dropdown-menu dropdown-menu-right " role="menu">
                                                                    <li>
                                                                        <a href="{{route('modulo_pie.actualizar_archivo', ['id' => $carpeta->id_alumno_pie,'id_archivo' => $carpeta->id])}}" data-target="#modal-update-{{$carpeta->id}}" data-toggle="modal" href="#">
                                                                            <i class="fa fa-edit">
                                                                            </i>
                                                                            Actualizar
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-target="#modal-delete-{{$carpeta->id}}" data-toggle="modal">
                                                                            <i class="fa fa-trash btn-">
                                                                            </i>
                                                                            Eliminar
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                        <!-- .botones  -->

                                                            @endif
                                                        @endif
                                                    </tr>
                                                    @endforeach <!-- .foreach carpeta -->
                                                </table>
                                            </div>
                                                <br>
                                                @endforeach <!-- .foreach titulo -->
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <!-- CALENDARIO -->
                                        <div class="tab-pane" id="tab_2">
                                            <div class="box-body table-responsive">
                                            @foreach($titulo_documentos->sortBy('descripcion') as $titulo) <!-- foreach titulo -->
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-caret-right text-blue"></i>
                                                    </div>
                                                    <span class="form-control pull-right">
                                                        <a aria-expanded="false" class="" data-parent="#accordion" data-toggle="collapse" href="#collapse{{$titulo->id}}">
                                                        {{$titulo->descripcion}} 
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div aria-expanded="false" class="panel-collapse collapse" id="collapse{{$titulo->id}}" style="">
                                                <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid">
                                                    <thead>
                                                        <th width="30%">
                                                            Documentos
                                                        </th>
                                                        <th width=20%>
                                                            Especialista
                                                        </th>
                                                        <th width=20%>
                                                            Diagnóstico
                                                        </th>
                                                        <th width=20%>
                                                            Fecha de subida
                                                        </th>
                                                        <th width=10%>
                                                            Opciones
                                                        </th>
                                                    </thead>
                                                    @foreach($carpeta_pie_historial as $carpeta) <!-- foreach carpeta -->
                                                    <tr>
                                                        @if($carpeta->documento_pie != NULL)
                                                            @if($carpeta->documento_pie->id == $titulo->id)
    
                                                            <td>
                                                                {{$carpeta->archivo}}
                                                            </td>
                                                            <td>
                                                                {{$carpeta->especialista_pie->especialista->primer_nombre.' '.$carpeta->especialista_pie->especialista->apellido_paterno.' '.$carpeta->especialista_pie->especialista->apellido_materno}}
                                                            </td>
                                                            <td>
                                                                {{$carpeta->nee->descripcion}}
                                                            </td>
                                                            <td>
                                                               {{ date('d-m-Y',strtotime($carpeta->created_at)) }}
                                                            </td>
                                                        <!-- botones -->
                                                        <td>
                                                            <div class="btn-group">
                                                                <!-- principal  -->
                                                                <button class="btn btn-flat"style="height: 34px;" type="button"><a href="{{route('modulo_pie.descargar_archivo', ['id' => $carpeta->id_alumno_pie,'file' => $carpeta->archivo])}}">
                                                                    <i class="fa fa-download">
                                                                    </i>
                                                                </a></button>
                                                            </div>
                                                        </td>
                                                        <!-- .botones  -->
                                                            @endif
                                                        @endif
                                                    </tr>
                                                    @endforeach <!-- .foreach carpeta -->
                                                </table>
                                            </div>
                                                <br>
                                                @endforeach <!-- .foreach titulo -->
                                            </div>
                           

                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_3">

                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .col-md-9 --> 
                </div>
                <!-- .col-md-12 -->
            </div>
            <!-- .row -->
                    <div class="box-footer clearfix">
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection