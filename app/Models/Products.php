<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id', 'name', 'price', 'price_reduced', 'description', 'category_id', 'color_id','default_image'
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariants::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function Order()
    {
        return $this->belongsToMany(Order::class);
    }

    public function bills()
    {
        return $this->belongsToMany(Bill::class);
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_variants', 'product_id', 'size_id')->withTimestamps();
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_variants', 'product_id', 'size_id')->withTimestamps();
    }
}
