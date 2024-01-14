<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    use Translatable;

    protected $with = ['translations'];
    protected $translatedAttributes = [
        'name'
    ];
    protected $fillable = [
        'address',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_stores')
            ->withPivot('quantity', 'price');
    }
}
