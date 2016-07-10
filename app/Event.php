<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //these fields can be filled en masse
    protected $fillable = ['title', 'content', 'url', 'start_time', 'end_time', 'tags'];

    //don't show these fields in json results
    protected $hidden = array('pivot', 'created_at', 'updated_at', 'publish_at');

    //associate this model with sandboxes
    public function sandboxes(){
        return $this->belongsToMany('\App\Sandbox');
    }
}
