<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable = [
        "name_surname",
        "address",
        "phone_number",
        "email",
    ];

    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }
}
