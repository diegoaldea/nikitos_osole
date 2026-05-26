<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::withCount('products')->get();

        return Inertia::render('Products/Index', [
            'categories' => $categories,
        ]);
    }

    public function showCategory(Category $category){
        $categories = Category::all();
        $products = Product::where('category_id', $category->id)->with('category')->get();

        return Inertia::render('Products/Category', [
            'category' => $category,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function show(Product $product){
        $product->load('category');

        return Inertia::render('Products/Show', [
            'product' => $product,
        ]);
    }
}
