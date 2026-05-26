<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Inertia\Inertia;
use App\Models\Category;
use App\Services\ImageOptimizer;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();

        return Inertia::render('Admin/Categories/Index', [
            'categories' => $categories,
        ]);
    }

    
    public function create()
    {
        return Inertia::render('Admin/Categories/Create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $imagePath = null;

        if($request->hasFile('image')){
            $imagePath = ImageOptimizer::store($request->file('image'), 'categories');
        }

        Category::create([
            'name' => $request->name,
            'color' => $request->color,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Categoría creada correctamente.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return Inertia::render('Admin/Categories/Edit', [
            'category' => $category,
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $imagePath = $category->image;

        if ($request->hasFile('image')) {
            ImageOptimizer::delete($category->image);
            $imagePath = ImageOptimizer::store($request->file('image'), 'categories');
        }

        $category->update([
            'name'  => $request->name,
            'color' => $request->color,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(Category $category)
    {
        ImageOptimizer::delete($category->image);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
