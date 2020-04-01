<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artistas extends Model
{
    protected $primaryKey = 'id_artista';

    protected $table = 'artistas';

    public $timestamps = [];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
