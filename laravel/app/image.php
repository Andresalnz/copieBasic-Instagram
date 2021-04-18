<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = 'images';

    //relacion 1:M
    public function comments(){
        return $this->hasMany ('App\Comment')->orderBy('id','desc');
    }

    //relacion M:1
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    //1:M
    public function likes(){
        return $this->hasMany('App\like');
    }
}
