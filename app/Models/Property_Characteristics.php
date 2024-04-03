<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_Characteristics extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'price',
        'sqft',
        'price_sqft',
        'bedrooms',
        'bathrooms',
        'property_type',
        'status'
    ];
}
