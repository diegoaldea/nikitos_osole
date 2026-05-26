<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use App\Services\ImageOptimizer;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        return Inertia::render('Admin/Products/Index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return Inertia::render('Admin/Products/Create', [
            'categories' => $categories,
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = ImageOptimizer::store($request->file('image'), 'products');
        }

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'code' => $request->code,
            'size' => $request->size,
            'shelf_life' => $request->shelf_life,
            'image' => $imagePath,
            'featured' => $request->boolean('featured'),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Producto creado correctamente.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return Inertia::render('Admin/Products/Edit', [
            'product'    => $product->load('category'),
            'categories' => $categories,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $imagePath = $product->image;

        if ($request->hasFile('image')) {
            ImageOptimizer::delete($product->image);
            $imagePath = ImageOptimizer::store($request->file('image'), 'products');
        }

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'code' => $request->code,
            'size' => $request->size,
            'shelf_life' => $request->shelf_life,
            'image' => $imagePath,
            'featured' => $request->boolean('featured'),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        ImageOptimizer::delete($product->image);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado correctamente.');
    }
}
