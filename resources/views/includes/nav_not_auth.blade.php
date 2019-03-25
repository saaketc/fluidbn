<!-- Navbar (sit on top) -->

<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-left  w3-hide-large" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
   
    <a href="{{ url('/') }}" class="w3-bar-item  w3-wide "><img class="featurette-image img-fluid mx-auto" src="/storage/logo/logow.png" style="margin-left:0;"></a>
     <p class="w3-medium w3-flat-pomegranate w3-tag w3-card" style="margin-top:1%;">Beta</p>
     
  
    {{-- search --}}
    <div class="w3-hide-small w3-hide-medium">
   <div class="w3-display-right" style="margin-right:20%;">
     <button onclick="document.getElementById('id-search').style.display='block'" class="w3-button" style="background-color:white;"><i class="fa fa-search" style="font-size:30px;"></i></button>
  </div>
  <div id="id-search" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-flat-pomegranate"> 
        <span onclick="document.getElementById('id-search').style.display='none'" 
        class="w3-button w3-display-topright w3-black w3-padding-medium">&times;</span>
        <h2>Search here</h2>
      </header>
      <div class="w3-container">
          {!! Form::open(['route'=>'search','method'=>'GET']) !!}  
       
   
    {{Form::text('search','',['id'=>'search-p','class'=>'w3-large search ','placeholder'=>'Search for stories, theories & people here...','autocomplete'=>'off'])}}

    {!! Form::close() !!}
    
      </div>
      <footer class="w3-container">
          <table class="table table-bordered table-hover ">
               
                <tbody class="sys" style="color:black;">
                
                </tbody>
                 
                </table>
      </footer>
    </div>
  </div>
  </div>
     {{--  for mobile view--}}

       {{--user--
          <div class="w3-display-right"  style="margin-right:35%;">
<div class="w3-dropdown-hover">
    <button onclick="myFunction2()" class="w3-button" style="background-color:white;"> 
  @auth 
    <img class="img-fluid mx-auto propic-small" style="width:30px;height:30px;"src="/storage/profile_images/thumbnails/{{Auth::user()->hasProfile->profile_image}}" alt="" >
    {{--  <small  style="color:black; font-size:15px;"> {{'   '.ucfirst(Auth::user()->fname)}}</small>  --
  @endauth
    </button>
  <div id="" class="w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom">
      <a href="{{route('profile',['user'=>Auth::user(),'slug'=>str_slug(Auth::user()->fname.' '.Auth::user()->lname)])}}" class="dropdown-item"  >Profile</a>
      <a href="{{route('write')}}" id="write"class="dropdown-item">Write a story</a>
         <a href="{{route('write-theory')}}" id="write-theory"class="dropdown-item">Share your theory</a>
      <a href="{{route('show-bookmark')}}" id="show-bookmark" class="dropdown-item"> My bookmarks</a>
     <a href="{{route('user-categories',['user'=>Auth::user(),'slug'=>str_slug(Auth::user()->fname.".".Auth::user()->lname)])}}" id="mycategories" class="dropdown-item"> My story choices</a>

      <a href="{{route('settings')}}" id="settings" class="dropdown-item"> Settings</a>
      <a href="{{ route('logout') }}"
      onclick="event.preventDefault();
               document.getElementById('logout-form').submit();" class="dropdown-item">
      Logout
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
      @csrf
  </form> 
  </div>
</div>
  </div>
    {{-- end user --

    {{--notis--
     
  <div class="w3-dropdown-hover ">
   <div class="w3-display-right" style="margin-right:15%;" >
      <button onclick="myFunction1()" class="w3-button"> @auth
        <span class="fa fa-bell" id="notifications" style="color:black;font-size:25px;"></span>@if(Auth::user()->unreadNotifications->count()>0)<span class="w3-badge w3-red w3-large noti_count"  id="">{{Auth::user()->unreadNotifications->count()}}</span>@endif
        @endauth</button>
 
      <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom" style="text-align:center;">
      
        @auth
        @if(Auth::user()->unreadNotifications->count()>0)
                         @foreach (Auth::user()->unreadNotifications->take(10) as $n )
                        
                        @if($n->type=="App\Notifications\UserFollowed")
                         @php
                         $u = $n->data['follower_id'];
                         $user = App\User::find($u);
                         $f = $n->data['follower_fname'];
                         $l = $n->data['follower_lname'];
                       
                         @endphp
     
<div style="border:1px solid black;background-color:white;">
       <a href="{{route('profile',['user'=>$user,'slug'=>str_slug($f.' '.$l)])}}" class="dropdown-item notify" data-m={{$n->id}}> <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$user->hasProfile->profile_image}}" alt=""><p class=""style="color:black;font-weight:500px;">{{$n->data['message']}}</p></a>
       </div>
   
                     
                        @elseif($n->type=="App\Notifications\UserWelcome")
                        <div style="border:1px solid black;background-color:white;">
                        <a href="" class="dropdown-item notify" data-m={{$n->id}}><p class=""style="color:black;font-weight:500px;">{{$n->data['message']}}</p></a>
                        </div>
                   
                         
                          @elseif($n->type=="App\Notifications\UserFollowedTheory")
                          @php 
                          $id = $n->data['theory_id']; 
                         
                         
                          $art = App\Theory::find($id);
                          $title = $n->data['theory_title']; 
                          @endphp
                          <div style="border:1px solid black;background-color:white;">
                          <a href="{{route('show-theory',['theory'=>$art,'slug'=>str_slug($title)])}}" class="dropdown-item notify" data-m={{$n->id}}><p class=""style="color:black;font-weight:500px;">{{$n->data['message']}}</p></a>
                          </div>
                    
                          @else
                          @php 
                          $id = $n->data['article_id']; 
                         
                         
                          $art = App\Article::find($id);
                          $title = $n->data['article_title']; 
                          @endphp
                          <div style="border:1px solid black;background-color:white;">
                          <a href="{{route('show-article',['article'=>$art,'slug'=>str_slug($title)])}}" class="dropdown-item notify dropNot" data-m={{$n->id}}><p class=""style="color:black;font-weight:500px;">{{$n->data['message']}}</p></a>
                          </div>
                     
                          @endif
                         @endforeach
                        
                       @if(Auth::user()->unreadNotifications->count()>10)
                         <a href="{{route('all-notifications')}}"><p style="color:black;text-align:center;font-weight:500;font-size:25px;"> See all </p></a>
                        @endif
                       
                         @else
                     
                        <a href=""class="dropdown-item"> No new notifications</a>
                         <a href="{{route('all-notifications')}}" class="dropdown-item">All notifications</a>
                       
                         @endif 
                         @endauth
    </div>

      </div>
  </div>
  --}}
      <div class="w3-hide-large">
   <div class="w3-display-right" style="margin-right:20%;">
     <button onclick="document.getElementById('id-search2').style.display='block'" class="w3-button" style="background-color:white;"><i class="fa fa-search" style="font-size:30px;"></i></button>
  </div>
  <div id="id-search2" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-flat-pomegranate"> 
        <span onclick="document.getElementById('id-search2').style.display='none'" 
        class="w3-button w3-display-topright w3-black w3-padding-medium">&times;</span>
        <h2>Search here</h2>
      </header>
      <div class="w3-container">
          {!! Form::open(['route'=>'search','method'=>'GET']) !!}  
       
   
    {{Form::text('search','',['id'=>'search-p','class'=>'w3-small search ','placeholder'=>'Search for stories, theories & people here...','autocomplete'=>'off'])}}

    {!! Form::close() !!}
    
      </div>
      <footer class="w3-container">
          <table class="table table-bordered table-hover ">
               
                <tbody class="sys w3-small" style="color:black;">
                
                </tbody>
                 
                </table>
      </footer>
    </div>
  </div>
  </div>
   
    <div class="w3-display-topmiddle w3-hide-small w3-hide-medium" id="nav-p" style="margin-top:0.5%;">
      {{--<a href="#about" class="w3-bar-item w3-button">About</a>--}}
    
      <button onclick="location.href='/feed'" class="w3-bar-item ">Feed</button>
  <button onclick="location.href='{{route('curated-story')}}'"  class="w3-bar-item w3-button">Curated stories</button>
  <button onclick="location.href='{{route('all-story-choices')}}'"  class="w3-bar-item w3-button">All story choices</button>
  <button onclick="document.getElementById('id01').style.display='block'"class="w3-bar-item w3-button w3-flat-pomegranate">Login</button>
  <button onclick="location.href='{{route('register')}}'"class="w3-bar-item w3-button w3-flat-pomegranate" style="margin-left:10px;">Signup</button>
  
</div>
  </div>
 

  </div>
 


 
{{-- Sidebar on small screens when clicking the menu icon --}}
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left  w3-hide-large" style="display:none;width:100%;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close &times;</a>
  {{--<a href="#about" class="w3-bar-item w3-button">About</a>--}}
  
  <a onclick="document.getElementById('id01').style.display='block'"  class="w3-bar-item hov-a-white">Login</a>  
  <a href="{{route('register')}}"  class="w3-bar-item hov-a-white">Signup</a>
  <a href='/feed' class="w3-bar-item hov-a-white">Feed</a>
  <a href="{{route('curated-story')}}"  class="w3-bar-item hov-a-white">Curated stories</a>
  <a href="{{route('all-story-choices')}}"  class="w3-bar-item hov-a-white">All story choices</a>
  
 
 
</div>
   
    


    
</nav>

