@extends('layouts.index')

@section('title', $curso->nivel.'° '.$curso->grado.' '.$curso->letra)  

@section('content')
<!-- INDEX NOTAS -->
<section class="content-header">
    <h1>
        Notas - {{$curso->nivel.'° '.$curso->grado.' '.$curso->letra}}
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
        <li>
            <a href="{{ url('/cursos') }}">
                Cursos
            </a>
        </li>
        <li class="active">
            {{$curso->nivel.'° '.$curso->grado.' '.$curso->letra}}
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
                        Promedios alumnos
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="col-md-12">
                    <div class="box-body table-responsive">
                        <div class="scrollable">
                            <table class="table table-bordered" id="my-table">
                                <tr>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Rut
                                    </th>
                                    @foreach($curso->asignaturas as $asignaturas)
                                        <th style="width: 70px">
                                           {{$asignaturas->nombre}}
                                        </th>
                                    @endforeach
                                    <th style="width: 70px">
                                        Promedio
                                    </th>
                                </tr>
                                <?php $promediogeneral = 0 ?>
                                @foreach($curso->alumnos->sortBy('apellido_paterno') as $alumno)
                                <tr>
                                    <td>{{$alumno->apellido_paterno.' '.$alumno->apellido_materno.', '.$alumno->primer_nombre.' '.$alumno->segundo_nombre}}</td>
                                    <td>{{$alumno->rut}}</td>
                                    <?php $promediofinal=0; $numero=0;?>
                                    @foreach($curso->asignaturas as $asignaturas)
                                    <?php
                                        $ano = date('Y');
                                        $promedio = DB::table('notas')->where('id_alumno','=',$alumno->id)->where('id_asignatura','=',$asignaturas->id)->where('ano','=',$ano)->avg('nota');

                                        

                                    ?>
                                        @if(!is_null($promedio))
                                            <?php $promediofinal = $promediofinal + round($promedio,1); $numero = $numero+1;?>
                                            @if(round($promedio, 1) > 3.9)
                                                <td><span class="pull-right badge bg-blue btn-block">{{number_format(round($promedio, 1), 1, '.', '.')}}</span></td> 
                                            @else
                                                <td><span class="pull-right badge bg-red btn-block">{{number_format(round($promedio, 1), 1, '.', '.')}}</span></td> 
                                            @endif
                                        @else
                                            <td></td>
                                        @endif   
                                    @endforeach
                                @if($numero != 0)
                                    <?php $promediogeneral = $promediogeneral + round($promediofinal/$numero,1)?>
                                    @if(round($promediofinal/$numero,1) > 3.9)
                                                <td><span class="pull-right badge bg-blue btn-block">{{number_format(round($promediofinal/$numero,1), 1, '.', '.')}}</span></td> 
                                            @else
                                                <td><span class="pull-right badge bg-red btn-block">{{number_format(round($promediofinal/$numero,1), 1, '.', '.')}}</span></td> 
                                            @endif
                                @else
                                    <td></td>
                                @endif
                               
                                   
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-left">
                        <a href="{{ url('/cursos/'.$curso->id.'/detalle')}}" class="btn btn-app">
                                <i class="fa fa-arrow-circle-left">
                                </i>
                                Atrás
                            </a>
                        <a class="btn btn-app" href="{{ action('NotaController@PDFNotas', ['id' => $curso->id]) }}">
                            <i class="fa fa-file-pdf-o">
                            </i>
                            PDF
                        </a>

                    </ul>
               
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <table class="table table-bordered" id="my-table">
                                <tr>
                                    <th>
                                        Promedio General Curso
                                    </th>
                       
                                        @if(round($promediogeneral/$curso->alumnos->count(),1) > 3.9)
                                                <td><span class="pull-right badge bg-blue btn-block">{{number_format(round($promediogeneral/$curso->alumnos->count(),1), 1, '.', '.')}}</span></td> 
                                            @else
                                                <td><span class="pull-right badge bg-red btn-block">{{number_format(round($promediogeneral/$curso->alumnos->count(),1), 1, '.', '.')}}</span></td> 
                                            @endif
                      
                
                                </tr>
                            </table>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- -->
<!-- /.col -->

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
