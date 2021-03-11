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
<h3>Notas {{$asignatura->nombre}} @if($curso->nivel=='Kinder')
          {{ $curso->nivel.' '.$curso->letra }}
        @else
          {{ $curso->nivel.'° '.$curso->grado.' '.$curso->letra }}
        @endif
</h3>
<table>
    <tr>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Rut
                                    </th>
                                    <th>
                                        1
                                    </th>
                                    <th>
                                        2
                                    </th>
                                    <th>
                                        3
                                    </th>
                                    <th>
                                        4
                                    </th>
                                    <th >
                                        5
                                    </th>
                                    <th >
                                        6
                                    </th>
                                    <th >
                                        7
                                    </th>
                                    <th>
                                        8
                                    </th>
                                    <th >
                                        9
                                    </th>
                                    <th>
                                        10
                                    </th>
                                    <th>
                                        Promedio
                                    </th>
                                </tr>
                                @foreach($curso->alumnos->sortBy('apellido_paterno') as $alumno)
                                <tr>
                                    <td>
                                        {{$alumno->apellido_paterno.' '.$alumno->apellido_materno.', '.$alumno->primer_nombre.' '.$alumno->segundo_nombre}}
                                    </td>
                                    <td>
                                        {{$alumno->rut}}
                                    </td>
                                    @for($i=1; $i<11; $i++)
                                        <?php
                                       
                                        $nota = Nota::where('id_alumno','=',$alumno->id)->where('id_curso','=',$curso->id)
                                                ->where('id_asignatura','=',$asignatura->id)->where('numero',$i)->where('ano',date('Y'))->first();

                                        ?>

                                        @if(!is_null($nota))
                                      
                                                <td>{{$nota->nota}}</td>
                                      

                                        @else
                                            <td></td>
                                        @endif
                                        



                                    @endfor

                                    <?php
                                        $ano = date('Y');
                                       
                                        $promedio = DB::table('notas')->where('id_alumno','=',$alumno->id)
                                                ->where('id_asignatura','=',$asignatura->id)->where('ano','=',$ano)->avg('nota');

                                    ?>
                                    @if($promedio != NULL)
                                            <td>{{number_format(round($promedio, 1), 1, '.', '.')}}</td> 
                                    @else
                                        <td></td>
                                    @endif    
                                </tr>
                                @endforeach
</table>
<p></p>

</body>
</html>