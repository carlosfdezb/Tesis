<?php
use App\Calendario;
?>

@extends('layouts.index')
@if($curso->nivel=='Kinder')
          @section('title', $curso->nivel.' '.$curso->letra)
@else
          @section('title', $curso->nivel.'° '.$curso->grado.' '.$curso->letra )
@endif
@section('title', 'Cursos')  

@section('content')
<!-- INDEX NOTAS -->
<section class="content-header">
    <h1>
        @if(auth()->user()->rut == $curso->profesor->rut)
            Jefatura de Curso
        @else   
            @if($curso->nivel=='Kinder')
              {{ $curso->nivel.' '.$curso->letra }}
            @else
              {{ $curso->nivel.'° '.$curso->grado.' '.$curso->letra }}
            @endif
        @endif
        <small>
            CEISP
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ action('NoticiasController@index') }}" >
                <i class="fa fa-home">
                </i>
                Inicio
            </a>
        </li>
        @if(auth()->user()->rut != $curso->profesor->rut)
        <li>
            <a href="{{url('/cursos')}}">
                Cursos
            </a>
        </li>
        @endif
        <li class="active">
            @if($curso->nivel=='Kinder')
          {{ $curso->nivel.' '.$curso->letra }}
        @else
          {{ $curso->nivel.'° '.$curso->grado.' '.$curso->letra }}
        @endif
        </li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    @include('alerts.success')
    @include('alerts.warning')
    @include('alerts.danger')
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Detalle Curso</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Calendario Evaluaciones y Reuniones</a></li>

                            </ul>
                             <!-- DETALLE CURSO -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div>
                                    <div class="col-md-3">
                                        @if($curso->nivel=='Kinder')
                                        <h1>
                                            {{ $curso->nivel.' '.$curso->letra }}
                                        </h1>
                                        @else
                                        <h1>
                                            {{  $curso->nivel.'° '.$curso->grado.' '.$curso->letra }}
                                        </h1>
                                        @endif
                                        <ul class="list-group">
                                            <li class="list-group-item active">
                                                Datos Curso
                                            </li>
                                            @if($curso->grado=='Básico')
                                            <li class="list-group-item">
                                                Nivel  :  Enseñanza básica
                                            </li>
                                            @else
                                                          @if($curso->grado=='Medio')
                                                            <li class="list-group-item">
                                                                Nivel  :  Enseñanza media
                                                            </li>
                                                            @else
                                                            <li class="list-group-item">
                                                                Nivel  :  {{$curso->grado}}
                                                            </li>
                                                            @endif
                                            @endif
                                            <li class="list-group-item">
                                                Profesor jefe  :  {{$curso->profesor->primer_nombre.' '.$curso->profesor->segundo_nombre.' '.$curso->profesor->apellido_paterno.' '.$curso->profesor->apellido_materno}}
                                            </li>
                                            <li class="list-group-item">
                                                Rut profesor jefe  :  {{$curso->profesor->rut}}
                                            </li>
                                            <li class="list-group-item">
                                                Correo profesor jefe  :  {{$curso->profesor->correo}}
                                            </li>
                                            <li class="list-group-item">
                                                Número de alumnos  :  {{$curso->alumnos->count()}}
                                            </li>
                                        </ul>
                                        @if($curso->nivel != 'Kinder')
                                        <ul class="list-group">
                                            <li class="list-group-item active">
                                                Asignaturas Curso
                                            </li>
                                            @foreach($curso->asignaturas as $asignatura)
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-8" >
                                                    {{$asignatura->nombre}}
                                                        </div>
                                                        <div class="col-md-4"> 
                                                    @if(DB::table('asignatura_profesor')->where('asignatura_id',$asignatura->id)->where('nivel',$curso->nivel)->where('grado',$curso->grado)->where('letra',$curso->letra)->count() > 0)
                                                    <a type="button" class="btn btn-link btn-sm pull-right" href="{{ action('AsignaturaController@asignaturaProfesor', ['id_curso' => $curso->id, 'id_asignatura' => $asignatura->id]) }}">Detalle Notas</a>
                                                    </div>
                                                        @endif
                                                    </div>
                                                </li>
                                            @endforeach                       
                                        </ul>
                                        @endif
                                    </div>
                                    <div class="col-md-9">
                                        <h2>
                                            Alumnos
                                        </h2>
                                        <div class="box-body table-responsive">
                                            <div class="scrollable">
                                                <table class="table table-bordered table-striped" id="my-table">
                                                            <tr>
                                                                <th>
                                                                    Nombre
                                                                </th>
                                                                <th>
                                                                    Rut
                                                                </th>
                                                                <th>
                                                                    Correo
                                                                </th>
                                                                
                                                                @if(auth()->user()->rol == "0" or auth()->user()->rol == "5")
                                                                <th style="width: 84px">
                                                                    Más
                                                                </th>
                                                                @endif
                                                             
                                                            </tr>
                                                            @foreach($alumnos as $alumno)
                                                            <tr>
                                                                <td>
                                                                    {{ $alumno->apellido_paterno.' '.$alumno->apellido_materno.', '.$alumno->primer_nombre.' '.$alumno->segundo_nombre}}
                                                                </td>
                                                                <td>
                                                                    {{ $alumno->rut}}
                                                                </td>
                                                                <td>
                                                                    {{ $alumno->correo}}
                                                                </td>
                                                                <!-- botones  -->

                                                                @if(auth()->user()->rol == "0" or auth()->user()->rol == "5")
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <!-- principal  -->
                                                                        <button class="btn btn-flat" data-target="#modaledit-{{$alumno->id}}" data-toggle="modal" style="height: 34px;" type="button">
                                                                            <i class="fa fa-edit">
                                                                            </i>
                                                                        </button>
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
                                                                                <a href="#" data-target="#cambiarcurso-{{$alumno->id}}" data-toggle="modal">
                                                                                    <i class="fa fa-clone">
                                                                                    </i>
                                                                                    Cambiar de curso
                                                                                </a>
                                                                            </li>
                                                                            
                                                                            @if(auth()->user()->rol == "0")
                                                                            <li class="divider">
                                                                            </li>
                                                                            <li>
                                                                                <a href="#" data-target="#modaldelete-{{$alumno->id}}" data-toggle="modal">
                                                                                    <i class="fa fa-trash btn-">
                                                                                    </i>
                                                                                    Eliminar
                                                                                </a>
                                                                            </li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                                @endif
                                                                <!-- botones  -->
                                                                @include('alumnos.modaledit')
                                                                @include('alumnos.modaldelete')
                                                                @include('alumnos.cambiarcurso')
                                                            </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                        <!-- -->
                                    <div class="box-footer clearfix">
                                        <ul class="pagination pagination-sm no-margin pull-left">
                                            @if($curso->profesor->rut != auth()->user()->rut)
                                            <a href="{{ url('/cursos') }}" class="btn btn-app">
                                                    <i class="fa fa-arrow-circle-left">
                                                    </i>
                                                    Atrás
                                                </a>
                                                @endif
                                                @if($curso->profesor->rut == auth()->user()->rut)
                                                <a href="#" class="btn btn-app" data-target="#createreunion-{{$curso->id}}" data-toggle="modal">
                                                    <i class="fa fa-calendar-plus-o">
                                                    </i>
                                                    Reunión de apoderados
                                                </a>
                                                @include('calendario.createreunion')
                                                @endif
                                            @if($curso->nivel!='Kinder')
                                            <a class="btn btn-app" href="{{ action('NotaController@detalle', ['id' => $curso->id]) }}">
                                                <i class="fa fa-archive">
                                                </i>
                                                Ver notas
                                            </a>
                                            @endif
                                            @if(auth()->user()->rol == '0')
                                            <a class="btn btn-app" data-target="#modalcreate-{{$curso->id}}" data-toggle="modal">
                                                <i class="fa fa-user-plus">
                                                </i>
                                                Alumno
                                            </a>
                                            @endif
                                            <a class="btn btn-app" href="{{ action('CursoController@PDFCurso', ['id' => $curso->id]) }}">
                                                <i class="fa fa-file-pdf-o">
                                                </i>
                                                PDF
                                            </a>
                            
                                        </ul>
                                        @include('alumnos.modalcreate')
                                        <ul class="pagination pagination-sm no-margin pull-right">
                                            {{$alumnos->links()}}
                                        </ul>
                                    </div>
                                </div>
                                </div>
                                <!-- /.tab-pane -->

                                <!-- CALENDARIO -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="row">
                                            <div class="col-md-12">
                                                <div>
 
                                                    <!-- /.box-header -->
                                                    <div class="col-md-12">
                                                        <div class="box-body table-responsive">
                                                            <div class="scrollable">
                                                                <?php setlocale(LC_ALL,'spanish');?>
                                                            
                                                                <h3 align="center">{{mb_strtoupper(strftime("%B"))}}                               
                                                                    <small>{{date('Y')}}</small>                
                                                                </h3>

                                                       
                                                                
                                                                <table class="table table-bordered" id="my-table">
                                                                    <tr>
                                                                        <th style="width: 14.28%;text-align:center">
                                                                            Lunes
                                                                        </th>
                                                                        <th style="width: 14.28%;text-align:center">
                                                                            Martes
                                                                        </th>
                                                                        <th style="width: 14.28%;text-align:center">
                                                                            Miércoles
                                                                        </th>
                                                                        <th style="width: 14.28%;text-align:center">
                                                                            Jueves
                                                                        </th>
                                                                        <th style="width: 14.28%;text-align:center">
                                                                            Viernes
                                                                        </th>
                                                                        <th style="width: 14.28%;text-align:center">
                                                                            Sábado
                                                                        </th>
                                                                        <th style="width: 14.28%;text-align:center">
                                                                            Domingo
                                                                        </th>
                                                                    </tr>
                                                                    <?php date_default_timezone_set('America/Santiago'); ?>

                                                                    <?php $dia= date("N", mktime(0, 0, 0, date('n'), date('n'), date('Y')))?>

                                                                    <?php $ultimodia= date("j", mktime(0, 0, 0, date('n')+1, 0, date('Y')))?>

                                                                    <?php $primerdia= date("j", mktime(0, 0, 0, date('n'), 1, date('Y')))?>
                                                  
                                                                    @for($i=1; $i<=$ultimodia; $i++)           
                                                                        @if(date("N", mktime(0, 0, 0, date('n'), $i, date('Y')))==1)
                                                                           <?php $primerlunes= date("j", mktime(0, 0, 0, date('n'), $i, date('Y'))) ?>
                                                                           @break;
                                                                       @endif
                                                                    @endfor 
                                                                    <tr>
                                                                        @if($primerlunes!=1)
                                                                            @for($i=7; $i>0; $i--)
                                                                                <?php $calendarios= Calendario::all()->where('fecha',date("Y-m-d", mktime(0, 0, 0, date('n'), $primerlunes-$i, date('Y'))))->where('id_curso',$curso->id)?>
                                                                                @if(date("d/m/Y", mktime(0, 0, 0, date('n'), $primerlunes-$i, date('Y'))) == date('d/m/Y'))
                                                                                    <td height="100"><span class="pull-left badge bg-blue">{{date("j", mktime(0, 0, 0, date('n'), $primerlunes-$i, date('Y')))}}</span>
                                                                                @else
                                                                                    @if(date("m", mktime(0, 0, 0, date('n'), $primerlunes-$i, date('Y')))==date("m", mktime(0, 0, 0, date('n')-1, date('n'), date('Y'))))
                                                                                        <td height="100" class="bg-info">{{date("j", mktime(0, 0, 0, date('n'), $primerlunes-$i, date('Y')))}}
                                                                                    @else
                                                                                        <td height="100">{{date("j", mktime(0, 0, 0, date('n'), $primerlunes-$i, date('Y')))}}
                                                                                    @endif
                                                                                @endif   
                                                                                    @foreach($calendarios as $calendario)
                                                                                        <span class="label pull-left {{$calendario->asignatura->color}} btn-block">{{$calendario->descripcion}}</span> <br>
                                                                                    @endforeach
                                                                                </td>
                                                                            @endfor
                                                                        @endif
                                                                    </tr>
                                                                    <?php $var=$primerlunes;?>

                                                                    @for($k=1; $k<6; $k++)
                                                                        <tr>

                                                                            @for($l=$var; $l<38; $l++)

                                                                                @if(date("m", mktime(0, 0, 0, date('n'), $l, date('Y')))==date("m", mktime(0, 0, 0, date('n')+1, date('n'), date('Y'))) 
                                                                                and date("l", mktime(0, 0, 0, date('n'), $l, date('Y')))=='Monday')
                                                                                    @break
                                                                                @endif

                                                                                <?php $calendarios= Calendario::all()->where('fecha',date("Y-m-d", mktime(0, 0, 0, date('n'), $l, date('Y'))))->where('id_curso',$curso->id)?>
                                                                                @if(date("d/m/Y", mktime(0, 0, 0, date('n'), $l, date('Y')))==date('d/m/Y'))
                                                                                    <td height="100"><span class="pull-left badge bg-blue">{{date("j", mktime(0, 0, 0, date('n'), $l, date('Y')))}}</span>
                                                                                @else
                                                                                    @if(date("m", mktime(0, 0, 0, date('n'), $l, date('Y')))==date("m", mktime(0, 0, 0, date('n')+1, date('n'), date('Y'))))
                                                                                        <td height="100" class="bg-info">{{date("j", mktime(0, 0, 0, date('n'), $l, date('Y')))}}
                                                                                    @else
                                                                                        <td height="100">{{date("j", mktime(0, 0, 0, date('n'), $l, date('Y')))}}
                                                                                    @endif
                                                                                @endif
                                                                                    @foreach($calendarios as $calendario)
                                                                                        <span class="label pull-left {{$calendario->asignatura->color}} btn-block">{{$calendario->descripcion}}</span>
                                                                                    @endforeach
                                                                                </td>
                                                                                @if(date("l", mktime(0, 0, 0, date('n'), $l, date('Y')))=='Sunday')
                                                                                    <?php $var=$l+1?>
                                                                                    @break
                                                                                @endif  
                                                                            @endfor
                                                                        </tr>
                                                                    @endfor
                                                            
                                                                   
                                                                    

                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box-footer clearfix">
                                                        <ul class="pagination pagination-sm no-margin pull-left">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-lg-offset-1">
                                                                    <h4>Colores Asignaturas</h4><br>
                                                                    @foreach($curso->asignaturas as $asignatura)
                                                                        <span class="pull-left badge {{$asignatura->color}}">{{$asignatura->nombre}}</span><br>
                                                                    @endforeach
                                                                    <br>
                                                                </div>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                      
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
            
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
           
                        </div>
                        <!-- nav-tabs-custom -->
                    </div>
                    <!-- /.col -->   
                </div>

</section>
<!-- /.box -->
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
