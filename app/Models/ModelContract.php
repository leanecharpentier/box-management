<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelContract extends Model
{
    use HasFactory;
    
    protected $table = "models_contracts";

    protected $fillable = [
        "name",
        "content",
        "user_id"
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
