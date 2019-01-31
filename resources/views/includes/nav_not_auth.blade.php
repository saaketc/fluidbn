

  <header>


             
          
                  <div class="header">   
                     
            
               
                <a class="" href="{{ url('/') }}">
                    <img class="featurette-image img-fluid mx-auto" src="/storage/logo/logo.png" style="">
                </a>
                
                </div>

     
                <nav class="navbar navbar-expand-md navbar-light bg-transparent mb-0">
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
         
                
                       {{-- Authentication Links --}}
             
         
         
              <button  class="btn btn-login" style="margin-top:5px;margin-left:5px;" data-toggle="modal" data-target="#login">Login</button>
        
             
               
            
              
                 
                 
                   <!-- The Modal -->
           <div class="modal fade" id="login">
             <div class="modal-dialog modal-md">
               <div class="modal-content">
               
                 <!-- Modal Header -->
                 <div class="modal-header">
                       <div class="imgcontainer">
                                       <img src="/storage/general/welcome-back.png" alt="Avatar" class="avatar">
                                   </div>
               
                
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 
                 <!-- Modal body -->
                 <div class="modal-body">
                  
                  {!! Form::open(['action'=>'Auth\LoginController@login','method'=>'POST']) !!}
                                 
                                      <div class="form-group">
                                              {{Form::label(' email ','',['class'=>'fa fa-user'])}}
                                              {{Form::email('email','',['class'=>'form-control'])}}
                                              </div>
                                            
                                    
                                              
                                   
                                              <div class="form-group">
                                              {{Form::label(' password ','',['class'=>'fa fa-lock'])}}
                                              {{Form::password('password',['class'=>'form-control'])}}
                                               </div>
                                              
                                              <div class="form-group">
                                              {{Form::submit(' Login', ['class'=>' btn-login  btn-block '])}}
                                              </div>
                                            
                                            @csrf
                                          {!! Form::close() !!}
                                          
                                      <p> <a href="{{route('forgot')}}" style="color:mediumvioletred;">Forgot password ?</a></p>
                                  
                                   
                                      <p>Not a member ? <a href="{{route('register')}}" style="color:mediumvioletred;">Signup Now</a></p>
                                       
                                 </div>
                               </div>     
                             </div>
                            </div>     
                                   
                                  <button class=" btn btn-login" style="margin-top:5px;margin-left:5px;" onclick="location.href='{{ route('register') }}'">Signup</button>
                                
                              
                                 
                                 </ul>
                              </div>      
                        
                      </div>
                                 
               </nav>
         
       </header>
     
   
   
   
   
                
   
         
     
   
   
   
                