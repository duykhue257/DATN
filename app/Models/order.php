<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = [
        'order_code',
        'user_id', 
        'name',
        'phone',
        'province',
        'district',
        'ward',
        'detail',
        'status_id',
        'payment_id',
        'shipping_by',
        'total',
        'address',
        'note'
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Products::class);
    }
    public function status()
    {
        return $this->hasOne(OrderStatus::class,'id','status_id');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class,'id','payment_id');
    }
    public function detail_order()
    {
        return $this->hasMany(OrderDetail::class);
    }
    protected $casts = [
        'total' => 'decimal:0', 
    ];
}

