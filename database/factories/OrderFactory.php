<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'order_number' => $this->faker->unique()->numberBetween(1, 100000000),
            'order_date' => $this->faker->date(),
            'total_amount' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
