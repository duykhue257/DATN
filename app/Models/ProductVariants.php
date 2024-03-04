<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    use HasFactory;
    protected $table = 'product_variants';
    protected $fillable = [
        'id','image','quantity','color_id','size_id','product_id'
    ];
   
    public function carts()
    {
        return $this->belongsToMany(Order::class);
    }

    public function bills()
    {
        return $this->belongsToMany(Bill::class);
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function sizes()
    {
        return $this->belongsTo(Size::class,'size_id');
    }

    public function colors()
    {
        return $this->belongsTo(Color::class,'color_id');
    }
}
