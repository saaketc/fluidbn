@extends('layouts.main')
@section('title')
My feed | fluidbN
@endsection


@section('content')


<main role="main">
    
<div style="">
  @if($heading!='')
  <div class="w3-hide-small w3-hide-medium">
 <h1 class="featurette-heading-title">{{$heading}} <i class="fa fa-heart" style="font-size:40px;color:red;"></i></h1>
  </div>
  <div class="w3-hide-large">
 <h1 class="featurette-heading-title w3-xxlarge">{{$heading}} <i class="fa fa-heart" style="font-size:30px;color:red;"></i></h1>
  </div>
 @else
  <div class="w3-hide-small w3-hide-medium">
<h1 class="featurette-heading-title">Curated with <i class="fa fa-heart" style="font-size:40px;color:red;"></i> for you</h1>
  </div> 
  <div class="w3-hide-large">
<h1 class="featurette-heading-title w3-xxlarge">Curated with <i class="fa fa-heart" style="font-size:30px;color:red;"></i> for you</h1>
  </div> 
@endif
</div>

            {{-- Button to write --}}
  <div class="lower-margin box">
  {{--
  <button  class="btn-login btn-feed" id="story-feed-tailored" style="margin-top:5px;">
      Tailored Stories </button>
      <button  class="btn-login btn-feed" id="story-feed-featured" style="margin-top:5px;">
        Featured Stories </button>
       <button  class="btn-login btn-feed" id="theory-feed" style="margin-top:5px;">
        Featured Theories </button>
 --}}
    <button  class="w3-button w3-flat-pomegranate w3-padding-large "  onclick="location.href='{{route('write')}}'" style="margin-top:5px;">
      Create a story
    </button>
     <button  class="w3-button w3-flat-pomegranate w3-padding-large " onclick="location.href='{{route('write-theory')}}'" style="margin-top:5px;">
    Share a theory
    </button>
      <button  class="w3-button w3-flat-pomegranate w3-padding-large" style="width:auto; margin-top:5px;" onclick="document.getElementById('quick').style.display='block'">Quick frame story</button>
       
    {{-- modal --}}
     <div id='quick' class="w3-modal">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container "> 
        <span onclick="document.getElementById('quick').style.display='none'" 
        class="w3-button w3-medium w3-red w3-display-topright">&times;</span>
        <h2 style="color:black;">Create a quick story</h2>
        <div>
             {{--  <img class="featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/aerepad_images/{{$a->title_image}}" alt="">
                        --}}
        </div>
      </header>
      <div class="w3-container w3-large" style="color:black;margin-top:2%;">
                       
            
            {!! Form::open(['action'=>'QuickStoryController@store','method'=>'POST','files'=>true,'enctype'=>'multipart/form-data']) !!}
                          
                          
                       
                             
                               <div class="form-group">
                                       {{Form::label('title','Title of story ')}}
                                       {{Form::text('title','',['class'=>'form-control'])}}
                                       </div>
                                       <div class="form-group">
                                        {{Form::label('story_image','Upload story image',['class'=>'w3-button w3-flat-pomegranate w3-padding-large'])}}     {{Form::file('story_image',['accept'=>"image/*",'onchange'=>'loadFile(event)'])}}
            
                                        </div>
                                          <div class="" id="output-frame">   
<img id="output" class=" img-fluid mx-auto" style="width:100%;">
</div>
                                       <div class="form-group">
                                       {{Form::label('content','Quick description of story if any','')}}
                                       {{Form::textarea('content','',['class'=>'form-control'])}}
                                        </div>
                                      
                                       <div class="form-group">
                                       {{Form::submit('Share', ['class'=>'w3-button w3-flat-pomegranate w3-padding-large'])}}
                                       </div>
                                     @csrf
          
                                     {!! Form::close() !!}        
      </div>
      
    </div>
  </div>
  </div>
 


  
    
    
       {{--fluidbn exclusive studio stories--}}
       
     <div class="w3-container" id="fbn-story-feed-f">      
  <h1 class="featurette-heading-title">fluidbN studio stories</h1>    
