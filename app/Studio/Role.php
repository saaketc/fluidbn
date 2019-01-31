<?php

namespace App\Studio;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function roleOf(){
        return $this->hasOne('App\Studio\StudioUser','role_id');
    }
}
