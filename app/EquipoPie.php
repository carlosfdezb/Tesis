<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipoPie extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "equipo_pies"; 

    protected $filleable = ['id_especialista','estado'];

    protected $dates = ['deleted_at'];





// Establecimiento de Relaciones //


	//-------Relacion 1:1 entre las tablas Profesor Pie y Profesor-------//

		public function especialista()
    		{
    			return $this->belongsTo(Especialista::class,'id_especialista','id'); 
    		}


    //-------Relacion 1:1 entre las tablas Profesor Pie y Alumno Pie-------//

        public function alumno_pie()
            {
                return $this->hasMany(AlumnoPie::class,'id_equipo_pie');
            }


	//-------Relacion 1:N entre las tablas Profesor Pie y Asignatura Pie-------//

		public function asignatura_pies()
    		{
    			return $this->hasMany(AsignaturaPie::class);
    		}


	//-------Relacion 1:N entre las tablas Profesor Pie y Carpeta Pie-------//

		public function carpeta_pies()
    		{
    			return $this->hasMany(CarpetaPie::class);
    		}




    		

	//-----------------------------------------------------------//

}
