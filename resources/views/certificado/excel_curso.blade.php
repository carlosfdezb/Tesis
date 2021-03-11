

<table>
    <thead>
        <tr>
            <th>Curso</th>
            <th>Letra</th>
            <th>Nivel</th>
            <th>Profesor jefe</th>
            <th>Rut profesor jefe</th>
            <th>Correo profesor jefe</th>
            <th>Cantidad de alumnos</th>
        </tr>
    </thead>
        <tbody>
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
