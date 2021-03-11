<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarpetaPie extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "carpeta_pies"; 

    protected $filleable = ['fecha','archivo','id_equipo_pie','id_alumno_pie','id_nee','id_documento_pie'];

    protected $dates = ['deleted_at'];



// Establecimiento de Relaciones //


	//-------Relacion 1:N entre las tablas Equipo PIE y Carpeta Pie-------//

		public function especialista_pie()
    		{
    			return $this->belongsTo(EquipoPie::class,'id_equipo_pie','id');
    		}


	//-------Relacion 1:N entre las tablas Alumno PIE y Carpeta Pie-------//

		public function alumno_pie()
    		{
    			return $this->belongsTo(AlumnoPie::class,'id_alumno_pie','id');
    		}


        //-------Relacion 1:N entre las tablas Alumno PIE y Carpeta Pie-------//

        public function documento_pie()
            {
                return $this->belongsTo(DocumentoPie::class,'id_documento_pie','id');
            }

        //-------Relacion 1:N entre las tablas Equipo PIE y Carpeta Pie-------//

        public function nee()
            {
                return $this->belongsTo(Nee::class,'id_nee','id');
            }



	//-----------------------------------------------------------//

}
