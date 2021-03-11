
<html>
<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
 
        body {
            margin: 2cm 3cm 3cm;
        }
 
    </style>
</head>
<body>
<header>
    <p style="font-size:20px"><img src="../public/dist/img/{{$color}}.png" style="width: 80px;">&nbsp; &nbsp; &nbsp; &nbsp;<b><u>CERTIFICADO DE ALUMNO REGULAR</u></b></p>
</header>
<p style="text-align: right;">Folio: 1{{date('Ymd').''.$alumno->id}}</p>
<p><br></p>
<p style="text-align: justify;line-height: 2;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; HUGO ANTONIO OLAVE PARRA, <b>Director del Colegio Instituto San Pedro</b>, comuna de San Pedro de la Paz, provincia de Concepción, Región del Bío-Bío. Certifica que el alumno/a <b>{{mb_strtoupper($alumno->primer_nombre).' '.mb_strtoupper($alumno->segundo_nombre).' '.mb_strtoupper($alumno->apellido_paterno).' '.mb_strtoupper($alumno->apellido_materno)}}</b> de R.U.T. <b>{{$alumno->rut}}</b> está matriculado/a en <b>{{$alumno->curso->nivel.'° '.$alumno->curso->grado.' '.$alumno->curso->letra}}</b>, del presente año <b>{{date('Y')}}</b>.</p>
<p><br></p>
<p style="text-align: justify;line-height: 2;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Se extiende el presente certificado a petición del interesado, para fines que estime conveniente.</p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>


<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ______________________________</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;HUGO ANTONIO OLAVE PARRA</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b>DIRECTOR</b></p>
<?php setlocale(LC_ALL,'spanish'); $mes= strftime("%B");?>
<p><br></p>
<p><br></p>
<p>San Pedro de la Paz, {{date('d').' de '.$mes.' del '.date('Y')}} </p>
<p><br></p>
<p style="font-size:12px">La autenticidad de este certificado puede verificarse en nuestro sitio web, <b>www.institutosanpedro.cl</b>, sección de Servicios Virtuales, ingresando el <b>número de folio</b> que registra este documento.</p>
</body>
</html>