<?php
use App\Calendario;
use App\Curso;
use App\Nota;
?>

<html>
<head>

    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
 
        body {
            margin: 0.5cm 1cm 1cm;
        }
 
    </style>
    <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 2px;
      text-align: left;
    }
    </style>


</head>
<body>
<header>

</header>
<h3>Notas @if($curso->nivel=='Kinder')
          {{ $curso->nivel.' '.$curso->letra }}
        @else
          {{ $curso->nivel.'° '.$curso->grado.' '.$curso->letra }}
        @endif
</h3>
<table>
    <thead>
    <tr>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Rut
                                    </th>
                                    <?php $numAsig = 1?>
                                    @foreach($curso->asignaturas as $asignaturas)
                                        <th>
                                           {{$numAsig++}}
                                        </th>
                                    @endforeach
                                    <th>
                                        Promedio
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $promediogeneral = 0 ?>
                                @foreach($curso->alumnos->sortBy('apellido_paterno') as $alumno)
                                <tr>
                                    <td>{{$alumno->apellido_paterno.' '.$alumno->apellido_materno.', '.$alumno->primer_nombre.' '.$alumno->segundo_nombre}}</td>
                                    <td>{{$alumno->rut}}</td>
                                    <?php $promediofinal=0; $numero=0;?>
                                    @foreach($curso->asignaturas as $asignaturas)
                                    <?php
                                        $ano = date('Y');
                                        $promedio = DB::table('notas')->where('id_alumno','=',$alumno->id)->where('id_curso','=',$curso->id)->where('id_asignatura','=',$asignaturas->id)->where('ano','=',$ano)->avg('nota');

                                        

                                    ?>
                                        @if(!is_null($promedio))
                                            <?php $promediofinal = $promediofinal + round($promedio,1); $numero = $numero+1;?>
                                                <td>{{round($promedio, 1)}}</td> 
                           
                                        @else
                                            <td></td>
                                        @endif   
                                    @endforeach
                                @if($numero != 0)
                                    <?php $promediogeneral = $promediogeneral + round($promediofinal/$numero,1)?>
                               
                                    <td>{{number_format(round($promediofinal/$numero,1), 1, '.', '.')}}</td> 

                                @else
                                    <td></td>
                                @endif
                               
                                   
                                </tr>
                                @endforeach
                                </tbody>
</table>
<br>
<?php $numAsig=1?>
@foreach($curso->asignaturas as $asignaturas)
                                        <span>{{$numAsig++.' - '.$asignaturas->nombre}}</span><br>
                                    @endforeach
<p></p>

</body>
</html>
