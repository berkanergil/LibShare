<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable=[
        "user_id",
        "name",
        "number",
        "expired_date",
        "cvc_number",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
