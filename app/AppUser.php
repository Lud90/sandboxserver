<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
	protected $fillable = array('firstname', 'lastname', 'email', 'password');
}
