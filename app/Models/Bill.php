<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public function penalizedReservation(){
        return $this->hasOne(PenalizedReservation::class);
    }

    public function card(){
        return $this->hasOne(Card::class);
    }
}
