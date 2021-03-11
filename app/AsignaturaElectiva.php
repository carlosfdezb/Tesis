<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsignaturaElectiva extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "asignatura_electivas"; 

    protected $filleable = ['nombre','nivel','codigo'];

    protected $dates = ['deleted_at'];




// Establecimiento de Relaciones //


	//-------Relacion N:N entre las tablas Alumnos y Asignaturas Electivas-------//

		public function alumnos()
    		{
    			return $this->hasMany(Alumno::class);
    		}


 	//-------Relacion N:N entre las tablas Profesor y Asignatura Electiva-------//

		public function profesors()
    		{
    			return $this->hasMany(Profesor::class);
    		}










	//-----------------------------------------------------------//

}
