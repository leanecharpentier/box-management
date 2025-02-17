<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;
    
    protected $table = "boxes";

    protected $fillable = [
        "name",
        "address",
        "code",
        "city",
        "country",
        "price",
        "owner_id"
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
