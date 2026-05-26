<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        $recipes = [
            [
                'title' => '5 minutos',
                'preparation_time' => 5,
                'servings' => 8,
                'ingredients' => [
                    [
                        'title' => null,
                        'items' => [
                            '1 bolsa de papas fritas Nikitos clásicas',
                            'Aderezo para carne (30 g)',
                            '2/3 taza de agua',
                            '340 g de queso cheddar rallado',
                            'Chiles jalapeños conservados',
                            'Cebollas conservadas',
                            'Salsa criolla',
                            'Guacamole',
                            'Crema',
                            '450 g de carne de res molida',
                        ],
                    ],
                ],
                'steps' => [
                    'Precalienta el horno a 190 °C.',
                    'Calienta el aceite en una sartén mediana a fuego medio-alto. Dora la carne molida hasta que esté completamente cocida. Agrega el aderezo para res y el agua y cocina hasta que el agua se evapore y se espese hasta formar una salsa.',
                    'En una sartén grande de hierro fundido (u otra fuente para hornear) coloca las papas fritas, carne de ternera para tacos, la mitad del queso cheddar, las cebollas conservadas, los jalapeños conservados y la otra mitad de queso cheddar.',
                    'Hornea durante 5 a 7 minutos, hasta que el queso burbujee y se derrita por completo.',
                    'Sirve con crema, salsa criolla y guacamole.',
                ],
            ],
        ];

        foreach ($recipes as $recipe) {
            $slug = Str::slug($recipe['title']);
            $recipe['image'] = SeedImageHelper::copy('recipes', $slug, 'recipes');

            Recipe::updateOrCreate(['title' => $recipe['title']], $recipe);
        }
    }
}
