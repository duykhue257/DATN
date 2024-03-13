<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = [
        'user_id', 
        'name',
        'phone',
        'province',
        'district',
        'ward',
        'detail',
        'status_id',
        'payment_id',
        'shipping_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}

