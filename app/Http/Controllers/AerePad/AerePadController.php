<?php

namespace App\Http\Controllers\AerePad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\AerePadUser;
use App\AerePad\News;
use Image;
class AerePadController extends Controller
{
  
   
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('aerepad')->except('show');
    }


  
   public function getstarted(){
       return view('AerePad.getstarted');
   }
   public function userDesk(){
    $user = Auth::guard('aerepad')->user();
    if($user){
        $news = News::where('aere_pad_user_id',$user->id)->latest()->paginate(1);
        $data = [
            'news'=>$news,
        ];
        return view('AerePad.userdesk')->with($data);
    }
    else{
        return view('auth.aerepad-login');
    }
   
 }
   public function storeNews(Request $request){
      if($request->hasFile('title_image')){

        $originalImage= $request->file('title_image');
        $thumbnailImage = Image::make($originalImage);
         $Path = public_path('storage').'/aerepad_images/';
        
         $thumbnailImage->resize(600,350);
         $thumbnailImage->save($Path.time().$originalImage->getClientOriginalName()); 
         $imageName = time().$originalImage->getClientOriginalName();
         
        }
        else{
         $imageName = 'aere.png';
        }
        $news = new News;
        $news->title = $request->input('title');
        $news->title_image = $imageName;
        $news->content = $request->input('content');
        $news->aere_pad_user_id =Auth::guard('aerepad')->user()->id;
        $news->save();
        return redirect()->back()->with('success','News broadcasted successfully ');
   }
   public function newsFeed(){
    $user = Auth::guard('aerepad')->user();
    if($user){
    $news = News::latest()->paginate(1);
    $data = [
        'news'=>$news
    ];
    return view('AerePad.feed')->with($data);
    }
   }
}
