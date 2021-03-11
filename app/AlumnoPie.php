<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlumnoPie extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "alumno_pies"; 

    protected $filleable = ['nee','id_equipo_pie','id_alumno','estado','edad','fecha_diagnostico','fecha_reevaluacion','otros_profesionales','id_nee'];

    protected $dates = ['deleted_at'];




// Query Scope //

// SCOPE PARA BUSCAR EL NOMBRE DEL ALUMNO A TRAVES DE 1 RELACIONES //

    public function scopePrimer($query, $nombre)
    {
        if($nombre)
                   
            return $query->whereHas('alumno',function($var) use ($nombre)
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
                   
            return $query->whereHas('alumno',function($var) use ($nombre)
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
                   
            return $query->whereHas('alumno',function($var) use ($nombre)
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
                   
            return $query->whereHas('alumno',function($var) use ($nombre)
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
                   
            return $query->whereHas('alumno',function($var) use ($rut)
            {       
                    $var->where('rut', 'LIKE', "%$rut%");

            }); 

    }



    public function scopeCurso($query, $curso)
    {
        if($curso)
                   
            return $query->whereHas('alumno',function($var) use ($curso)
            {       
                    $var->where('id_curso', 'LIKE', "%$curso%");

            }); 

    }



// SCOPE PARA BUSCAR EL NOMBRE DEL ESPECIALISTA A TRAVES DE 2 RELACIONES //

    public function scopeEspecialista_primero($query, $nombre_especialista)
    {
        if($nombre_especialista)
                   
            return $query->whereHas('especialista_pie',function($var) use ($nombre_especialista)
            {    
                    return $var->whereHas('especialista', function($var2) use ($nombre_especialista){

                    $var2->where('primer_nombre', 'LIKE', "%".$nombre_especialista[0]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre_especialista[0]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre_especialista[0]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre_especialista[0]."%");
                    });
            });
    }

    public function scopeEspecialista_segundo($query, $nombre_especialista)
    {
        if($nombre_especialista)
                   
            return $query->whereHas('especialista_pie',function($var) use ($nombre_especialista)
            {    
                    return $var->whereHas('especialista', function($var2) use ($nombre_especialista){

                    $var2->where('primer_nombre', 'LIKE', "%".$nombre_especialista[1]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre_especialista[1]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre_especialista[1]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre_especialista[1]."%");
                    });
            });
    }


    public function scopeEspecialista_tercero($query, $nombre_especialista)
    {
        if($nombre_especialista)
                   
            return $query->whereHas('especialista_pie',function($var) use ($nombre_especialista)
            {    
                    return $var->whereHas('especialista', function($var2) use ($nombre_especialista){

                    $var2->where('primer_nombre', 'LIKE', "%".$nombre_especialista[2]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre_especialista[2]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre_especialista[2]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre_especialista[2]."%");
                    });
            });
    }

    public function scopeEspecialista_cuarto($query, $nombre_especialista)
    {
        if($nombre_especialista)
                   
            return $query->whereHas('especialista_pie',function($var) use ($nombre_especialista)
            {    
                    return $var->whereHas('especialista', function($var2) use ($nombre_especialista){

                    $var2->where('primer_nombre', 'LIKE', "%".$nombre_especialista[3]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre_especialista[3]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre_especialista[3]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre_especialista[3]."%");
                    });
            });
    }





    
// ------------------------------------------------------- //



// SCOPE PARA BUSCAR EL NOMBRE DEL PROFESOR A TRAVES DE 2 RELACIONES //

    public function scopeProfesor_primer($query, $nombre_profesor)
    {
        if($nombre_profesor)
                   
            return $query->whereHas('profesor_pie',function($var) use ($nombre_profesor)
            {    
                    return $var->whereHas('profesor', function($var2) use ($nombre_profesor){

                    $var2->where('primer_nombre', 'LIKE', "%".$nombre_profesor[0]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre_profesor[0]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre_profesor[0]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre_profesor[0]."%");
                    });
            });
    }

        public function scopeProfesor_segundo($query, $nombre_profesor)
    {
        if($nombre_profesor)
                   
            return $query->whereHas('profesor_pie',function($var) use ($nombre_profesor)
            {    
                    return $var->whereHas('profesor', function($var2) use ($nombre_profesor){

                    $var2->where('primer_nombre', 'LIKE', "%".$nombre_profesor[1]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre_profesor[1]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre_profesor[1]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre_profesor[1]."%");
                    });
            });
    }


    public function scopeProfesor_tercero($query, $nombre_profesor)
    {
        if($nombre_profesor)
                   
            return $query->whereHas('profesor_pie',function($var) use ($nombre_profesor)
            {    
                    return $var->whereHas('profesor', function($var2) use ($nombre_profesor){

                    $var2->where('primer_nombre', 'LIKE', "%".$nombre_profesor[2]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre_profesor[2]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre_profesor[2]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre_profesor[2]."%");
                    });
            });
    }


    public function scopeProfesor_cuarto($query, $nombre_profesor)
    {
        if($nombre_profesor)
                   
            return $query->whereHas('profesor_pie',function($var) use ($nombre_profesor)
            {    
                    return $var->whereHas('profesor', function($var2) use ($nombre_profesor){

                    $var2->where('primer_nombre', 'LIKE', "%".$nombre_profesor[3]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre_profesor[3]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre_profesor[3]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre_profesor[3]."%");
                    });
            });
    }






// Establecimiento de Relaciones //

    //-------Relacion 1:N entre las tablas Alumnos y Alumnos Pie-------//

        public function especialista_pie()
            {
                return $this->belongsTo(EquipoPie::class,'id_equipo_pie','id');
            }

    //-------Relacion 1:N entre las tablas Nees y Alumnos Pie-------//

        public function nee()
            {
                return $this->belongsTo(Nee::class,'id_nee','id');
            }

        public function carpeta_pie()
        {
                return $this->hasMany(CarpetaPie::class,'id_alumno_pie');
        }


	//-------Relacion 1:N entre las tablas Alumnos y Alumnos Pie-------//

		public function alumno()
    		{
    			return $this->belongsTo(Alumno::class,'id_alumno','id');
    		}



	//-------Relacion 1:N entre las tablas Alumno Pie y Citas Pie-------//

 		public function cita_pies()
    		{
    			return $this->hasMany(CitaPie::class);
    		}


	//-------Relacion 1:N entre las tablas Alumno Pie y Asignatura Pie-------//

 		public function asignatura_pies()
    		{
    			return $this->hasMany(AsignaturaPie::class);
    		}



	

}
