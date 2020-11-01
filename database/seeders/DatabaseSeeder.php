<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use App\Models\Region;
use Faker\Factory;
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
        $faker = Factory::create();
        District::query()->truncate();
        City::query()->truncate();
        Region::query()->truncate();

        Region::factory(10)->create();

        City::factory(100)->create()
            ->each(function ($city) {
                for ($i = 0; $i < 5; $i++) {
                    $city->districts()->save(District::factory()->make());
                }
        });



        // \App\Models\User::factory(10)->create();

    }
}
