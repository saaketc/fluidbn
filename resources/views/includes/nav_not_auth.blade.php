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
 
</nav>

