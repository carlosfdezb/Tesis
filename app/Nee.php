<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nee extends Model
{
    protected $primaryKey = 'id';

    protected $table = "nees"; 

    protected $filleable = ['descripcion','abreviacion'];
}
