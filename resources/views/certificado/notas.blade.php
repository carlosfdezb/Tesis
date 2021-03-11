
<html>
<head>

    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
 
        body {
            margin: 0.5cm 3cm 3cm;
        }
 
    </style>
    <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
      text-align: left;
    }
    </style>
</head>
<body>
<header>
    <p style="font-size:20px;line-height: 1;"><img src="../public/dist/img/{{$color}}.png" style="width: 80px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b><u>CERTIFICADO DE NOTAS</u></b></p>
    <p style="font-size:15px;line-height: 1;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b><u>{{strtoupper($semestre)}} SEMESTRE 2020</u></b></p>
</header>
<p style="text-align: right;">Folio: 2{{date('Ymd').''.$alumno->id}}</p>
<table style="width: 39%;">
    <tbody>
        <tr>
            <th style="width: 41.4692%;">Curso</th>
            <td style="width: 58.2323%;">{{$alumno->curso->nivel.'° '.$alumno->curso->grado.' '.$alumno->curso->letra}}</td>
        </tr>
    </tbody>
</table>
<p></p>
<table style="width: 100%;">
    <tbody>
        <tr>
            <th style="width: 35%;">Nombre</th>
            <td style="width: 75%;">{{$alumno->primer_nombre.' '.$alumno->segundo_nombre.' '.$alumno->apellido_paterno.' '.$alumno->apellido_materno}}</td>
        </tr>
        <tr>
            <th style="width: 35%;">Rut</th>
            <td style="width: 75%;">{{$alumno->rut}}</td>
        </tr>
        <tr>
            <th style="width: 35%;">Profesor jefe</th>
            <td style="width: 75%;">{{$alumno->curso->profesor->primer_nombre.' '.$alumno->curso->profesor->segundo_nombre.' '.$alumno->curso->profesor->apellido_paterno.' '.$alumno->curso->profesor->apellido_materno}}</td>
        </tr>
    </tbody>
</table>
<p></p>
<table style="width: 100%;">
    <tbody>
        <tr>
            <th style="width: 25%;">Asignatura</th>
            <th style="width: 6%;">N1</th>
            <th style="width: 6%;">N2</th>
            <th style="width: 6%;">N3</th>
            <th style="width: 6%;">N4</th>
            <th style="width: 6%;">N5</th>
            <th style="width: 6%;">N6</th>
            <th style="width: 6%;">N7</th>
            <th style="width: 6%;">N8</th>
            <th style="width: 6%;">N9</th>
            <th style="width: 6%;">N10</th>
            <th style="width: 15%;">Promedio parcial</th>
        </tr>
            <?php $promedioparcial=0; $cantidad=0;?>
            @foreach($asignaturas as $asignatura)
            <tr>
                <td>{{$asignatura->nombre}}</td>
            
            <?php
                $ano = date('Y');
                $nota1 = DB::table('notas')->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura->asignatura_id)
                        ->where('numero','1')->where('ano',$ano)->where('semestre',$semestre)->first();
            ?>
                @if(!is_null($nota1))
                    <td>{{$nota1->nota}}</td> 
                @else
                    <td></td>
                @endif
            <?php
                $ano = date('Y');
                $nota2 = DB::table('notas')->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura->asignatura_id)
                        ->where('numero','2')->where('ano',$ano)->where('semestre',$semestre)->first();
            ?>
                @if(!is_null($nota2))
                    <td>{{$nota2->nota}}</td> 
                @else
                    <td></td>
                @endif
            <?php
                $ano = date('Y');
                $nota3= DB::table('notas')->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura->asignatura_id)
                        ->where('numero','3')->where('ano',$ano)->where('semestre',$semestre)->first();
            ?>
                @if(!is_null($nota3))
                    <td>{{$nota3->nota}}</td> 
                @else
                    <td></td>
                @endif
            <?php
                $ano = date('Y');
                $nota4 = DB::table('notas')->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura->asignatura_id)
                        ->where('numero','4')->where('ano',$ano)->where('semestre',$semestre)->first();
            ?>
                @if(!is_null($nota4))
                    <td>{{$nota4->nota}}</td> 
                @else
                    <td></td>
                @endif
            <?php
                $ano = date('Y');
                $nota5 = DB::table('notas')->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura->asignatura_id)
                        ->where('numero','5')->where('ano',$ano)->where('semestre',$semestre)->first();
            ?>
                @if(!is_null($nota5))
                    <td>{{$nota5->nota}}</td> 
                @else
                    <td></td>
                @endif
            <?php
                $ano = date('Y');
                $nota6 = DB::table('notas')->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura->asignatura_id)
                        ->where('numero','6')->where('ano',$ano)->where('semestre',$semestre)->first();
            ?>
                @if(!is_null($nota6))
                    <td>{{$nota6->nota}}</td> 
                @else
                    <td></td>
                @endif
            <?php
                $ano = date('Y');
                $nota7 = DB::table('notas')->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura->asignatura_id)
                        ->where('numero','7')->where('ano',$ano)->where('semestre',$semestre)->first();
            ?>
                @if(!is_null($nota7))
                    <td>{{$nota7->nota}}</td> 
                @else
                    <td></td>
                @endif
            <?php
                $ano = date('Y');
                $nota8 = DB::table('notas')->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura->asignatura_id)
                        ->where('numero','8')->where('ano',$ano)->where('semestre',$semestre)->first();
            ?>
                @if(!is_null($nota8))
                    <td>{{$nota8->nota}}</td> 
                @else
                    <td></td>
                @endif
            <?php
                $ano = date('Y');
                $nota9 = DB::table('notas')->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura->asignatura_id)
                        ->where('numero','9')->where('ano',$ano)->where('semestre',$semestre)->first();
            ?>
                @if(!is_null($nota9))
                    <td>{{$nota9->nota}}</td> 
                @else
                    <td></td>
                @endif
            <?php
                $ano = date('Y');
                $nota10 = DB::table('notas')->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura->asignatura_id)
                        ->where('numero','10')->where('ano',$ano)->where('semestre',$semestre)->first();
            ?>
                @if(!is_null($nota10))
                    <td>{{$nota10->nota}}</td> 
                @else
                    <td></td>
                @endif
            <?php
                $ano = date('Y');
                $promedio = DB::table('notas')->where('id_alumno',$alumno->id)->where('id_asignatura',$asignatura->asignatura_id)
                            ->where('ano',$ano)->where('semestre',$semestre)->avg('nota');
            ?>
                @if(!is_null($promedio))
                    <?php $promedioparcial = $promedioparcial + $promedio; $cantidad++;?>
                    <td>{{number_format(round($promedio, 1), 1, '.', '.')}}</td> 
                @else
                    <td>0.0</td>
                @endif
            </tr>
            @endforeach
        
    </tbody>
</table>
<p></p>
<table style="width: 39%;">
    <tbody>
        <tr>
            <th style="width: 60%;">Promedio general</th>
            <td style="width: 40%;">{{number_format(round($promedioparcial/$cantidad, 1), 1, '.', '.')}}</td>
        </tr>
    </tbody>
</table>
<p></p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ______________________________</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;HUGO ANTONIO OLAVE PARRA</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b>DIRECTOR</b></p>
<?php setlocale(LC_ALL,'spanish'); $mes= strftime("%B");?>

<p>San Pedro de la Paz, {{date('d').' de '.$mes.' del '.date('Y')}} </p>
<p style="font-size:12px">La autenticidad de este certificado puede verificarse en nuestro sitio web, <b>www.institutosanpedro.cl</b>, sección de Servicios Virtuales, ingresando el <b>número de folio</b> que registra este documento.</p>
</body>
</html>