<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administrativo extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "administrativos"; 

    protected $filleable = ['rut','primer_nombre','segundo_nombre','apellido_paterno','apellido_materno','cargo','correo','id_administrativo','estado'];

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

    public function scopeCargo($query, $cargo)
    {
        if($cargo)
            return $query->where('cargo', 'LIKE', "%$cargo%");
    }




// Establecimiento de Relaciones //


	//-------Relacion 1:1 entre las tablas Administrativo y Planificacion-------//

		public function planificacion()
    		{
    			return $this->belongsTo(Planificacion::class,'id','id_administrativo');
    		}


	//-------Relacion 1:N entre las tablas Administrativo y Licencia-------//

		public function licencias()
    		{
    			return $this->hasMany(Licencia::class);
    		}






	//-----------------------------------------------------------//

}
