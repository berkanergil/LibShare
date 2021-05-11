<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockedBook extends Model
{
    use HasFactory;

    protected $fillable=[
        "book_id",
        "available_date"
    ];

    public function savedBooks(){
        return $this->hasMany(SavedBook::class);
    }

    public function book(){
        return $this->hasOne(Book::class);
    }
}
