@extends('layouts.main')
@section('title')
Curated stories | fluidbN
@endsection

@section('content')
<div class="container">
<div class="lower-margin">
<h2 class="featurette-heading" style="font-weight:bold;font-size:50px;color:black;">Curated stories & theories </h2>
<small class="writer">from the people you follow </small> <i class="fa fa-heart" style="font-size:20px;color:red;"></i>
</div>
<div>
<button  class="w3-button w3-flat-pomegranate" id="story-btn">
   Stories </button>
    <button  class="w3-button w3-flat-pomegranate" id="theory-btn">
     Theories </button>
</div>

{{--story accordion--}}
 <div class="w3-hide w3-container" id="fbn-story">
    <div class="">
        <h2 class="featurette-heading" style="font-weight:bold;font-size:40px;color:black;"><i class="fa fa-newspaper-o" aria-hidden="true" style="font-size:40px;color:black;"></i> Stories </h2>
      </div>
     
  @if(count($follow_story)>0)
        
      
      
                    
            <div class="infinite-folstory">
              <div class="row featurette">
               @foreach($follow_story as $a)

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
                     
                    <div class="card-related featured-article " style="background:white;">
                        
                      <img class="featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/article_images/{{$a->title_image}}" alt="">
                    
                      <div class="container-related featured-article back" style="background:white;">
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                         @php
                          $wows = $a->likedBy()->wherePivot('article_id',$a->id)->count();
                          if($wows==0)
                          $w = '';
                          else if($wows==1)
                          $w = '  '.$wows.' wow';
                          else
                          $w = '  '.$wows.' wows';
                        
                       @endphp
                  
                        <div class="" style="margin-bottom:5px;">
                       <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt=""> <small class="writer-small"><a href="{{route('profile',['user'=>$a->writtenBy,'slug'=>str_slug($a->writtenBy->fname." ".$a->writtenBy->lname)])}}">{{ucfirst($a->writtenBy->fname).' '. ucfirst($a->writtenBy->lname)}}</a></small><div class="">{{--<small class="margin writer-small">{{$a->writtenBy->hasProfile->about }}</small>--}}</div>
                   
                      </div>
                       
                        
                        
                        @if($a->views>0)<small class="views right"> {{$v}}</small>@endif  <small class="views right-wow">{{$w}}</small>

                    
                      </div>
                    </div>
                    
                  </a>
                    </div>       
         
  @endforeach
                   
                       
</div>
  {{$follow_story->links()}}

</div>

@else
<small class="writer">Hey {{ucfirst($user->fname)}}, start following people from <a href="{{route('follow-people')}}"><strong>{{$same_place}}</strong></a> to see their stories</small>
@endif
{{-- quick story --}}

               @if(count($quick_stories)>0)        
            <div class="infinite-quick">
              <div class="row featurette">
               @foreach($quick_stories as $a)

             
                  <div class="col-md-6">
                     
                   
                    <div class="card-related lower-margin" style="background:white;">
                        
                      <img class="zoom featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/quick_story/{{$a->story_image}}" alt="" onclick="document.getElementById('quick01').style.display='block'">
                     <div id="quick01" class="w3-modal" onclick="this.style.display='none'">
                <span class="w3-button w3-red w3-hover-black w3-xlarge w3-display-topright">&times;</span>
                <div class="w3-modal-content w3-animate-zoom">
                  <img src="/storage/quick_story/{{$a->story_image}}" class="zoom mx-auto" style="width:80%">
              <div class="w3-container box">
                  <p class="w3-large" style="color:black;font-weight:bold;">{!! htmlspecialchars_decode($a->content) !!}</p>
                </div>
                     </div>
              </div> 
                      <div class="container-related" style="background:white;">
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                        
                        {{--  <p class="lead">{!! wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>  --}}
                        <div class="" style="margin-botton:5px;">
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
                      
                      </div>
                        
                      </div>
                    </div>
                    
                  
                    </div>       
         
  @endforeach
                   
                       
</div>
  {{$quick_stories->links()}}

</div>

</div>
</div>
@endif
{{--theory accordion--}}

<div class="w3-hide w3-container" id="fbn-theory">
    <div class="">
        <h2 class="featurette-heading" style="font-weight:bold;font-size:40px;color:black;"><i class="fa fa-newspaper-o" aria-hidden="true" style="font-size:40px;color:black;"></i> Theories </h2>
      </div>
     
  @if(count($follow_theory)>0)
        
      
      
                    
            <div class="infinite-foltheory">
              <div class="row featurette">
               @foreach($follow_theory as $a)

                
                  <div class="col-md-6">
                    
                    <a href="{{route('show-theory',['theory'=>$a,'slug'=>str_slug($a->title)])}}">
                     
                    <div class="card-related featured-article back" style="background:white;">
                        
                     
                      <div class="container-related featured-article back" style="background:white;">
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                        
                        {{--  <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>  --}}
                        <div class="" style="margin-bottom:5px;">
                       <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt=""> <small class="writer-small">{{ucfirst($a->writtenBy->fname).' '. ucfirst($a->writtenBy->lname)}}</small><div class="">{{--<small class="margin writer-small">{{$a->writtenBy->hasProfile->about }}</small>--}}</div>
                   
                      </div>
                      </div>
                    </div>
                    
                  </a>
                    </div>       
         
  @endforeach
                   
                       
</div>
  {{$follow_theory->links()}}

</div>

@else
<small class="w3-medium">Hey {{ucfirst($user->fname)}}, start following people from <a href="{{route('follow-people')}}"><strong>{{$same_place}}</strong></a> to see their theories</small>
@endif
</div>

</div>


 <script>

       
   $('ul.pagination').hide();
     
      $(function() {
          $('.infinite-folstory').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-folstory',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
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
        $('.infinite-foltheory').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-foltheory',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
 
 
   @include('includes.buttons')
 </script>
@endsection