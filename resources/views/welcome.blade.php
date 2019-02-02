<!DOCTYPE html>
<html>
<head>

<title>fluidbN - A place to read write learn way better with fun</title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133705211-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-133705211-1');
</script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="/storage/logo/favicon2.png" sizes="48x48">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Atma:700" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
 // body {font-family: 'Atma', cursive;}
 .coolhead{font-family: 'Atma', cursive;}
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position:auto;
  background-size:cover;
  background-image: url("/storage/general/main.png");
  min-height: 100%;

}
.bgimg-2 {
  background-position:center;
  background-size:cover;
  background-image: url("/storage/general/main-mob.png");
  min-height: 100%;

}
.bgimg-3 {
  background-position: center;
  background-size:cover;
  background-image: url("/storage/general/front.png");
  min-height: 100%;

}
.bgimg-4 {
  background-position: center;
  background-size:cover;
  background-image: url("/storage/general/front-mob.png");
  min-height: 100%;

}
.bgimg-5 {
  background-position: center;
  background-size:cover;
  background-image: url("/storage/general/fbn_back.png");
  min-height: 100%;

}
.bgimg-6 {
  background-position: center;
  background-size:cover;
  background-image: url("/storage/general/fbn_back_mob.png");
  min-height: 100%;

}
.w3-bar .w3-button {
  padding: 16px;
}
a{
  text-decoration:none;
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item  w3-wide"><img class="featurette-image img-fluid mx-auto" src="/storage/logo/logow.png" style=""></a>
 
    
 
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small w3-hide-medium">
      {{--<a href="#about" class="w3-bar-item w3-button">About</a>--}}
      <button onclick="location.href='{{route('login')}}'"  class="w3-bar-item w3-button">Login</button>
  <button onclick="location.href='{{route('register')}}'"  class="w3-bar-item w3-button">Signup</button>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left  w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close &times;</a>
  {{--<a href="#about" class="w3-bar-item w3-button">About</a>--}}
  <button onclick="location.href='{{route('login')}}'"  class="w3-bar-item w3-button">Login</button>
  <button onclick="location.href='{{route('register')}}'"  class="w3-bar-item w3-button">Signup</button>
</nav>
<div id="top">
</div>
<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-hide-small w3-hide-medium" id="home">
    
  <div class=" w3-text-white w3-display-left" style="padding:28px;">
      
    <span class="w3-jumbo w3-hide-small coolhead" style="margin-top:30%;color:black;">Welcome to fluidbN</span><br>
   
   
    <span class="w3-large" style="color:black;">A place to read write learn way better with fun !</span>

    <p><button onclick="location.href='{{route('register')}}'" class="w3-button w3-black w3-padding-large w3-large">Get Started</button>
   <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black w3-padding-large w3-large">Login</button></p>

     
       
  </div> 
  

</header>
<header class="bgimg-2 w3-display-container w3-hide-large" id="home">
    
    <div class=" w3-text-white w3-display-left" style="padding:28px;">
        
     
      <span class="w3-xxlarge w3-hide-large  coolhead " style="color:black;">Welcome to fluidbN</span><br>
   
      <span class="w3-large" style="color:black;">A place to read write learn way better with fun !</span>
      
    
    </div> 
    
    <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
        <p><button onclick="location.href='{{route('register')}}'" class="w3-button w3-black w3-padding-medium w3-medium">Get Started</button>
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black w3-padding-medium w3-medium">Login</button></p>

    </div>
   
  </header>
  


<div class="bgimg-3 w3-display-container w3-hide-small w3-hide-medium " id="" style="margin-top:0.05%;">
    <div class=" w3-text-white" style="padding:48px;text-align:center;">
        
      <span class="w3-xxxlarge w3-hide-small  w3-hide-medium coolhead" style="margin-top:10%; color:black;">Get on board to<br> experience the information media like never before</span><br>
     
    </div> 
    
   
  </div>
  
<div class="bgimg-4 w3-display-container w3-hide-large" id="" style="margin-top:0.05%;">
    <div class=" w3-text-white" style="padding:48px;text-align:center;">
        
      <span class="w3-xlarge w3-hide-large coolhead " style="margin-top:10%; color:black;">Get on board to experience the information media like never before</span><br>
      
     
    </div> 
    
   
  </div>
  <div class="bgimg-5 w3-display-container w3-hide-small w3-hide-medium " id="" style="margin-top:0.05%;">
    <div class=" w3-text-white" style="padding:48px;text-align:center;">
        
      <span class="w3-xxlarge w3-hide-small  w3-hide-medium w3-display-left coolhead" style="color:black;">A place where information is<br> structured, more interactive and <br>presented interestingly.</span><br>
      <div class="w3-display-middle" style="padding:24px 48px">
        <p><button onclick="location.href='{{route('register')}}'" class="w3-button w3-black w3-padding-xlarge w3-xlarge">Get Started</button>
      
      </div>
    </div> 
    
   
  </div>
  <div class="bgimg-6 w3-display-container w3-hide-large " id="" style="">
    <div class=" w3-text-white" style="padding:48px;">
        
      <span class="w3-large w3-hide-large w3-display-topright coolhead" style="color:black;">A place where information is<br> structured, more interactive and <br>presented interestingly.</span><br>
      <div class=" w3-display-middle" style="padding:24px 48px;margin-top:20%;">
        <p><button onclick="location.href='{{route('register')}}'" class="w3-button w3-black w3-padding-large w3-large">Get Started</button>
       
      </div>
    </div> 
    
   
  </div>
  <div id="id01" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
        <div class="w3-center"><br>
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
          <img src="/storage/general/welcome-back.png" alt="Avatar" style="width:60%" class=" w3-margin-top">
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
          <span class="w3-right w3-padding">Forgot <a href="{{route('forgot')}}">password?</a></span>
        </div>
  
      </div>
    </div>
    

    {{--  
 
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">ABOUT THE COMPANY</h3>
  <p class="w3-center w3-large">Key features of our company</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Responsive</p>
     
    </div>
    <div class="w3-quarter">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Passion</p>
      
    </div>
    <div class="w3-quarter">
      <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Design</p>
      
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Support</p>
     
    </div>
  </div>
</div>

--}}

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">&times;</span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>



<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#top" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <p style="" class="w3-hover-opacity">&copy; @php echo date('Y');@endphp fluidbN Media Technologies &middot; All rights reserved &middot; <a href="{{route('privacy')}}">Privacy</a> &middot; <a href="{{route('terms')}}">Terms</a></p>
           
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>

</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>