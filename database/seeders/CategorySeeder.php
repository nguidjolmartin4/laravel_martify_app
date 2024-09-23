<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Computer & Office',
                'description' => 'Find the latest computers, laptops, and essential office equipment for all your needs.'
            ],
            [
                'name' => 'Collectibles & Toys',
                'description' => 'Explore a wide variety of toys and collectible items for all ages.'
            ],
            [
                'name' => 'Books',
                'description' => 'Discover books across all genres, from fiction to self-help and educational material.'
            ],
            [
                'name' => 'Fashion / Clothes',
                'description' => 'Stay in style with the latest trends in clothing and accessories for men, women, and children.'
            ],
            [
                'name' => 'Sports & Outdoors',
                'description' => 'Gear up for your favorite sports and outdoor activities with the best equipment and apparel.'
            ],
            [
                'name' => 'Painting & Hobby',
                'description' => 'Unleash your creativity with painting supplies, crafting materials, and hobby accessories.'
            ],
            [
                'name' => 'Electronics',
                'description' => 'Find cutting-edge electronics, from TVs to smart devices and home entertainment systems.'
            ],
            [
                'name' => 'Food & Grocery',
                'description' => 'Shop fresh groceries, snacks, and a wide range of food products delivered to your door.'
            ],
            [
                'name' => 'Music',
                'description' => 'Browse musical instruments, audio equipment, and accessories for music lovers.'
            ],
            [
                'name' => 'TV / Projectors',
                'description' => 'Get the best in home entertainment with top-rated TVs and projectors.'
            ],
            [
                'name' => 'Health & Beauty',
                'description' => 'Explore products that enhance your health, beauty, and personal care routines.'
            ],
            [
                'name' => 'Home Air Quality',
                'description' => 'Improve your home environment with air purifiers, humidifiers, and other air quality products.'
            ],
            [
                'name' => 'Gaming / Consoles',
                'description' => 'Shop for the latest gaming consoles, games, and accessories for an immersive experience.'
            ],
            [
                'name' => 'Car & Motorbike',
                'description' => 'Find accessories, parts, and gear for your car or motorbike to keep them in top shape.'
            ],
            [
                'name' => 'Photo / Video',
                'description' => 'Capture your best moments with high-quality cameras, lenses, and video equipment.'
            ],
            [
                'name' => 'Security & Wifi',
                'description' => 'Ensure your home and office are secure with advanced security systems and reliable Wi-Fi solutions.'
            ],
            [
                'name' => 'Computer Peripherals',
                'description' => 'Upgrade your computer setup with peripherals like keyboards, mice, and storage devices.'
            ],
            [
                'name' => 'Phone Accessories',
                'description' => 'Get the latest phone accessories, including cases, chargers, and screen protectors.'
            ],
            [
                'name' => 'Watches',
                'description' => 'Browse an array of stylish and functional watches for all occasions.'
            ],
            [
                'name' => 'Printers',
                'description' => 'Find the best printers for home, office, or professional use, including ink and accessories.'
            ],
            [
                'name' => 'Projectors',
                'description' => 'Enhance your home theater or office setup with high-quality projectors for any space.'
            ],
            [
                'name' => 'Skin Care',
                'description' => 'Nurture your skin with top-tier skincare products designed for all skin types.'
            ],
            [
                'name' => 'Office Supplies',
                'description' => 'Stay organized and productive with a wide selection of office supplies.'
            ],
            [
                'name' => 'Other',
                'description' => 'Explore miscellaneous items that don\'t fit into the traditional categories.'
            ]
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'description' => $category['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
