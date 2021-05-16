<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedBook extends Model
{
    use HasFactory;

    protected $fillable =[
        "saved_book_id",
        "start_date",
        "end_date"
    ];

    public function savedBook(){
        return $this->belongsTo(SavedBook::class);
    }

    public function penalizedReservation(){
        return $this->hasOne(PenalizedReservation::class);
    }
}
