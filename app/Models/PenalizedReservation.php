<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenalizedReservation extends Model
{
    use HasFactory;

    protected $fillable =[
        "reservation_id",
        "amount",
        "expired_date_number",
        "pay_status"
    ];

    public function reservedBook(){
        return $this->belongsTo(ReservedBook::class);
    }

    public function bill(){
        return $this->hasOne(Bill::class);
    }
}
