<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedBook extends Model
{
    use HasFactory;

    public function stockedBook(){
        return $this->belongsTo(StockedBook::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reservedBook(){
        return $this->hasOne(ReservedBook::class);
    }

}
