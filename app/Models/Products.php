<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id','name','description','category_id','color_id',
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariants::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function bills()
    {
        return $this->belongsToMany(Bill::class);
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_variants','product_id', 'size_id')->withTimestamps();
    }
    
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_variants','product_id', 'size_id')->withTimestamps();
    }
}
