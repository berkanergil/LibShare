<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EBook extends Model
{
    use HasFactory;

    protected $fillable =[
        "e_book_request_id",
        "librarian_id",
        "category_id",
        "title",
        "author",
        "publish_date",
        "language",
        "description",
        "image",
        "file"
    ];

    public function e_book_request(){
        return $this->belongsTo(EBookRequest::class);
    }

    public function librarian(){
        return $this->belongsTo(Librarian::class);
    }
}
