<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';

    protected $fillable = [
        'no_kamar', 'lantai', 'blok_id', 'tipe', 'harga', 'fasilitas',
    ];

    public function scopedataKamar($query)
    {
        return $query->join('blok', 'kamar.blok_id', '=', 'blok.id')
            ->select('kamar.*', 'blok.nama_blok')
            ->get();
    }

    public function scopeBookingKamar($query)
    {
        return $query->join('blok', 'kamar.blok_id', '=', 'blok.id')
            ->where('kamar.active', 1)
            ->select('kamar.*', 'blok.nama_blok')
            ->get();
    }
}
