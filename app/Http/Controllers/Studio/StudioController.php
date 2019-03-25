<?php

namespace App\Http\Controllers\Studio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genre;
use App\Studio\StudioStories;
use App\Studio\StudioImages;
use Image;
use Auth;
class StudioController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('studio')->except('show');
    }


    
    
    public function dashboard(){
        $genres = Genre::all();
        $selectGenre=[];
        foreach($genres as $g){
            $selectGenre[$g->id] = $g->name;
        }
        $data = [
           'selectGenre'=>$selectGenre,
        ];
        return view('studio.dashboard')->with($data);
    }
    public function store(Request $request){

        $title_image = $request->file('title_image');
         $title_img = Image::make($title_image);
        // $content = $request->file('content');
        // $content_file =  Image::make($content);
         $path= public_path('storage').'/studio_images/';
         $title_img->save($path.$request->input('title').$title_image->getClientOriginalName());
         //$content_file->save($path.time().$content->getClientOriginalName());
         $title_image_name = $request->input('title').$title_image->getClientOriginalName();
        //$content_name = time().$content->getClientOriginalName();
       
        $story = new StudioStories;
        $story->title = $request->input('title');
        $story->title_image = $title_image_name;
        //$story->content = $content_name;
        $story->genre_id = $request->input('genre');
         $story->save();
        if($request->hasFile('content')){
            $contentOriginal = $request->file('content');
            foreach($contentOriginal as $c){
                $content = Image::make($c);
                $content->save($path.$story->id.$c->getClientOriginalName());
                $name = $story->id.$c->getClientOriginalName();
                $StoryImage = new StudioImages;
                $StoryImage->image = $name;
                $StoryImage->story_id = $story->id;
                $StoryImage->save();
            }
        }

       
         return redirect()->back()->with('success','Posted successfully');

    }
    public function show(StudioStories $StudioStories,$slug){
    
            if(Auth::user()){
        $user = Auth::user();
        $likeFs = $user->likesFs()->wherePivot('user_id', $user->id)->wherePivot('story_id',$StudioStories->id)->first();
        $bookmark = $user->bookmarksFs()->wherePivot('user_id',$user->id)->wherePivot('story_id',$StudioStories->id)->first();
        $wows  = $StudioStories->likedBy()->wherePivot('story_id', $StudioStories->id)->count();
     
        $data = [
         'StudioStories'=>$StudioStories,
         'wows'=>$wows,
         'likeFs'=>$likeFs,
         'user'=>$user,
         'bookmark'=>$bookmark,
     ];
        return view('studio.show-story')->with($data);
    }
    // for not logged in users
    else {
            $wows  = $StudioStories->likedBy()->wherePivot('story_id', $StudioStories->id)->count();

            $data = [
                'StudioStories'=>$StudioStories,
                'wows'=>$wows,
            
            ];
            return view('studio.show-story-not-auth')->with($data);
    }
 
          
            
}

    
}