<div class="row featurette box">
  
  @foreach($story as $a)

   
     <div class="col-md-6">
       <a href="{{route('stories-genre',['genre'=>$a->storyOfGenre])}}" <small class="genre-feed">{{ucfirst($a->storyOfGenre->name)}}</small></a>
       <a href="{{route('studio-story',['StudioStories'=>$a,'slug'=>str_slug($a->title)])}}">
        
       <div class="card-related lower-margin" style="background:white;">
           
         <img class="featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/studio_images/{{$a->title_image}}" alt="">
       
         <div class="container-related" style="background:white;">
           <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
           
          
           <div class="" style="margin-bottom:5px;">
                <img class="featurette-image img-fluid mx-auto" src="/storage/logo/studio-logo.png" alt="">
              </div>
       
         </div>
       </div>
       
     </a>
       </div>       


@endforeach
      
          
</div>
</div>
      {{--end fluidbn exclusive--}}
      
      {{-- theories--}}
  <div class=" w3-container" id="theory-feed-f">   

       @if(count($theory)>0)
        <div class="box lower-margin">
          <h2 class="featurette-heading-title">Featured theories</h2>  
         </div>
      
      
                    
            <div class="infinite-theo">
              <div class="row featurette">
               @foreach($theory as $a)

           
                
                  <div class="col-md-6" id = "{{'th-'.$a->id}}">
                   
                   {{--  <div class="w3-card-white"><button class="report w3-button w3-flat-pomegranate w3-right" data-theoId="{{$a->id}}">Report theory</button> 
                  
                  </div>
                  --}}
                  <br/>
                    <a href="{{route('show-theory',['theory'=>$a,'slug'=>str_slug($a->title)])}}">
                     
                    <div class="card-related lower-margin" style="background:white;">
                        
                     
                      <div class="container-related" style="background:white;">
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                        
                        {{--  <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>  --}}
                       
                         <div class="" style="margin-botton:5px;">
                            
                       <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt=""> 
                       <div class="w3-dropdown-hover"><small class="writer-small">{{ucfirst($a->writtenBy->fname).' '. ucfirst($a->writtenBy->lname)}}</small>
                          <div class="w3-dropdown-content w3-card-4" style="width:250px">
                              <a href="{{route('profile',['user'=>$a->writtenBy,'slug'=>str_slug($a->writtenBy->fname." ".$a->writtenBy->lname)])}}">
                            <img src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt="" style="width:100%"></a>
                            <div class="w3-container">
                              <p>{{$a->writtenBy->hasProfile->about}}</p>
                              @if($a->writtenBy->hasProfile->college)
                              <p>{{$a->writtenBy->hasProfile->education.' '.$a->writtenBy->hasProfile->yos.' student at '.$a->writtenBy->hasProfile->college}}</p>
                              @elseif($a->writtenBy->hasProfile->company)
                              <p>{{$a->writtenBy->hasProfile->designation.' at '.$a->writtenBy->hasProfile->company}}</p>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                    
                  </a>
                    </div>       
         
  @endforeach
                   
                       
</div>
{{$theory->links()}}
</div>

