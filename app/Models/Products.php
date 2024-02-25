<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id','name','image','description','price','quantity','category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function bills()
    {
        return $this->belongsToMany(Bill::class);
    }
}
