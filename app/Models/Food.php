<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'image',
        'name',
        'ingredients',
        'description',
        'price',
        'visible',
        'user_id'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity'); //, 'food_order', 'food_id', 'order_id'
    }
}
