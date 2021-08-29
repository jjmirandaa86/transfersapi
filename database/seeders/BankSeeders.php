<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            'idCountry' => "EC",
            'name' => "Banco Pichincha",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('banks')->insert([
            'idCountry' => "EC",
            'name' => "Banco Guayaquil",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('banks')->insert([
            'idCountry' => "EC",
            'name' => "Produbanco",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
