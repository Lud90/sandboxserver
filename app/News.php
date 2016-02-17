<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title', 'author', 'content', 'url', 'publish_at'];
    protected $hidden = array('pivot');

    public function sandboxes(){
        return $this->belongsToMany('\App\Sandbox');
    }
}
