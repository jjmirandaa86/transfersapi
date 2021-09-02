<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CenterSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('centers')->insert([
            'idCentre' => "EC00",
            'idRegion' => 3,
            'name' => "Guayaquil Norte",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('centers')->insert([
            'idCentre' => "EC25",
            'idRegion' => 3,
            'name' => "Guayaquil Sur",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('centers')->insert([
            'idCentre' => "EC02",
            'idRegion' => 4,
            'name' => "Quito Norte",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('centers')->insert([
            'idCentre' => "EC03",
            'idRegion' => 4,
            'name' => "Quito Sur",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
