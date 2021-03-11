<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenciaMedica extends Model
{
    protected $primaryKey = 'id';

    protected $table = "licencia_medicas"; 

    protected $filleable = ['nivel','grado','letra','fecha_licencia','archivo','nombre_administrativo','estado','descripcion','observacion','id_alumno','id_curso'];

    protected $dates = ['deleted_at'];






// Establecimiento de Relaciones //


	//-------Relacion 1:N entre las tablas licencia_medicas y alumnos------- El primer parametro hace referencia a la columna de la tabla donde estamos trabajando (en este caso en licencia medica con la columna 'id_alumno') y el segundo parametro hace referencia a la columna a la cual queremos linkear en la otra tabla (en este caso es la tabla alumnos y la columa se llama ´id´)//

		public function profesor()
    		{
    			return $this->belongsTo(Alumno::class,'id_alumno','id');  
    		}











	//-----------------------------------------------------------//







}
