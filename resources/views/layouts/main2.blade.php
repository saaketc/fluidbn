
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
           
          body{
              background-color:whitesmoke;
          }    
            html, body, h1, h2, h3, h4, h5 {font-family: "Raleway", sans-serif}                       
  
             </style>
           
        </head>
    <body>
    @include('includes.nav2')
    <div class="">
    
     @include('includes.flashmsg')
    
    </div>
    
        <div style="margin-top:7%;">
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
