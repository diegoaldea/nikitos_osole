<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'business_name',
        'cuit',
        'business_type',
        'market_experience',
        'address',
        'city',
        'phone',
        'mobile',
        'business_hours',
        'email',
        'observations',
        'read',
    ];

    protected $casts = [
        'read' => 'boolean',
    ];
}