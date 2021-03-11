<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialProfesor extends Model
{
    
    protected $primaryKey = 'id';

    protected $table = "material_profesors"; 

    protected $filleable = ['titulo','descripcion','archivo','id_profesor','id_curso','id_asignatura','id_titulo_unidads'];

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

	public function unidad()
	{

		return $this->belongsTo(TituloUnidad::class,'id_titulo_unidads','id');

	}













}
