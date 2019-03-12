<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuickStory;
use Auth;
use Image;
class QuickStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $quick_stories = QuickStory::latest()->paginate(12);
        
       
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
        // to store the quick story
        $this->validate($request,[
            'story_image'=>'image|mimes:jpeg,jpg,png,gif,svg,pdf|max:2024'
        ]);
        $user = Auth::user();
        if($request->hasFile('story_image')){
            $image = $request->file('story_image');
            $imageToStore = Image::make($image)->orientate();
            $imageToStore->save(public_path('/storage/quick_story/'.$user->id.'_'.str_slug($request->input(' title ')).'_'.$image->getClientOriginalName()));
            $imagename = $user->id.'_'.str_slug($request->input(' title ')).'_'.$image->getClientOriginalName();
        }
        else{
            $imagename = 'noimage.png';
        }
        $story = QuickStory::where('user_id',Auth::user()->id)->where('title',$request->input('title'))->first();
        if(!$story){
            $quick_story = new QuickStory;
            $quick_story->title = $request->input('title');
            $quick_story->story_image = $imagename;
            $quick_story->content = htmlspecialchars($request->input('content'));
            $quick_story->user_id = Auth::user()->id;
            $quick_story->save();

            return redirect()->route('feed')->with('success', 'Quick story successfully posted !');
        }
    else{
            return redirect()->back()->with('error', 'Quick story with the same title by you already exists !');
    }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
