<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Electronics', 'description' => 'Devices and gadgets', 'image_path' => 'images/categories/electronics.webp'],
            ['name' => 'Furniture', 'description' => 'Home and office furniture', 'image_path' => 'images/categories/furniture.webp'],
            ['name' => 'Clothing', 'description' => 'Apparel for men, women, and children', 'image_path' => 'images/categories/clothing.webp'],
            ['name' => 'Books', 'description' => 'A variety of books and literature', 'image_path' => 'images/categories/books.webp'],
            ['name' => 'Toys', 'description' => 'Toys and games for children', 'image_path' => 'images/categories/toys.webp'],
            ['name' => 'Sports', 'description' => 'Sports equipment and apparel', 'image_path' => 'images/categories/sports.webp'],
            ['name' => 'Automotive', 'description' => 'Car parts and accessories', 'image_path' => 'images/categories/automotive.webp'],
            ['name' => 'Health', 'description' => 'Health and wellness products', 'image_path' => 'images/categories/health.webp'],
            ['name' => 'Beauty', 'description' => 'Beauty products and cosmetics', 'image_path' => 'images/categories/beauty.webp'],
            ['name' => 'Jewelry', 'description' => 'Fine jewelry and accessories', 'image_path' => 'images/categories/jewellery.webp'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'description' => $category['description'],
                'image_path' => $category['image_path'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
