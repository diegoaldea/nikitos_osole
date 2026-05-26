<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Papas fritas', 'color' => '#F29109'],
            ['name' => 'Palitos salados', 'color' => '#E84C3D'],
            ['name' => 'Frutos secos', 'color' => '#8E5A3C'],
            ['name' => 'Snacks dulces', 'color' => '#C0392B'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], $category);
        }
    }
}
