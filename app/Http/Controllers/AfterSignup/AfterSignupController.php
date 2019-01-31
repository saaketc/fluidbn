<?php


namespace App\Http\Controllers\AfterSignup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\UserWelcome;
use Mail;
use App\Mail\Welcome;
use Auth;
use App\Genre;
use App\Profile;
use App\Article;
use Image;
use Illuminate\Support\Facades\Storage;
class AfterSignupController extends Controller
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






   public function chooseGenre($slug=NULL){
      
    $genre = Genre::orderBy('id')->get();

    $data =[
        'genre'=>$genre,
         'slug'=>$slug
    ];

   return view('AfterSignup.genre')->with($data);
    
   }
   public function storeGenre(Request $request){
      
    
      $genreId = $request['genreId'];
     $user= Auth::user();
     $genre = Genre::find($genreId);
     $exists = $user->hasGenre()->wherePivot('user_id',$user->id)->wherePivot('genre_id',$genreId)->first();
     if($exists){
         return null;
     }else{
       
        $user->hasGenre()->attach($genre);
        return response()->json(['id'=>$genre->id]);
       }
        
      
     
     
    /* foreach($request->input('genre') as $g){
        $gen = Genre::where('name',$g)->get();
        $user->hasGenre()->attach($gen); }*/
       // return view('AfterSignup.createprofile');
     
   }
    public function remGenre(Request $request){

        $genreId = $request['genreId'];
        $user= Auth::user();
        $genre = Genre::find($genreId);
        $user->hasGenre()->detach($genre);  
    }
    

     public function createProfile(Request $request){
       
        $this->validate($request,[
            'about'=>'required|max:80',
         
            'image'=>'image|nullable|mimes:jpeg,jpg,png,gif,svg,pdf', // onlyimage and not compulsory to upload and max file size less than 2mb
            
            ]);

             // Handle file request
             if($request->hasFile('image')){
                $originalImage= $request->file('image');
           
           $thumbnailImage = Image::make($originalImage)->orientate();
            //$Path = public_path('storage').'/profile_images/';
           
            //$thumbnailImage->resize(400,400);
            $thumbnailImage->save(public_path('/storage/profile_images/'.Auth::user()->id.'_'.str_slug(Auth::user()->fname).'_'.$originalImage->getClientOriginalName()));
              
              
              // thumbnail image storing
              $thumbnailImage->resize(100,100)->save(public_path('/storage/profile_images/thumbnails/'.Auth::user()->id.'_'.str_slug(Auth::user()->fname).'_'.$originalImage->getClientOriginalName()));
           
            $imageName = Auth::user()->id.'_'.str_slug(Auth::user()->fname).'_'.$originalImage->getClientOriginalName();

                
            }
            elseif($request->input('gender')=='Male'){
                $imageName = 'Miniclip-8-Ball-Pool-Avatar-16.png';
            }
            elseif($request->input('gender')=='Female'){
                $imageName = 'avatar2_large.png';
            }
             
            $profile = New Profile;
            $profile->user_id = Auth::user()->id;
            $profile->profile_image =  $imageName;
         
            $profile->gender = $request->input('gender'); 
            $profile->about = $request->input('about');
            
            if($request->has('dob'))
            $profile->dob = $request->input('dob');
            if($request->has('designation') && $request->has('company')){
                   $profile->designation = $request->input('designation');
                $profile->company = $request->input('company');
            }
            if($request->has('education') && $request->has('yos') && $request->has('college')){
                   $profile->education = $request->input('education');
                $profile->yos = $request->input('yos');
                 $profile->college = $request->input('college');
            }
             if($request->has('startup')) 
              $profile->startup = $request->input('startup');
           if($request->has('weburl')) 
            $profile->startupurl = $request->input('weburl');
            $profile->save();
                  
                   $useri = Auth::user();
                 // notify on signup
                  $useri->notify(new UserWelcome($useri));
                 //  Mail::to($useri)->send(new Welcome($useri));
       $article = Article::orderBy('id','desc')->get();
      
       $user_genre = $useri->hasGenre()->wherePivot('user_id',$useri->id)->get();
       
           
              $user =   Profile::where('user_id',Auth::user()->id)->get();
            $data = [
               'user'=>$user,
               'article'=>$article,
               'user_genre' =>  $user_genre,
               
            ];
          
            return redirect()->route('feed')->with($data);
      
       
       
     }
}
