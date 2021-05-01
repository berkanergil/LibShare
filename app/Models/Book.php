<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function stockedBooks(){
        return $this->hasMany(StockedBook::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function librarian(){
        return $this->belongsTo(Librarian::class);
    }
}
