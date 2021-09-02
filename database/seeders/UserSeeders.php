<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'idUser' => 500000,
            'idCentre' => "EC00",
            'firtsName' => "EC00 GENERICO",
            'lastName' => "EC00 GENERICO",
            'position' => "Entregador",
            'email' => "501101@cbc.co",
            'password' => "12345",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
