<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChangePassword extends Model
{
    protected $fillable = ['email', 'ip'];

    protected $table = 'change_password';
}
