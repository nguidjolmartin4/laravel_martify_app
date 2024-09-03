<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Technology',
            'Health',
            'Lifestyle',
            'Business',
            'Travel',
            'Food',
            'Education',
            'Fashion',
            'Sports',
            'Finance',
            'DIY',
            'Entertainment',
            'Fitness',
            'Parenting',
            'Marketing',
            'Personal Development',
            'Productivity',
            'Environment',
            'Beauty',
            'Innovation',
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag,
                'slug' => Str::slug($tag),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
