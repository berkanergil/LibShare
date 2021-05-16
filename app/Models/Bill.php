<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable =[
        "penalized_reservation_id",
        "card_id",
        "amount"
    ];

    public function penalizedReservation(){
        return $this->belongsTo(PenalizedReservation::class);
    }

    public function card(){
        return $this->belongsTo(Card::class);
    }
}
