<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Inertia\Inertia;
use App\Models\Recipe;

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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'preparation_time' => 'required|integer|min:1',
            'servings' => 'required|integer|min:1',
            'ingredients' => 'required|array|min:1',
            'steps' => 'required|array|min:1',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipes', 'public');
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

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'preparation_time' => 'required|integer|min:1',
            'servings' => 'required|integer|min:1',
            'ingredients' => 'required|array|min:1',
            'steps' => 'required|array|min:1',
        ]);

        $imagePath = $recipe->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipes', 'public');
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
        $recipe->delete();

        return redirect()->route('admin.recipes.index')->with('success', 'Receta eliminada correctamente.');
    }
}
