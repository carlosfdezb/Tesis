<?php
use App\Calendario;
use App\Curso;
use App\Nota;
?>

@extends('layouts.index')

@section('title', $asignatura->first()->nombre.' - '.$curso->nivel.'° '.$curso->grado.' '.$curso->letra)  

@section('content')
<!-- INDEX NOTAS -->

<section class="content-header">
    <h1>
        {{$asignatura->first()->nombre.' - '.$curso->nivel.'° '.$curso->grado.' '.$curso->letra}}
        <small>
            Ceisp
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
        <li>
            @if(auth()->user()->rol == '3')
            <a href="{{ url('/mis-asignaturas') }}">
                Mis asignaturas
            </a>
            @else
            <a href="{{ url('/cursos/'.$curso->id.'/detalle') }}">
                {{$curso->nivel.'° '.$curso->grado.' '.$curso->letra}}
            </a>
            @endif
        </li>
        <li class="active">
            {{$asignatura->first()->nombre.' - '.$curso->nivel.'° '.$curso->grado.' '.$curso->letra}}
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
                                <li class="active"><a href="#tab_1" data-toggle="tab">Notas Alumnos</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Calendario Curso</a></li>
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
                             <!-- DETALLE CURSO -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">               
                                    <div>
                                        <!-- /.box-header -->
                                        <div class="col-md-9">
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
                                                            <th style="width: 70px">
                                                                1
                                                            </th>
                                                            <th style="width: 70px">
                                                                2
                                                            </th>
                                                            <th style="width: 70px">
                                                                3
                                                            </th>
                                                            <th style="width: 70px">
                                                                4
                                                            </th>
                                                            <th style="width: 70px">
                                                                5
                                                            </th>
                                                            <th style="width: 70px">
                                                                6
                                                            </th>
                                                            <th style="width: 70px">
                                                                7
                                                            </th>
                                                            <th style="width: 70px">
                                                                8
                                                            </th>
                                                            <th style="width: 70px">
                                                                9
                                                            </th>
                                                            <th style="width: 70px">
                                                                10
                                                            </th>
                                                            <th style="width: 70px">
                                                                Promedio
                                                            </th>
                                                        </tr>
                                                        <?php $promediogeneral = 0 ?>
                                                        @foreach($alumnos as $alumno)
                                                        <tr>
                                                            <td>
                                                                {{$alumno->apellido_paterno.' '.$alumno->apellido_materno.', '.$alumno->primer_nombre.' '.$alumno->segundo_nombre}}
                                                            </td>
                                                            <td>
                                                                {{$alumno->rut}}
                                                            </td>
                                                            @for($i=1; $i<11; $i++)
                                                                <?php
                                                               
                                                                $nota = Nota::where('id_alumno','=',$alumno->id)->where('id_asignatura','=',$asignatura->first()->id)->where('numero',$i)->where('ano',date('Y'))->first();

                                                                ?>

                                                                @if(!is_null($nota))
                                                                    @if($nota->nota == 'P')
                                                                        <td><a class="pull-right badge bg-yellow btn-block" @if(auth()->user()->rol == '5')data-target="#UTP_notaedit-{{$nota->id}}" data-toggle="modal" @endif>{{$nota->nota}}</a></td>
                                                                    @else
                                                                        @if($nota->nota > 3.9)
                                                                            <td><a class="pull-right badge bg-blue btn-block" @if(auth()->user()->rol == '5')data-target="#UTP_notaedit-{{$nota->id}}" data-toggle="modal" @endif>{{$nota->nota}}</a></td> 
                                                                        @else
                                                                            <td><a class="pull-right badge bg-red btn-block" @if(auth()->user()->rol == '5')data-target="#UTP_notaedit-{{$nota->id}}" data-toggle="modal" @endif>{{$nota->nota}}</a></td> 
                                                                        @endif
                                                                    @endif




                         <!-- MODAL -->
                                                                      <div class="modal fade bd-example-modal-lg" id="UTP_notaedit-{{$nota->id}}" role="dialog">
                                                                        <div class="modal-dialog">
                                                                                {!!Form::model($nota,['method'=>'GET','route'=>['nota.utp',$nota->id]])!!}
                                                                                {{ csrf_field() }}
                                                                                <!-- Modal content-->
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                             <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                                                                        </button>
                                                                                        <h3 class="modal-title" align="center">
                                                                                            Modificar Nota de {{$nota->alumno->primer_nombre.' '.$nota->alumno->apellido_paterno}}
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="box-body">
                                                                                            <input type="hidden" class="form-control" name="id" value="{{$nota->id}}">
                                                                                            <div class="form-group row">
                                                                                              <label for="staticEmail" class="col-sm-3 col-form-label">Descripción nota</label>
                                                                                                <div class="col-sm-4">
                                                                                                    <span type="text" readonly class="form-control-plaintext" id="staticEmail">{{$nota->descripcion}}</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                              <label for="staticEmail" class="col-sm-3 col-form-label">Nota actual</label>
                                                                                                <div class="col-sm-4">
                                                                                                    @if($nota->nota == 'P')
                                                                                                        <span type="text" readonly class="form-control-plaintext" id="staticEmail">Pendiente</span>
                                                                                                    @else
                                                                                                        <span type="text" readonly class="form-control-plaintext" id="staticEmail">{{$nota->nota}}</span>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label for="inputPassword" class="col-sm-3 col-form-label">Nota nueva</label>
                                                                                                <div class="col-sm-4">
                                                                                                  <input type="text" class="form-control" name="nota" placeholder="Digite nota nueva" required>
                                                                                                </div>
                                                                                              </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                                        <button class="btn btn-social bg-yellow" type="submit">
                                                                                            <i class="fa fa-edit"></i>Modificar
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                             {{Form::Close()}}
                                                                            </div>
                                                                        </div>
                         <!-- MODAL -->

                                                            @else
                                                                    <td></td>
                                                                @endif
                                                                



                                                            @endfor

                                                            <?php
                                                                $ano = date('Y');
                                                               
                                                                $promedio = DB::table('notas')->where('id_alumno','=',$alumno->id)->where('id_asignatura','=',$asignatura->first()->id)->where('ano','=',$ano)->avg('nota');

                                                            ?>
                                                            @if(!is_null($promedio))
                                                                <?php $promediogeneral = $promediogeneral + $promedio ?>
                                                                @if(round($promedio, 1) > 3.9)
                                                                    <td><span class="pull-right badge bg-blue btn-block">{{number_format(round($promedio, 1), 1, '.', '.')}}</span></td> 
                                                                @else
                                                                    <td><span class="pull-right badge bg-red btn-block">{{number_format(round($promedio, 1), 1, '.', '.')}}</span></td> 
                                                                @endif
                                                            @else
                                                                <td></td>
                                                            @endif    
                                                        </tr>
                                                        @endforeach
                                                        
                                                    </table>
                                                    <div class="form-group has-warning">
                                                        <div class="pull-right">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                <th width=68%>
                                                                    Promedio General Curso
                                                                </th>
                                                   
                                                                    @if(round($promediogeneral/$curso->alumnos->count(),1) > 3.9)
                                                                            <td width=32%><span class="pull-right badge bg-blue btn-block">{{number_format(round($promediogeneral/$curso->alumnos->count(),1), 1, '.', '.')}}</span></td> 
                                                                        @else
                                                                            <td width=32%><span class="pull-right badge bg-red btn-block">{{number_format(round($promediogeneral/$curso->alumnos->count(),1), 1, '.', '.')}}</span></td> 
                                                                        @endif
                                                  
                                        
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        
                                                        <span class="help-block"><i class="fa fa-exclamation-circle"></i> Las notas pendientes al momento de calcular promedios se consideran como '0.0' </span> 

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <h1>
                                                Detalle evaluación
                                            </h1>
                                            <ul class="list-group">
                                              <?php 
                                                    $descripcion = DB::table('notas')->where('id_alumno','=',$alumnos->first()->id)->where('id_asignatura','=',$asignatura->first()->id)->where('ano','=',$ano)->get();
                                    
                                              ?>
                                                @foreach($descripcion as $descripciones)
                                                <li class="list-group-item">

                                                    <b>{{$descripciones->numero}}.</b> {{$descripciones->descripcion}}
                                                    <?php 
                                                        $pj = DB::table('asignatura_profesor')
                                                        ->where('asignatura_id',$asignatura->first()->id)
                                                        ->where('nivel',$curso->nivel)
                                                        ->where('grado',$curso->grado)
                                                        ->where('letra',$curso->letra)->first();

                                                        $var = DB::table('profesors')->where('id',$pj->profesor_id)->first();
                                                    ?>
                                                    <!-- ESTE IF ES PARA SABER SI EL QUE ESTÁ EN ESTA VISTA, ES REALMENTE EL PROFESOR QUE IMPARTE ESTA ASIGNATURA (EJEMPLO, PROFESOR JEFE QUE REVISA ASIGNATURA) -->
                                                    @if($var->rut == auth()->user()->rut)
                                                    <div class="pull-right"><button type="button" class="btn btn-xs btn-flat"  data-target="#editdescripcionmodal-{{$descripciones->id}}" data-toggle="modal"><i class="fa fa-pencil"></i></button></div>
                                                    @endif
                                                    @include('asignaturas.editdescripcionmodal')
                                                </li>
                                
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="box-footer clearfix">
                                            <ul class="pagination pagination-sm no-margin pull-left">
                                                <?php
                                                    $pj = DB::table('asignatura_profesor')
                                                        ->where('asignatura_id',$asignatura->first()->id)
                                                        ->where('nivel',$curso->nivel)
                                                        ->where('grado',$curso->grado)
                                                        ->where('letra',$curso->letra)->first();

                                                    $var = DB::table('profesors')->where('id',$pj->profesor_id)->first();
                                                ?>
                                                @if(auth()->user()->rol == "3")
                                                    @if(auth()->user()->rut == $curso->profesor->rut && $var->rut == auth()->user()->rut)
                                                        <a class="btn btn-app" href="{{ url('cursos/'.$curso->id.'/detalle') }}">
                                                            <i class="fa fa-arrow-circle-left">
                                                            </i>
                                                            Atrás
                                                        </a>
                                                    @else
                                                        <a class="btn btn-app" href="{{ url('mis-asignaturas') }}">
                                                            <i class="fa fa-arrow-circle-left">
                                                            </i>
                                                            Atrás
                                                        </a>
                                                    @endif
                                                
                                                @endif
                                                @if($var->rut == auth()->user()->rut)
                                                <a class="btn btn-app" data-target="#create" data-toggle="modal">
                                                    <i class="fa fa-plus">
                                                    </i>
                                                    Nota
                                                </a>
                                                @endif
                                                <a class="btn btn-app" href="{{ action('CursoController@PDFCursoNotas', ['id_curso' => $curso->id, 'id_asignatura' => $pj->asignatura_id]) }}">
                                                    <i class="fa fa-file-pdf-o">
                                                    </i>
                                                    PDF
                                                </a>
                                                
                                            </ul>
                                            @include('notas.create')
                                            <ul class="pagination pagination-sm no-margin pull-right">
                                            </ul>
                                        </div>
                                    </div>
                                                                 
                                </div>
                                <!-- /.tab-pane -->

                                <!-- CALENDARIO -->
                                <div class="tab-pane" id="tab_2">

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
                                            <?php 
                                                    $var = DB::table('profesors')->where('id',$pj->profesor_id)->first();
                                            ?>
                                            @if($var->rut == auth()->user()->rut)
                                            <a class="btn btn-app" data-target="#createfecha-{{$curso->id}}-{{$asignatura->first()->id}}" data-toggle="modal">
                                                <i class="fa fa-calendar-plus-o">
                                                </i>
                                                Agendar Evaluación
                                            </a>
                                            <a class="btn btn-app" data-target="#modalfechas-{{$var->id}}-{{$asignatura->first()->id}}-{{$curso->id}}" data-toggle="modal">
                                                <i class="fa fa-list-ol">
                                                </i>
                                                Evaluaciones Agendadas
                                            </a>
                                            @endif
                                            @include('calendario.createfecha')
                                            @include('calendario.modalfechas')
                                        </ul>
                                        <ul class="pagination pagination-sm no-margin pull-left">
                         
                                            <div class="row">
                                                <div class="col-lg-12 col-lg-offset-2">
                                                    <h4>Colores Asignaturas</h4>
                                                    @foreach($curso->asignaturas as $asignaturacolor)
                                                        @if($asignaturacolor->nombre == $asignatura->first()->nombre)
                                                            <span class="pull-left badge {{$asignaturacolor->color}}">{{$asignaturacolor->nombre}}</span><i class="fa fa-check"></i><br>
                                                        @else
                                                            <span class="pull-left badge {{$asignaturacolor->color}}">{{$asignaturacolor->nombre}}</span><br>
                                                        @endif
                                                    @endforeach
                                                    <br>
                                                </div>
                                            </div>
                                        </ul>                    
                                        
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

<!-- -->

@endsection


