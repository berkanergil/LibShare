<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Librarian extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'librarians';
    protected $guarded = array();

    protected $fillable = [
        "manager_id",
        'name',
        'surname',
        'username',
        "password",
        "email"
    ];

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function manager(){
        return $this->belongsTo(Manager::class);
    }

}
