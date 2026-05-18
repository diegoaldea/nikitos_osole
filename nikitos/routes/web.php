<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\RecipeController as AdminRecipeController;
use App\Http\Controllers\Admin\LocationController as AdminLocationController;
use App\Http\Controllers\Admin\SalesMessageController;
use App\Http\Controllers\Admin\JobApplicationController;
use App\Http\Controllers\Admin\SiteContentController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/productos', [ProductController::class, 'index'])->name('products.index');
Route::get('/productos/categoria/{category}', [ProductController::class, 'showCategory'])->name('products.category');
Route::get('/productos/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/recetas', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recetas/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
Route::get('/donde-comprar', [LocationController::class, 'index'])->name('locations.index');
Route::get('/contacto', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contacto/ventas', [ContactController::class, 'storeSales'])->name('contact.sales');
Route::post('/contacto/rrhh', [ContactController::class, 'storeJob'])->name('contact.job');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', AdminProductController::class);
    Route::resource('recipes', AdminRecipeController::class);
    Route::resource('locations', AdminLocationController::class);
    Route::get('sales-messages', [SalesMessageController::class, 'index'])->name('sales-messages.index');
    Route::patch('sales-messages/{message}/read', [SalesMessageController::class, 'markAsRead'])->name('sales-messages.read');
    Route::get('job-applications', [JobApplicationController::class, 'index'])->name('job-applications.index');
    Route::patch('job-applications/{application}/read', [JobApplicationController::class, 'markAsRead'])->name('job-applications.read');
    Route::get('site-contents', [SiteContentController::class, 'index'])->name('site-contents.index');
    Route::put('site-contents', [SiteContentController::class, 'update'])->name('site-contents.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
