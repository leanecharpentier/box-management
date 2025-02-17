<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = "bills";

    protected $fillable = [
        "payment_date",
        "period_number",
        "contract_id",
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
