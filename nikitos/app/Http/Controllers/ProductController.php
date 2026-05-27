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

        $categories = Category::all();

        $categoryProducts = Product::where('category_id', $product->category_id)
            ->orderBy('id')
            ->get(['id']);

        $currentIndex = $categoryProducts->search(fn($p) => $p->id === $product->id);

        $previousProduct = $currentIndex > 0
            ? Product::with('category')->find($categoryProducts[$currentIndex - 1]->id)
            : null;

        $nextProduct = $currentIndex < $categoryProducts->count() - 1
            ? Product::with('category')->find($categoryProducts[$currentIndex + 1]->id)
            : null;

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with('category')
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return Inertia::render('Products/Show', [
            'product' => $product,
            'categories' => $categories,
            'previousProduct' => $previousProduct,
            'nextProduct' => $nextProduct,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
