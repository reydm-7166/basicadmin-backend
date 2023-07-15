<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Running Shoes',
                'category' => 'Shoes',
                'description' => 'Comfortable running shoes for athletic activities. ',
                'date_time' => Carbon::now(),
            ],
            [
                'name' => 'Casual Sneakers',
                'category' => 'Shoes',
                'description' => 'Stylish sneakers for everyday wear.',
                'date_time' => Carbon::now(),
            ],
            [
                'name' => 'Formal Dress',
                'category' => 'Clothes',
                'description' => 'Elegant dress for special occasions.',
                'date_time' => Carbon::now(),
            ],
            [
                'name' => 'Jeans',
                'category' => 'Pants',
                'description' => 'Classic denim jeans for a casual look.',
                'date_time' => Carbon::now(),
            ],
            [
                'name' => 'Cotton T-shirt',
                'category' => 'Shirts',
                'description' => 'Soft and breathable cotton t-shirt.',
                'date_time' => Carbon::now(),
            ],
            [
                'name' => 'Button-up Shirt',
                'category' => 'Shirts',
                'description' => 'Smart-casual shirt for a polished appearance.',
                'date_time' => Carbon::now(),
            ],
        ];

        // Loop through the products and insert them into the database

        for($i = 0; $i < 50; $i++)
        {
            \App\Models\Product::create($products[rand(0, 5)]);
        }

    }
}
