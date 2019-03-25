
@extends('layouts.main3')

@section('title')
{{ucfirst($article->title)}} - {{ucfirst($article->writtenBy->fname)}} {{ucfirst($article->writtenBy->lname)}}  | fluidbN
@endsection

  
    

@section('content')
<div class="w3-container">
    <div class="row">
    <div class="col-sm-8">   
  <div class=" w3-hide-small w3-hide-medium ">

<h2 class="featurette-heading w3-center" style="margin-top:10px; color:black;font-weight:bold;font-size:4rem;">{{ucfirst($article->title)}}</h2>
  </div>
     </div>
  <div class=" w3-hide-large " style="margin-top:4%;" >

<h2 class="featurette-heading w3-xxlarge w3-center" style="margin-top:20px; color:black;font-weight:bold;">{{ucfirst($article->title)}}</h2>
  </div>
    



   

     
      
     <div class="col-sm-4">
     
              <div class="frame "  style="margin-top:2rem;text-align:center;">    
            <img class=" zoom  img-fluid mx-auto" src="/storage/article_images/{{$article->title_image}}"alt=""  onclick="document.getElementById('modal02').style.display='block'">
            
          </div>
          <div id="modal02" class="w3-modal" onclick="this.style.display='none'">
            <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
            <div class="w3-modal-content w3-animate-zoom">
              <img src="/storage/article_images/{{$article->title_image}}"  class="zoom" style="width:100%">
            </div>
          </div>    
     </div>
    </div>
  </div>

     
      @php
      if($views>1)
      $v = $views.' views';
     else if($views==0)
     $v = "";
      else
      $v = $views.' view';
      if($wows==0)
      $w = '';
      else if($wows==1)
      $w = '  '.$wows.' wow';
      else
      $w = '  '.$wows.' wows';
      
      @endphp
      <div class="container">
      <div class="row">
      
      
      
      <div class="col-md-12" id ="{{'st-'.$article->id}}">
         
          <small class="writer">{{$article->created_at->format('d F Y')}}</small> <small class="views right-wow"> {{$v}}</small> <small class="views right-wow" id="wow"> {{$w}}</small>       <hr class="featurette-divider">
          <div style="font-size:1.3rem;color:black;">

          <p>{!! htmlspecialchars_decode($article->content) !!}</p>
          </div>
           
{{--     
        <div class="w3-card-white"><button class=" w3-button w3-flat-pomegranate w3-right" data-storyId="{{$article->id}}" id="report">Report story</button> 
                    
        </div>  --}}
          </div
          
           </div>
           <div class="row">
          @if(count($articleImages)>0)
          @foreach($articleImages as $ai)
      <div class="col-md-4">
      
          <img class=" featurette-image img-fluid mx-auto" src="/storage/article_images/{{$ai->image}}" id="multi-img"alt="" style="box-shadow: 5px 5px 5px #888888;width:auto;height:auto;">
          
          </div>
          @endforeach
          @endif
      </div>
      
      <footer>
         {{-- writer info --}}
