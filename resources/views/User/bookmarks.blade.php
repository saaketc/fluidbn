@extends('layouts.main')
@section('title')
{{ucfirst(Auth::user()->fname).'\'s bookmarks | fluidbN'}}
@endsection

@section('content')
<div class="lower-margin w3-hide-large" style="margin-top:25%">
<h2 class="featurette-heading" style="font-weight:bold;font-size:50px;color:black;">My favourite stories</h2>
</div>
<div class="box lower-margin w3-hide-small w3-hide-medium" >
<h2 class="featurette-heading" style="font-weight:bold;font-size:5rem;color:black;">My favourite stories</h2>
</div>
<div class="row">
  @if(count($user_studio_bookmarks)>0)

    

    
{{--studio stories--}}
@foreach ($user_studio_bookmarks as $ra )
 
   <div class="col-md-4">
       
      <a href="{{route('stories-genre',['genre'=>$ra->storyOfGenre])}}" <small class="genre-feed">{{ucfirst($ra->storyOfGenre->name)}}</small></a>
      
        <a href="{{route('studio-story',['StudioStories'=>$ra,'slug'=>str_slug($ra->title)])}}">
        <div class="card-related" style="width:100%;">
          <img class="featurette-image img-fluid mx-auto img-card" src="/storage/studio_images/{{$ra->title_image}}" alt="">
          <div class="container-related lower-margin" style="width:100%;">
            <h2  class="featurette-heading-small" style="font-size:25px;font-weight:bold;">{{ucfirst($ra->title)}}</h2>
           
           
            <div class="" style="margin-bottom:5px;">
                <img class="featurette-image img-fluid mx-auto" src="/storage/logo/studio-logo.png" alt="">
              </div>
                
              </div>
             {{--
              <div class="" style="margin-bottom:5px;">
              <button class="btn   btn-login userbookmark" id="{{$ra->id}}" data-articleId="{{$ra->id}}">Remove</button>
             </div>
             --}}
            </div>
       
        </a>
       
          <br/>
          
          
   </div>

    @endforeach



  
  @endif
</div>
@if(count($user_bookmarks)>0)

@php
$c = Auth::user()->bookmarks()->wherePivot('user_id',Auth::user()->id)->count();
@endphp

<div class="nobook">
  <h2 class="featurette-heading-title"  style="color:black;"id="nobookmark"></h2>
  <h4 class="writer"><a href="{{route('feed')}}" id="readnow"></a></h4>
</div>

<div class="row featurette" id="bookmark-row" data-count="{{$c}}">

    
  {{--user stories--}}
  @foreach ( $user_bookmarks as $ra )
 
   <div class="col-md-4 bookmarked">
       
        <a href="{{route('stories-genre',['genre'=>$ra->ofGenre])}}" <small class="genre-feed">{{ucfirst($ra->ofGenre->name)}}</small></a>
                  
        <a href="{{route('show-article',['article'=>$ra,'slug'=>str_slug($ra->title)])}}">
        <div class="card-related" style="width:100%;">
          <img class="featurette-image img-fluid mx-auto img-card" src="/storage/article_images/{{$ra->title_image}}" alt="">
          <div class="container-related lower-margin" style="width:100%;">
            <h2  class="featurette-heading-small" style="font-size:25px;font-weight:bold;">{{ucfirst($ra->title)}}</h2>
           
            <p class="lead">{!!wordwrap(str_limit($ra->content,100),150,"<br>\n",TRUE)!!}</p> @if($ra->views>0)<small class="views"> {{ '   '.$ra->views.' views'}}</small>@endif
            <div class="" style="margin-bottom:5px;">
                <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$ra->writtenBy->hasProfile->profile_image}}" alt=""> <small class="writer-small"><a href="{{route('profile',['user'=>$ra->writtenBy,'slug'=>str_slug($ra->writtenBy->fname." ".$ra->writtenBy->lname)])}}">{{ucfirst($ra->writtenBy->fname).' '. ucfirst($ra->writtenBy->lname)}}</a></small><div class=""><small class="margin writer-small">{{$ra->writtenBy->hasProfile->about }}</small></div>
                
              </div>
             <div class="" style="margin-bottom:5px;">
              <button class="btn   btn-login userbookmark" id="{{$ra->id}}" data-articleId="{{$ra->id}}">Remove</button>
             </div>
            </div>
        </div>
        </a>
       
          <br/>
          
          
   </div>

    @endforeach

  </div>

@else
<div class="box" style="margin-top:10%;">
    <h2 class="featurette-heading-feed" style="color:black">{{ucfirst(Auth::user()->fname).' your user story bookmarks live here !'}}</h2>
    <i class="material-icons" style="font-size:48px;color:red;">cloud</i>
    <i class="fa fa-cloud"></i>
    
</div>
<div class="box">
  <a href="{{route('feed')}}" class="writer"><strong>Read now !</strong></a>

</div>

  @endif

 <script>
   @include('includes.buttons')
 </script>
@endsection