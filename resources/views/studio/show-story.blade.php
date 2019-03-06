@extends('layouts.main')

@section('title')
{{ucfirst($StudioStories->title)}} -Studio | fluidbN
@endsection

  
    

@section('content')


<div class="container">

      {{--  <div class="col-sm-6 w3-hide-small w3-hide-medium">
       
            <img class=" zoom  featurette-image img-fluid mx-auto card" style="width:100%;" src="/storage/studio_images/{{$StudioStories->title_image}}" alt="" onclick="document.getElementById('modal02').style.display='block'">
            <div id="modal02" class="w3-modal" onclick="this.style.display='none'">
                <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                <div class="w3-modal-content w3-animate-zoom">
                  <img src="/storage/studio_images/{{$StudioStories->title_image}}" class="mx-auto zoom" style="">
                </div>
              </div>  
     </div>
        <div class="col-sm-6 w3-hide-large" style="margin-top:15%;">
       
            <img class=" zoom  featurette-image img-fluid mx-auto card" style="width:100%;" src="/storage/studio_images/{{$StudioStories->title_image}}" alt="" onclick="document.getElementById('modal03').style.display='block'">
            <div id="modal03" class="w3-modal" onclick="this.style.display='none'">
                <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                <div class="w3-modal-content w3-animate-zoom">
                  <img src="/storage/studio_images/{{$StudioStories->title_image}}"  class="zoom" style="width:100%">
                </div>
              </div>  
     </div>  --}}
   @php
          if($wows==0)
          $w="";
          else
          $w=$wows;
      @endphp
  
    <div class="w3-container w3-hide-small w3-hide-medium">

<h2 class="featurette-heading" style="color:black;font-weight:bold;font-size:6rem;">{{ucfirst($StudioStories->title)}}</h2>
<small  id="wows" style="color:black; font-size:15px;font-weight:bold;"><i class="fa fa-heart" style="color:red;font-size:15px;"> {{$w}}</i></small>     
          
</div>
  <div class="w3-container w3-hide-large" style="" >

<h2 class="featurette-heading w3-xxxlarge" style="color:black;font-weight:bold;">{{ucfirst($StudioStories->title)}}</h2>
<small  id="wows" style="color:black; font-size:15px;font-weight:bold;"><i class="fa fa-heart" style="color:red;font-size:15px;"> {{$w}}</i></small>     
          
</div>

    <div class="row featurette">
   

        <div class="col-sm-6 ">
          
          <div class="box" id="mainView" data-articleid="{{$StudioStories->id}}" >
              @auth
            
              @endauth
            

          
               </div>
        
      </div>
      
 
    </div>
</div>
     
     
      <div class="container">
      <div class="row">
     
      
      
      <div class="col-12">
          
                <img class=" zoom  featurette-image img-fluid mx-auto card" style="" src="/storage/studio_images/{{$StudioStories->content}}" alt="" onclick="document.getElementById('modal01').style.display='block'">
                  <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                <div class="w3-modal-content w3-animate-zoom">
                  <img src="/storage/studio_images/{{$StudioStories->content}}" class="zoom mx-auto" style="width:100%">
                </div>
              </div>  
         
          </div>
      
      </div>
  
   
      <footer>
            <div class="box lower-margin">
                    <button class="btn  btn-login" id="likefs"  style="margin-left:20px;margin-top:5px;" data-articleid="{{$StudioStories->id}}" type="submit">{{$likeFs ? "Thanks" : "Wow"}}</button>
                    <button class="btn   btn-login" style="margin-top:5px;" id='bookmarkfs' data-articleId="{{$StudioStories->id}}">{{$bookmark ? "Bookmarked" : "Bookmark"}}</button>
            
          </div>
  
        
        
        </footer>
    </div>
  

<script>
var token = "{{Session::token()}}";
 var urlFbnStoryLike = "{{route('likeFbnStory')}}";
 var urlFbnStoryUnlike = "{{route('unlikeFbnStory')}}";
 var urlFbnStoryBookmark = "{{route('urlFbnStoryBookmark')}}";
 var urlFbnStoryUnmark = "{{route('urlFbnStoryUnmark')}}";
</script>





@endsection


