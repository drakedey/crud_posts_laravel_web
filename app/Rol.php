<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    
    public const ADMIN = "ADMIN";
    public const USER = "USER";

    protected $table = "role";

    protected $fillable = [
        'name'
    ];

    public function users() {
        return $this->hasMany('App\Rol');
    }
}
