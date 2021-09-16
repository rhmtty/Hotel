<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kamar')->insert([
            [
                'no_kamar' => '1',
                'lantai' => '1',
                'blok_id' => 1,
                'tipe' => 'VIP',
                'harga' => 500000,
                'fasilitas' => 'AC, TV, Kasur, PS5, Shower',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'no_kamar' => '2',
                'lantai' => '1',
                'blok_id' => 1,
                'tipe' => 'VIP',
                'harga' => 500000,
                'fasilitas' => 'AC, TV, Kasur, PS5, Shower',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'no_kamar' => '3',
                'lantai' => '1',
                'blok_id' => 1,
                'tipe' => 'VIP',
                'harga' => 500000,
                'fasilitas' => 'AC, TV, Kasur, PS5, Shower',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'no_kamar' => '4',
                'lantai' => '1',
                'blok_id' => 1,
                'tipe' => 'VIP',
                'harga' => 500000,
                'fasilitas' => 'AC, TV, Kasur, PS5, Shower',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'no_kamar' => '5',
                'lantai' => '1',
                'blok_id' => 1,
                'tipe' => 'VIP',
                'harga' => 500000,
                'fasilitas' => 'AC, TV, Kasur, PS5, Shower',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'no_kamar' => '6',
                'lantai' => '2',
                'blok_id' => 1,
                'tipe' => 'AC',
                'harga' => 100000,
                'fasilitas' => 'AC, TV, Kasur',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'no_kamar' => '7',
                'lantai' => '2',
                'blok_id' => 1,
                'tipe' => 'AC',
                'harga' => 100000,
                'fasilitas' => 'AC, TV, Kasur',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'no_kamar' => '8',
                'lantai' => '2',
                'blok_id' => 1,
                'tipe' => 'AC',
                'harga' => 100000,
                'fasilitas' => 'AC, TV, Kasur',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'no_kamar' => '9',
                'lantai' => '2',
                'blok_id' => 1,
                'tipe' => 'AC',
                'harga' => 100000,
                'fasilitas' => 'AC, TV, Kasur',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'no_kamar' => '10',
                'lantai' => '2',
                'blok_id' => 1,
                'tipe' => 'AC',
                'harga' => 100000,
                'fasilitas' => 'AC, TV, Kasur',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