<div class="row">
   
  <div class="col-sm-6 w3-center">
          
          <div class="box" id="mainView" data-articleid="{{$article->id}}" style="margin-top:5rem;">
              
         
          
          <h2 class="w3-large" style="font-weight:bold;color:black;">Author</h2>    
              <a href="{{route('profile',['user'=>$article->writtenBy,'slug'=>str_slug($article->writtenBy->fname." ".$article->writtenBy->lname)])}}">
              <img class=" featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$article->writtenBy->hasProfile->profile_image}}" alt=""><h5 class="w3-medium">{{ucfirst($article->writtenBy->fname)}}
               
                {{ucfirst($article->writtenBy->lname)}}</h5></a>
          
             
              <h6 class="w3-small" style="margin-top:5px;">{{$article->writtenBy->hasProfile->about }}</h6>
             
           <button onclick="document.getElementById('id01').style.display='block'" class="btn margin btn-login" id ="">{{"Follow"}}</button> 
             
        
               </div>
   
      </div>
    </div>
           <div class="footer-story">
           {{--
            <div class="w3-container">
       
    
      
          <audio controls style="margin-bottom:1rem;">
              <source src="/storage/music/f.mp3" type="audio/mpeg">
          </audio>
        --}}
        </div>
      </div>
      <div class="w3-bar w3-card stick w3-center">
           <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-padding-large w3-flat-pomegranate " id=""  style="margin-left:5px;margin-top:5px;"  type="submit">Wow</button>
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-padding-large w3-flat-pomegranate" style="margin-top:5px;">Bookmark</button>
        
     {{-- share modal --
   
     <button onclick="document.getElementById('share-m').style.display='block'" class="w3-button w3-padding-large w3-flat-pomegranate" style="margin-top:5px;" id="share">Share</button>
  

  <div id="share-m" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-flat-pomegranate"> 
        <span onclick="document.getElementById('share-m').style.display='none'" 
        class="w3-button w3-display-topright w3-black w3-padding-small">&times;</span>
        <div style="margin-top:1%;">
        <h2 class="w3-medium">Share url on other social media to let the ideas and stories reach better !</h2>
        </div>
      </header>
      <div class="w3-container">
          <input type="text" id="share-url">
    
      </div>
       </div>
  </div>

      share modal end --}}
      
     <footer class="w3-container">
          <table class="table table-bordered table-hover ">
               
                <tbody class="sys w3-small" style="color:black;">
                
                </tbody>
                 
                </table>
      </footer>   
    </div>
    
        {{--
        <button class="btn btn-login" style="margin-top:5px;margin-bottom:10px;" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}')">Share on facebook</button>
        <button class="btn   btn-login" style="margin-top:5px;margin-bottom:10px;" onclick="window.open('https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl())}}')">Share on twitter</button>
       --}}
  

         
          @if(count($related_articles)>0)
          <div class="w3-container lower-margin w3-hide-small w3-hide-medium">
          <h2 class="featurette-heading"style="color:black;margin-left:5rem;font-size:2.5rem;font-weight:bold;">Related stories   @if(count($related_articles)==3) <a href="{{route('stories-genre',['genre'=>$article->ofGenre])}}">See all</a>@endif</h2>
          </div>
           <div class="w3-container w3-hide-large" style="margin-top:10%;">
          <h2 class="featurette-heading"style="color:black;margin-left:5rem;font-size:1.5rem;font-weight:bold;">Related stories   @if(count($related_articles)==3) <a href="{{route('stories-genre',['genre'=>$article->ofGenre])}}">See all</a>@endif</h2>
          </div>
          <div class="row featurette" style="margin-left:6px;">
            @foreach ( $related_articles as $ra )
           
              <div class="col-md-4">
            
                <a onclick="document.getElementById('id01').style.display='block'">
                <div class="card-related" style="background:white;">
                  <img class=" featurette-image img-fluid mx-auto" src="/storage/article_images/{{$ra->title_image}}" alt="">
                  <div class="container-related lower-margin" style="background:white;">
                    <h2  class="featurette-heading-small"style="font-size:25px;font-weight:bold;">{{ucfirst($ra->title)}}</h2>
                   
                     @if($ra->views>0)<small class="views"> {{ '   '.$ra->views.' views'}}</small>@endif
                    
                    <div class="">
                      <img class=" featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$ra->writtenBy->hasProfile->profile_image}}" alt=""> <small class="writer-small"><a href="{{route('profile',['user'=>$ra->writtenBy,'slug'=>str_slug($ra->writtenBy->fname." ".$ra->writtenBy->lname)])}}">{{ucfirst($ra->writtenBy->fname).' '. ucfirst($ra->writtenBy->lname)}}</a></small><div class=""><small class="margin writer-small">{{$ra->writtenBy->hasProfile->about }}</small></div>
                       </div>  
                  </div>
                </div>
                </a>
               
                  <br/>
                  
                  
           </div>
      

            @endforeach
        
          </div>
            @endif
         
          @if(count($articles_of_samewriter)>0)
          
          <div class="w3-container lower-margin w3-hide-small w3-hide-medium">
          <h2 class="featurette-heading"style="color:black;margin-left:5rem;font-size:2.5rem;font-weight:bold;">More stories from {{ucfirst($article->writtenBy->fname)}}...!  @if(count($articles_of_samewriter)==3)<a href="{{route('stories-user',['user'=>$article->writtenBy])}}">See all</a>@endif</h2>
          </div>
          <div class="w3-container w3-hide-large" style="margin-top:10%;">
          <h2 class="featurette-heading"style="color:black;margin-left:5rem;font-size:1.5rem;font-weight:bold;">More stories from {{ucfirst($article->writtenBy->fname)}}...!  @if(count($articles_of_samewriter)==3)<a href="{{route('stories-user',['user'=>$article->writtenBy])}}">See all</a>@endif</h2>
          </div>
          <div class="row featurette"  style="margin-left:6px;">
            @foreach ( $articles_of_samewriter as $ra )
               
            <div class="col-md-4">
       
              <div class="">
                <a onclick="document.getElementById('id01').style.display='block'" <small class="genre-feed">{{ucfirst($ra->ofGenre->name)}}</small></a>
              </div>
               
                <a onclick="document.getElementById('id01').style.display='block'">
                <div class="card-related" style="background:white;">
                  <img class="  featurette-image img-fluid mx-auto img-card" src="/storage/article_images/{{$ra->title_image}}" alt="">
                  <div class="container-related lower-margin" style="background:white;">
                    <h2  class="featurette-heading-small"style="font-size:25px;font-weight:bold;">{{ucfirst($ra->title)}}</h2>
                   
                  @if($ra->views>0)<small class="views"> {{ '   '.$ra->views.' views'}}</small>@endif
                  </div>
                </div>
                </a>
               
                  <br/>
                  
                  
           </div>
      
                       
                
            @endforeach
            </div>
          
          @endif

