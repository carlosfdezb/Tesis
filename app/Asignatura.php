<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asignatura extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "asignaturas"; 

    protected $filleable = ['nombre','color','icono'];

    protected $dates = ['deleted_at'];





// Establecimiento de Relaciones //


	//-------Relacion N:N entre las tablas Asignatura y Profesor-------//

		public function profesors()
    		{
    			return $this->belongsToMany(Profesor::class)->withPivot('profesor_id','asignatura_id');
    		}


	//-------Relacion N:N entre las tablas Asignatura y Curso-------//

		public function cursos()
    		{
    			return $this->belongsToMany(Curso::class,'curso_asignatura');
    		}


	//-----------------------------------------------------------//

}
