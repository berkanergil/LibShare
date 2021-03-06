<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        "manager_id",
        "title"
    ];

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function e_books(){
        return $this->hasMany(EBook::class);
    }

    public function e_book_requests(){
        return $this->hasMany(EBookRequest::class);
    }

    public function manager(){
        return $this->belongsTo(Manager::class);
    }
}
