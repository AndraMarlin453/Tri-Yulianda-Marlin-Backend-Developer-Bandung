<?php

namespace Database\Factories;

use Faker\Factory as faker;
use illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = faker::create();
        return [
            'name' => $faker->name(),
            'gender' => $faker->dayOfWeek(), //Arr::random() ->syntax dari laravel agar suatu array random
            'Agama' => $faker->city(),
            'nis' => mt_rand(0000000001, 9999999999),
        ];
    }
}
