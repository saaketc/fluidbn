<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Balping\HashSlug\HasHashSlug;
class Theory extends Model {

   
  use HasHashSlug;
  protected static $minSlugLength = 10;
  
  
 public function writtenBy(){
    return $this->belongsTo('App\User','user_id');
}

public function likedBy(){
    return $this->belongsToMany('App\User','like_theory','theory_id','user_id')->withTimestamps();
}


public function bookmarkedBy(){
    return $this->belongsToMany('App\User','bookmark_theory','theory_id','user_id')->withTimestamps();
}




public function viewedBy(){
    return $this->belongsToMany('App\User','user_views_theory','theory_id','viewer_id')->withTimestamps();
}

}
