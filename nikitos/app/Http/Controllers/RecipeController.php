<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index(){
        $recipes = Recipe::all();

        return Inertia::render('Recipes/Index', [
            'recipes' => $recipes,
        ]);
    }

    public function show(Recipe $recipe){
        return Inertia::render('Recipes/Show', [
            'recipe' => $recipe,
        ]);
    }
}
