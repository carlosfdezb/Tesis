<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Licencia extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "licencias"; 

    protected $filleable = ['fecha_inicio','fecha_fin','fecha_presentacion','archivo','estado','id_alumno'];

    protected $dates = ['deleted_at'];





// Establecimiento de Relaciones //


	//-------Relacion 1:N entre las tablas Alumnos y Licencias-------//

		public function alumno()
    		{
    			return $this->belongsTo(Alumno::class);
    		}


	//-------Relacion 1:N entre las tablas Administrativo y Licencia-------//

		public function administrativo()
    		{
    			return $this->hasOne(Administrativo::class);
    		}





	//-----------------------------------------------------------//

}
