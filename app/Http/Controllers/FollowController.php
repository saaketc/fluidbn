<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use Session;
use Auth;
use App\Notifications\UserFollowed;
use App\Notifications\UserLiked;
use App\Studio\StudioStories;
class FollowController extends Controller
{
    public function follow(Request $request){
         
        $user = Auth::user();
        $otheruser = User::find($request['userId']);
      
     
        $follow = $user->follows()->wherePivot('follower_id',$user->id)->wherePivot('following_id',$otheruser->id)->first();
       if($follow){
       
           return null;
       }
       else{
           $user->follows()->attach($otheruser);
           if($otheruser->id!=$user->id){
           $otheruser->notify(new UserFollowed($user));
           }
            
       
           $followers = $otheruser->follows()->wherePivot('following_id',$otheruser->id)->count();
           // to eliminate already following from follow suggestion
           $alfol = [];
           $already_following = $user->follows()->wherePivot('follower_id',$user->id)->get();
           foreach($already_following as $af){
              $alfol[] = [$af->id]; 
           }
          $follow_sugg = $otheruser->follows()->wherePivot('follower_id',$otheruser->id)->wherePivot('following_id','!=',$user->id)->wherePivot('following_id','!=',$otheruser->id)->wherePivotIn('following_id',$alfol,'and','NotIn')->orderBy('id','desc')->limit(5)->get();
        $count = $otheruser->follows()->wherePivot('follower_id',$otheruser->id)->wherePivot('following_id','!=',$user->id)->wherePivot('following_id','!=',$otheruser->id)->wherePivotIn('following_id',$alfol,'and','NotIn')->count();
     
       if($count>0)
            $output = '
            
                        
             
             
            ';
       else 
          $output = '';
            foreach($follow_sugg as $key => $fs){
                
               $url = '/storage/profile_images/thumbnails/'.$fs->hasProfile->profile_image; 
                $url1 =route('profile',['user'=>$fs,'slug'=>str_slug($fs->fname." ".$fs->lname)]);
                $output.="<tr>".
                 
                '<td>'.'<a href="'.$url1.'" ><img class="featurette-image img-fluid mx-auto  propic-small" src="'.$url.'" alt=""> '.ucfirst($fs->fname).' '.ucfirst($fs->lname).' </a>'.'</td>'.
               "</tr>";
                
            }
            return response()->json(['output'=>$output,'count'=>$count]);
        
       }
    }
 


    public function unfollow(Request $request){
        $user = Auth::user();
        $id = $user->id;
        $f = ucfirst($user->fname);
        $l = ucfirst($user->lname);
        $msg = $f.' '.$l.' followed you';
        
        $m = '{"follower_id":'.$id.',"follower_fname":"'.$f.'","follower_lname":"'.$l.'","message":"'.$msg.'"}';
        
        $otheruser = User::find($request['userId']);
        
           $user->follows()->detach($otheruser);
        
           $otheruser->notifications()->where('notifiable_id',$otheruser->id)->where('type','App\Notifications\UserFollowed')->where('data',$m)->delete();   
        return response(null);
       
    }


