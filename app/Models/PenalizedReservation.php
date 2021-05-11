<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenalizedReservation extends Model
{
    use HasFactory;

    public function reservedBook(){
        return $this->hasOne(ReservedBook::class);
    }

    public function bill(){
        return $this->belongsTo(Bill::class);
    }
}
