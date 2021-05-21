<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function reservedBooksWithAtt(){
        $books=User::find(Auth::user()->id)->savedBooks()
        ->join("reserved_books","reserved_books.saved_book_id","=","saved_books.id")
        ->join("stocked_books","stocked_books.id","=","saved_books.stocked_book_id")
        ->join("books","books.id","=","stocked_books.book_id")
        ->select("saved_books.id as saved_book_id","books.id as book_id","stocked_books.id as stocked_book_id","reserved_books.id as reserved_book_id","books.*","stocked_books.*","reserved_books.*")
        ->paginate(2);
        return $books;
    }

}