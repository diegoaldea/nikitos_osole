<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\Location;
use App\Models\SalesMessage;
use App\Models\JobApplication;

class DashboardController extends Controller
{
    public function index(){
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'categories' => Category::count(),
                'products' => Product::count(),
                'recipes' => Recipe::count(),
                'locations' => Location::count(),
                'sales_messages' => SalesMessage::where('read', false)->count(),
                'job_applications' => JobApplication::where('read', false)->count(),
            ]
        ]);
    }
}
