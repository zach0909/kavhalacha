<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DonorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'email' => $this->faker->email(),
            'donation_amount' => $this->faker->randomFloat(),
            'currency_code' => $this->faker->currencyCode(),
            'follow_up_calls' => $this->faker->boolean(),
            'comments' => $this->faker->text(),
            'status' => $this->faker->text(50),
            'last_four' => $this->faker->randomNumber(4)
        ];
    }
}
