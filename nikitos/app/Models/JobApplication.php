<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'dni',
        'birth_date',
        'address',
        'city',
        'phone',
        'email',
        'position',
        'cv_path',
        'read',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'read'       => 'boolean',
    ];
}