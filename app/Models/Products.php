<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','name','price','id_cate'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