{{--
         <div class="">

          

            <button  class="btn   btn-login" style="margin-left:20px;" id="comment"  data-toggle="modal" data-target="#commenton">
           Write a word of appreciation
            </button>
          
            <!-- The Modal -->
            <div class="modal fade" id="commenton">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title writer">{{ucfirst(Auth::user()->fname).' express your words of appreciation to '.ucfirst($article->writtenBy->fname) }} !</h4>
                   
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                   
                  {!! Form::open(['route'=>['comment',$article->id],'method'=>'POST']) !!} 
                     
          
                          
                       
                          <div class="form-group">
               
                  {{Form::textarea('comment','',['class'=>'form-control','placeholder'=>'Share your words of appreciation...','id'=>'commentarea'])}}
                  </div>
                 
                  {{Form::submit('Done',['class'=>'btn  ','id'=>'commentSubmit'])}}
                  
                         
                       
                         {!! Form::close() !!}
                  </div>
                  
            
                  
                </div>
              </div>
            </div>
            
          
       </div>
       --}}
                       
       {{-- login modal --}}
        <div id="id01" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
        <div class="w3-center"><br>
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
          <img src="/storage/general/login-alert-story2.png" alt="Avatar" style="width:60%" class=" w3-margin-top">
        </div>
  
        {!! Form::open(['action'=>'Auth\LoginController@login','method'=>'POST','class'=>'w3-container']) !!}
                                 
                                 
                              
                                    
                                                <div class="w3-section">
                                              {{Form::label(' email ','',['class'=>'fa fa-user'])}}
                                              {{Form::email('email','',['class'=>'w3-input w3-border w3-margin-bottom'])}}
                                            
                                              {{Form::label(' password ','',['class'=>'fa fa-lock'])}}
                                              {{Form::password('password',['class'=>'w3-input w3-border'])}}
                                          
                                              {{Form::submit(' Login', ['class'=>'w3-button w3-block w3-black w3-section w3-padding '])}}
                                             
                                            @csrf
                                          {!! Form::close() !!}
                                          <p>Not a member ? <a href="{{route('register')}}" style="color:mediumvioletred;">Signup Now</a></p>
                                                </div>
  
        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
          <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
          <span class="w3-right w3-padding"><a href="{{ route('password.request') }}">Forgot password?</a></span>
        </div>
  
      </div>
    </div>
         
       </div>
        </footer>
    </div>
  
<script>
 var reportStory = "{{ route('report-st') }}";
    @include('includes.buttons') 
</script>
    <script>
        $('ul.pagination').hide();
        $(function() {
            $('.infinite').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="  center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite',
                callback: function() {
                    $('ul.pagination').remove();
                   }
                 });
              });
        
      </script> 
  






@endsection


