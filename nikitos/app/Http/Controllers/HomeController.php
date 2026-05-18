<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\SiteContent;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $featured_products = Product::where('featured', true)->with('category')->get();
        $recipes = Recipe::take(3)->get();
        $contents = SiteContent::pluck('value', 'key');

        return Intertia::render('Home', [
            'categories' => $categories,
            'featured_products' => $featured_products, 
            'recipes' => $recipes, 
            'contents' => $contents, 
        ]);
    }
}
