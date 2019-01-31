
@extends('layouts.main')
@section('title')
{{ucfirst($user->fname)."'s Profile"}} | fluidbN

@endsection

@section('content')


  @auth 
               @php
               $follow = Auth::user()->follows()->wherePivot('follower_id',Auth::user()->id)->wherePivot('following_id',$user->id)->first();
                
               @endphp
               @endauth
                @php
               
                if($followers>1)
                $f= 'followers';
                
                else
                $f = 'follower';
                @endphp

  <!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
    <!-- The Grid -->
    <div class="row">
      <!-- Left Column -->
      <div class="col-md-4">
        <!-- Profile -->
        <div class="w3-card w3-round w3-white">
          <div class="w3-container">
           
           <h5 class="homewriter featurette-heading-title" style="color:black;">{{ucfirst($user->fname)}}
            {{ucfirst($user->lname)}}
        </h5>
        <div class="container1">
          <p class="w3-center"><img class="featurette-image img-fluid w3-circle" style="box-shadow:5px 5px 5px #888888;height:106px;width:106px" src="/storage/profile_images/{{$user->hasProfile->profile_image}}" alt="" onclick="document.getElementById('modal02').style.display='block'"></p>
           <div id="modal02" class="w3-modal" onclick="this.style.display='none'">
            <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
            <div class="w3-modal-content w3-animate-zoom">
              <img src="/storage/profile_images/{{$user->hasProfile->profile_image}}" style="width:100%">
            </div>
          </div> 
           <div class="middle box">
            @if(Auth::user())
           @if(Auth::user()->id==$user->id)
