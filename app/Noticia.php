<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $primaryKey = 'id';

    protected $table = "noticias"; 

    protected $filleable = ['titulo','descripcion','url','imagen','tipo'];

}
