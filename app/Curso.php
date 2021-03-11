<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "cursos"; 

    protected $filleable = ['nivel','grado','letra','codigo','id_profesor'];

    protected $dates = ['deleted_at'];

    public function scopePrimer($query, $nombre)
    {
        if($nombre)
                   
            return $query->whereHas('profesor',function($var) use ($nombre)
            {
                    $var->where('primer_nombre', 'LIKE', "%".$nombre[0]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre[0]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre[0]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre[0]."%");
            }); 

    }

    public function scopeSegundo($query, $nombre)
    {
        if($nombre)
                   
            return $query->whereHas('profesor',function($var) use ($nombre)
            {
                    $var->where('primer_nombre', 'LIKE', "%".$nombre[1]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre[1]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre[1]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre[1]."%");
            }); 

    }

    public function scopeTercer($query, $nombre)
    {
        if($nombre)
                   
            return $query->whereHas('profesor',function($var) use ($nombre)
            {
                    $var->where('primer_nombre', 'LIKE', "%".$nombre[2]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre[2]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre[2]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre[2]."%");
            }); 
    }

    public function scopeCuarto($query, $nombre)
    {
        if($nombre)
                   
            return $query->whereHas('profesor',function($var) use ($nombre)
            {       
                    $var->where('primer_nombre', 'LIKE', "%".$nombre[3]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre[3]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre[3]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre[3]."%");
            }); 

    }

    public function scopeRut($query, $rut)
    {
        if($rut)
                   
            return $query->whereHas('profesor',function($var) use ($rut)
            {       
                    if($rut)
                        return $var->where('rut',$rut);
            }); 

    }
    public function scopeCurso($query, $curso)
    {
        if($curso)
            return $query->where('id',$curso);
    }

// Establecimiento de Relaciones //


	//-------Relacion 1:N entre las tablas Alumnos y Cursos-------//

		public function alumnos()
    		{
    			return $this->hasMany(Alumno::class, 'id_curso');
    		}


	//-------Relacion N:N entre las tablas Curso y Asignatura-------//

		public function asignaturas()
    		{
    			return $this->belongstoMany(Asignatura::class,'curso_asignatura');
    		}


	//-------Relacion 1:1 entre las tablas Profesor y Curso-------//

		public function profesor()
    		{
    			return $this->belongsTo(Profesor::class, 'id_profesor', 'id');
    		}

	//-----------------------------------------------------------//

}
