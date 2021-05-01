<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockedBook extends Model
{
    use HasFactory;

    public function reservedBooks(){
        return $this->hasMany(ReservedBook::class);
    }
}