@endif
</div>
{{--theories end--}}
             {{-- quick stories --}}
             
               <div class=" w3-container" id="">   

       @if(count($quick_stories)>0)
        <div class="box lower-margin">
          <h2 class="featurette-heading-title">Quick stories</h2>  
         </div>
      
      
                    
            <div class="infinite-quick">
              <div class="row featurette">
               @foreach($quick_stories as $a)

             
                  <div class="col-md-6">
                     
                   
                    <div class="card-related lower-margin" style="background:white;">
                        
                      <img class="zoom featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/quick_story/{{$a->story_image}}" alt="" onclick="document.getElementById('quick{{ $a->id }}').style.display='block'">
                     <div id="quick{{ $a->id }}" class="w3-modal" onclick="this.style.display='none'">
                <span class="w3-button w3-red w3-hover-black w3-xlarge w3-display-topright">&times;</span>
                <div class="w3-modal-content w3-animate-zoom">
                  <img src="/storage/quick_story/{{$a->story_image}}" class="zoom mx-auto" style="width:100%">
              <div class="w3-container box">
                  <p class="w3-large" style="color:black;font-weight:bold;">{!! htmlspecialchars_decode($a->content) !!}</p>
                </div>
                     </div>
              </div> 
                      <div class="container-related" style="background:white;">
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                        
                        {{--  <p class="lead">{!! wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>  --}}
                       
        
            
         
           
                       <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$a->quickStoryWrittenBy->hasProfile->profile_image}}" alt="">
                       <div class="w3-dropdown-hover"><small class="writer-small">{{ucfirst($a->quickStoryWrittenBy->fname).' '. ucfirst($a->quickStoryWrittenBy->lname)}}</small>
                        <div class="w3-dropdown-content w3-card-4" style="width:250px">
                            <a href="{{route('profile',['user'=>$a->quickStoryWrittenBy,'slug'=>str_slug($a->quickStoryWrittenBy->fname." ".$a->quickStoryWrittenBy->lname)])}}">
                          <img src="/storage/profile_images/thumbnails/{{$a->quickStoryWrittenBy->hasProfile->profile_image}}" alt="" style="width:100%"></a>
                          
                          <div class="w3-container">
                            <p>{{$a->quickStoryWrittenBy->hasProfile->about}}</p>
                            @if($a->quickStoryWrittenBy->hasProfile->college)
                            <p>{{$a->quickStoryWrittenBy->hasProfile->education.' '.$a->quickStoryWrittenBy->hasProfile->yos.' student at '.$a->quickStoryWrittenBy->hasProfile->college}}</p>
                            @elseif($a->quickStoryWrittenBy->hasProfile->company)
                            <p>{{$a->quickStoryWrittenBy->hasProfile->designation.' at '.$a->quickStoryWrittenBy->hasProfile->company}}</p>
                            @endif
                          </div>
                        </div>
                      </div>
                                         {{-- Button to Open the delete modal --}}
         @if(Auth::user()->id==$a->quickStoryWrittenBy->id)
           <button  class="w3-button w3-flat-pomegranate" style="margin-right:30%;" id=""  data-toggle="modal" data-target="#delete-{{ $a->id }}">
             Delete
           </button>  
           @endif
                      </div>
                    </div>
                  </div>   
                    
                  
                    
           <!-- The Modal -->
           <div class="modal fade" id="delete-{{ $a->id }}">
             <div class="modal-dialog modal-sm">
               <div class="modal-content">
               
                 <!-- Modal Header -->
                 <div class="modal-header">
                   <h4 class="modal-title writer" style="font-weight:bold;font-size:15px;">Are you sure to delete this story ? It will be permanently deleted</h4>
                  

                 </div>
            
                 <!-- Modal body -->
                 <div class="">
                 <div class="modal-body">
                  
                 {!! Form::open(['action'=>['QuickStoryController@destroy',$a->id],'method'=>'POST'])!!}
   
              {{Form::hidden('_method','DELETE')}} {{-- to make route method delete--}}
                  
                 {{Form::submit('Yes, delete story',['class'=>'w3-button w3-flat-pomegranate w3-small'])}}
          {!!Form::close()!!}   
          
          <br/>
           <button type="button" class=" w3-button w3-flat-pomegranate w3-small" data-dismiss="modal">No, take me back</button>
         </div> 
          </div>
               </div>
             </div>
           </div>
                
           
                 
            
  @endforeach
                   
                       
</div>
  {{$quick_stories->links()}}

