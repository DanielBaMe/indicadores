<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuarios extends Authenticatable
{
    public $timestamps = false;
    protected $table = 'users';
    protected $hidden = ['password'];
    use HasApiTokens, Notifiable;
}
