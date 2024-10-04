<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;
    
    protected $table = "box";

    protected $fillable = [
        "name",
        "address",
        "code",
        "city",
        "country",
        "rent",
    ];
}
