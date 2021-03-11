@extends('layouts.index')

@section('title', 'Mis Asignaturas')  

@section('content')
<!-- INDEX NOTAS -->
<section class="content-header">
    <h1>
        Listado de Asignaturas
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
            Mis asignaturas
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
                        Perfil del Alumno
                    </h3>
                </div>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                            <br>
                            <ul class="list-group">
                                <li class="list-group-item active"><h4><strong>{{$alumno->first()->primer_nombre.' '.$alumno->first()->segundo_nombre.' '.$alumno->first()->apellido_paterno.' '.$alumno->first()->apellido_materno}}</strong></h4></li>
                                <li class="list-group-item">
                                     Curso : {{$alumno->first()->curso->nivel.' ° '.$alumno->first()->curso->grado.' '.$alumno->first()->curso->letra}}
                                </li>
                                <li class="list-group-item">
                                     Rut alumno : {{$alumno->first()->rut}}
                                </li>
                                <li class="list-group-item">
                                     Correo alumno : {{$alumno->first()->correo}}
                                </li>
                                <li class="list-group-item">
                                     N° de asignaturas : {{$alumno->first()->curso->asignaturas->count()}}
                                </li>

                                <li class="list-group-item">
                                     Profesor jefe : {{$alumno->first()->curso->profesor->primer_nombre.' '.$alumno->first()->curso->profesor->apellido_paterno.' '.$alumno->first()->curso->profesor->apellido_materno}}
                                </li>
                                <li class="list-group-item">
                                     Correo profesor jefe : {{$alumno->first()->curso->profesor->correo}}
                                </li>

                            </ul>
                            <div>
                            <br>
                            <br>
                            <br>
                            <br>
                            </div>
                        </div>
                         <br>
                        <div class="col-md-9">
                        <div class="row">
                    
                            <!-- /.box-header -->
                            <div class="col-md-12">
                                @if($alumno->first()->curso->asignaturas->count() > 0)
                                                <!-- Custom Tabs -->
                                                <div class="nav-tabs-custom">
                                                    <ul class="nav nav-tabs">
                                                         <li class="active"><a href="#tab_1" data-toggle="tab">Asignaturas</a></li>           
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab_1">
                                                            <div class="row"></br>
                                                                @foreach($asignaturas as $asignatura)
                                        <div class="col-lg-4 col-xs-6">
                                          <!-- small box -->
                                          <div class="small-box {{$asignatura->color}}">
                                            <div class="inner">
                                              <h4>{{$asignatura->nombre}}</h4>
                                              <p>Profesor. {{$asignatura->primer_nombre.' '.$asignatura->apellido_paterno}}</p>
                                            </div>
                                            <div class="icon">
                                              <i class="fa {{$asignatura->icono}}"></i>
                                            </div>
                                            @if($asignatura->nombre!="Consejo de Curso")
                                            <a data-target="#modalalumno-{{$asignatura->asignatura_id}}-{{$alumno->first()->id}}" data-toggle="modal" href="#" class="small-box-footer">
                                              Ver asignatura <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                            @else
                                                <span class="small-box-footer">Asignatura formativa</span>
                                            @endif
                                          </div>
                                        </div>
                                        @include('notas.modalalumno')
                                        @endforeach
                                                            </div>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                        <div class="tab-pane" id="tab_3">
                                                            
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                        <div class="tab-pane" id="tab_2">
                                                            
                                                        </div>
                                                        <!-- /.tab-pane -->

                                                    </div>
                                                    <!-- /.tab-content -->
                                                </div>
                                                <!-- .Custom Tabs -->
                                                @else
                                                <div class="callout callout-info">
                                                    <h4> ¡No tiene ninguna asignatura asignada aún! <i class="fa fa-frown-o"></i></h4>
                                                    <p><i class="icon fa fa-info-circle"></i> Debe tener mínimo 1 asignatura asignada para desplegar las unidades correspondientes.</p>
                                                </div>
                                                @endif
                                    <div class="row"></br>
                                        
                                        
                                    </div>
                            </div>
                            <div class="box-footer clearfix">

              
                            </div>
                        </div>
        </div>
        </div>
    </div>
    
</section>
<!-- -->



@endsection
