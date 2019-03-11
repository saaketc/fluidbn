
        <!DOCTYPE html>
        <html lang="{{ app()->getLocale() }}">
        <head>
     <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133705211-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-133705211-1');
</script>

 <link rel="icon" href="/storage/logo/favicon2.png" sizes="48x48">
       
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <meta name="description" content="">
    <meta name="author" content="">
            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
                      
              <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

             <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
           <link href="https://fonts.googleapis.com/css?family=Atma:700" rel="stylesheet">
             
          
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" integrity="sha256-e47xOkXs1JXFbjjpoRr1/LhVcqSzRmGmPqsrUQeVs+g=" crossorigin="anonymous" />
             



                  <!-- Custom styles -->
                   <link href="{{asset('css/custom.css')}}" rel="stylesheet">
                   <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
                    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
            <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
            

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>      
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js" integrity="sha256-0/MF5x1AoU8a7eF3Y3gaBhdfZh6JMbOkrJ1xna3cAek=" crossorigin="anonymous"></script>
     
            <title>@yield('title')</title>
        
           {{--

         <script charset="utf-8" src="https://ucarecdn.com/libs/widget/3.6.1/uploadcare.full.min.js"></script>
         --}}
      <style>  
      .mySlides {display:none;}
 
        .stick{
           position: -webkit-sticky;
  position: sticky;
  bottom: 0;
  background-color: white;
  padding: 5px;

  
        }

     
        
          body{
              background-color:whitesmoke;
          }    
            html, body, h1, h2, h3, h4, h5 {font-family: "Raleway", sans-serif}                       
  /* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 12px;
    margin: 2px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
 .coolhead{font-family: 'Atma', cursive;}
 .decent{font-family: "Raleway", sans-serif}
 
img {cursor:pointer;}

 /*zoom in icon
 img{
    cursor: -moz-zoom-in; 
    cursor: -webkit-zoom-in; 
    cursor: zoom-in;
}
*/
 .footer-story {
    position:fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color:transparent;
    color: white;
    text-align: center;
 }
 .sidenav {
    height: 100%;
    width: 20%;
    position: fixed;
    z-index: 1;
    top: 15%;
    left: 0;

    overflow-x: hidden;
    padding-top: 20px;
  }
.hov-a-white:hover{
color:white;
}


/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
  
    position: relative;
}

img.avatar {
    width: 100%;
    height:auto;
    }

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}


/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
                
            
            
            
             * {
                                box-sizing: border-box;
                            }
                            
                            .openBtn {
                                background: #f1f1f1;
                                border: none;
                                padding: 10px 15px;
                                font-size: 20px;
                                cursor: pointer;
                            }
                            
                            .openBtn:hover {
                                background: #bbb;
                            }
                            
                            .overlay {
                                height: 100%;
                                width: 100%;
                                display: none;
                                position: fixed;
                                z-index: 1;
                                top: 0;
                                left: 0;
                                background-color: rgb(0,0,0);
                                background-color: rgba(0,0,0, 0.9);
                            }
                            
                            .overlay-content {
                                position: relative;
                                top: 46%;
                                width: 80%;
                                text-align: center;
                                margin-top: 30px;
                                margin: auto;
                            }
                            
                            .overlay .closebtn {
                                position: absolute;
                                top: 20px;
                                right: 45px;
                                font-size: 60px;
                                cursor: pointer;
                                color: white;
                            }
                            
                            .overlay .closebtn:hover {
                                color: #ccc;
                            }
                            
                            .overlay input[type=text] {
                                padding: 15px;
                                font-size: 17px;
                                border: none;
                                float: left;
                                width: 80%;
                                background: white;
                            }
                            
                            .overlay input[type=text]:hover {
                                background: #f1f1f1;
                            }
                            
                            .overlay button {
                                float: left;
                                width: 20%;
                                padding: 15px;
                                background: #ddd;
                                font-size: 17px;
                                border: none;
                                cursor: pointer;
                            }
                            
                            .overlay button:hover {
                                background: #bbb;
                            }
                            
                            * {
                                box-sizing: border-box;
                            }
                            
                           
                            /* Responsive layout - makes a two column-layout instead of four columns */
                            @media screen and (max-width: 900px) {
                                .column {
                                    width: 50%;
                                }
                            }
                            
                            /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
                            @media screen and (max-width: 600px) {
                                .column {
                                    width: 100%;
                                }
                            }
                                  .row::after {
                                      content: "";
                                      clear: both;
                                      display: table;
                                  }
                                  [class*="col-"] {
                                      float: left;
                                      padding: 15px;
                                  }
                                  .col-1 {width: 8.33%;}
                                  .col-2 {width: 16.66%;}
                                  .col-3 {width: 25%;}
                                  .col-4 {width: 33.33%;}
                                  .col-5 {width: 41.66%;}
                                  .col-6 {width: 50%;}
                                  .col-7 {width: 58.33%;}
                                  .col-8 {width: 66.66%;}
                                  .col-9 {width: 75%;}
                                  .col-10 {width: 83.33%;}
                                  .col-11 {width: 91.66%;}
                                  .col-12 {width: 100%;}
                 
                
                }
             </style>
             
        

        </head>
    <body class="main-body">
    @include('includes.nav')
    
    <div class="container">
        <div class="row featurette">
     <div class="col-sm-4" style="margin-left:20%;">
     @include('includes.flashmsg')
     </div>
     </div>
    </div>
    <div style="margin-top:10%;">
        @yield('content')
        </div>
 


        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
             
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
         
           <script  src="{{ asset('js/functions.js') }}" defer></script>
            <script  src="{{ asset('js/custom.js') }}" defer></script>
       <script async src="{{asset('js/app.js')}}" defer></script>
    <script>
            function notiFunc() {
              var x = document.getElementById("nts");
              if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
              } else { 
                x.className = x.className.replace(" w3-show", "");
              }
            }
            
          
                    function uspFunc() {
                      var x = document.getElementById("uspr");
                      if (x.className.indexOf("w3-show") == -1) {
                        x.className += " w3-show";
                      } else { 
                        x.className = x.className.replace(" w3-show", "");
                      }
                    }
                    </script>
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
       
       <script>
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }
            
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches('.dropbtn')) {
            
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            }
            
            
            
             /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function myFunction2() {
                document.getElementById("myDropdown-2").classList.toggle("show");
            }
            
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches('.dropbtn')) {
            
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            }
            
            
            
            </script>
        
       
       <script>
        @include('includes.buttons')
       </script>
       
    
        
        
    </body>
</html>
