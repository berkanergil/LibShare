<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable =[
        "librarian_id",
        "category_id",
        "title",
        "author",
        "publish_date",
        "language",
        "description",
        "image",
        "stock_number"
    ];

    public $timestamps = true;

    public function stockedBooks(){
        return $this->hasMany(StockedBook::class);
    }

    public function category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }

    public function librarian(){
        return $this->belongsTo(Librarian::class,"librarian_id","id");
    }
}
