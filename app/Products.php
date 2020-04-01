<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $primaryKey = 'id_producte';

    protected $table = 'products';

    public $timestamps = [];



    public function artistas()
    {
        return $this->belongsTo(Artistas::class);
    }
}
