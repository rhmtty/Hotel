<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blok extends Model
{
    protected $table = 'blok';

    public function scopedataKamar($query)
    {
        return $query->where(function ($q) {
            return $q->from('kamar')->where('kamar.blok_id', '=', 'blok.id')->select('kamar.id')->count();
        })->get();
    }
}
