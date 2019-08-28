<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => 'Nanas Sultan Sagiri',
            'email' => 'nss@email.com',
            'password' => bcrypt('123456'),
            'jenis_kelamin' => 'perempuan',
            'telp' => '081226478',
            'alamat' => 'WBM',
            'role' => 'Superuser'
        ]);
    }
}
