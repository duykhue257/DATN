<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ProductVariants extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'product_variants';
    protected $fillable = [
        'id', 'image', 'quantity', 'color_id', 'size_id', 'product_id','deleted_at'
    ];

    public function carts()
    {
        return $this->belongsToMany(Order::class);
    }


    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function sizes()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function colors()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function subtotal()
    {
        return $this->price_reduced * $this->quantity;
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($variant) {
            // Xóa các bản ghi liên quan trong bảng order_detail
            DB::table('order_detail')->where('product_variant_id', $variant->id)->delete();
        });
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_variant_id');
    }
}
