<?php

namespace Database\Factories;

use App\Models\Dept;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeptFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dept::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->randomElement(['unsettled']),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
