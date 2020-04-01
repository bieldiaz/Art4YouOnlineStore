<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public static function findByCode($code)
    {
        return self::where('codi', $code)->first();
    }

    public function discount($total)
    {
        if ($this->tipo == 'fixed') {
            return $this->valor;
        } elseif ($this->tipo == 'percent') {
            return round(($this->percent_off / 100) * $total);
        } else {
            return 0;
        }
    }
}
