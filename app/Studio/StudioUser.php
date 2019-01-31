<?php

namespace App\Studio;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Balping\HashSlug\HasHashSlug;
use Illuminate\Foundation\Auth\User as Authenticatable;


class StudioUser extends Authenticatable
{
   
    use Notifiable;
    use HasHashSlug;
    protected $guard = 'studio';
    protected static $minSlugLength = 10;

    public function hasRole(){
        return $this->hasOne('App\Studio\Role','role_id');
    }
}
