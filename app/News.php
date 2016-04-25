<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //table name must be specified because it is its own plural
    protected $table = 'news';
    
    //these fields can be filled en masse
    protected $fillable = ['title', 'author', 'content', 'url', 'publish_at'];
    
    //hide these fields in json results
    protected $hidden = array('pivot', 'created_at', 'updated_at');

    //associate this model with sandbox
    public function sandboxes(){
        return $this->belongsToMany('\App\Sandbox');
    }
}
