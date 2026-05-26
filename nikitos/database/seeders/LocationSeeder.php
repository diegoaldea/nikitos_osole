<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            ['province' => 'Buenos Aires',  'city' => 'CABA',           'latitude' => -34.6037,  'longitude' => -58.3816],
            ['province' => 'Buenos Aires',  'city' => 'La Plata',       'latitude' => -34.9215,  'longitude' => -57.9545],
            ['province' => 'Buenos Aires',  'city' => 'Mar del Plata',  'latitude' => -38.0055,  'longitude' => -57.5426],
            ['province' => 'Córdoba',       'city' => 'Córdoba',        'latitude' => -31.4201,  'longitude' => -64.1888],
            ['province' => 'Santa Fe',      'city' => 'Rosario',        'latitude' => -32.9442,  'longitude' => -60.6505],
            ['province' => 'Mendoza',       'city' => 'Mendoza',        'latitude' => -32.8895,  'longitude' => -68.8458],
        ];

        foreach ($locations as $location) {
            Location::updateOrCreate(
                ['province' => $location['province'], 'city' => $location['city']],
                $location
            );
        }
    }
}
