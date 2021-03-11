<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarpetaAlumno extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "carpeta_alumnos"; 

    protected $filleable = ['fecha','archivo','id_alumno'];

    protected $dates = ['deleted_at'];





// Establecimiento de Relaciones //


	//-------Relacion 1:1 entre las tablas Alumnos y Carpeta Alumnos-------//

		public function alumno()
    		{
    			return $this->belongsTo(Alumno::class);
    		}



	//-------Relacion N:N entre las tablas Especialista y Carpeta Alumnos-------//

		public function especialistas()
    		{
    			return $this->belongstoMany(Especialista::class);
    		}


	//-----------------------------------------------------------//

}
