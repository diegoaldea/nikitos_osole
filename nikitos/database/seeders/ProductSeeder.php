<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $productsByCategory = [
            'Línea fraccionada cristal x 80grs' => [
                ['name' => 'Tapitas Barbacoa',  'code' => '0048',  'size' => '30ux80grs',   'shelf_life' => '8 meses',  'featured' => true],
            ],
            'Línea premium max x 100grs' => [
                ['name' => 'Pizzitos J y Q',    'code' => '02430', 'size' => '30ux100grs',  'shelf_life' => '8 meses',  'featured' => true],
            ],
            'Línea familiar tradicional' => [
                ['name' => 'Pochoclos Acaram.', 'code' => '01150', 'size' => '7ux400grs',   'shelf_life' => '12 meses', 'featured' => true],
            ],
            'Jugos' => [
                ['name' => 'Jugos Surtidos',    'code' => '346',   'size' => '3pX20uX60cc', 'shelf_life' => '12 meses', 'featured' => true],
            ],
        ];

        foreach ($productsByCategory as $categoryName => $products) {
            $category = Category::where('name', $categoryName)->first();

            if (! $category) {
                continue;
            }

            foreach ($products as $product) {
                $filename = Str::lower($product['code']);
                $product['image'] = SeedImageHelper::copy('products', $filename, 'products');

                Product::updateOrCreate(
                    ['code' => $product['code']],
                    array_merge($product, ['category_id' => $category->id])
                );
            }
        }
    }
}
