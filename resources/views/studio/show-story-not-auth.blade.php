@extends('layouts.main3')

@section('title')
{{ucfirst($StudioStories->title)}} -Studio | fluidbN
@endsection

  
    

@section('content')


<div class="container">

      
    
   @php
          if($wows==0)
          $w="";
          else
          $w=$wows;
      @endphp
  
    <div class="w3-container w3-hide-small w3-hide-medium" style="margin-top:0;">

<h2 class="featurette-heading" style="color:black;font-weight:bold;font-size:6rem;">{{ucfirst($StudioStories->title)}}</h2>
<small  id="wows" style="color:black; font-size:15px;font-weight:bold;"><i class="fa fa-heart" style="color:red;font-size:15px;"> {{$w}}</i></small>     
          
</div>
  <div class="w3-container w3-hide-large" style="margin-top:0%;" >

<h2 class="featurette-heading w3-xxxlarge" style="color:black;font-weight:bold;">{{ucfirst($StudioStories->title)}}</h2>
<small  id="wows" style="color:black; font-size:15px;font-weight:bold;"><i class="fa fa-heart" style="color:red;font-size:15px;"> {{$w}}</i></small>     
          
</div>

</div>
     
     
      <div class="container">
      <div class="row">
     
      @foreach($StudioStories->hasImages as $content)
      
      <div class="col-12">
          
                <img class=" zoom  featurette-image img-fluid mx-auto card" style="width:85%" src="/storage/studio_images/{{$content->image}}" alt="" onclick="document.getElementById('modal-{{ $content->id }}').style.display='block'">
                  <div id="modal-{{ $content->id }}" class="w3-modal" onclick="this.style.display='none'">
                <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                <div class="w3-modal-content w3-animate-zoom">
                  <img src="/storage/studio_images/{{$content->image}}" class="zoom mx-auto" style="width:100%">
                </div>
              </div>  
         
          </div>
      @endforeach
      </div>
  
   
      <footer>
            <div class="box lower-margin">
                    <button onclick="document.getElementById('id01').style.display='block'" class="btn  btn-login" id=""  style="margin-left:20px;margin-top:5px;" data-articleid="{{$StudioStories->id}}" type="submit">Wow</button>
                    <button onclick="document.getElementById('id01').style.display='block'" class="btn   btn-login" style="margin-top:5px;" id='' data-articleId="{{$StudioStories->id}}">Bookmark</button>
            
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


