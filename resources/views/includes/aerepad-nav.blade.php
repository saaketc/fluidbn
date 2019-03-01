<!-- Navbar (sit on top) -->

<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-left  w3-hide-large" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
   
    <a href="#" class="w3-bar-item  w3-wide "><img class="featurette-image img-fluid mx-auto" src="/storage/logo/logow.png" style=""></a>
    
    <div class="w3-display-right">  
    <button class="w3-button w3-flat-pomegranate"onClick="window.location.reload()">Check new updates </button>
    </div>
 
    <!-- Right-sided navbar links -->
{{--      
     {!! Form::open(['route'=>'search','method'=>'GET']) !!}  
       
   
    {{Form::text('search','',['id'=>'search-p','class'=>'w3-large w3-flat-pomegranate search ','placeholder'=>'Search here..','autocomplete'=>'off'])}}

    {!! Form::close() !!}
     <div class="w3-container w3-hide" id="tab-p" style="">
         
      <table class="table table-bordered table-hover ">
               
                <tbody id="sys" style="color:black;">
                
                </tbody>
                 
                </table> 
  
    
  </div>
    --}}

           
    <div class="w3-display-topmiddle w3-hide-small w3-hide-medium" id="nav-p" style="margin-top:0.5%;">
      {{--<a href="#about" class="w3-bar-item w3-button">About</a>--}}
    
      <button onclick="location.href='/aerepad/newsfeed'" class="w3-bar-item w3-button">News feed</button>
      <button onclick="location.href='/aerepad/login'" class="w3-bar-item w3-button">Desk</button>
  <button onclick=""  class="w3-bar-item w3-button">Events</button>
  <button onclick=""  class="w3-bar-item w3-button">Informals</button>

 



</div>


    </div>
 
    {{-- Hide right-floated links on small screens and replace them with a menu icon --}}
{{--
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
    --}}
  </div>
 


 
{{-- Sidebar on small screens when clicking the menu icon --}}
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left  w3-hide-large" style="display:none;width:100%;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close &times;</a>
  {{--<a href="#about" class="w3-bar-item w3-button">About</a>--}}
  <a href='/aerepad/newsfeed' class="w3-bar-item hov-a-white">News feed</a>
  @auth('aerepad') 
  <a href='/aerepad/login' class="w3-bar-item hov-a-white">Desk </a>
  @endauth
  <a href=""  class="w3-bar-item hov-a-white">Events</a>
  <a href="" class="w3-bar-item hov-a-white">Informals</a>
  

 


<div class="w3-container w3-hide-large w3-hover-black">
             
    <table class="table table-bordered ">
             
              <tbody id="sy" style="color:white;" class="hov-a-white">
              
              </tbody>
               
              </table>

  
</div>

    </div>
    
</nav>

