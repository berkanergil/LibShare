<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'admins';
    protected $guarded = array();

    protected $fillable = [
        "phone_number",
        'name',
        'surname',
        'username',
        "password",
        "email"
    ];


    public function managers(){
        return $this->hasMany(Manager::class);
    }
    
}
