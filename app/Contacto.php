<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    public $table = "contacto";

    protected $fillable = [
        'nombre', 'email', 'telefono', 'message'
    ];
}
