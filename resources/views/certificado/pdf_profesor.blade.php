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

<table>
    <tbody>
        <tr>
            <th>Nombre</th>
            <th>Rut</th>
            <th>Correo</th>
            <th>Jefatura</th>
            <th>Asignaturas</th>
        </tr>
            @foreach($profesor as $profesores)
                                <tr>
                                    <td>
                                        {{ $profesores->apellido_paterno.' '.$profesores->apellido_materno.', '.$profesores->primer_nombre.' '.$profesores->segundo_nombre}}
                                    </td>
                                    <td>
                                        {{ $profesores->rut }}
                                    </td>
                                    <td>
                                        {{ $profesores->correo }}
                                    </td>
                                    @if(!is_null($profesores->curso))
                                    <td>
                                        {{ $profesores->curso->nivel.' '.$profesores->curso->grado.' '.$profesores->curso->letra}}
                                    </td>
                                    @else
                                    <td>
                                        No
                                    </td>
                                     @endif 
                             @if(!is_null($profesores->asignaturas->first()))
                                    <td>
                                        
                                        @foreach($profesores->asignaturas as $asignatura)

                                        {{ '- '.$asignatura->nombre.', '.$asignatura->pivot->nivel.'° '.$asignatura->pivot->grado.' '.$asignatura->pivot->letra }}
                                        <br>
                                            @endforeach
                                        </br>
                                    </td>
                                    @else
                                    <td>
                                        Ninguna
                                    </td>
                                    @endif
      
         
                                </tr>
                                @endforeach
        
    </tbody>
</table>
<p></p>

</body>
</html>