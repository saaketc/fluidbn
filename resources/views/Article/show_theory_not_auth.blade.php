@extends('layouts.main3')

@section('title')
{{ucfirst($theory->title)}} - {{ucfirst($theory->writtenBy->fname)}} {{ucfirst($theory->writtenBy->lname)}}  | fluidbN
@endsection

  
    

@section('content')


<div class="container">

  <div class="w3-container w3-hide-small w3-hide-medium">

<h2 class="featurette-heading" style="color:black;font-weight:bold;font-size:4rem;">{{ucfirst($theory->title)}}</h2>
  </div>
  <div class="w3-container w3-hide-large" style="" >

<h2 class="featurette-heading w3-xxxlarge" style="color:black;font-weight:bold;">{{ucfirst($theory->title)}}</h2>
  </div>
          
          <div class="box" id="mainView" data-theoryid="{{$theory->id}}" >
              
         
          
         
              <a href="{{route('profile',['user'=>$theory->writtenBy,'slug'=>str_slug($theory->writtenBy->fname." ".$theory->writtenBy->lname)])}}">
              <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$theory->writtenBy->hasProfile->profile_image}}" alt=""><h5 class="w3-medium">{{ucfirst($theory->writtenBy->fname)}}
              {{ucfirst($theory->writtenBy->lname)}}</h5></a>
          
             
              <h6 class="w3-small" style="margin-top:5px;">{{$theory->writtenBy->hasProfile->about }}</h6>
         
            
                <div class="">

                  <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-login" id ="" >Follow</button>  
          
          
       
             </div>
         
          
            
      
  
               </div>
    
      
    
 
</div>
     
     
      <div class="container">
      <div class="row">
      
      
      
      <div class="col-md-12" id = {{'th-'.$theory->id}}>
          
          <small class="writer">{{$theory->created_at->format('d F Y')}}</small> 
          <hr class="featurette-divider">
          <div style="font-size:1.3rem;color:black;">
          <p class="lead">{!! htmlspecialchars_decode($theory->content) !!}</p>
         
           
        </div> 
        {{--  <div class="w3-card-white"><button class="report w3-button w3-flat-pomegranate w3-right" data-theoId="{{$theory->id}}">Report theory</button> 
                    </div>  --}}
                  
                  </div>
          
                  
           </div>
        
  
   

       <footer>
           
                       
       
         
       </div>
        </footer>
    </div>
  

 
  

{{-- login modal --}}
        <div id="id01" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
        <div class="w3-center"><br>
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
          <img src="/storage/general/login-alert-story2.png" alt="Avatar" style="width:60%" class=" w3-margin-top">
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
          <span class="w3-right w3-padding"><a href="{{ route('password.request') }}">Forgot password?</a></span>
        </div>
  
      </div>
    </div>




@endsection


