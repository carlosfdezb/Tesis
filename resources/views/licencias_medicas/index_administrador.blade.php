@extends('layouts.index')

@section('title', 'Licencias Médicas')  

@section('content')
<!-- INDEX LICENCIAS MÉDICAS -->
<section class="content-header">
    <h1>
        Listado de Alumnos 
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
                        {{ Form::open(['url' => 'licencias_medicas/administrador/index', 'method' => 'GET']) }}
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
                            <input type="text" class="form-control" name="scope_nombre" placeholder="Nombre Alumno">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="scope_rut" placeholder="Rut Alumno">
                        </div>
                        <div class="form-group col-md-4">
                            <select name="scope_curso" class="form-control">
                                <option value="">-- Seleccione Curso --</option>
                                @foreach ($cursos as $curso)
                                <option value="{{$curso->id}}">{{$curso->nivel.' ° '.$curso->grado.' '.$curso->letra}}</option>
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
                    
                    <div class="box-body table-responsive no-padding">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped dataTable" id="my-table">
                                <thead>
                                    <th>
                                        Nombre Alumno
                                    </th>
                                    <th>
                                        Rut Alumno
                                    </th>
                                    <th>
                                        Curso
                                    </th>
                                    <th>
                                        Correo
                                    </th>
                                    <th>
                                        Licencias
                                    </th>
                                </thead>
                                @foreach($alumnos as $alumno)

                                <tr>
                                    <td>
                                        {{ $alumno->apellido_paterno.' '.$alumno->apellido_materno.','.$alumno->primer_nombre.' '.$alumno->segundo_nombre}} 
                                    </td>
                                    <td>
                                        {{ $alumno->rut}}
                                    </td>
                                    <td>
                                        @if($alumno->curso->nivel == 'Kinder')
                                            {{ $alumno->curso->nivel.' '.$alumno->curso->letra }}
                                        @else
                                            {{ $alumno->curso->nivel.' ° '.$alumno->curso->grado.' '.$alumno->curso->letra }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $alumno->correo }}
                                    </td>
                                    <!-- botones  -->
                                    <td>
                                        <div class="btn-group">
                                            <!-- principal  -->
                                            <a class="btn btn-flat" style="width: : 40px; background-color: #EFEFEF ; color: #333" type="button" href="{{ route('licencias_medicas.administrador', ['id_alumno' => $alumno->id]) }}">
                                                <i class="fa fa-folder-open">
                                                </i>
                                            </a>
                                        </div>
                                    </td>
                                    <!-- botones  -->
                                </tr>
                                @endforeach
                            </table>
                            <ul class="pagination pagination-sm no-margin pull-right">
                                {{ $alumnos->render() }}
                            </ul>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-left">
                        </ul>
                        <ul class="pagination pagination-sm no-margin pull-right">
                        </ul>
                    </div>
                </br>
            </div>
        </div>
    </div>
</section>

@endsection

