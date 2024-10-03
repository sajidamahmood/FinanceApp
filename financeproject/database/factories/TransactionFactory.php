<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;


class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), 
            'description' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, -1000, 1000),
            'type' => $this->faker->randomElement(['income', 'expense']),
            'date'=> $this->faker->date,
        ];
    }
}
