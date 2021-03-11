<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nota extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "notas"; 

    protected $filleable = ['nota','descripcion','numero','semestre','ano','id_profesor','id_alumno','id_asignatura','id_curso'];

    protected $dates = ['deleted_at'];



// Query Scope //

// SCOPE PARA BUSCAR EL NOMBRE DEL ALUMNO A TRAVES DE 1 RELACIONES //

    public function scopeSemestre($query, $semestre)
    {
        if($semestre)
            return $query->where('semestre',$semestre); 

    }



// Establecimiento de Relaciones //


	//-------Relacion 1:N entre las tablas Alumnos y Notas-------//

		public function alumno()
    		{
    			return $this->belongsTo(Alumno::class, 'id_alumno', 'id');
    		}


	//-------Relacion 1:N entre las tablas Profesor y Notas-------//

		public function profesor()
    		{
    			return $this->belongsTo(Profesor::class);
    		}


        public function curso()
            {
                return $this->belongsTo(Curso::class);
            }

        public function asignatura(){
                return $this->belongsTo(Asignatura::class,'id_asignatura','id');
        }








	//-----------------------------------------------------------//

}
