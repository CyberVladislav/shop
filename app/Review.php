<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   
    public function childComments()
    {
        return Review::where('parent_id', $this->id)->get();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
