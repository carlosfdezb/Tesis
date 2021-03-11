@extends('layouts.index')

@section('title', 'Cursos')  

@section('content')
<!-- INDEX NOTAS -->
<section class="content-header">
    <h1>
        Listado de cursos
        <small>
            CEISP
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ action('NoticiasController@index') }}">
                <i class="fa fa-home">
                </i>
                Inicio
            </a>
        </li>
        <li class="active">
            Cursos
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
                            {{ Form::open(['url' => 'cursos', 'method' => 'GET']) }}
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
                                <input type="text" class="form-control" name="scope_nombre" placeholder="Nombre y Apellido Profesor">
                            </div>

                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="scope_rut" placeholder="Rut Profesor">
                            </div>
                            <div class="form-group col-md-4">
                                <select name="scope_curso" class="form-control">
                                    <option value="">-- Seleccione Nivel --</option>
                                        @foreach ($cursolista as $cursos)
                                    <option value="{{$cursos->id}}"->{{$cursos->nivel.' ° '.$cursos->grado.' '.$cursos->letra}}</option>
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
                        Todos los cursos
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="col-md-12">
                    <div class="box-body table-responsive">
                        <div class="scrollable">
                            <table class="table table-bordered table-striped" id="my-table">
                                <tr>
                                    <th style="width: 50px">
                                        Curso
                                    </th>
                                    <th style="width: 10px">
                                        Letra
                                    </th>
                                    <th>
                                        Nivel
                                    </th>
                                    <th>
                                        Profesor jefe
                                    </th>
                                    <th>
                                        Rut profesor jefe
                                    </th>
                                    <th>
                                        Correo profesor jefe
                                    </th>
                                    <th>
                                        Cantidad de alumnos
                                    </th>
                                    <th style="width: 62px">
                                        Cambiar jefatura
                                    </th>
                                    <th style="width: 82px">
                                        Ver curso
                                    </th>
                                </tr>
                                @foreach($curso as $cursos)
                                <tr>
                                    @if($cursos->nivel=='Kinder')
                                    <td>
                                        {{ $cursos->nivel}}
                                    </td>
                                    @else
                                    <td>
                                        {{ $cursos->nivel.'°'}}
                                    </td>
                                    @endif
                                    <td>
                                        {{ $cursos->letra }}
                                    </td>
                                    @if($cursos->grado=='Medio')
                                    <td>
                                        Media
                                    </td>
                                    @else
                                    @if($cursos->grado=='Básico')
                                    <td>
                                        Básica
                                    </td>
                                    @else
                                    <td>
                                        Pre-escolar
                                    </td>
                                    @endif
                                    @endif
                                    <td>
                                        {{ $cursos->profesor->primer_nombre.' '.$cursos->profesor->apellido_paterno.' '.$cursos->profesor->apellido_materno}}
                                    </td>
                                    <td>
                                        {{ $cursos->profesor->rut}}
                                    </td>
                                    <td>
                                        {{ $cursos->profesor->correo}}
                                    </td>
                                    <?php

                          $numeroalumnos= DB::table('alumnos')
                              ->
                                    join('cursos','alumnos.id_curso','=','cursos.id')
                              ->where('alumnos.id_curso','=',$cursos->id)
                              ->count();

                        ?>
                                    <td>
                                        {{$numeroalumnos}}
                                    </td>
                                    <td>
                                        <a class="btn btn-flat" data-target="#modalprofesorjefe-{{$cursos->id}}" data-toggle="modal" type="button">
                                            <i class="fa fa-exchange">
                                            </i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-flat" href="{{ action('CursoController@detalle', ['id' => $cursos->id]) }}" type="button">
                                            <i class="fa fa-arrows">
                                            </i>
                                        </a>
                                    </td>
                                    @include('cursos.modalprofesorjefe')
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-left"> 
                        <a class="btn btn-app" href="{{ action('CursoController@PDF') }}" type="button">
                            <i class="fa fa-file-pdf-o">
                            </i>
                            PDF
                        </a>
            
                        <a class="btn btn-app" href="{{ action('CursoController@Excel') }}" type="button">
                            <i class="fa fa-file-excel-o">
                            </i>
                            Excel
                        </a>
                    </ul>
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $curso->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- -->
</section>
<!-- /.box -->

@endsection
