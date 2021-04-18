<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comments';

    public function user(){
        return $this->belongsTo('App\user_id','user_id');
    }

    public function images(){
        return $this->belongsTo('App\images','image_id');
    }




}
