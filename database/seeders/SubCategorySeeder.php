<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    public function run()
    {
        $subCategories = [
            // Electronics
            ['category_id' => 1, 'name' => 'Mobile Phones', 'description' => 'Smartphones and accessories', 'image_path' => 'images/subcategories/mobile_phones.webp'],
            ['category_id' => 1, 'name' => 'Laptops', 'description' => 'Portable computers and accessories', 'image_path' => 'images/subcategories/laptops.webp'],
            ['category_id' => 1, 'name' => 'Headphones', 'description' => 'Audio devices for listening', 'image_path' => 'images/subcategories/headphones.webp'],
            ['category_id' => 1, 'name' => 'Cameras', 'description' => 'Digital and video cameras', 'image_path' => 'images/subcategories/cameras.webp'],
            ['category_id' => 1, 'name' => 'Televisions', 'description' => 'LED, LCD, and Smart TVs', 'image_path' => 'images/subcategories/televisions.webp'],
            ['category_id' => 1, 'name' => 'Wearable Tech', 'description' => 'Smartwatches and fitness trackers', 'image_path' => 'images/subcategories/wearable_tech.webp'],
            ['category_id' => 1, 'name' => 'Gaming Consoles', 'description' => 'Video game consoles and accessories', 'image_path' => 'images/subcategories/gaming_consoles.webp'],
            ['category_id' => 1, 'name' => 'Tablets', 'description' => 'Portable touchscreen devices', 'image_path' => 'images/subcategories/tablets.webp'],
            ['category_id' => 1, 'name' => 'Drones', 'description' => 'Aerial photography and hobby drones', 'image_path' => 'images/subcategories/drones.webp'],
            ['category_id' => 1, 'name' => 'Networking Devices', 'description' => 'Routers, modems, and Wi-Fi devices', 'image_path' => 'images/subcategories/networking_devices.webp'],

            // Furniture
            ['category_id' => 2, 'name' => 'Sofas', 'description' => 'Comfortable seating for living rooms', 'image_path' => 'images/subcategories/sofas.webp'],
            ['category_id' => 2, 'name' => 'Tables', 'description' => 'Dining and coffee tables', 'image_path' => 'images/subcategories/tables.webp'],
            ['category_id' => 2, 'name' => 'Chairs', 'description' => 'Seating for home and office', 'image_path' => 'images/subcategories/chairs.webp'],
            ['category_id' => 2, 'name' => 'Beds', 'description' => 'Comfortable beds and bedding', 'image_path' => 'images/subcategories/beds.webp'],
            ['category_id' => 2, 'name' => 'Wardrobes', 'description' => 'Storage solutions for clothes', 'image_path' => 'images/subcategories/wardrobes.webp'],
            ['category_id' => 2, 'name' => 'Shelves', 'description' => 'Bookshelves and storage units', 'image_path' => 'images/subcategories/shelves.webp'],
            ['category_id' => 2, 'name' => 'Desks', 'description' => 'Office and study desks', 'image_path' => 'images/subcategories/desks.webp'],
            ['category_id' => 2, 'name' => 'Cabinets', 'description' => 'Storage cabinets for home and office', 'image_path' => 'images/subcategories/cabinets.webp'],
            ['category_id' => 2, 'name' => 'Outdoor Furniture', 'description' => 'Furniture for gardens and patios', 'image_path' => 'images/subcategories/outdoor_furniture.webp'],
            ['category_id' => 2, 'name' => 'Mattresses', 'description' => 'Comfortable mattresses for beds', 'image_path' => 'images/subcategories/mattresses.webp'],

            // Clothing
            ['category_id' => 3, 'name' => 'Men\'s Clothing', 'description' => 'Clothing for men', 'image_path' => 'images/subcategories/mens_clothing.webp'],
            ['category_id' => 3, 'name' => 'Women\'s Clothing', 'description' => 'Clothing for women', 'image_path' => 'images/subcategories/womens_clothing.webp'],
            ['category_id' => 3, 'name' => 'Children\'s Clothing', 'description' => 'Clothing for children', 'image_path' => 'images/subcategories/childrens_clothing.webp'],
            ['category_id' => 3, 'name' => 'Footwear', 'description' => 'Shoes and sandals for all ages', 'image_path' => 'images/subcategories/footwear.webp'],
            ['category_id' => 3, 'name' => 'Accessories', 'description' => 'Belts, hats, and other accessories', 'image_path' => 'images/subcategories/accessories.webp'],
            ['category_id' => 3, 'name' => 'Sportswear', 'description' => 'Clothing for sports and exercise', 'image_path' => 'images/subcategories/sportswear.webp'],
            ['category_id' => 3, 'name' => 'Winter Clothing', 'description' => 'Coats, jackets, and warm clothing', 'image_path' => 'images/subcategories/winter_clothing.webp'],
            ['category_id' => 3, 'name' => 'Underwear', 'description' => 'Undergarments for men, women, and children', 'image_path' => 'images/subcategories/underwear.webp'],
            ['category_id' => 3, 'name' => 'Formal Wear', 'description' => 'Suits, dresses, and formal attire', 'image_path' => 'images/subcategories/formal_wear.webp'],
            ['category_id' => 3, 'name' => 'Casual Wear', 'description' => 'Casual clothing for everyday wear', 'image_path' => 'images/subcategories/casual_wear.webp'],

            // Books
            ['category_id' => 4, 'name' => 'Fiction', 'description' => 'Novels and stories', 'image_path' => 'images/subcategories/fiction.webp'],
            ['category_id' => 4, 'name' => 'Non-Fiction', 'description' => 'Biographies, history, and more', 'image_path' => 'images/subcategories/non_fiction.webp'],
            ['category_id' => 4, 'name' => 'Educational', 'description' => 'Textbooks and educational materials', 'image_path' => 'images/subcategories/educational.webp'],
            ['category_id' => 4, 'name' => 'Science Fiction', 'description' => 'Sci-fi novels and stories', 'image_path' => 'images/subcategories/science_fiction.webp'],
            ['category_id' => 4, 'name' => 'Mystery', 'description' => 'Mystery and thriller novels', 'image_path' => 'images/subcategories/mystery.webp'],
            ['category_id' => 4, 'name' => 'Fantasy', 'description' => 'Fantasy novels and series', 'image_path' => 'images/subcategories/fantasy.webp'],
            ['category_id' => 4, 'name' => 'Self-Help', 'description' => 'Books on personal development', 'image_path' => 'images/subcategories/self_help.webp'],
            ['category_id' => 4, 'name' => 'Cookbooks', 'description' => 'Recipe books and cooking guides', 'image_path' => 'images/subcategories/cookbooks.webp'],
            ['category_id' => 4, 'name' => 'Children\'s Books', 'description' => 'Books for young readers', 'image_path' => 'images/subcategories/childrens_books.webp'],
            ['category_id' => 4, 'name' => 'Graphic Novels', 'description' => 'Comics and graphic novels', 'image_path' => 'images/subcategories/graphic_novels.webp'],

            // Toys
            ['category_id' => 5, 'name' => 'Action Figures', 'description' => 'Figurines and playsets', 'image_path' => 'images/subcategories/action_figures.webp'],
            ['category_id' => 5, 'name' => 'Board Games', 'description' => 'Games for family and friends', 'image_path' => 'images/subcategories/board_games.webp'],
            ['category_id' => 5, 'name' => 'Building Blocks', 'description' => 'Construction toys for creativity', 'image_path' => 'images/subcategories/building_blocks.webp'],
            ['category_id' => 5, 'name' => 'Dolls', 'description' => 'Dolls and dollhouses', 'image_path' => 'images/subcategories/dolls.webp'],
            ['category_id' => 5, 'name' => 'Remote Control Toys', 'description' => 'RC cars, planes, and drones', 'image_path' => 'images/subcategories/remote_control_toys.webp'],
            ['category_id' => 5, 'name' => 'Puzzles', 'description' => 'Jigsaw puzzles and brain teasers', 'image_path' => 'images/subcategories/puzzles.webp'],
            ['category_id' => 5, 'name' => 'Outdoor Toys', 'description' => 'Toys for outdoor play', 'image_path' => 'images/subcategories/outdoor_toys.webp'],
            ['category_id' => 5, 'name' => 'Stuffed Animals', 'description' => 'Soft toys and plushies', 'image_path' => 'images/subcategories/stuffed_animals.webp'],
            ['category_id' => 5, 'name' => 'Educational Toys', 'description' => 'Learning toys for kids', 'image_path' => 'images/subcategories/educational_toys.webp'],
            ['category_id' => 5, 'name' => 'Toy Vehicles', 'description' => 'Cars, trucks, and other vehicles', 'image_path' => 'images/subcategories/toy_vehicles.webp'],

            // Vehicles
            ['category_id' => 6, 'name' => 'Cars', 'description' => 'New and used cars', 'image_path' => 'images/subcategories/cars.webp'],
            ['category_id' => 6, 'name' => 'Motorcycles', 'description' => 'New and used motorcycles', 'image_path' => 'images/subcategories/motorcycles.webp'],
            ['category_id' => 6, 'name' => 'Bicycles', 'description' => 'Bicycles for all ages', 'image_path' => 'images/subcategories/bicycles.webp'],
            ['category_id' => 6, 'name' => 'Trucks', 'description' => 'New and used trucks', 'image_path' => 'images/subcategories/trucks.webp'],
            ['category_id' => 6, 'name' => 'Boats', 'description' => 'New and used boats', 'image_path' => 'images/subcategories/boats.webp'],
            ['category_id' => 6, 'name' => 'ATVs', 'description' => 'All-terrain vehicles', 'image_path' => 'images/subcategories/atvs.webp'],
            ['category_id' => 6, 'name' => 'RVs', 'description' => 'Recreational vehicles', 'image_path' => 'images/subcategories/rvs.webp'],
            ['category_id' => 6, 'name' => 'Electric Vehicles', 'description' => 'Electric cars and scooters', 'image_path' => 'images/subcategories/electric_vehicles.webp'],
            ['category_id' => 6, 'name' => 'Vehicle Parts', 'description' => 'Spare parts and accessories', 'image_path' => 'images/subcategories/vehicle_parts.webp'],
            ['category_id' => 6, 'name' => 'Watercraft', 'description' => 'Jetskis and watercraft', 'image_path' => 'images/subcategories/watercraft.webp'],

            // Beauty
            ['category_id' => 7, 'name' => 'Makeup', 'description' => 'Cosmetics and beauty products', 'image_path' => 'images/subcategories/makeup.webp'],
            ['category_id' => 7, 'name' => 'Skincare', 'description' => 'Products for skincare', 'image_path' => 'images/subcategories/skincare.webp'],
            ['category_id' => 7, 'name' => 'Hair Care', 'description' => 'Shampoos, conditioners, and styling', 'image_path' => 'images/subcategories/hair_care.webp'],
            ['category_id' => 7, 'name' => 'Fragrances', 'description' => 'Perfumes and colognes', 'image_path' => 'images/subcategories/fragrances.webp'],
            ['category_id' => 7, 'name' => 'Nail Care', 'description' => 'Nail polish and nail care products', 'image_path' => 'images/subcategories/nail_care.webp'],
            ['category_id' => 7, 'name' => 'Bath & Body', 'description' => 'Soaps, lotions, and bath products', 'image_path' => 'images/subcategories/bath_body.webp'],
            ['category_id' => 7, 'name' => 'Men\'s Grooming', 'description' => 'Grooming products for men', 'image_path' => 'images/subcategories/mens_grooming.webp'],
            ['category_id' => 7, 'name' => 'Beauty Tools', 'description' => 'Tools for makeup and skincare', 'image_path' => 'images/subcategories/beauty_tools.webp'],
            ['category_id' => 7, 'name' => 'Oral Care', 'description' => 'Toothpaste, brushes, and mouthwash', 'image_path' => 'images/subcategories/oral_care.webp'],
            ['category_id' => 7, 'name' => 'Anti-Aging', 'description' => 'Anti-aging skincare products', 'image_path' => 'images/subcategories/anti_aging.webp'],

            // Sports
            ['category_id' => 8, 'name' => 'Fitness Equipment', 'description' => 'Equipment for home and gym workouts', 'image_path' => 'images/subcategories/fitness_equipment.webp'],
            ['category_id' => 8, 'name' => 'Outdoor Gear', 'description' => 'Camping and hiking gear', 'image_path' => 'images/subcategories/outdoor_gear.webp'],
            ['category_id' => 8, 'name' => 'Cycling', 'description' => 'Bicycles and cycling accessories', 'image_path' => 'images/subcategories/cycling.webp'],
            ['category_id' => 8, 'name' => 'Running', 'description' => 'Running shoes and accessories', 'image_path' => 'images/subcategories/running.webp'],
            ['category_id' => 8, 'name' => 'Water Sports', 'description' => 'Surfing, swimming, and diving gear', 'image_path' => 'images/subcategories/water_sports.webp'],
            ['category_id' => 8, 'name' => 'Team Sports', 'description' => 'Football, basketball, and more', 'image_path' => 'images/subcategories/team_sports.webp'],
            ['category_id' => 8, 'name' => 'Yoga', 'description' => 'Yoga mats, blocks, and accessories', 'image_path' => 'images/subcategories/yoga.webp'],
            ['category_id' => 8, 'name' => 'Golf', 'description' => 'Golf clubs, balls, and accessories', 'image_path' => 'images/subcategories/golf.webp'],
            ['category_id' => 8, 'name' => 'Winter Sports', 'description' => 'Skiing, snowboarding, and gear', 'image_path' => 'images/subcategories/winter_sports.webp'],
            ['category_id' => 8, 'name' => 'Fishing', 'description' => 'Fishing rods, reels, and accessories', 'image_path' => 'images/subcategories/fishing.webp'],

            // Home Appliances
            ['category_id' => 9, 'name' => 'Refrigerators', 'description' => 'Fridges and freezers', 'image_path' => 'images/subcategories/refrigerators.webp'],
            ['category_id' => 9, 'name' => 'Washing Machines', 'description' => 'Washing and drying machines', 'image_path' => 'images/subcategories/washing_machines.webp'],
            ['category_id' => 9, 'name' => 'Microwaves', 'description' => 'Microwave ovens', 'image_path' => 'images/subcategories/microwaves.webp'],
            ['category_id' => 9, 'name' => 'Air Conditioners', 'description' => 'Cooling and heating units', 'image_path' => 'images/subcategories/air_conditioners.webp'],
            ['category_id' => 9, 'name' => 'Vacuum Cleaners', 'description' => 'Vacuum and cleaning appliances', 'image_path' => 'images/subcategories/vacuum_cleaners.webp'],
            ['category_id' => 9, 'name' => 'Dishwashers', 'description' => 'Dishwashing machines', 'image_path' => 'images/subcategories/dishwashers.webp'],
            ['category_id' => 9, 'name' => 'Blenders', 'description' => 'Blenders and food processors', 'image_path' => 'images/subcategories/blenders.webp'],
            ['category_id' => 9, 'name' => 'Ovens', 'description' => 'Cooking ovens and stoves', 'image_path' => 'images/subcategories/ovens.webp'],
            ['category_id' => 9, 'name' => 'Coffee Makers', 'description' => 'Coffee machines and accessories', 'image_path' => 'images/subcategories/coffee_makers.webp'],
            ['category_id' => 9, 'name' => 'Water Heaters', 'description' => 'Electric water heaters', 'image_path' => 'images/subcategories/water_heaters.webp'],

            // Tools
            ['category_id' => 10, 'name' => 'Power Tools', 'description' => 'Drills, saws, and other power tools', 'image_path' => 'images/subcategories/power_tools.webp'],
            ['category_id' => 10, 'name' => 'Hand Tools', 'description' => 'Hammers, screwdrivers, and wrenches', 'image_path' => 'images/subcategories/hand_tools.webp'],
            ['category_id' => 10, 'name' => 'Garden Tools', 'description' => 'Lawn mowers and gardening tools', 'image_path' => 'images/subcategories/garden_tools.webp'],
            ['category_id' => 10, 'name' => 'Safety Gear', 'description' => 'Gloves, helmets, and protective equipment', 'image_path' => 'images/subcategories/safety_gear.webp'],
            ['category_id' => 10, 'name' => 'Measuring Tools', 'description' => 'Measuring tapes and levels', 'image_path' => 'images/subcategories/measuring_tools.webp'],
            ['category_id' => 10, 'name' => 'Tool Storage', 'description' => 'Toolboxes and storage solutions', 'image_path' => 'images/subcategories/tool_storage.webp'],
            ['category_id' => 10, 'name' => 'Welding Equipment', 'description' => 'Welders and accessories', 'image_path' => 'images/subcategories/welding_equipment.webp'],
            ['category_id' => 10, 'name' => 'Plumbing Tools', 'description' => 'Tools for plumbing work', 'image_path' => 'images/subcategories/plumbing_tools.webp'],
            ['category_id' => 10, 'name' => 'Electrical Tools', 'description' => 'Tools for electrical work', 'image_path' => 'images/subcategories/electrical_tools.webp'],
            ['category_id' => 10, 'name' => 'Automotive Tools', 'description' => 'Tools for car maintenance', 'image_path' => 'images/subcategories/automotive_tools.webp'],
        ];

        // DB::table('subcategories')->insert($subCategories);

        foreach ($subCategories as $subcategory) {
            DB::table('subcategories')->insert([
                'category_id' => $subcategory['category_id'],
                'name' => $subcategory['name'],
                'description' => $subcategory['description'],
                'image_path' => $subcategory['image_path'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
