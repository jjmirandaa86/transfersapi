<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            CountrySeeders::class,
            RegionSeeders::class,
            OfficeSeeders::class,
            BankSeeders::class,
            LanguageSeeders::class,
            StateSeeders::class,
            UserSeeders::class,
            RoutesSeeders::class,
        ]);
    }
}
