<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the product seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Classic Black Frame',
                'price' => 9500,
                'quantity' => 10,
                'description' => 'A stylish black frame that fits all face types. Durable and lightweight.',
                'image' => 'uploads/frames/black_frame.jpg',
            ],
            [
                'name' => 'Blue Light Glasses',
                'price' => 12500,
                'quantity' => 5,
                'description' => 'Protect your eyes from screen glare with these fashionable blue light glasses.',
                'image' => 'uploads/frames/blue_light.jpg',
            ],
            [
                'name' => 'Rimless Elegant',
                'price' => 16000,
                'quantity' => 0,
                'description' => 'Minimalistic rimless glasses perfect for professionals. Currently out of stock.',
                'image' => 'uploads/frames/rimless_elegant.jpg',
            ],
            [
                'name' => 'Clear Transparent Frame',
                'price' => 13500,
                'quantity' => 3,
                'description' => 'Modern transparent frame that matches any outfit. Trendy and sleek.',
                'image' => 'uploads/frames/clear_transparent.jpg',
            ],
            [
                'name' => 'Round Retro Frame',
                'price' => 11000,
                'quantity' => 7,
                'description' => 'A classic round design for a vintage look. Comfortable and bold.',
                'image' => 'uploads/frames/retro_round.png',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
