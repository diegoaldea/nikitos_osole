<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            ['key' => 'hero_title',         'type' => 'text',  'value' => 'Nikitos Snacks'],
            ['key' => 'hero_subtitle',      'type' => 'text',  'value' => 'Nikitos se encuentra presente en el mercado local desde hace 40 años.'],
            ['key' => 'nosotros_title',     'type' => 'text',  'value' => 'Nosotros'],
            ['key' => 'nosotros_text',      'type' => 'text',  'value' => 'Nikitos se encuentra presente en el mercado local desde hace 40 años. Ofreciendo un variado portfolio de snacks , tales como Pizzitos, Palitos salados, Maikitos de Queso, Papas Fritas, Cereales, Pochoclos Acaramelados, Bolitas/Aritos dulces, y Jugos para Congelar. El objetivo es llegar a los consumidores con ingredientes de calidad, contando con presencia de venta en todo el país y atención de excelencia.'],
            ['key' => 'about_hero_image',   'type' => 'image', 'value' => null],
            ['key' => 'about_1_image',      'type' => 'image', 'value' => null],
            ['key' => 'about_2_image',      'type' => 'image', 'value' => null],
            ['key' => 'about_3_image',      'type' => 'image', 'value' => null],
            ['key' => 'about_4_image',      'type' => 'image', 'value' => null],
        ];

        foreach ($contents as $content) {
            SiteContent::updateOrCreate(['key' => $content['key']], $content);
        }
    }
}
