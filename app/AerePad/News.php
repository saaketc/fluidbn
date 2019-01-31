<?php

namespace App\AerePad;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function broadcastedBy(){
        return $this->belongsTo('App\AerePadUser','aere_pad_user_id');
    }
}
