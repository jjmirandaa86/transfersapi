<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->insert([
            'idRoute' => 501201,
            'idOffice' => "ES01",
            'name' => "Preventa 501201",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('routes')->insert([
            'idRoute' => 501202,
            'idOffice' => "ES01",
            'name' => "Preventa 501202",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('routes')->insert([
            'idRoute' => 501203,
            'idOffice' => "ES01",
            'name' => "Preventa 501203",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
