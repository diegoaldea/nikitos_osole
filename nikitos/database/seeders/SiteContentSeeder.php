<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            'hero_title' => 'Snacks que te acompañan',
            'hero_subtitle' => 'Descubrí nuestra línea completa de productos pensados para disfrutar en cualquier momento del día.',
            'nosotros_title' => 'Conocenos',
            'nosotros_text' => 'En Nikitos llevamos más de 30 años elaborando snacks de calidad para toda la familia. Combinamos tradición e innovación para ofrecer productos ricos, saludables y al alcance de todos.',
        ];

        foreach ($contents as $key => $value) {
            SiteContent::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
