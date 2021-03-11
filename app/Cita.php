<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "citas"; 

    protected $filleable = ['fecha','hora','resumen','id_especialista','id_alumno'];

    protected $dates = ['deleted_at'];





// Establecimiento de Relaciones //


	//-------Relacion 1:N entre las tablas Alumnos y Citas-------//

		public function alumno()
    		{
    			return $this->belongsto(Alumno::class);
    		}




	//-------Relacion 1:N entre las tablas Especialista y Citas-------//

		public function especialista()
    		{
    			return $this->belongsTo(Especialista::class);
    		}



	//-----------------------------------------------------------//

}
