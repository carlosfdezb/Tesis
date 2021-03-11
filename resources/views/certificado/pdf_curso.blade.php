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

<table style="width: 100%;">
    <tbody>
        <tr>
            <th>Curso</th>
            <th>Letra</th>
            <th>Nivel</th>
            <th>Profesor jefe</th>
            <th>Rut profesor jefe</th>
            <th>Correo profesor jefe</th>
            <th>Cantidad de alumnos</th>
        </tr>
            @foreach($curso as $cursos)
                                <tr>
                                    <td>
                                        {{$cursos->nivel}}
                                    </td>
                                    <td>
                                        {{$cursos->letra}}
                                    </td>
                                    <td>
                                        {{$cursos->grado}}
                                    </td>
                                    <td>
                                        {{$cursos->profesor->primer_nombre.' '.$cursos->profesor->apellido_paterno.' '.$cursos->profesor->apellido_materno}}
                                    </td>
                                    <td>
                                        {{$cursos->profesor->rut}}
                                    </td>
                                    <td>
                                        {{$cursos->profesor->correo}}
                                    </td>
                                    <td>
                                        {{$cursos->alumnos->count()}}
                                    </td>
      
         
                                </tr>
                                @endforeach
        
    </tbody>
</table>
<p></p>

</body>
</html>