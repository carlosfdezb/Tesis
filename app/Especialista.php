<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especialista extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "especialistas"; 

    protected $filleable = ['rut','primer_nombre','segundo_nombre','apellido_paterno','apellido_materno','correo','especialidad','estado','numero_secreduc'];

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


     public function scopeCorreo($query, $correo)
        {
            if($correo)
                return $query->where('correo', 'LIKE', "%$correo%"); 
        }

        public function scopeRut($query, $rut)
        {
            if($rut)
                return $query->where('rut', 'LIKE', "%$rut%");
        }

     public function scopeEspecialidad($query, $especialidad)
        {
            if($especialidad)
                return $query->where('especialidad', 'LIKE', "%$especialidad%"); 
        }








// Establecimiento de Relaciones //


    //-------Relacion 1:N entre las tablas Especialista y Carpeta Alumno-------//

        public function equipo_pie()
            {
                return $this->belongsTo(EquipoPie::class ,'id','id_especialista');
            }



	//-------Relacion 1:N entre las tablas Especialista y Carpeta Alumno-------//

		public function carpeta_alumnos()
    		{
    			return $this->hasMany(CarpetaAlumno::class);
    		}


	//-------Relacion 1:N entre las tablas Especialista y Citas-------//

		public function citas()
    		{
    			return $this->hasMany(Cita::class);
    		}


	//-------Relacion 1:N entre las tablas Especialista y Citas PIE-------//

		public function cita_pies()
    		{
    			return $this->hasMany(CitaPie::class);
    		}


//-------Relacion N:N entre las tablas Especialista y Carpeta Pie-------//

		public function carpeta_pies()
    		{
    			return $this->hasMany(CarpetaPie::class);
    		}



	//-----------------------------------------------------------//

}
