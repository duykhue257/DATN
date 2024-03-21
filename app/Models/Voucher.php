<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'voucher';
    protected $fillable = [
        'code','percent','min_price','start_at','end_at','quantity'
    ];
    protected $dates = [
        'end_at',
        
    ];
}
