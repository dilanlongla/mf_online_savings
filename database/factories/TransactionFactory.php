<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ref' => $this->faker->word,
        'is_in' => $this->faker->randomElement(['out']),
        'collector_id,' => $this->faker->randomDigitNotNull,
        'fee' => $this->faker->randomDigitNotNull,
        'amount' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->word,
        'account' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
