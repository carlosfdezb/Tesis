@extends('layouts.index')

@section('title', 'Alumnos PIE')  

@section('content')
<!-- INDEX ADMINISTRATIVOS -->
<section class="content-header">
    <h1>
        Listado de Alumnos PIE
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
            Alumnos PIE
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
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::open(['url' => 'modulo_pie/alumnos_pie/index', 'method' => 'GET']) }}
                            <h4 class="box-title">
                                <a aria-expanded="true" class="" data-parent="#accordion" data-toggle="collapse" href="#collapseOne">
                                    Buscador 
                                </a>     
                            </h4>
                            
                            <button type="submit" class="btn btn-default pull-right">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                            
                        </div>
                    </div>
                </div>
                <div aria-expanded="true" class="panel-collapse collapse in" id="collapseOne" style="">
                    <div class="box-body">
                        <div class="box-tools">
                            <div class="row" >

                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre Alumno">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="rut" placeholder="Rut Alumno">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="nombre_especialista" placeholder="Nombre Docente">
                            </div>
                            <div class="form-group col-md-3">
                                <select name="curso" class="form-control">
                                    <option value="">-- Seleccione Nivel --</option>
                                        @foreach ($cursos as $curso)
                                    <option value="{{$curso->id}}"->{{$curso->nivel.' ° '.$curso->grado.' '.$curso->letra}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div >
                <!-- /.box-header -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">En tratamiento</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Dado de alta</a></li>
                                <!-- <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                         Dropdown <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </li>
                                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid">
                                        <thead>
                                                <th>
                                                    Alumno
                                                </th>
                                                <th>
                                                    Rut
                                                </th>
                                                <th>
                                                    Curso
                                                </th>
                                                <th>
                                                    Diagnóstico
                                                </th>
                                                <th>
                                                    Equipo Encargado
                                                </th>

                                                <th>
                                                    Opciones
                                                </th>
                                        </thead>
                                        @foreach($alumno_pies as $alumno_pie) 
                                        <tr>
                                            <td>
                                                {{$alumno_pie->alumno->apellido_paterno.' '.$alumno_pie->alumno->apellido_materno.' , '.$alumno_pie->alumno->primer_nombre.' '.$alumno_pie->alumno->segundo_nombre}}
                                            </td>
                                            </td>
                                            <td>
                                                {{$alumno_pie->alumno->rut}}
                                            </td>
                                            <td>
                                                @if($alumno_pie->alumno->curso->nivel == 'Kinder')
                                                  {{ $alumno_pie->alumno->curso->nivel.' '.$alumno_pie->alumno->curso->letra }}
                                                @else
                                                  {{ $alumno_pie->alumno->curso->nivel.' ° '.$alumno_pie->alumno->curso->grado.' '.$alumno_pie->alumno->curso->letra }}
                                                @endif
                                            </td>
                                            <td>
                                                {{$alumno_pie->nee->descripcion}}
                                            </td>
                                            <td>
                                                {{ $alumno_pie->especialista_pie->especialista->apellido_paterno.' '.$alumno_pie->especialista_pie->especialista->apellido_materno.' , '.$alumno_pie->especialista_pie->especialista->primer_nombre.' '.$alumno_pie->especialista_pie->especialista->segundo_nombre}}
                                            </td>
                                            <!-- botones  -->
                                            <td>
                                                <div class="btn-group">
                                                <!-- principal  -->
                                                    <a class="btn btn-flat" style="height: 34px; background-color: #EFEFEF ; color: #333" type="button" href="{{ route('modulo_pie.carpeta_alumnos_pie', ['id' => $alumno_pie->id]) }}">
                                                        <i class="fa fa-folder-open">
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
                                                        <ul class="dropdown-menu dropdown-menu-right " role="menu">
                                                            @if($alumno_pie->estado == "Activo")
                                                                <li>
                                                                    <a data-target="#cambiar_docente-{{$alumno_pie->id}}" data-toggle="modal" href="#">
                                                                        <i class="fa fa-exchange">
                                                                        </i>
                                                                        Cambiar Especialista
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-target="#estado-modal-{{$alumno_pie->id}}" data-toggle="modal" href="#">
                                                                        <i class="fa fa-check-square-o">
                                                                        </i>
                                                                        Dar de Alta PIE
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-target="#modificar-modal-{{$alumno_pie->id}}" data-toggle="modal" href="#">
                                                                        <i class="fa fa-edit">
                                                                        </i>
                                                                        Modificar
                                                                    </a>
                                                                </li>                                                 
                                                                @else
                                                                <li>
                                                                    <a data-target="#estado-modal-{{$alumno_pie->id}}" data-toggle="modal" href="#">
                                                                        <i class="fa fa-plus-square">
                                                                        </i>
                                                                       Habilitar PIE
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                </div>
                                            </td>
                                            <!-- botones  -->
                                        @include('modulo_pie.estado_pie_modal')
                                        @include('modulo_pie.cambiar_docente_modal')
                                        @include('modulo_pie.modificar_alumnos_pie_modal')
                                        </tr>
                                @endforeach
                            </table>
                            <ul class="pagination pagination-sm no-margin pull-right">
                                {{ $alumno_pies->render() }}
                            </ul>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                     <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid">
                                        <thead>
                                                <th>
                                                    Alumno
                                                </th>
                                                <th>
                                                    Rut
                                                </th>
                                                <th>
                                                    Curso
                                                </th>
                                                <th>
                                                    Diagnóstico
                                                </th>
                                                <th>
                                                    Equipo Encargado
                                                </th>
                                                <th>
                                                    Opciones
                                                </th>
                                        </thead>
                                        @foreach($inactivos as $alumno_pie) 
                                        <tr>
                                            <td>
                                                {{$alumno_pie->alumno->apellido_paterno.' '.$alumno_pie->alumno->apellido_materno.' , '.$alumno_pie->alumno->primer_nombre.' '.$alumno_pie->alumno->segundo_nombre}}
                                            </td>
                                            </td>
                                            <td>
                                                {{$alumno_pie->alumno->rut}}
                                            </td>
                                            <td>
                                                @if($alumno_pie->alumno->curso->nivel == 'Kinder')
                                                  {{ $alumno_pie->alumno->curso->nivel.' '.$alumno_pie->alumno->curso->letra }}
                                                @else
                                                  {{ $alumno_pie->alumno->curso->nivel.' ° '.$alumno_pie->alumno->curso->grado.' '.$alumno_pie->alumno->curso->letra }}
                                                @endif
                                            </td>
                                            <td>
                                                {{$alumno_pie->nee->descripcion}}
                                            </td>
                                            <td>
                                                {{ $alumno_pie->especialista_pie->especialista->apellido_paterno.' '.$alumno_pie->especialista_pie->especialista->apellido_materno.' , '.$alumno_pie->especialista_pie->especialista->primer_nombre.' '.$alumno_pie->especialista_pie->especialista->segundo_nombre}}
                                            </td>

                                            <!-- botones  -->
                                            <td>
                                                <div class="btn-group">
                                                <!-- principal  -->
                                                    <a class="btn btn-flat" style="height: 34px; background-color: #EFEFEF ; color: #333" type="button" href="{{ route('modulo_pie.carpeta_alumnos_pie', ['id' => $alumno_pie->id]) }}">
                                                        <i class="fa fa-folder-open">
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
                                                    <ul class="dropdown-menu dropdown-menu-right " role="menu">
                                                        @if($alumno_pie->estado == "Activo")
                                                        <li>
                                                            <a data-target="#estado-modal-{{$alumno_pie->id}}" data-toggle="modal" href="#">
                                                                <i class="fa fa-check-square-o">
                                                                </i>
                                                                Dar de Alta PIE
                                                            </a>
                                                        </li>                                                  
                                                        @else
                                                        <li>
                                                            <a data-target="#estado-modal-{{$alumno_pie->id}}" data-toggle="modal" href="#">
                                                                <i class="fa fa-plus-square-o">
                                                                </i>
                                                               Incorporar a PIE
                                                            </a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                 </div>
                                            </td>
                                            <!-- botones  -->
                                            @include('modulo_pie.estado_pie_modal')
                                        </tr>
                                @endforeach
                            </table>
                            <ul class="pagination pagination-sm no-margin pull-right">
                                {{ $inactivos->render() }}
                            </ul>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
            
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                            <div class="box-footer clearfix">
                                <ul class="pagination pagination-sm no-margin pull-left">
                                    <!-- aquí poner botones -->
                                </ul>
                            </div>
                        </div>
                        <!-- nav-tabs-custom -->
                    </div>
                    <!-- /.col -->   
                </div>
</section>
@endsection