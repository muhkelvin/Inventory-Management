<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed 10 suppliers
        Supplier::factory(10)->create()->each(function ($supplier) {
            // Untuk setiap supplier, seed 5 produk
            Product::factory(5)->create([
                'supplier_id' => $supplier->id
            ])->each(function ($product) {
                // Untuk setiap produk, seed 3 orders
                Order::factory(3)->create([
                    'product_id' => $product->id
                ]);
            });
        });
    }
}
