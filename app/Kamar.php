<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';

    public function scopelistKamar($query)
    {
        return $query->join('blok', 'kamar.blok_id', '=', 'blok.id')
            ->select('kamar.*', 'blok.nama_blok')
            ->get();
    }
}
