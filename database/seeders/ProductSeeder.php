<?php

namespace Database\Seeders;

use App\Models\Product;
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
                'url' => 'https://ajlmypqawp.cloudimg.io/v7/https://www.webfuturestudio.com/uploads/blog/five-tips-on-how-to-photograph-shoes-0026.png?width=1024',
                'description' => 'Comfortable running shoes for athletic activities.',
            ],
            [
                'name' => 'Casual Sneakers',
                'category' => 'Shoes',
                'url' => 'https://image.made-in-china.com/202f0j00RspfMqIzHioZ/Hy-014-Outdoor-Sport-Running-Flyknit-Shoes-Breathable-Casual-Sneaker-Shoes.jpg',
                'description' => 'Stylish sneakers for everyday wear.',
            ],
            [
                'name' => 'Formal Dress',
                'category' => 'Clothes',
                'url' => 'https://s.alicdn.com/@sc04/kf/H7ecf2a73dea74d4c8805028c198ab598a.jpg_280x280.jpg',
                'description' => 'Elegant dress for special occasions.',
            ],
            [
                'name' => 'Jeans',
                'category' => 'Clothes',
                'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVZ9lFWoX6PlVfP5EhHYxaF2WhAhPXxc2Snw&usqp=CAU',
                'description' => 'Classic denim jeans for a casual look.',
            ],
            [
                'name' => 'Cotton T-shirt',
                'category' => 'Shirts',
                'url' => 'https://m.media-amazon.com/images/I/610vffNJY0L._SL1500_.jpg',
                'description' => 'Soft and breathable cotton t-shirt.',
            ],
            [
                'name' => 'Button-up Shirt',
                'category' => 'Shirts',
                'url' => 'https://www.foto360kolkata.com/assets/img/services/shirt-and-tshirt/our-work/foto360kolkata-ecommerce-shirt-and-tshirt-photography-portfolio-1.webp',
                'description' => 'Smart-casual shirt for a polished appearance.',
            ],
        ];

        // Loop through the products and insert them into the database

        for($i = 0; $i < 50; $i++)
        {
            \App\Models\Product::create($products[rand(0, 5)]);
        }

    }
}
