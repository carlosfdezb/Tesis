<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsignaturaPie extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "asignatura_pies"; 

    protected $filleable = ['nombre','nivel','grado','codigo','id_profesor_pie'];

    protected $dates = ['deleted_at'];





// Establecimiento de Relaciones //


	//-------Relacion 1:N entre las tablas Alumno Pie y Asignatura Pie-------//

		public function alumno_pies()
    		{
    			return $this->hasMany(AlumnoPie::class);
    		}


	//-------Relacion 1:N entre las tablas Profesor Pie y Asignatura Pie-------//

		public function profesor_pie()
    		{
    			return $this->belongsTo(ProfesorPie::class);
    		}


	//-----------------------------------------------------------//

}
