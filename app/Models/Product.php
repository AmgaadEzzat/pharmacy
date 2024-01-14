<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Product extends Model
{
    use HasFactory;
    use Translatable;

    protected $with = ['translations'];
    protected $translatedAttributes = [
        'name',
        'description',
    ];
    protected $fillable = [
        'sku'
    ];

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'product_stores')
            ->withPivot('quantity', 'price');
    }

}
