<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'code',
        'size',
        'shelf_life',
        'image',
        'featured',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
