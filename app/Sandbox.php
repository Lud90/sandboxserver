<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sandbox extends Model
{
    //atypical plural, so we must specify table name
    protected $table = 'sandboxes';
    
    //hide these fileds in json results
    protected $hidden = array('pivot');
    
    //fields that can be filled en masse
    protected $fillable = ['name', 'address', 'email', 'url'];
    
    //don't use timestamps for this table
    public $timestamps = false;

    //associate sandboxes with news
    public function news(){
        return $this->belongsToMany('\App\News');
    }

    //associate sandboxes with events
    public function events(){
        return $this->belongsToMany('\App\Event');
    }
}