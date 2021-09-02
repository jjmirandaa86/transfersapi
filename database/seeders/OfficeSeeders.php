<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //GYE
        DB::table('offices')->insert([
            'idOffice' => "ES01",
            'idCentre' => "EC00",
            'name' => "Guayaquil Norte",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES02",
            'idCentre' => "EC25",
            'name' => "Guayaquil Sur",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES07",
            'idCentre' => "EC00",
            'name' => "Guayaquil Especiales",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //UIO
        DB::table('offices')->insert([
            'idOffice' => "ES10",
            'idCentre' => "EC03",
            'name' => "Quito Sur",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES08",
            'idCentre' => "EC02",
            'name' => "Quito Norte",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES13",
            'idCentre' => "EC03",
            'name' => "Quito Especiales",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
