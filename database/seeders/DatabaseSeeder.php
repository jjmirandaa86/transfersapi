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
            LanguageSeeders::class,
            CountrySeeders::class,
            RegionSeeders::class,
            CenterSeeders::class,
            OfficeSeeders::class,
            RoutesSeeders::class,
            BankSeeders::class,
            UserSeeders::class,
            Usercenters::class,
            StateSeeders::class,
        ]);
    }
}
