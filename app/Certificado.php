<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificado extends Model
{
	use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = "certificados"; 

    protected $filleable = ['tipo','folio','fecha','id_alumno'];

    protected $dates = ['deleted_at'];





// Establecimiento de Relaciones //


	//-------Relacion 1:N entre las tablas Alumnos y Certificados-------//

		public function alumno()
    		{
    			return $this->belongsTo(Alumno::class, 'id_alumno','id');
    		}











	//-----------------------------------------------------------//

}
