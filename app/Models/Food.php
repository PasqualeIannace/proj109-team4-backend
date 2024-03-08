<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory;
    use SoftDeletes; // Add this line to enable soft deletes

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
        return $this->belongsToMany(Order::class, 'food_orders')->withPivot('quantity'); //, 'food_order', 'food_id', 'order_id'
    }
}
