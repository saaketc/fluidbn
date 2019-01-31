
        <!DOCTYPE html>
        <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <meta name="description" content="">
    <meta name="author" content="">
            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
                      
             
             <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
           
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" integrity="sha256-e47xOkXs1JXFbjjpoRr1/LhVcqSzRmGmPqsrUQeVs+g=" crossorigin="anonymous" />




                  <!-- Custom styles -->
                   <link href="{{asset('css/custom.css')}}" rel="stylesheet">
                   <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
                  

        
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      
        <script  src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js" integrity="sha256-0/MF5x1AoU8a7eF3Y3gaBhdfZh6JMbOkrJ1xna3cAek=" crossorigin="anonymous"></script>
      
    
            <title>@yield('title')</title>
        
            <!-- Scripts -->
            <script>
                    window.Laravel = {!! json_encode([
                        'csrfToken' => csrf_token(),
                    ]) !!};
                </script>
     
          
            <style>
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
                                background-color: white;
                                background-color: white;
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
                                border: 1 px solid gray;
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
    @include('includes.aerepad-nav')
    
    <div class="container">
        <div class="row featurette">
     <div class="col-sm-4 box">
     @include('includes.flashmsg')
     </div>
     </div>
    </div>
        @yield('content')
        
   
           

        <script  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha256-98vAGjEDGN79TjHkYWVD4s87rvWkdWLHPs5MC3FvFX4=" crossorigin="anonymous"></script>
     
       
         <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js" integrity="sha256-Rnxk6lia2GZLfke2EKwKWPjy0q2wCW66SN1gKCXquK4=" crossorigin="anonymous"></script>
                
           <script  src="{{ asset('js/functions.js') }}" defer></script>
       <script async src="{{asset('js/app.js')}}" defer></script>
   
     
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
