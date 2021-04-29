<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Librarian extends Authenticatable
{
    use HasFactory;

    protected $table = 'librarians';
    protected $guarded = array();

    protected $fillable = [
        "admin_id",
        'name',
        'surname',
        'username',
        "password",
        "email"
    ];


}
