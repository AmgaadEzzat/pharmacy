<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    use Translatable;

    protected $with = ['translations'];
    protected $translatedAttributes = [
        'name'
    ];
    protected $fillable = [
        'address',
        'phone'
    ];

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_pharmacies')
            ->withPivot('product_id', 'quantity', 'price');
    }
}
