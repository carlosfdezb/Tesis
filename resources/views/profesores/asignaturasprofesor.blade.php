@extends('layouts.index')

@section('title', 'Mis asignaturas')  

@section('content')
<!-- INDEX NOTAS -->
@if(auth()->user()->rol==3)
<section class="content-header">
    <h1>
        Mis Asignaturas
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
                        Perfil del Profesor
                    </h3>
                </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <!-- /.box-header -->
              <br>
                        <div class="col-md-3">

                            <ul class="list-group">
                                <li class="list-group-item active"><h4><strong>{{ $profesor->first()->primer_nombre.' '.$profesor->first()->segundo_nombre.' '.$profesor->first()->apellido_paterno.' '.$profesor->first()->apellido_materno}}</strong></h4></li>
                                <li class="list-group-item">
                                    Rut : {{$profesor->first()->rut}}
                                </li>
                                <li class="list-group-item">
                                    Correo : {{$profesor->first()->correo}}
                                </li>
                                <li class="list-group-item">
                                    Número de asignaturas : {{$profesor->first()->asignaturas->count()}}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Custom Tabs -->
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab_1" data-toggle="tab">Asignaturas</a></li>
                                 
                                            </ul>
                                             <!-- DETALLE CURSO -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1">
                                                    @if($profesor->first()->asignaturas->count() > 0)
                                                    <div class="box-body table-responsive">
                                                            <div class="scrollable">
                                                                <table class="table table-bordered table-striped" id="my-table">
                                                                    <tr>
                                                                        <th>
                                                                            Nombre asignatura
                                                                        </th>
                                                                        <th>
                                                                            Curso
                                                                        </th>

                                                                        <th style="width: 40px">
                                                                            Ver asignatura
                                                                        </th>
                                                                    </tr>

                                                                     @foreach($profesor->first()->asignaturas->sortBy('nombre') as $asignaturaprofesor)

                                                                    <tr>
                                                                        <td>
                                                                            {{$asignaturaprofesor->nombre}}
                                                                        </td>
                                                                        <td>

                                                                            {{$asignaturaprofesor->pivot->nivel.'° '.$asignaturaprofesor->pivot->grado.' '.$asignaturaprofesor->pivot->letra}}
                                                                        </td>

                                                                        <?php 
                                                                            $curso = DB::table('cursos')
                                                                                    ->select('id')
                                                                                    ->where('nivel','=',$asignaturaprofesor->pivot->nivel)
                                                                                    ->where('grado','=',$asignaturaprofesor->pivot->grado)
                                                                                    ->where('letra','=',$asignaturaprofesor->pivot->letra)
                                                                                    ->get();

                                                                        
                                                                        ?>
                                                                        <td>
                                                                            <a class="btn btn-flat" href="{{ action('AsignaturaController@asignaturaProfesor', ['id_curso' => $curso->first()->id, 'id_asignatura' => $asignaturaprofesor->id]) }}" type="button">
                                                                                <i class="fa fa-arrows"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </table>
                                                            </div>
                                                        </div>
                                                        @else

                                                        <div class="callout callout-info">
                                                            <h4> ¡No tiene ninguna asignatura asignada aún! <i class="fa fa-frown-o"></i></h4>
                                                            <p><i class="icon fa fa-info-circle"></i> Debe tener mínimo 1 asignatura asignada.</p>
                                                        </div>
                                                        @endif
                                                </div>
                                                <!-- /.tab-pane -->

                                            </div>
                                            <!-- /.tab-content -->
                                        </div>
                                    </div>
                                </div>

                            
                        </div>

                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                            </ul>
                        </div>
                    </div>   
                    </div>
</div>
</div>
    </div>                    
</section>




@endsection

@endif
