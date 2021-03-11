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
<h3>Alumnos @if($curso->nivel=='Kinder')
          {{ $curso->nivel.' '.$curso->letra }}
        @else
          {{ $curso->nivel.'° '.$curso->grado.' '.$curso->letra }}
        @endif
</h3>
<table style="width: 100%;">
    <tbody>
        <tr>
            <th>Primer Nombre</th>
            <th>Segundo Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Rut</th>
            <th>Correo</th>
        </tr>
            @foreach($curso->alumnos as $alumno)
                                <tr>
                                    <td>
                                        {{$alumno->primer_nombre}}
                                    </td>
                                    <td>
                                        {{$alumno->segundo_nombre}}
                                    </td>
                                    <td>
                                        {{$alumno->apellido_paterno}}
                                    </td>
                                    <td>
                                        {{$alumno->apellido_materno}}
                                    </td>
                                    <td>
                                        {{$alumno->rut}}
                                    </td>
                                    <td>
                                        {{$alumno->correo}}
                                    </td>
                  
      
         
                                </tr>
                                @endforeach
        
    </tbody>
</table>
<p></p>

</body>
</html>