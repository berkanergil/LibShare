<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedBook extends Model
{
    use HasFactory;

    public function savedBook(){
        return $this->belongsTo(SavedBook::class);
    }

    public function penalizedReservation(){
        return $this->belongsTo(PenalizedReservation::class);
    }
}
