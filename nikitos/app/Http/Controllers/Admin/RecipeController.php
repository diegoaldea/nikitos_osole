<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;

use Inertia\Inertia;
use App\Models\Recipe;
use App\Services\ImageOptimizer;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();

        return Inertia::render('Admin/Recipes/Index', [
            'recipes' => $recipes,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Recipes/Create');
    }

    public function store(StoreRecipeRequest $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = ImageOptimizer::store($request->file('image'), 'recipes');
        }

        Recipe::create([
            'title' => $request->title,
            'image' => $imagePath,
            'preparation_time' => $request->preparation_time,
            'servings' => $request->servings,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
        ]);

        return redirect()->route('admin.recipes.index')->with('success', 'Receta creada correctamente.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.recipes.index');
    }

    public function edit(Recipe $recipe)
    {
        return Inertia::render('Admin/Recipes/Edit', [
            'recipe' => $recipe,
        ]);
    }

    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        $imagePath = $recipe->image;

        if ($request->hasFile('image')) {
            ImageOptimizer::delete($recipe->image);
            $imagePath = ImageOptimizer::store($request->file('image'), 'recipes');
        }

        $recipe->update([
            'title' => $request->title,
            'image' => $imagePath,
            'preparation_time' => $request->preparation_time,
            'servings' => $request->servings,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
        ]);

        return redirect()->route('admin.recipes.index')->with('success', 'Receta actualizada correctamente.');
    }

    public function destroy(Recipe $recipe)
    {
        ImageOptimizer::delete($recipe->image);
        $recipe->delete();

        return redirect()->route('admin.recipes.index')->with('success', 'Receta eliminada correctamente.');
    }
}
