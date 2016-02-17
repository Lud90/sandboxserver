<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sandbox extends Model
{
    protected $table = 'sandboxes';
    protected $hidden = array('pivot');
    protected $fillable = ['name', 'address', 'email', 'url'];
    public $timestamps = false;

    public function news(){
        return $this->belongsToMany('\App\News');
    }

    public function events(){
        return $this->belongsToMany('\App\Event');
    }
}
