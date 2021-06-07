<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SavedBook extends Model
{
    use HasFactory;

    protected $fillable =[
        "user_id",
        "stocked_book_id",
        "reserve_status"
    ];

    public function stockedBook(){
        return $this->belongsTo(StockedBook::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reservedBook(){
        return $this->hasOne(ReservedBook::class);
    }

    public static function savedBooksWithAtt(){
        $books=User::find(Auth::user()->id)->savedBooks()
        ->join("stocked_books","stocked_books.id","=","saved_books.stocked_book_id")
        ->join("books","books.id","=","stocked_books.book_id")
        ->select("saved_books.id as saved_book_id","books.id as book_id","stocked_books.id as stocked_book_id","stocked_books.available_date as available_date","books.*")
        ->where("saved_books.reserve_status","=","0")
        ->paginate(200);
        return $books;
    }

    public static function savedBookWithAtt(String $saved_book_id){
        $book=User::find(Auth::user()->id)->savedBooks()
        ->join("stocked_books","stocked_books.id","=","saved_books.stocked_book_id")
        ->join("books","books.id","=","stocked_books.book_id")
        ->select("saved_books.id as saved_book_id","books.id as book_id","stocked_books.id as stocked_book_id","books.*","stocked_books.*")
        ->where("saved_books.id","=",$saved_book_id)
        ->first();
        return $book;
    }
}