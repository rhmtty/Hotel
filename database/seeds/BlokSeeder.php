<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blok')->insert([
            [
                'nama_blok' => 'Blok I',
                'deskripsi' => 'Sebelah Barat',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'nama_blok' => 'Blok II',
                'deskripsi' => 'Sebelah Timur',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'nama_blok' => 'Blok III',
                'deskripsi' => 'Sebelah Selatan',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'nama_blok' => 'Blok IV',
                'deskripsi' => 'Sebelah Hutan Utara',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);
    }
}
