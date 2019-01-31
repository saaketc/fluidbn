<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Theory;
use Auth;
use Session;
use App\Article;
use App\Genre;
use Image;
use Hash;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function show(User $user,$slug)
    {
        $authUser = Auth::user();
       $theory = Theory::where('user_id',$user->id)->latest()->paginate(10);
        $article = Article::where('user_id',$user->id)->where('finished',1)->latest()->paginate(10);
          //fix this later//$follow =  $authUser->follows()->wherePivot('follower_id', $authUser->id)->wherePivot('following_id',$user->id)->first();
        $followers = $user->followedBy()->wherePivot('following_id',$user->id)->count();
        $follows = $user->followedBy()->wherePivot('following_id',$user->id)->wherePivot('follower_id','!=',$user->id)->limit(21)->get(); 
         $liked_articles = $user->likes()->latest()->paginate(10);
          $userGenre = $user->hasGenre;
        $data = [
          'article'=>$article,
          'theory'=>$theory,
          'user'=>$user,
          'follows'=>$follows,
          'followers'=>$followers,
          'liked_articles'=>$liked_articles,
          'userGenre'=>$userGenre
        ];
        
     return view('profile')->with($data);
    }

        

    public function userCategories(User $user,$slug){
       
        $Authuser = Auth::user();
        $count = $Authuser->hasGenre()->count();
        $totalGenres = Genre::orderBy('id')->count();
        $userGenre = $user->hasGenre;
        $data = [
            'user'=>$user,
            'userGenre'=>$userGenre,
            'count'=>$count,
            'totalGenres'=> $totalGenres
        ];
        return view('User.usercategories')->with($data);
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateProfile(Request $request)
       {
           $user = Auth::user();
       
           
          $user->fname = $request['fname'];
          $user->lname = $request['lname'];
          $user->email = $request['email'];
          $user->hasProfile->about= $request['about'];
          $user->hasProfile->dob= $request['dob'];
          $user->hasProfile->education= $request['education'];
          $user->hasProfile->yos= $request['yos'];
          $user->hasProfile->college= $request['college'];
          $user->hasProfile->startup= $request['startup']; 
          $user->hasProfile->designation= $request['designation'];
          $user->hasProfile->company= $request['company'];
          $user->save();
          $user->hasProfile->save();
          $data = [
              'fname'=>ucfirst($request['fname']),
              'lname'=>ucfirst($request['lname']),
              'email'=>$request['email'],
              'about'=> $request['about']
          ];
          return response()->json($data);
          }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function settings(){
        $user = Auth::user();
        $data = [
            'user'=>$user
        ];
        return view('User.settings')->with($data);
    }
    public function updateProfilePic(Request $request){

       $user = Auth::user();
        if($request->hasFile('profile_image')){
            $originalImage= $request->file('profile_image');
           $thumbnailImage = Image::make($originalImage)->orientate();
           // $Path = public_path('storage').'/profile_images/';
           
            $thumbnailImage->save(public_path('/storage/profile_images/'.Auth::user()->id.'_'.str_slug(Auth::user()->fname).'_'.$originalImage->getClientOriginalName()));
              
              
              // thumbnail image storing
              $thumbnailImage->resize(100,100)->save(public_path('/storage/profile_images/thumbnails/'.Auth::user()->id.'_'.str_slug(Auth::user()->fname).'_'.$originalImage->getClientOriginalName()));
           
            $imageName = Auth::user()->id.'_'.str_slug(Auth::user()->fname).'_'.$originalImage->getClientOriginalName();
            
           }
           else{
            $imageName = $user->hasProfile->profile_image ;
           }
         $user->hasProfile->profile_image = $imageName;
         $user->hasProfile->save();
         return redirect()->back()->with('success','profile pic successfully updated ');
    }
    public function forgotPassword(Request $request){
    $email = $request->input('email');
    $user = User::where('email',$email)->first();
    if($user){
        $np = $request->input('password');
        $cp = $request->input('conf-pass');
        if($np==$cp){
            $pass = Hash::make($np);
            $user->password = $pass;
            $user->save();
            return redirect()->route('login')->with('success','Password successfully changed - Login now');
        }
        else
          return redirect()->back()->with('error',"Passwords didn't match - Try again");
    }
    else
     return redirect()->back()->with('error',"User with this email doesn't exist");
    }
    
    // to see following people
     public function seeFollowing(User $user,$slug){
        $authuser = Auth::user();
        $follows = $user->follows()->wherePivot('follower_id',$user->id)->wherePivot('following_id','!=',$user->id)->paginate(10);
        $data = [
            'follows'=>$follows,
            'user'=>$user,
            'authuser'=>$authuser,
        ];
        return view('User.user_follow_people')->with($data);
    }
}
