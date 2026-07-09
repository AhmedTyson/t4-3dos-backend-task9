<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Keyboards'],
            ['name' => 'Mice'],
            ['name' => 'Headsets'],
            ['name' => 'Monitors'],
            ['name' => 'Webcams'],
            ['name' => 'USB Hubs'],
            ['name' => 'Cables & Adapters'],
            ['name' => 'Microphones'],
            ['name' => 'Lighting'],
            ['name' => 'Storage'],
            ['name' => 'Audio'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}
