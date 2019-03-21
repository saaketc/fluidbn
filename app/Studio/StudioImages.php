<?php

namespace App\Studio;

use Illuminate\Database\Eloquent\Model;

class StudioImages extends Model
{
    public function imagesOf(){
        return $this->belongsTo('App\Studio\StudioStories','story_id')->withTimestamps();
    }
}
