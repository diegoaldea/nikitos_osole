<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'preparation_time',
        'servings',
        'ingredients',
        'steps',
    ];

    protected $casts = [
        'ingredients' => 'array',
        'steps' => 'array',
    ];
}
