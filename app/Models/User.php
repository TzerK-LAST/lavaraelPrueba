<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // tu key = id
   protected $fillable = ['name', 
   'lastname', 
   'email', 
   'password'];
}
