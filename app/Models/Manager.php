<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Manager extends Authenticatable
{
    use HasFactory;

    protected $table = 'managers';
    protected $guarded = array();

    protected $fillable = [
        "admin_id",
        'name',
        'surname',
        'username',
        "password",
        "email"
    ];
    
    public function admin(){
        return $this->hasOne(Admin::class);
    }

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function librarians(){
        return $this->hasMany(Librarian::class);
    }
}
