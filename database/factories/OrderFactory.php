<?php

namespace Database\Factories;

use App\Models\Product;
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
    public function definition(): array
    {
        $product = Product::factory()->create();
        $quantity = $this->faker->numberBetween(1, 10);

        return [
            'order_number' => $this->faker->unique()->numerify('ORD#####'),
            'product_id' => $product->id,
            'quantity' => $quantity,
            'total_price' => $quantity * $product->price,
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
        ];
    }
}
