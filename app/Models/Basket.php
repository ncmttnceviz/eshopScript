<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        "userID",
        "productID",
        "numberOfProducts",
        "addressID",
        "token"
    ];

}
