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
        //qui avevo inserito 'user_id' ma non esiste questa colonna D
        //'customer_id',
        'message', 
        'order_date',
        'total_price',
    ];


    public function foods()
    {
        return $this->belongsToMany(Food::class)->withPivot('quantity');; // , 'food_order', 'order_id', 'food_id'
    }
}


