<?php

namespace App\Models;

use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id', 'name', 'price', 'price_reduced', 'description', 'category_id', 'color_id','default_image'
    ];
    public function price_reduced_numeric()
    {
        return (float) $this->price_reduced;
    }
    public function variants()
    {
        return $this->hasMany(ProductVariants::class, 'product_id');
    }
    public function comments()
    {
        return $this->hasMany(Comments::class, 'product_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function Order()
    {
        return $this->belongsToMany(Order::class);
    }

   
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_variants', 'product_id', 'size_id')->withTimestamps();
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_variants', 'product_id', 'size_id')->withTimestamps();
    }
    // cart 
    protected $casts = [
        'price' => 'decimal:2', // Định dạng kiểu dữ liệu cho trường giá
    ];
}
