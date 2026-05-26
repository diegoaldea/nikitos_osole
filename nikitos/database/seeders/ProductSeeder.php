<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $productsByCategory = [
            'Papas fritas' => [
                ['name' => 'Papas Clásicas',        'code' => 'PAP-001', 'size' => '120g', 'shelf_life' => '6 meses',  'featured' => true],
                ['name' => 'Papas con Cheddar',     'code' => 'PAP-002', 'size' => '120g', 'shelf_life' => '6 meses',  'featured' => false],
                ['name' => 'Papas Onduladas',       'code' => 'PAP-003', 'size' => '150g', 'shelf_life' => '6 meses',  'featured' => true],
            ],
            'Palitos salados' => [
                ['name' => 'Palitos de Queso',      'code' => 'PAL-001', 'size' => '80g',  'shelf_life' => '8 meses',  'featured' => false],
                ['name' => 'Palitos Salados',       'code' => 'PAL-002', 'size' => '80g',  'shelf_life' => '8 meses',  'featured' => true],
            ],
            'Frutos secos' => [
                ['name' => 'Maní Salado',           'code' => 'FRU-001', 'size' => '100g', 'shelf_life' => '12 meses', 'featured' => false],
                ['name' => 'Maní Japonés',          'code' => 'FRU-002', 'size' => '100g', 'shelf_life' => '12 meses', 'featured' => true],
                ['name' => 'Mix Frutos Secos',      'code' => 'FRU-003', 'size' => '150g', 'shelf_life' => '12 meses', 'featured' => false],
            ],
            'Snacks dulces' => [
                ['name' => 'Pochoclos Dulces',      'code' => 'DUL-001', 'size' => '90g',  'shelf_life' => '6 meses',  'featured' => true],
                ['name' => 'Garrapiñadas',          'code' => 'DUL-002', 'size' => '100g', 'shelf_life' => '9 meses',  'featured' => false],
            ],
        ];

        foreach ($productsByCategory as $categoryName => $products) {
            $category = Category::where('name', $categoryName)->first();

            if (! $category) {
                continue;
            }

            foreach ($products as $product) {
                Product::updateOrCreate(
                    ['code' => $product['code']],
                    array_merge($product, ['category_id' => $category->id])
                );
            }
        }
    }
}
