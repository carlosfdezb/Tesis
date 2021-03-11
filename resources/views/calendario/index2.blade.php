<?php
use App\Calendario;
?>

@extends('layouts.index')

@section('title', 'Calendario')  

@section('content')
<!-- INDEX NOTAS -->
<section class="content-header">
    <h1>
        Calendario Académico
        <small>
            CEISP
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="inicio">
                <i class="fa fa-home">
                </i>
                Inicio
            </a>
        </li>
        <li class="active">
            Calendario
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
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        {{$alumno->curso->nivel.'° '.$alumno->curso->grado.' '.$alumno->curso->letra}}
                    </h3>
                </div>
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
                                            <?php $calendarios= Calendario::all()->where('fecha',date("Y-m-d", mktime(0, 0, 0, date('n'), $primerlunes-$i, date('Y'))))->where('id_curso',$alumno->id_curso)?>
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

                                            <?php $calendarios= Calendario::all()->where('fecha',date("Y-m-d", mktime(0, 0, 0, date('n'), $l, date('Y'))))->where('id_curso',$alumno->id_curso)?>
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
                                @foreach($alumno->curso->asignaturas as $asignatura)
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
    
</section>
<!-- -->


@endsection

