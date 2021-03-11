<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{


    protected $primaryKey = 'id';

    protected $table = "calendarios"; 

    protected $filleable = ['descripcion','fecha','id_curso','id_profesor','id_asignatura'];






// Establecimiento de Relaciones //


	//-------Relacion 1:N entre las tablas calendario y Cursos-------//

		public function curso()
    		{
    			return $this->belongsTo(Curso::class, 'id_curso', 'id');
    		}


// Establecimiento de Relaciones //


	//-------Relacion 1:N entre las tablas calendario y profesors-------//

		public function profesor()
    		{
    			return $this->belongsTo(Profesor::class, 'id_profesor', 'id');
    		}

    //-------Relacion 1:N entre las tablas calendario y asignatura-------//

		public function asignatura()
    		{
    			return $this->belongsTo(Asignatura::class, 'id_asignatura', 'id');
    		}


}
