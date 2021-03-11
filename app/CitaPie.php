<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CitaPie extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "cita_pies"; 

    protected $filleable = ['fecha','hora','resumen','id_especialista','id_alumno_pie'];

    protected $dates = ['deleted_at'];





// Establecimiento de Relaciones //


	//-------Relacion 1:N entre las tablas Especialista y Cita Pie-------//

		public function especialista()
    		{
    			return $this->belongsTo(Especialista::class);
    		}


	//-------Relacion 1:N entre las tablas Alumno Pie y Cita Pie-------//
    		
 		public function alumno_pie()
    		{
    			return $this->belongsTo(AlumnoPie::class);
    		}



	//-----------------------------------------------------------//

}
