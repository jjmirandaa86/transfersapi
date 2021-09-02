<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Usercenters extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usercenters')->insert([
            'idUser' => 500000,
            'idCentre' => "EC00",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('usercenters')->insert([
            'idUser' => 500000,
            'idCentre' => "EC25",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
