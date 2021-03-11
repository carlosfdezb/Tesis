<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profesor extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "profesors"; 

    protected $filleable = ['rut','primer_nombre','segundo_nombre','apellido_paterno','apellido_materno','correo','estado'];

    protected $dates = ['deleted_at'];




//Query Scope //

    public function scopePrimer($query, $nombre)
    {
        if($nombre)
            return $query->where('primer_nombre','like','%'.$nombre[0].'%')
                            ->orWhere('segundo_nombre','like','%'.$nombre[0].'%')
                            ->orWhere('apellido_paterno','like','%'.$nombre[0].'%')
                            ->orWhere('apellido_materno','like','%'.$nombre[0].'%');

    }

    public function scopeSegundo($query, $nombre)
    {
        if($nombre)
            return $query->where('primer_nombre','like','%'.$nombre[1].'%')
                            ->orWhere('segundo_nombre','like','%'.$nombre[1].'%')
                            ->orWhere('apellido_paterno','like','%'.$nombre[1].'%')
                            ->orWhere('apellido_materno','like','%'.$nombre[1].'%');

    }
    public function scopeTercer($query, $nombre)
    {
        if($nombre)
            return $query->where('primer_nombre','like','%'.$nombre[2].'%')
                            ->orWhere('segundo_nombre','like','%'.$nombre[2].'%')
                            ->orWhere('apellido_paterno','like','%'.$nombre[2].'%')
                            ->orWhere('apellido_materno','like','%'.$nombre[2].'%');

    }
    public function scopeCuarto($query, $nombre)
    {
        if($nombre)
            return $query->where('primer_nombre','like','%'.$nombre[3].'%')
                            ->orWhere('segundo_nombre','like','%'.$nombre[3].'%')
                            ->orWhere('apellido_paterno','like','%'.$nombre[3].'%')
                            ->orWhere('apellido_materno','like','%'.$nombre[3].'%');

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

// Establecimiento de Relaciones //


	//-------Relacion 1:1 entre las tablas Profesor y Profesor Pie-------//

		public function profesor_pie()
    		{
    			return $this->belongsTo(ProfesorPie::class);
    		}


	//-------Relacion N:N entre las tablas Profesor y Asignatura-------//

		public function asignaturas()
    		{
    			return $this->belongsToMany(Asignatura::class)->withPivot(['nivel','grado','letra']);

    		}


    //-------Relacion N:N entre las tablas Profesor y Asignatura Electiva-------//

		public function asignatura_electivas()
    		{
    			return $this->hasMany(AsignaturaElectiva::class);
    		}


	//-------Relacion 1:N entre las tablas Profesor y Notas-------//

		public function notas()
    		{
    			return $this->hasMany(Nota::class);
    		}


	//-------Relacion 1:1 entre las tablas Profesor y Curso-------//

		public function curso()
    		{
    			return $this->belongsTo(Curso::class, 'id', 'id_profesor');
    		}


	//-------Relacion 1:1 entre las tablas Profesor y Planificacion-------//

		public function planificacions()
    		{
    			return $this->hasMany(Planificacion::class);
    		}











	//-----------------------------------------------------------//

}
