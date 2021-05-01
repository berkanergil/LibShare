<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedBook extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function stockedBook(){
        return $this->belongsTo(StockedBook::class);
    }

    public function penalizedReservation(){
        return $this->belongsTo(PenalizedRezervation::class);
    }
}
