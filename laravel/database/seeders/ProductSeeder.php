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
        Product::create([
            'name' => "Bean",
            'category_id' => 1,
            'pricing' => 20,
        ]);
        Product::create([
            'name' => "Peanut",
            'category_id' => 2,
            'pricing' => 10,
        ]);
        Product::create([
            'name' => "Almond",
            'category_id' => 3,
            'pricing' => 40,
        ]);
        Product::create([
            'name' => "Chestnut",
            'category_id' => 1,
            'pricing' => 40,
        ]);
    }
}
