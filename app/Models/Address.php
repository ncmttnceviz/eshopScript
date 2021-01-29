<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        "userID",
        "addressTitle",
        "addressDescription",
        "province",
        "district",
        "zipCode",
        "country"
    ];

}
