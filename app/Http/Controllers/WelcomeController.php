<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notification;
use App\Article;
use App\User;
use App\Genre;
use App\Notifications\UserFollowedStory;
use Auth;
use Session;
use App\ArticleImage;
use App\Comments;
use Image;
use App\Studio\StudioStories;
class WelcomeController extends Controller
{


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    
     public function welcome(){

          $genre = Genre::orderBy('id')->get();

       $data=[
            'genre'=>$genre
           
        ];
        return view('welcome')->with($data);
     }
}     