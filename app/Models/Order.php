<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = 
    [
        'user_id',
        'message', 
        'order_date',
        'total_price',
    ];


    public function food()
    {
        return $this->belongsToMany(Food::class); // , 'food_order', 'order_id', 'food_id'
    }
}


