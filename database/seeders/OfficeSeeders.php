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
            'idCenter' => "EC00",
            'name' => "Guayaquil Norte",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES02",
            'idCenter' => "EC25",
            'name' => "Guayaquil Sur",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES07",
            'idCenter' => "EC00",
            'name' => "Guayaquil Especiales",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //UIO
        DB::table('offices')->insert([
            'idOffice' => "ES10",
            'idCenter' => "EC03",
            'name' => "Quito Sur",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES08",
            'idCenter' => "EC02",
            'name' => "Quito Norte",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES13",
            'idCenter' => "EC03",
            'name' => "Quito Especiales",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
