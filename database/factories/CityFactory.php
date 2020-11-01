<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $city = $this->faker->city;
        return [
            'name' => $city,
            'translit_name' => $city,
            'region_id' => $this->faker->randomElement(Region::query()->pluck('id')->toArray()),
        ];
    }
}
