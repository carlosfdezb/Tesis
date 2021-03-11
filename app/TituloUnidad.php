<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TituloUnidad extends Model
{
    protected $primaryKey = 'id';

    protected $table = "titulo_unidads"; 

    protected $filleable = ['titulo_unidad','numero_unidad','id_profesor','id_curso','id_asignatura'];

    protected $dates = ['deleted_at'];


// Establecimiento de Relaciones //

	public function profesor()
	{

		return $this->belongsTo(Profesor::class,'id_profesor','id');

	}


	public function curso()
	{

		return $this->belongsTo(Curso::class,'id_curso','id');

	}


	public function asignatura()
	{

		return $this->belongsTo(Asignatura::class,'id_asignatura','id');

	}


}
