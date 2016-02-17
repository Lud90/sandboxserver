<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'content', 'url', 'start_time', 'end_time'];
    protected $hidden = array('pivot');

    public function sandboxes(){
        return $this->belongsToMany('\App\Sandbox');
    }
}
