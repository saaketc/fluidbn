@extends('layouts.main')
@section('title')
 Searched for {{$search}}
@endsection

@section('content')




   <div class="container ">
      
  
             
 
        @if(count($search_user)>0 || count($search_fluidbn_story)>0 || count($search_article)>0 || count($search_genre)>0) 
         <h2 class="featurette-feed">Showing results for <strong>{{$search}}</strong></h2> 
          <div class="row featurette">
        @foreach($search_user as $u)
        <div class="col-sm-4 ">
        <div class="box">
            <a href="{{route('profile',['user'=>$u,'slug'=>str_slug($u->fname." ".$u->lname)])}}"  <h5 class="writer">{{ucfirst($u->fname)}}
                  {{ucfirst($u->lname)}}
              </h5>
             
               <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$u->hasProfile->profile_image}}" alt=""></a>
               
              <div class="lower-margin">
              <h6 class="margin writer">{{ucfirst($u->hasProfile->about) }}</h6>
              </div>
          </div>
          </div>
   
    @endforeach
  </div>
  
  {{-- fbn studio stories--}}

                 <div class="row featurette">
                   @foreach($search_fluidbn_story as $a)
                   <div class="col-sm-4">
                   <div class="box">
       <a href="{{route('studio-story',['StudioStories'=>$a,'slug'=>str_slug($a->title)])}}"><h2 class="featurette-heading-small">{{$a->title}}</h2></a>
      
                   </div>
     
          <div class="polaroid-small lower-margin">
              
              <a href="{{route('show-article',['article'=>$a,'slug'=>str_slug($a->title)])}}"><img class="featurette-image img-fluid mx-auto" src="/storage/article_images/{{$a->title_image}}" alt=""></a>
      </div>
      
        </div>
                   
    
      @endforeach
 </div>
 {{-- stories--}}

                 <div class="row featurette">
                   @foreach($search_article as $a)
                   <div class="col-sm-4">
                   <div class="box">
       <a  href="{{route('show-article',['article'=>$a,'slug'=>str_slug($a->title)])}}'"> <h2 class="featurette-heading-small">{{$a->title}}</h2></a>
        <p class="writer-small">{!!wordwrap(str_limit($a->content,200),150,"<br>\n",TRUE)!!}</p>
                   </div>
     
          <div class="polaroid-small lower-margin">
              
              <a href="{{route('show-article',['article'=>$a,'slug'=>str_slug($a->title)])}}"><img class="featurette-image img-fluid mx-auto" src="/storage/article_images/{{$a->title_image}}" alt=""></a>
      </div>
      
        </div>
                   
    
      @endforeach
 </div>
 {{-- genre stories--}}
   
    <div class="row featurette">
    @foreach($search_genre as $g)
       
      <div class="col-sm-4">
      
      @foreach($g->hasArticles as $a)
         
      <div class="box">
       <a  href="{{route('show-article',['article'=>$a,'slug'=>str_slug($a->title)])}}'"> <h2 class="featurette-heading-small">{{$a->title}}</h2></a>
        <p class="writer-small">{!!wordwrap(str_limit($a->content,200),150,"<br>\n",TRUE)!!}</p>
      </div> 
     
          <div class="polaroid-small lower-margin">
              
              <a href="{{route('show-article',['article'=>$a,'slug'=>str_slug($a->title)])}}"><img class="featurette-image img-fluid mx-auto" src="/storage/article_images/{{$a->title_image}}" alt=""></a>
      </div>
      
   
    
    
      @endforeach
      </div>
      @endforeach 
   </div>
 
    @else
  <h2 class="featurette-feed">Sorry no results for <strong>{{$search}}</strong> found</h2> 
@endif  

      
    
     
       </div>
   

  

@endsection