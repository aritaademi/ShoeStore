<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Sneakers', 'description' => 'Casual and athletic footwear']);
        Category::create(['name' => 'Boots', 'description' => 'Stylish and rugged footwear']);
        Category::create(['name' => 'Heels', 'description' => 'Elegant & luxury footwear']);
    }
}
