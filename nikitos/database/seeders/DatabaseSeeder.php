<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SiteContentSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            RecipeSeeder::class,
            LocationSeeder::class,
        ]);
    }
}
