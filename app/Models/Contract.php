<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = "contracts";

    protected $fillable = [
        "start_date",
        "end_date",
        "monthly_price",
        "box_id",
        "tenant_id",
        "user_id"
    ];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
