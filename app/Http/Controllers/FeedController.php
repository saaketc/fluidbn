<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Article;
use App\Theory;
use App\User;
use App\Profile;
use App\Search;
use App\Genre;
use App\Studio\StudioStories;
use Session;
use Hash;


class FeedController extends Controller
{
    
   
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug=NULL)
    {
      
         $user = Auth::user();
             $user_genre = $user->hasGenre()->wherePivot('user_id',$user->id)->get();
       $id = [];
        $genre = Genre::orderBy('id')->get();

   
       foreach( $user_genre as $g){
          
           $id[] = $g->id;
       }
       if(!($user->remember_token)){
        $heading = ucfirst($user->fname) .", enjoy feed curated for you with ";
    }
       else{
           $heading = '';
       } 
        $theory = Theory::latest()->where('user_id','!=',$user->id)->with('writtenBy')->paginate(12);
        $article = Article::latest()->where('finished',1)->where('user_id','!=',$user->id)->whereNotIn('genre_id',$id)->where('views','>=',5)->with(['writtenBy','ofGenre'])->paginate(12);
        $tailored = Article::latest()->where('finished',1)->where('user_id','!=',$user->id)->whereIn('genre_id',$id)->where('views','>=',5)->with(['writtenBy','ofGenre'])->paginate(12);
 $story = StudioStories::orderBy('id','desc')->get();
        $followed_users = $user->follows()->wherePivot('follower_id',$user->id)->get();
        $latest_studio_story = StudioStories::orderBy('id','desc')->first();
        $latest_story = Article::orderBy('id','desc')->where('views','>=',5)->first();
        $latest_theory = Theory::orderBy('id','desc')->first();
       // to genre selection 
       $genres = Genre::with(['genreOf','hasArticles','hasStories'])->get();
        $selectGenre=[];
        foreach($genres as $g){
            $selectGenre[$g->id] = $g->name;
        }
        
       $data = [
           'article'=>$article,
           'theory'=>$theory,
           'user'=>$user,
           'tailored'=>$tailored,
           'story'=>$story,
           'genre'=>$genre,
         'slug'=>$slug,
         'latest_studio_story'=>$latest_studio_story,
         'latest_story'=> $latest_story,
         'latest_theory'=>$latest_theory,
         'heading'=>$heading,
              
          
       ];
        
         return view('feed')->with($data)->with( 'selectGenre',$selectGenre);

       }

      
        public function all_choices(){
            
        $genre = Genre::orderBy('id')->get();

        $data = [
            'genre'=>$genre,
            ];
      
       return view('all_story_choices')->with($data);
            
        }
        
        public function followingStory(){
            if(Auth::user()){
            $user = Auth::user();
            $following = $user->follows()->wherePivot('follower_id',$user->id)->get();
            
            $id=[];
            foreach($following as $f){
                $id[] = $f->id;
            }
            $follow_story = Article::latest()->where('finished',1)->where('user_id','!=',$user->id)->whereIn('user_id',$id)->with(['writtenBy','ofGenre'])->paginate(12);
            $follow_theory = Theory::latest()->where('user_id','!=',$user->id)->whereIn('user_id',$id)->with('writtenBy')->paginate(12);
            
            $same_place ='';
            if($user->hasProfile->college){
                $same_place = ucfirst($user->hasProfile->college);
            }
            elseif($user->hasProfile->company){
                 $same_place = ucfirst($user->hasProfile->company);
            }
            
            $data = [
                'follow_story'=>$follow_story,
                'follow_theory'=>$follow_theory,
                'same_place'=>$same_place,
                'user'=>$user
                
                ];
            return view('User.curated_story')->with($data);
            }
            else
            return "
            <div class='row'>
            <div class='col-md-6'>
            <h1>Looks like something went wrong, cache is cleared <a href='https://www.fluidbn.com'><strong> go to fluidbn</strong></a></h1>
            </div>
            </div>
            ";
        }
        
        public function followPeople(){
            
            
            
            $user = Auth::user();
            $same_place ='';
            $id = [];
            if($user->hasProfile->college){
                $same_place = ucfirst($user->hasProfile->college);
                $follow_profile = Profile::where('college',$same_place)->where('user_id','!=',$user->id)->get();
                foreach($follow_profile as $f){
                    $id[]=$f->user_id;
                }
                $follow_people = User::whereIn('id',$id)->paginate(10);
            }
            elseif($user->hasProfile->company){
                 $same_place = ucfirst($user->hasProfile->company);
                 $follow_profile = Profile::where('company',$same_place)->where('user_id','!=',$user->id)->get();
                  foreach($follow_profile as $f){
                    $id[]=$f->user_id;
                }
                $follow_people = User::whereIn('id',$id)->paginate(10);
            }
            
            
              $data = [
                'follow_people'=> $follow_people,
                'same_place'=>$same_place,
                'user'=>$user,
                'id'=>$id
                
                ];
              //dd($follow_people);  
            return view('User.follow_people')->with($data);
        }
      

      
      
    }