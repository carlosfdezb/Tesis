<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "alumnos"; 

    protected $filleable = ['rut','primer_nombre','segundo_nombre','apellido_paterno','apellido_materno','correo','id_curso','estado'];

    protected $dates = ['deleted_at'];





// Query Scope //

    public function scopePrimer($query, $nombre)
    {
        if($nombre)
                   
            return $query->where('primer_nombre', 'LIKE', "%".$nombre[0]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre[0]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre[0]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre[0]."%");

    }

    public function scopeSegundo($query, $nombre)
    {
        if($nombre)
                   
            return $query->where('primer_nombre', 'LIKE', "%".$nombre[1]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre[1]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre[1]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre[1]."%");

    }

    public function scopeTercer($query, $nombre)
    {
        if($nombre)
                   
            return $query->where('primer_nombre', 'LIKE', "%".$nombre[2]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre[2]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre[2]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre[2]."%");

    }

    public function scopeCuarto($query, $nombre)
    {
        if($nombre)
                   
            return $query->where('primer_nombre', 'LIKE', "%".$nombre[3]."%")
                        ->orWhere('segundo_nombre', 'LIKE', "%".$nombre[3]."%")
                        ->orWhere('apellido_paterno', 'LIKE', "%".$nombre[3]."%")
                        ->orWhere('apellido_materno', 'LIKE', "%".$nombre[3]."%");

    }

    public function scopeRut($query, $rut)
    {
        if($rut)
            return $query->where('rut', 'LIKE', "%$rut%");
    }

    public function scopeCurso($query, $curso)
    {
        if($curso)
            return $query->where('id_curso',$curso);
    }








// Establecimiento de Relaciones //


	//-------Relacion 1:N entre las tablas Alumnos y Cursos-------//

		public function curso()
    		{
    			return $this->belongsTo(Curso::class, 'id_curso', 'id');
    		}


	//-------Relacion N:N entre las tablas Alumnos y Asignaturas Electivas-------//

		public function asignatura_electivas()
    		{
    			return $this->hasMany(AsignaturaElectiva::class);
    		}


    //-------Relacion 1:N entre las tablas Alumnos y Licencias-------//

		public function licencias()
    		{
    			return $this->hasMany(Licencia::class);
    		}


	//-------Relacion 1:N entre las tablas Alumnos y Certificados-------//

		public function certificados()
    		{
    			return $this->hasMany(Certificado::class);
    		}


	//-------Relacion 1:N entre las tablas Alumnos y Notas-------//

		public function notas()
    		{
    			return $this->hasMany(Nota::class);
    		}


	//-------Relacion 1:N entre las tablas Alumnos y Alumnos PIE-------//

		public function alumno_pie()
    		{
    			return $this->belongsTo(AlumnoPie::class,'id','id_alumno');
    		}


	//-------Relacion N:N entre las tablas Alumnos y Citas-------//

		public function citas()
    		{
    			return $this->hasMany(Cita::class);
    		}


	//-------Relacion 1:1 entre las tablas Alumnos y Carpeta Alumnos-------//

		public function carpeta_alumno()
    		{
    			return $this->hasOne(CarpetaAlumno::class);
    		}





	//-----------------------------------------------------------//


}
