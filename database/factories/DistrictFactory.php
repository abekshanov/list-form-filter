<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

class DistrictFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = District::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $district = $this->faker->address;
        return [
            'name' => $district,
            'translit_name' => $district,
//            'city_id' => $this->faker->unique()->randomElement(City::query()->pluck('id')->toArray()),
        ];
    }
}
