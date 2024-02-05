<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'price',
        'user_id',
        'status',
        'stock'
        
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function productImages() : HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function order() : HasMany
    {
        return $this->hasMany(Order::class);
    }

}
