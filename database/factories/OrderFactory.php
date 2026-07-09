<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'status' => fake()->randomElement(['pending', 'approved', 'shipped', 'completed', 'cancelled']),
            'total' => 0,
            'shipping_address' => [
                'line1' => fake()->streetAddress(),
                'city' => fake()->city(),
                'zip_code' => fake()->postcode(),
                'country' => 'Egypt',
            ],
            'phone' => '+201' . fake()->randomNumber(9, true),
            'payment_method' => fake()->randomElement(['cash_on_delivery', 'credit_card']),
        ];
    }
}
