

  <header>

        <nav class="navbar navbar-expand-xl navbar-light bg-transparent mb-0" id="mynavbar">
               
                  @auth('aerepad')
                    <a class="navbar-brand" style="font-size:50px;margin-left:0px;" href="{{ url('/aerepad/desk') }}">
                        <img src="/storage/logo/aerelogo.png">
                    </a>
                    @else
                    <a class="navbar-brand"style="font-size:50px;margin-left:0px;" href="{{ url('/get-aerepad') }}">
                        <img src="/storage/logo/aerelogo.png">
                    </a>
                    @endauth
                
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse" id="navbarCollapse">
                   <ul class="navbar-nav mr-auto" style="margin-left:5px;">
                    @auth('aerepad')
                    <li class="nav-item">
                            <a class="nav-link" href="{{route('newsfeed')}}">News feed</a>
                          </li>
                  
                         @auth
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('feed')}}">fluidbN stories</a>
                          </li>
                          @else
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">fluidbN stories</a>
                          </li>
                          @endauth
                          {{--
                       <li class="nav-item">
                           <a class="nav-link" href="#">About</a>
                         </li>
                       <li class="nav-item">
                           <a class="nav-link" href="#">fluidbN Studio</a>
                         </li>
                         <li class="nav-item">
                               <a class="nav-link" href="#">AerePad</a>
                             </li>--}}
                            </ul>
                  
                 
                   <div class="row" style="margin-right:20%;margin-top:36px;">
                  
                   <form class="form-inline" action="{{route('search')}}">
                           <input class="form-control" type="text" id ="search" placeholder="Search AerePad..." aria-label="Search" name= "search" autocomplete="off"><button class="btn btn-outline-success btn-login" style="margin-bottom:0.1px;" type="submit" id="searchbtn"><i class="fa fa-search" style="font-size:18px;"></i></button>
                        
                         </form>
                         @endauth
                                 
                   
                   <table class="table table-bordered table-hover">
                     
                      <tbody id="ur">
                      
                      </tbody>
                      
                      </table>
                      <table class="table table-bordered table-hover">
                       
                        <tbody id="sy">
                        
                        </tbody>
                         
                        </table>
                         
                  
                  
                   </div>
                
                    
                   
               
                
                       <ul class="nav navbar-nav">
             
                            @auth('aerepad')
                           <!-- Authentication Links -->
                          {{--
                          
                             {{--notifications
          <div class="row" style="margin-right:90px;margin-top:10px;">
                             <div class="dropdown">
                              <button onclick="myFunction2()" class="dropbtn" id="notifications" style="margin-left:5px;"><i class="fa fa-bell" id=""style="color:white"></i> Notifications  @if(Auth::user()->unreadNotifications->count()>0)<i class="badge badge-danger" id="noti_count">{{Auth::user()->unreadNotifications->count()}}</i>@endif
                               </button>
                                <div id="myDropdown-2" class="dropdown-content">
                                 @if(Auth::user()->unreadNotifications->count()>0)
                                 @foreach (Auth::user()->unreadNotifications->take(10) as $n )
                                
                                @if($n->type=="App\Notifications\UserFollowed")
                                 @php
                                 $u = $n->data['follower_id'];
                                 $user = App\User::find($u);
                                 $f = $n->data['follower_fname'];
                                 $l = $n->data['follower_lname'];
                               
                                 @endphp
                                 <a href="{{route('profile',['user'=>$user,'slug'=>str_slug($f.' '.$l)])}}" class="notify" id={{$n->id}}>{{$n->data['message']}}</a>
                             
                                @elseif($n->type=="App\Notifications\UserWelcome")
                                <a href="" class="notify" id={{$n->id}}>{{$n->data['message']}}</a>
                                
                                  @else 
                                  @php 
                                  $id = $n->data['article_id']; 
                                  $art = App\Article::find($id);
                                  $title = $n->data['article_title']; 
                                  @endphp
                                  <a href="{{route('show-article',['article'=>$art,'slug'=>str_slug($title)])}}" class="notify" id={{$n->id}}>{{$n->data['message']}}</a>
                                  @endif
                                 @endforeach
                               @if(Auth::user()->unreadNotifications->count()>10)
                                 <a href="{{route('all-notifications')}}"><p style="color:mediumvioletred;"> See all </p></a>
                                @endif
                                 @else
                                 <a href=""> No new notifications</a> 
                                 @endif                             
                                </div>
                              </div>
    
    
                             {{--notifications end--}}
                           </div>
           <div class="row" style="margin-right:90px;margin-top:10px;">                   
    <div class="dropdown">
      <button onclick="myFunction()" class="dropbtn" style="margin-left:5px;"><i class="fa fa-user" id="nav_user"style="color:white"> </i>  {{'  '.ucfirst(Auth::guard('aerepad')->user()->deskname)}}
        </button>
        <div id="myDropdown" class="dropdown-content">
          <a href="{{route('userdesk')}}">My desk</a>
                                           
                                             <a href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                             Logout
                                         </a>
         
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             {{ csrf_field() }}
                                             @csrf
                                         </form>
        </div>
      </div>
      </div>
                              </ul>
                                   @else
                                    <div class="row">            
                                    <button  class="btn btn-outline-success btn-login" style="width:auto; margin-top:5px;margin-left:5px;" data-toggle="modal" data-target="#login">Login</button>
       
               <!-- The Modal -->
               <div class="modal fade" id="login">
                 <div class="modal-dialog modal-md">
                   <div class="modal-content">
                   
                     <!-- Modal Header -->
                     <div class="modal-header">
                          
                    
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     
                     <!-- Modal body -->
                     <div class="modal-body">
                      
                      {!! Form::open(['route'=>'aerepadlogin','method'=>'POST']) !!}
                                     
                                     
                                  
                                        
                                          <div class="form-group">
                                                  {{Form::label(' email ','',['class'=>'fa fa-user'])}}
                                                  {{Form::email('email','',['class'=>'form-control'])}}
                                                  </div>
                                                  <div class="form-group">
                                                  {{Form::label(' password ','',['class'=>'fa fa-lock'])}}
                                                  {{Form::password('password',['class'=>'form-control'])}}
                                                   </div>
                                                 
                                                  <div class="form-group">
                                                  {{Form::submit(' Login', ['class'=>'btn btn-outline-success btn-login  btn-block '])}}
                                                  </div>
                                                @csrf
                                              {!! Form::close() !!}
                                              <p>Not a member ? <a href="{{route('aerepadregistrationform')}}" style="color:mediumvioletred;">Signup Now</a></p>
                                                  <p> <a href="" style="color:mediumvioletred;">Forgot pasword ?</a></p>
                                      
                                   
                                       
                                                 
                                   </div>
                     
               
                     
                   </div>
                 </div>
               
               </div>
                {{--login modal end--}}
                
                <button  class="btn btn-outline-success btn-login" style="width:auto; margin-top:5px;margin-left:5px;" onclick="location.href='{{route('aerepadregistrationform')}}'">Signup</button>
                {{--
                <button  class="btn btn-outline-success btn-login"  data-toggle="modal" data-target="#signup"style="width:auto; margin-top:5px;margin-left:5px;">Signup</button>
          --}}
                  <!-- The Modal -->
                  <div class="modal fade" id="signup">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                              <div class="imgcontainer">
                                              <img src="/storage/general/welcome back.png" alt="Avatar" class="avatar">
                                          </div>
                      
                       
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                   
                          {!! Form::open(['route'=>'aerepadregister','method'=>'POST']) !!}
                                         
                          
                                      
                                            
                                              <div class="form-group">
                                                      {{Form::label('Set your desk name','')}}
                                                      {{Form::text('deskname','',['class'=>'form-control','required'=>'required'])}}
                                                      </div>
                                                      <div class="form-group">
                                                        {{Form::label('Name of institution or business','')}}
                                                        {{Form::text('name','',['class'=>'form-control','required'=>'required'])}}
                                                        </div>
                                              <div class="form-group">
                                               {{Form::label('Email','')}}
                                               {{Form::email('email','',['class'=>'form-control','required'=>'required'])}}
                                               </div>
                                                      <div class="form-group">
                                                      {{Form::label(' Password ','')}}
                                                      {{Form::password('password',['class'=>'form-control','required'=>'required'])}}
                                                       </div>
                                                     
                                                      <div class="form-group">
                                                      {{Form::submit('Get my desk', ['class'=>'btn btn-outline-success btn-login  btn-block '])}}
                                                      </div>
                                                    @csrf
                                                  {!! Form::close() !!}
                                                      
                                          
                                       
                                           
                                                     
                                       </div>
                         
                        
                      </div>
                    </div>
                  
                  </div>   
                 
                 </div>
               </div>
             
             </div>   
         
                      
                           @endauth
                     
                   
                 
               
               </nav>
             
           </header>
         
       
       
       
       
                    
       
             
         
       
       
       
                    