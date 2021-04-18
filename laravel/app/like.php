<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $table = 'likes';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function images(){
        return $this->belongsTo('App\images','image_id');
    }
}
