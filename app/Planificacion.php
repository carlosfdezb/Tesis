<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Planificacion extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "planificacions"; 

    protected $filleable = ['asignatura','nivel','grado','fecha','unidad','archivo','nombre_administrativo','id_profesor','estado','letra','observaciones'];

    protected $dates = ['deleted_at'];



// Query Scope //

    // SCOPE DE ESTADO //
    
        public function scopeEstado($query, $estado)
        {
            if($estado)
                return $query->where('estado', 'LIKE', "%$estado%"); 
        }

    // SCOPE DE FECHA //
        public function scopeFecha($query, $fecha)
        {
            if($fecha)
                return $query->where('fecha', 'LIKE', "%$fecha%"); 
        }


    // SCOPE PARA BUSCAR EL NOMBRE DEL PROFESOR A TRAVES DE 1 RELACIONES //

        public function scopePrimero($query, $nombre)
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

        public function scopeTercero($query, $nombre)
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
                        $var->where('rut', 'LIKE', "%".$rut."%");

                }); 

        }







// Establecimiento de Relaciones //


	//-------Relacion 1:1 entre las tablas Profesor y Planificacion------- El primer parametro hace referencia a la columna de la tabla donde estamos trabajando (en este caso en planificacion con la columna 'id_profesor') y el segundo parametro hace referencia a la columna a la cual queremos linkear en la otra tabla (en este caso es la tabla profesors y la columa se llama ´id´)//

		public function profesor()
    		{
    			return $this->belongsTo(Profesor::class,'id_profesor','id');  
    		}











	//-----------------------------------------------------------//

}
