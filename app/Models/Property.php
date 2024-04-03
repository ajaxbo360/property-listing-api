<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;



    protected $fillable = [
        'broker_id',
        'description',
        'address',
        'city',
        'zip_code',
        'listing_type',
        'build_year'
    ];


    public function characteristic()
    {
        return $this->hasOne(Property_Characteristics::class);
    }
}