</div>
@endif
</div>
             {{-- end quick stories --}}
    
    
      <div class=" w3-container" id="story-feed-tailored-f">   

       @if(count($tailored)>0)
        <div class="box lower-margin">
          <h2 class="featurette-heading-title">Stories tailored for you</h2>  
         </div>
      
      
                    
            <div class="infinite-tailored">
              <div class="row featurette">
               @foreach($tailored as $a)

               @php
               if($a->views==1)
               $v = '  '.$a->views.' view';
               else if($a->views>1)
               $v = '  '.$a->views.' views';
                else if($a->views==0)
                $v = '';
           @endphp
                
                  <div class="col-md-6">
                     
                    <a href="{{route('stories-genre',['genre'=>$a->ofGenre])}}" <small class="genre-feed">{{ucfirst($a->ofGenre->name)}}</small></a>
                    <a href="{{route('show-article',['article'=>$a,'slug'=>str_slug($a->title)])}}">
                     
                    <div class="card-related lower-margin" style="background:white;">
                        
                      <img class="featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/article_images/{{$a->title_image}}" alt="">
                    
                      <div class="container-related" style="background:white;">
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                         @php
                          $wows = $a->likedBy()->wherePivot('article_id',$a->id)->count();
                          if($wows==0)
                          $w = '';
                          else if($wows==1)
                          $w = '  '.$wows.' wow';
                          else
                          $w = '  '.$wows.' wows';
                          
                          $bookmark = Auth::user()->bookmarks()->wherePivot('user_id',Auth::user()->id)->wherePivot('article_id', $a->id)->first();
                       @endphp
                        {{--  <p class="lead">{!! wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>  --}}
                        <div class="" style="margin-botton:5px;">
                       <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt="">
                       <div class="w3-dropdown-hover"><small class="writer-small">{{ucfirst($a->writtenBy->fname).' '. ucfirst($a->writtenBy->lname)}}</small>
                        <div class="w3-dropdown-content w3-card-4" style="width:250px">
                            <a href="{{route('profile',['user'=>$a->writtenBy,'slug'=>str_slug($a->writtenBy->fname." ".$a->writtenBy->lname)])}}">
                          <img src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt="" style="width:100%"></a>
                          <div class="w3-container">
                            <p>{{$a->writtenBy->hasProfile->about}}</p>
                            @if($a->writtenBy->hasProfile->college)
                            <p>{{$a->writtenBy->hasProfile->education.' '.$a->writtenBy->hasProfile->yos.' student at '.$a->writtenBy->hasProfile->college}}</p>
                            @elseif($a->writtenBy->hasProfile->company)
                            <p>{{$a->writtenBy->hasProfile->designation.' at '.$a->writtenBy->hasProfile->company}}</p>
                            @endif
                          </div>
                        </div>
                      </div>
                       {{--
                       <button class="   btn-login feed" id="{{$a->id}}" style="margin-top:5px;padding:8px;" data-articleId="{{$a->id}}">{{$bookmark ? "Bookmarked !" : "Bookmark"}}</button>
                       --}}
                      </div>
                       
                        
                        
                        @if($a->views>0)<small class="views right"> {{$v}}</small>@endif  <small class="views right-wow">{{$w}}</small>

                     {{--  @php  $like = $user->likes()->wherePivot('user_id', $user->id)->wherePivot('article_id',$a->id)->first();
                       @endphp
                       <button class="   margin like"  data-articleid="{{$a->id}}" type="submit">{{$like ? "Thanks for appreciating !" : "Wow !"}}</button>
                       --}}
                      </div>
                    </div>
                    
                  </a>
                    </div>       
         
  @endforeach
                   
                       
</div>
  {{$tailored->links()}}

</div>
@endif
</div>



    <!-- START THE FEATURETTES -->

  
   <div class="w3-container" id="story-feed-featured-f">   

       @if(count($article)>0)
        <div class="box lower-margin">
          <h2 class="featurette-heading-title">Featured stories</h2>  
         </div>
      
      
                    
            <div class="infinite-scroll">
              <div class="row featurette">
               @foreach($article as $a)

               @php
               if($a->views==1)
               $v = '  '.$a->views.' view';
               else if($a->views>1)
               $v = '  '.$a->views.' views';
                else if($a->views==0)
                $v = '';
           @endphp
                
                  <div class="col-md-6">
                    
                    <a href="{{route('stories-genre',['genre'=>$a->ofGenre])}}" <small class="genre-feed">{{ucfirst($a->ofGenre->name)}}</small></a>
                    <a href="{{route('show-article',['article'=>$a,'slug'=>str_slug($a->title)])}}">
                     
                    <div class="card-related lower-margin" style="background:white;">
                        
                      <img class="featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/article_images/{{$a->title_image}}" alt="">
                    
                      <div class="container-related" style="background:white;">
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                         @php
                          $wows = $a->likedBy()->wherePivot('article_id',$a->id)->count();
                          if($wows==0)
                          $w = '';
                          else if($wows==1)
                          $w = '  '.$wows.' wow';
                          else
                          $w = '  '.$wows.' wows';
                          
                          $bookmark = Auth::user()->bookmarks()->wherePivot('user_id',Auth::user()->id)->wherePivot('article_id', $a->id)->first();
                       @endphp
                        {{--  <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>  --}}
                        <div class="" style="margin-botton:5px;">
                            <a href="{{route('profile',['user'=>$a->writtenBy,'slug'=>str_slug($a->writtenBy->fname." ".$a->writtenBy->lname)])}}">
                          <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt=""></a> 
                       <div class="w3-dropdown-hover"><small class="writer-small">{{ucfirst($a->writtenBy->fname).' '. ucfirst($a->writtenBy->lname)}}</small>
                        <div class="w3-dropdown-content w3-card-4" style="width:250px">
                          <img src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt="" style="width:100%">
                          <div class="w3-container">
                            <p>{{$a->writtenBy->hasProfile->about}}</p>
                            @if($a->writtenBy->hasProfile->college)
                            <p>{{$a->writtenBy->hasProfile->education.' '.$a->writtenBy->hasProfile->yos.' student at '.$a->writtenBy->hasProfile->college}}</p>
                            @elseif($a->writtenBy->hasProfile->company)
                            <p>{{$a->writtenBy->hasProfile->designation.' at '.$a->writtenBy->hasProfile->company}}</p>
                            @endif
                          </div>
                        </div>
                      </div>
                    
                       {{--
                       <button class="   btn-login feed" id="{{$a->id}}" style="margin-top:5px;padding:8px;" data-articleId="{{$a->id}}">{{$bookmark ? "Bookmarked !" : "Bookmark"}}</button>
                       --}}
                      </div>
                       
                        
                        
                        @if($a->views>0)<small class="views right"> {{$v}}</small>@endif  <small class="views right-wow">{{$w}}</small>

                     {{--  @php  $like = $user->likes()->wherePivot('user_id', $user->id)->wherePivot('article_id',$a->id)->first();
                       @endphp
                       <button class="   margin like"  data-articleid="{{$a->id}}" type="submit">{{$like ? "Thanks for appreciating !" : "Wow !"}}</button>
                       --}}
                      </div>
                    </div>
                    
                  </a>
                    </div>       
         
  @endforeach
                   
                       
</div>
  {{$article->links()}}

</div>
@endif
</div>








{{--<hr class="featurette-divider">--}}

{{--  
<!-- /END THE FEATURETTES -->  --}}


  </main>
      <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
   
   output.src = URL.createObjectURL(event.target.files[0]);
    

  };
</script>
      <script>
          function openSearch() {
              document.getElementById("myOverlay").style.display = "block";
          }
          
          function closeSearch() {
              document.getElementById("myOverlay").style.display = "none";
          }
          </script>
           
  <script>
      $('ul.pagination').hide();
     

      // for quick stories
       $(function() {
          $('.infinite-quick').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-quick',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
      
      $(function() {
          $('.infinite-theo').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-theo',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
      
      
      
      $(function() {
          $('.infinite-scroll').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-scroll',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
    $(function() {
          $('.infinite-tailored').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-tailored',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
       
      var token = "{{Session::token()}}";
      var urlBookmark = "{{route('bookmark')}}";
      var urlUnmark = "{{route('unmark')}}";
      var urlNotification = "{{route('notifications')}}";
      var report = "{{ route('report-th') }}";
      var reportStory = "{{ route('report-st') }}";
  </script> 

@endsection