    public function like(Request $request){

           $article_id = $request['articleId'];
           $writer_id =  $request['userId'];
           $fbnstory = StudioStories::find($article_id );
           $article = Article::find($article_id);
           $writer = User::find($writer_id);
           $user = Auth::user();
           $like = $user->likes()->wherePivot('user_id',$user->id)->wherePivot('article_id', $article_id)->first();
          $likeFs = $user->likesFs()->wherePivot('user_id',$user->id)->wherePivot('story_id', $article_id)->first();
          
           if($like){
               return null;
           }
           else{
                
            $user->likes()->attach( $article);
            
           if($writer->id!=$user->id){
                   $writer->notify(new UserLiked($user,$article));
                 }
             $wows  = $article->likedBy()->wherePivot('article_id', $article_id)->count();
             if($wows>1)
             $w = ' wows';
             else
             $w = ' wow'; 
             $data = [
               'wows'=>'  '.$wows.$w
             ];

            
           return response()->json($data);
            
           }
            if($likeFs){
               return null;
           }
           else{
                
           $user->likesFs()->attach($fbnstory);
          
           }
          
        }
        public function unlike(Request $request){

            $article_id = $request['articleId'];
            $article = Article::find($article_id);
            $fbnstory = StudioStories::find($article_id );
             $writer_id =  $request['userId'];
        
           $writer = User::find($writer_id);
            $user = Auth::user();
                $id = $user->id;
             $f = $user->fname;
              $l = $user->lname;
              $t = $article->title;
              $msg = ucfirst($f).' '.ucfirst($l).' liked your story';
              
            $m = '{"user_id":'.$id.',"user_fname":"'.$f.'","user_lname":"'.$l.'","article_title":"'.$t.'","article_id":'.$article_id.',"message":"'.$msg.'"}';
          
             $user->likesFs()->detach($fbnstory);   
             $user->likes()->detach( $article);
             
              $writer->notifications()->where('notifiable_id',$writer->id)->where('type','App\Notifications\UserLiked')->where('data',$m)->delete();
             
             $wows  = $article->likedBy()->wherePivot('article_id', $article_id)->count();
             if($wows>1)
             $w = ' wows';
             else
             $w = ' wow'; 
             $data = [
               'wows'=>'  '.$wows.$w
             ];
           return response()->json($data);
              
 
            
         }
         public function bookmark(Request $request){
            $article_id = $request['articleId'];
            $article = Article::find($article_id);
            $user = Auth::user();
            $bookmark = $user->bookmarks()->wherePivot('user_id',$user->id)->wherePivot('article_id', $article_id)->first();
           
            if($bookmark){
                return null;
            }
            else{
             $user->bookmarks()->attach( $article);
 
            }
         }
       
         public function unmark(Request $request){
            $article_id = $request['articleId'];
            $article = Article::find($article_id);
            $user = Auth::user();
            $user->bookmarks()->detach($article);
          
         }
         public function showBookmark(){
             
           if(Auth::user()){
                $user = Auth::user();
                $user_bookmarks = $user->bookmarks()->wherePivot('user_id',$user->id)->latest()->get();
                $user_studio_bookmarks = $user->bookmarksfs()->wherePivot('user_id',$user->id)->latest()->get();
               $data = [
                'user_bookmarks'=>$user_bookmarks,
                'user_studio_bookmarks'=>$user_studio_bookmarks
               ];
                $bookmark_view = view('User.bookmarks')->with($data);
                return   $bookmark_view ;
            } 
            else
            return "
            <div class='row'>
            <div class='col-md-6'>
            <h1>Looks like something went wrong <a href='https://www.fluidbn.com'><strong> go to fluidbn</strong></a></h1>
            </div>
            </div>
            ";
             
       
         }
         
         // for studio stories

         // like function
         public function likeFbnStory(Request $request){
             
            $article_id = $request['articleId'];
       
           $fbnstory = StudioStories::find($article_id );
         
           $user = Auth::user();
         
          $likeFs = $user->likesFs()->wherePivot('user_id',$user->id)->wherePivot('story_id', $article_id)->first();
          if($likeFs){
            return null;
        }
        else{
             
        $user->likesFs()->attach($fbnstory);
       
        
          
             $wows  =  $fbnstory->likedBy()->wherePivot('story_id', $article_id)->count();
             if($wows>1)
             $w = ' wows';
             else
             $w = ' wow'; 
             $data = [
               'wows'=>'  '.$wows.$w
             ];

            
           return response()->json($data);
            
           }
         
         }
         public function unlikeFbnStory(Request $request){
            $article_id = $request['articleId'];
         
            $fbnstory = StudioStories::find($article_id );
         
         
            $user = Auth::user();
              
             $user->likesFs()->detach($fbnstory);   
            
             
             $wows  =  $fbnstory->likedBy()->wherePivot('story_id', $article_id)->count();
             if($wows>1)
             $w = ' wows';
             else
             $w = ' wow'; 
             $data = [
               'wows'=>'  '.$wows.$w
             ];
           return response()->json($data);
              

         }
         // bookmark
         public function urlFbnStoryBookmark(Request $request){
            $article_id = $request['articleId'];
            $article = StudioStories::find($article_id);
            $user = Auth::user();
            $bookmark = $user->bookmarksFs()->wherePivot('user_id',$user->id)->wherePivot('story_id', $article_id)->first();
           
            if($bookmark){
                return null;
            }
            else{
             $user->bookmarksFs()->attach($article);
 
            }
         }
    // unmark
    public function urlFbnStoryUnmark(Request $request){
        $article_id = $request['articleId'];
        $article = StudioStories::find($article_id);
        $user = Auth::user();
        $user->bookmarksFs()->detach($article);
      
    }
}

