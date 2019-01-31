<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Balping\HashSlug\HasHashSlug;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AerePadUser extends Authenticatable
{
    use Notifiable;
    use HasHashSlug;
    protected $guard = 'aerepad';
    protected static $minSlugLength = 10;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deskname','email', 'password','name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
 
    public function broadcasts(){
        return $this->hasMany('App\AerePad\News','aere_pad_user_id');
    }
}
