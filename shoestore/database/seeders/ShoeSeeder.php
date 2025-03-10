<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shoe;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shoe::create([
            'brand_id' => 1,
            'category_id' => 1,
            'name' => 'Air Max',
            'description' => 'Comfortable sneakers for daily wear',
            'price' => 120.00,
            'image' => 'images/nike-air-max.jpg',
        ]);
        
        Shoe::create([
            'brand_id' => 2,
            'category_id' => 2,
            'name' => 'Winter boots',
            'description' => 'Insulated boots to keep you warm in winter.',
            'price' => 150.00,
            'image' => 'images/winter-boots.jpg',
        ]);

        Shoe::create([
            'brand_id' => 3,
            'category_id' => 3,
            'name' => 'Heels',
            'description' => 'Heels to make you look like a lady.',
            'price' => 1800.00,
            'image' => 'images/heels2.png',
        ]);

    }
}

