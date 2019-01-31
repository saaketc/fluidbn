@extends('layouts.main')
@section('title')
Curated stories | fluidbN
@endsection

@section('content')
<div class="container">
<div class="box lower-margin">
<h2 class="featurette-heading" style="font-weight:bold;font-size:50px;color:black;">Curated stories & theories </h2>
<small class="writer">from the people you follow </small> <i class="fa fa-heart" style="font-size:20px;color:red;"></i>
</div>
<div>
<button  class="w3-button w3-black" id="story-btn">
   Stories </button>
    <button  class="w3-button w3-black" id="theory-btn">
     Theories </button>
</div>

{{--story accordion--}}
 <div class="w3-hide w3-container" id="fbn-story">
    <div class="box lower-margin">
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
                     
                    <div class="card-related lower-margin featured-article">
                        
                      <img class="featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/article_images/{{$a->title_image}}" alt="">
                    
                      <div class="container-related featured-article">
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
                        <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>
                        <div class="" style="margin-botton:5px;">
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
<small class="writer">Hey {{ucfirst($user->fname)}}, start following people from <a href="{{route('follow-people')}}"><strong>{{$same_place}}</strong></a></small>
@endif
</div>
{{--theory accordion--}}

<div class="w3-hide w3-container" id="fbn-theory">
    <div class="box lower-margin">
        <h2 class="featurette-heading" style="font-weight:bold;font-size:40px;color:black;"><i class="fa fa-newspaper-o" aria-hidden="true" style="font-size:40px;color:black;"></i> Theories </h2>
      </div>
     
  @if(count($follow_theory)>0)
        
      
      
                    
            <div class="infinite-foltheory">
              <div class="row featurette">
               @foreach($follow_theory as $a)

                
                  <div class="col-md-6">
                    
                    <a href="{{route('show-theory',['theory'=>$a,'slug'=>str_slug($a->title)])}}">
                     
                    <div class="card-related lower-margin featured-article">
                        
                     
                      <div class="container-related featured-article">
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                        
                        <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>
                        <div class="" style="margin-botton:5px;">
                       <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt=""> <small class="writer-small"><a href="{{route('profile',['user'=>$a->writtenBy,'slug'=>str_slug($a->writtenBy->fname." ".$a->writtenBy->lname)])}}">{{ucfirst($a->writtenBy->fname).' '. ucfirst($a->writtenBy->lname)}}</a></small><div class="">{{--<small class="margin writer-small">{{$a->writtenBy->hasProfile->about }}</small>--}}</div>
                   
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
<small class="writer">Hey {{ucfirst($user->fname)}}, start following people from <a href="{{route('follow-people')}}"><strong>{{$same_place}}</strong></a></small>
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