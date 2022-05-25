<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRateAttribute()
    {
        if ($this->reviews->count() > 0) {
            return $this->reviews->avg('rate');
        }
        return 0;
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_category_details', 'product_id', 'category_id');
    }

    public function category()
    {
        return $this->belongsToMany(ProductCategoryDetail::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'carts');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function isHasDicount()
    {
        return $this->discount ? true : false;
    }

    public function price_discount()
    {
        return (1 - $this->discount->percentage / 100) * $this->price;
    }

    public function getImageAttribute()
    {
        if ($this->images->count() > 0) {
            return $this->images->first()->image_name;
        }
        return 'https://via.placeholder.com/250';
    }
}