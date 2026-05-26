<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        $recipes = [
            [
                'title' => 'Snack mix para picada',
                'preparation_time' => 10,
                'servings' => 4,
                'ingredients' => [
                    '1 paquete de Papas Clásicas',
                    '1 paquete de Maní Japonés',
                    '1 paquete de Palitos Salados',
                    'Aceitunas verdes a gusto',
                    'Cubos de queso a gusto',
                ],
                'steps' => [
                    'Mezclar los snacks en un bowl grande.',
                    'Agregar aceitunas y cubos de queso.',
                    'Servir frío y disfrutar con amigos.',
                ],
            ],
            [
                'title' => 'Trail mix energético',
                'preparation_time' => 5,
                'servings' => 2,
                'ingredients' => [
                    '100g de Mix Frutos Secos',
                    '50g de Garrapiñadas',
                    'Pasas de uva a gusto',
                ],
                'steps' => [
                    'Combinar todos los ingredientes en un recipiente.',
                    'Repartir en bolsitas individuales.',
                    'Ideal para llevar al trabajo o al gimnasio.',
                ],
            ],
            [
                'title' => 'Pochoclos gourmet',
                'preparation_time' => 15,
                'servings' => 3,
                'ingredients' => [
                    '1 paquete de Pochoclos Dulces',
                    '50g de chocolate derretido',
                    'Almendras tostadas en trozos',
                ],
                'steps' => [
                    'Derretir el chocolate a baño maría.',
                    'Bañar los pochoclos con el chocolate.',
                    'Espolvorear las almendras y dejar enfriar 10 minutos.',
                ],
            ],
        ];

        foreach ($recipes as $recipe) {
            Recipe::updateOrCreate(['title' => $recipe['title']], $recipe);
        }
    }
}
