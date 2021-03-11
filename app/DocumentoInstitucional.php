<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoInstitucional extends Model
{
    protected $primaryKey = 'id';

    protected $table = "documento_institucionals"; 

    protected $filleable = ['titulo','archivo','descripcion','tipo'];

    protected $dates = ['deleted_at'];




// Query Scopes //

    public function scopeTitulo($query, $titulo)
    {
        if($titulo)
            return $query->where('titulo', 'LIKE', "%$titulo%");
    }

    public function scopeTipo($query, $tipo)
    {
        if($tipo)
            return $query->where('tipo',$tipo);
    }



}
