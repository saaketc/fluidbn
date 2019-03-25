
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
                      
             
             <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
          
                       <!-- Custom styles -->
                   <link href="{{asset('css/custom.css')}}" rel="stylesheet">
                   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
                    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">

        
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      
           
            <title>@yield('title')</title>
        
            <!-- Scripts -->
            <script>
                    window.Laravel = {!! json_encode([
                        'csrfToken' => csrf_token(),
                    ]) !!};
                </script>
        

          
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
  
  .noti-box{
    border:1px solid black;background-color:white;
  }
  .noti-border{
    border:1 px solid red;
  }
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
    <body>
    @include('includes.nav_not_auth')
    <div class="">
    
     @include('includes.flashmsg')
    
    </div>
    
        <div style="margin-top:8%;">
        @yield('content')
        </div>
        
   
           

        <script  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha256-98vAGjEDGN79TjHkYWVD4s87rvWkdWLHPs5MC3FvFX4=" crossorigin="anonymous"></script>
     
       
         
           <script  src="{{ asset('js/functions.js') }}" defer></script>
       <script async src="{{asset('js/app.js')}}" defer></script>
       <script>
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
        @include('includes.buttons')
       </script>
        </body>
</html>
