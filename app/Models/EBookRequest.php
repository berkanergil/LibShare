<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EBookRequest extends Model
{
    use HasFactory;

    protected $fillable =[
        "user_id",
        "category_id",
        "title",
        "author",
        "publish_date",
        "language",
        "description",
        "image"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function e_book(){
        return $this->hasOne(EBook::class);
    }
}
