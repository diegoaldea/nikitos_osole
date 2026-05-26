<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Línea juvenil metalizada 1',      'color' => '#F29109'],
            ['name' => 'Línea juvenil metalizada 2',      'color' => '#E84C3D'],
            ['name' => 'Línea fraccionada cristal x 40grs', 'color' => '#8E5A3C'],
            ['name' => 'Línea max x 65grs',               'color' => '#C0392B'],
            ['name' => 'Línea fraccionada cristal x 80grs', 'color' => '#b898e8'],
            ['name' => 'Línea premium max x 100grs',      'color' => '#f0a0c0'],
            ['name' => 'Línea familiar tradicional',      'color' => null],
            ['name' => 'Jugos',                           'color' => '#e84040'],
        ];

        foreach ($categories as $category) {
            $slug = Str::slug($category['name']);
            $category['image'] = SeedImageHelper::copy('categories', $slug, 'categories');

            Category::updateOrCreate(['name' => $category['name']], $category);
        }
    }
}
