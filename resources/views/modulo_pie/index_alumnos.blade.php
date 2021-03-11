@extends('layouts.index')

@section('title', 'Alumnos')  

@section('content')
<!-- INDEX ADMINISTRATIVOS -->
<section class="content-header">
    <h1>
        Listado de Alumnos
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
            Alumnos
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
                            {{ Form::open(['url' => 'modulo_pie/alumnos/index', 'method' => 'GET']) }}
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

                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre y Apellido">
                            </div>

                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="rut" placeholder="Rut">
                            </div>
                            <div class="form-group col-md-4">
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
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Todos los alumnos del sistema
                    </h3>
                </div>
                <br>
                    <!-- /.box-header -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Activos</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Inactivos</a></li>
                                <!--<li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
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
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid">
                                            <thead>
                                                <th>
                                                    Nombre
                                                </th>
                                                <th>
                                                    Rut
                                                </th>
                                                <th>
                                                    Curso
                                                </th>
                                                <th>
                                                    PIE
                                                </th>
                                                <th>
                                                    Opciones
                                                </th>
                                            </thead>
                                            @foreach($alumnos as $alumno) 
                                            <tr>
                                                <td>
                                                    {{ $alumno->apellido_paterno.' '.$alumno->apellido_materno.' , '.$alumno->primer_nombre.' '.$alumno->segundo_nombre}}
                                                </td>
                                                <td>
                                                    {{$alumno->rut}}
                                                </td>
                                                <td>
                                                    @if($alumno->curso->nivel == 'Kinder')
                                                      {{ $alumno->curso->nivel.' '.$alumno->curso->letra }}
                                                    @else
                                                      {{ $alumno->curso->nivel.' ° '.$alumno->curso->grado.' '.$alumno->curso->letra }}
                                                    @endif
                                                </td>
                                                @if(DB::table('alumno_pies')->where('id_alumno',$alumno->id)->count() > 0 )
                                                    <td>
                                                        Sí
                                                    </td>
                                                @else
                                                    <td>
                                                        No
                                                    </td>
                                                @endif
                                                <td> 
                                                    @if(DB::table('alumno_pies')->where('id_alumno',$alumno->id)->count() > 0 )
                                                    <a href="{{route('modulo_pie.carpeta_alumnos_pie', ['id' => $alumno->alumno_pie->id])}}" type="button" class="btn btn-warning btn btn-flat" style="width: 40px">
                                                        <i class="fa fa-folder-open">
                                                        </i>
                                                    </a>
                                                    @else
                                                        @if($alumno->estado == "Activo")
                                                            <a class="btn btn-primary btn btn-flat" data-target="#asignardocente-{{$alumno->id}}" data-toggle="modal" type="button" style="width: 40px">
                                                                <i class="fa fa-plus">
                                                                </i>
                                                            </a>
                                                        @else
                                                            <div>No disponible</div>
                                                        @endif
                                                    @endif 
                                                </td>
                                                <!-- botones  -->
                                                @include('modulo_pie.asignardocentemodal')
                                            </tr>
                                            @endforeach
                                        </table>
                                        <ul class="pagination pagination-sm no-margin pull-right">
                                            {{ $alumnos->render() }}
                                        </ul>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid">
                                            <thead>
                                                <th>
                                                    Nombre
                                                </th>
                                                <th>
                                                    Rut
                                                </th>
                                                <th>
                                                    Curso
                                                </th>
                                                <th>
                                                    PIE
                                                </th>
                                                <th>
                                                    Estado
                                                </th>
                                                <th>
                                                    Opciones
                                                </th>
                                            </thead>
                                            @foreach($inactivos as $alumno) 
                                            <tr>
                                                <td>
                                                    {{ $alumno->apellido_paterno.' '.$alumno->apellido_materno.' , '.$alumno->primer_nombre.' '.$alumno->segundo_nombre}}
                                                </td>
                                                <td>
                                                    {{$alumno->rut}}
                                                </td>
                                                <td>
                                                    @if($alumno->curso->nivel == 'Kinder')
                                                      {{ $alumno->curso->nivel.' '.$alumno->curso->letra }}
                                                    @else
                                                      {{ $alumno->curso->nivel.' ° '.$alumno->curso->grado.' '.$alumno->curso->letra }}
                                                    @endif
                                                </td>
                                                @if(DB::table('alumno_pies')->where('id_alumno',$alumno->id)->count() > 0 )
                                                    <td>
                                                        Sí
                                                    </td>
                                                @else
                                                    <td>
                                                        No
                                                    </td>
                                                @endif
                                                <td>
                                                    {{$alumno->estado}}
                                                </td>
                                                <td> 
                                                    @if(DB::table('alumno_pies')->where('id_alumno',$alumno->id)->count() > 0 )
                                                    <a href="{{route('modulo_pie.carpeta_alumnos_pie', ['id' => $alumno->alumno_pie->id])}}" type="button" class="btn btn-warning btn btn-flat" style="width: 40px">
                                                        <i class="fa fa-folder-open">
                                                        </i>
                                                    </a>
                                                    @else
                                                        @if($alumno->estado == "Activo")
                                                            <a class="btn btn-primary btn btn-flat" data-target="#asignardocente-{{$alumno->id}}" data-toggle="modal" type="button" style="width: 40px">
                                                                <i class="fa fa-plus">
                                                                </i>
                                                            </a>
                                                        @else
                                                            <div>No disponible</div>
                                                        @endif
                                                    @endif 
                                                </td>
                                                <!-- botones  -->
                                                @include('modulo_pie.asignardocentemodal')
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

                                    </ul>
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                    </ul>
                                </div>
                            </div>
                            <!-- nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
