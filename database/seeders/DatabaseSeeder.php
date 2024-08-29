<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Customer::factory()
            ->count(100)
            ->has(
                Order::factory()
                    ->count(2)
                    ->has(OrderItem::factory()->count(3), 'items'),
                'orders'
            )
            ->create();
    }
}
