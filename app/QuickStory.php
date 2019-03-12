<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuickStory extends Model
{
    // to see who wrote quick stories
     public function quickStoryWrittenBy(){
         return $this->belongsTo('App\User','user_id');
     }
}