<button class="btn btn-login" onclick="location.href='{{route('settings')}}'">Update pic</button>
          @endif
          @endif
          </div>
        </div>
           <hr>
           <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>{{$user->hasProfile->about }}</p>
           <p class="writer"> @if($user->hasProfile->education != null && $user->hasProfile->yos != null && $user->hasProfile->college != null)<i class="fa fa-suitcase w3-text-theme" ></i> {{$user->hasProfile->education." ".$user->hasProfile->yos.' student @ '. $user->hasProfile->college}}@endif</p>
           <p class="writer"> @if($user->hasProfile->startup != null)<i class="fa fa-suitcase w3-text-theme" ></i> {{' Student startup : '.ucfirst($user->hasProfile->startup)}}@endif</p>
           <p class="writer"> @if($user->hasProfile->designation != null)<i class="fa fa-suitcase w3-text-theme" ></i> {{$user->hasProfile->designation .' @ '. $user->hasProfile->company}}@endif</p>
           @if($followers!=0)<p  class="" id="followers" style="margin-bottom:5px;font-size:15px;font-weight:bold;">{{$followers.' '.$f.'  '}}</p>
           @endif
        
         {{--  <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
           <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
         --}}  
           {{-- 
            <button class="btn  btn-login " onclick="location.href='{{route('user-categories',['user'=>$user,'slug'=>str_slug($user->fname.".".$user->lname)])}}'"  style="margin-top:5px;">
               <small class="pro_info">{{ucfirst($user->fname)."' story choices"}}</small></button>--}}


          
          </div>
          @php
          $f = Auth::user()->follows()->wherePivot('follower_id',Auth::user()->id)->wherePivot('following_id',$user->id)->first();
        
         if($f)
           $cl="pressed";
           else
           $cl="";
          @endphp
          @if(Auth::user()->id!=$user->id)<button class="btn btn-login fol {{$cl}}" id="" data-userid="{{$user->id}}"
                        
            style="margin-bottom:5px;margin-left:5px;">{{$follow?"Following":"Follow"}}</button>
           
              <div class" w3-hide w3-container" id="fol-sugg-tab">
            <h3 class="w3-large" style="color:black;font-weight:bold;">Follow suggestions  <button class="w3-button w3-black" id="fol-sugg-cls"><i class="fa fa-close"></i></button></h3>
            <table class="table table-bordered table-hover">
                
              <tbody id="fol_sugg">
              
              </tbody>
               
              </table>
            </div>
              
            @endif
          
        </div>
        <br>
        
        <!-- Accordion -->
        <div class="w3-card w3-round">
          <div class="w3-white">
           
            @if(Auth::user())
            @if(Auth::user()->id==$user->id)
            
                <button class=" w3-button w3-block w3-theme-l1 w3-left-align" onclick="location.href='{{route('follows',['user'=>$user,'slug'=>str_slug($user->fname." ".$user->lname)])}}'" style=""><i class="fa fa-plus-circle fa-fw w3-margin-right"></i>People you follow</button>
            
        @else
        <button class=" w3-button w3-block w3-theme-l1 w3-left-align" onclick="location.href='{{route('follows',['user'=>$user,'slug'=>str_slug($user->fname." ".$user->lname)])}}'" style=""><i class="fa fa-plus-circle fa-fw w3-margin-right"></i>People {{ucfirst($user->fname)}} follows</button>
         
              
            
            @endif
            @endif
            @if($followers!=0)<button  class="w3-button w3-block w3-theme-l1 w3-left-align" id="followers" style="" data-toggle="modal" data-target="#follow"><i class="fa fa-plus-circle fa-fw w3-margin-right"></i>Followers</button>
            @endif
             {{-- follow modal--}}

           <!-- The Modal -->
           <div class="modal fade" id="follow">
             <div class="modal-dialog modal-md">
               <div class="modal-content">
               
                 <!-- Modal Header -->
                 <div class="modal-header">
                       <div class="imgcontainer">
                                       @if(Auth::user()->id==$user->id)
                                       <h3 style="font-weight:40%;">See who follows you</h3>
                                       @else
                                       <h3 style="font-weight:40%;">See who follows {{ucfirst($user->fname)}}</h3>
                                    @endif
                                   </div>
               
                
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 
                 <!-- Modal body -->
                 <div class="modal-body">
                  
                  @if(count($follows)>0)
                  <div class="row">
                     
                     @foreach($follows as $f)
                     
                     <div class="col-sm-4">
                     <a href="{{route('profile',['user'=>$f,'slug'=>str_slug($f->fname." ".$f->lname)])}}">
                     <img class="featurette-image img-fluid mx-auto propic-small" src="/storage/profile_images/thumbnails/{{$f->hasProfile->profile_image}}" alt="">
                     <small class="writer"> {{ucfirst($f->fname).' '.ucfirst($f->lname) }}</small>
                     </a>
                     </div>
                     @endforeach
                     
                     </div> 
                       @endif
                                 </div>
                                  @if(count($follows)>21)
                                   <div class="modal-footer">
                       <div class="imgcontainer">
                                       
                                       <a href="">
                                             @if(Auth::user()->id==$user->id)
                                       <h3 style="font-weight:40%;">See all of your followers</h3>
                                       @else
                                       <h3 style="font-weight:40%;">See all followers of {{ucfirst($user()->fname)}}</h3>
                                       @endif
                                       </a>
                                      
                                   </div>
                                  </div>
                                   @endif
                               </div>     
                             </div>
                            </div>     

           {{--follow modal close--}}
          </div>      
        </div>
        <br>
        
        {{-- Story choices --}}
        <div class="w3-card w3-round w3-white">
          <div class="w3-container">
            <p style="font-size:20px;color:black;font-weight:bold;">Story choices</p>
            <p>
                @foreach ($userGenre as $ug)
                <a href="{{route('stories-genre',['genre'=>$ug])}}">
              <span class="w3-tag w3-small w3-theme-l4" style="font-weight:bold;">{{ucfirst($ug->name)}}</span>
                </a>
            @endforeach
            </p>
          </div>
        </div>
        <br>
        
       {{--
        <!-- Alert Box -->
        <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
          <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
            <i class="fa fa-remove"></i>
          </span>
          <p><strong>Hey!</strong></p>
          <p>People are looking at your profile. Find out who.</p>
        </div>
      --}}

      </div>
      
      <!-- Middle Column -->
      <div class="col-md-7">
         @if(Auth::user())
         @if(Auth::user()->id==$user->id)
        
              <div style="margin-bottom:30px;">
                
                <button class="w3-button" style="margin-top:5px;"onclick="location.href='{{route('write')}}'"><i class="fa fa-pencil"></i> Write a story</button> 
                <button  class="w3-button" style="margin-top:5px;" onclick="location.href='{{route('write-theory')}}'"><i class="fa fa-pencil"></i> Share a theory</button> 
              </div>
   
       
        @endif
        @endif
        <div style="margin-left:35px; margin-bottom:30px;" >
        <button  class="w3-button w3-black" id="story-btn-p">
            Stories </button>
             <button  class="w3-button w3-black" id="theory-btn-p">
              Theories </button>
            </div>
          {{-- stories --}}
           
          <div class="w3-hide w3-container" id="fbn-story-p">
        @if(count($article)>0)
        <div class="lower-margin" style="text-align:center;">
            <h1 class="featurette-heading-feed">@if(Auth::user()->id==$user->id) {{"Your stories"}}
            @else 
           {{"By ".ucfirst($user->fname)}}@endif</h1>
              </div>
        
                  
        

                   <div class="infinite-story">
                      @foreach ( $article as $a )
                      
                      <a href="{{route('show-article',['article'=>$a,'slug'=>str_slug($a->title)])}}">
                       
                      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
               
                     
                        <span class="w3-right w3-opacity" style="font-weight:bold;">{{ucfirst($a->ofGenre->name)}}</span>
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2><br>
                        <hr class="w3-clear">
                        <img class="featurette-image img-fluid mx-auto w3-margin-bottom" style="border-radius:10px;" src="/storage/article_images/{{$a->title_image}}" alt="">
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
                        <small class="views">{{$w}}</small>
                      </div> 
                      </a>
        @endforeach
        {{$article->links()}}
        </div>
        @elseif(Auth::user()->id == $user->id)
                
                        <p class="" style="color:black;">{{ucfirst($user->fname).' looks like you haven\'t created any story...'}} <a href="{{route('write')}}"><strong>Create one !</strong></a></p>
                   @else        
                   <p class="" style="color:black;">{{'Sorry currently no stories from '.ucfirst($user->fname).' but sure to come till then...'}}<a href="{{route('feed')}}"><strong>Explore fluidbN !</strong></a></p>
                      
                 
                     @endif
    {{-- end stories --}}

     
          {{-- liked stories --}}
           
         
          @if(count($liked_articles)>0)
          <div class="lower-margin" style="text-align:center;">
              <h1 class="featurette-heading-feed">@if(Auth::user()->id==$user->id) {{"Stories you liked "}}<i class="fa fa-heart" style="font-size:35px;color:red;"></i>
                @else 
               {{"Liked by ".ucfirst($user->fname) }}
               @endif</h1>
               </div>
          
                    
          
  
                     <div class="infinite-liked">
                        @foreach ( $liked_articles as $a )
                        
                        <a href="{{route('show-article',['article'=>$a,'slug'=>str_slug($a->title)])}}">
                         
                        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                 
                          <img class="featurette-image img-fluid   propic-small" src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt=""> <small class="writer-small">{{ucfirst($a->writtenBy->fname).' '. ucfirst($a->writtenBy->lname)}}</small><div class="">{{--<small class="margin writer-small">{{$a->writtenBy->hasProfile->about }}</small>--}}</div>
                         <br>
                          <span class="w3-right w3-opacity" style="font-weight:bold;">{{ucfirst($a->ofGenre->name)}}</span>
                          <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2><br>
                          <hr class="w3-clear">
                          <img class="featurette-image img-fluid mx-auto w3-margin-bottom" style="border-radius:10px;" src="/storage/article_images/{{$a->title_image}}" alt="">
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
                        <div>
                            <small class="views">{{$w}}</small>
                        </div>
                        </div> 
                        </a>
          @endforeach
          {{$liked_articles->links()}}
                      </div>
                       @endif
          </div>
      {{-- end liked stories --}}
          

          {{-- theories --}}
           
          <div class="w3-hide w3-container" id="fbn-theory-p">  
          @if(count($theory)>0)
          <div class="lower-margin" style="text-align:center;">
              <h1 class="featurette-heading-feed">@if(Auth::user()->id==$user->id) {{"Your theories"}}
              @else 
             {{"By ".ucfirst($user->fname)}}@endif</h1>
                </div>
          
                    
          
  
                     <div class="infinite-theory">
                        @foreach ( $theory as $a )
                        
                        <a href="{{route('show-theory',['theory'=>$a,'slug'=>str_slug($a->title)])}}">
                     
                         
                        <div class="w3-container w3-card w3-white w3-round w3-margin">
                 
                          
                          <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                          <hr class="w3-clear">
                          
                          <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>
                        </div> 
                        </a>
          @endforeach
          {{$theory->links()}}
          </div>
          @elseif(Auth::user()->id == $user->id)
                
                        <p class="" style="color:black;">{{ucfirst($user->fname).' looks like you haven\'t shared any theory...'}} <a href="{{route('write-theory')}}"><strong>Share !</strong></a></p>
                   @else        
                   <p class="" style="color:black;">{{'Sorry currently no theories from '.ucfirst($user->fname).' but sure to come till then...'}}<a href="{{route('feed')}}"><strong>Explore fluidbN !</strong></a></h2></p>
                      
                   
                       @endif
                   </div>
      {{-- end theories --}}
  



       



      
      {{--  
      <!-- End Middle Column -->
      
      
      <!-- Right Column -->
      <div class="w3-col m2">
        <div class="w3-card w3-round w3-white w3-center">
          <div class="w3-container">
            <p>Upcoming Events:</p>
            <img src="/w3images/forest.jpg" alt="Forest" style="width:100%;">
            <p><strong>Holiday</strong></p>
            <p>Friday 15:00</p>
            <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
          </div>
        </div>
        <br>
        
        <div class="w3-card w3-round w3-white w3-center">
          <div class="w3-container">
            <p>Friend Request</p>
            <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
            <span>Jane Doe</span>
            <div class="w3-row w3-opacity">
              <div class="w3-half">
                <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
              </div>
              <div class="w3-half">
                <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
              </div>
            </div>
          </div>
        </div>
        <br>
        
        <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
          <p>ADS</p>
        </div>
        <br>
        
        <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
          <p><i class="fa fa-bug w3-xxlarge"></i></p>
        </div>
        
      <!-- End Right Column -->
      </div>
      --}}
    <!-- End Grid -->
    </div>
    
  <!-- End Page Container -->
  </div>
  <br>
   
<script>


    $('ul.pagination').hide();
   $(function() {
       $('.infinite-story').jscroll({
           autoTrigger: true,
           loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
           padding: 0,
           nextSelector: '.pagination li.active + li a',
           contentSelector: 'div.infinite-story',
           callback: function() {
               $('ul.pagination').remove();
           }
       });
   });
    
   
   $(function() {
       $('.infinite-theory').jscroll({
           autoTrigger: true,
           loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
           padding: 0,
           nextSelector: '.pagination li.active + li a',
           contentSelector: 'div.infinite-theory',
           callback: function() {
               $('ul.pagination').remove();
           }
       });
   });
   
    
   $(function() {
       $('.infinite-liked').jscroll({
           autoTrigger: true,
           loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
           padding: 0,
           nextSelector: '.pagination li.active + li a',
           contentSelector: 'div.infinite-liked',
           callback: function() {
               $('ul.pagination').remove();
           }
       });
   });
@include('includes.buttons')        
</script>
  @endsection