@extends('layouts.main')
@section('title')
Settings | fluidbN
@endsection

@section('content')

  <div class=" lower-margin w3-hide-large" style="text-align:center;margin-top:35%;">
  <h1 class="featurette-heading-title"> Your profile settings </h2> 
</div>
<div class=" lower-margin w3-hide-small w3-hide-medium" style="text-align:center;">
  <h1 class="featurette-heading-title" style="font-size:4rem;"> Your profile settings </h2> 
</div>
<div class="row">
    

   <div class="col-md-6">
      <div class="lower-margin">
        <h1 class="featurette-heading-feed">Change Profile Picture</h1>
        </div>
    {!! Form::open(['route'=>['update-propic'],'method'=>'POST','files'=>true,'enctype'=>'multipart/form-data']) !!} 

       
    <div class="form-group">
        <div class="">
        <img class="featurette-image img-fluid mx-auto  " src="/storage/profile_images/{{$user->hasProfile->profile_image}}" alt="" id="out-profile">
              
<img id="output" class="featurette-image img-fluid mx-auto " style="">

         </div>
    </div>       
    <div class="form-group">
            {{Form::label('profile_image','Change profile pic',['class'=>'btn   btn-login'])}} 
            {{Form::file('profile_image',['accept'=>"image/*",'onchange'=>'loadFile(event)'])}}
    </div>
    <div style="margin-top:32px;">
    {{Form::submit('Save changes',['class'=>'btn   btn-login'])}}      
    </div>
    {!! Form::close() !!}    
   </div>
   <div class="col-md-6">
 
    @php
if(Auth::user()->hasProfile->designation==NULL )
$d = "";
else
$d = ucfirst(Auth::user()->hasProfile->designation);

if(Auth::user()->hasProfile->company==NULL)
$c = "";
else
$c = ucfirst(Auth::user()->hasProfile->company);
if(Auth::user()->hasProfile->education==NULL )
$e = "";
else
$e = ucfirst(Auth::user()->hasProfile->education);

if(Auth::user()->hasProfile->yos==NULL)
$y = "";
else
$y = ucfirst(Auth::user()->hasProfile->yos);

if(Auth::user()->hasProfile->college==NULL )
$co = "";
else
$co = ucfirst(Auth::user()->hasProfile->college);

 if(Auth::user()->hasProfile->startup==NULL )
$s = "";
else
$s = ucfirst(Auth::user()->hasProfile->startup);
 $selectedu = ["B.Tech"=>"B.Tech","B.Des"=>"B.Des","M.Tech"=>"M.Tech","M.Des"=>"M.Des"];
    $selectyear = ["First year"=>"First year","Second year"=>"Second year","Third year"=>"Third year","Fourth year"=>"Fourth year"];
  @endphp
              <div class="lower-margin">
        <h1 class="featurette-heading-feed">Update Profile information</h1>
      </div>
       {!! Form::open(['method'=>'POST','files'=>true,'enctype'=>'multipart/form-data']) !!} 
          <div style="font-weight:bold;font-size:25px;">
            <div class="form-group">
                
                {{Form::label('fname','First name',['class'=>'form-control'])}}
                {{Form::text('fname',ucfirst(Auth::user()->fname),['class'=>'form-control','placeholder'=>'','id'=>'fname'])}}
               </div>
               <div class="form-group">
                
                      {{Form::label('lname','Last name',['class'=>'form-control'])}}
                   {{Form::text('lname',ucfirst(Auth::user()->lname),['class'=>'form-control','placeholder'=>'','id'=>'lname'])}}
                  </div>
                  <div class="form-group">
                
                       {{Form::label('email','Email',['class'=>'form-control'])}}
                   {{Form::text('email',Auth::user()->email,['class'=>'form-control','placeholder'=>'','id'=>'email'])}}
                  </div>
  
                @if(Auth::user()->hasProfile->dob!=NULL )
                  <div class="form-group">
                
                     {{Form::label('dob','Birthdate',['class'=>'form-control'])}}
                   {{Form::date('dob',Auth::user()->hasProfile->dob,['class'=>'form-control','placeholder'=>'Your birthdate','id'=>'dob'])}}
                  </div>
            @endif
              <div class="form-group">
                
                      {{Form::label('about','Line about you',['class'=>'form-control'])}}
                   {{Form::text('about',ucfirst(Auth::user()->hasProfile->about),['class'=>'form-control','placeholder'=>'','id'=>'about'])}}
                  </div>
             @if(Auth::user()->hasProfile->education!=NULL )
              <div class="form-group">
                   
                   {{Form::select('education',$selectedu,$e,['class'=>'form-control','placeholder'=>'Your current education','id'=>'education'])}}
                  </div>
                  @endif
                    @if(Auth::user()->hasProfile->yos!=NULL )
                   <div class="form-group">
               
                   {{Form::select('yos',$selectyear,$y,['class'=>'form-control','placeholder'=>'Year of study','id'=>'yos'])}}
                  </div>
                  @endif
                    @if(Auth::user()->hasProfile->college!=NULL )
                   <div class="form-group">
                      {{Form::label('college','College',['class'=>'form-control'])}}
                   {{Form::text('college',$co,['class'=>'form-control','placeholder'=>'College','id'=>'college'])}}
                  </div>
                  @endif
                   @if(Auth::user()->hasProfile->startup!=NULL )
                   <div class="form-group">
                 {{Form::label('startup','Your startup',['class'=>'form-control'])}}
                   {{Form::text('startup',$s,['class'=>'form-control','placeholder'=>'Startup','id'=>'startup'])}}
                  </div>
                  @endif
        
              @if(Auth::user()->hasProfile->designation!=NULL )
              <div class="form-group">
                    {{Form::label('designation','Your designation',['class'=>'form-control'])}}
                   {{Form::text('designation',$d,['class'=>'form-control','placeholder'=>'Designation','id'=>'designation'])}}
                  </div>
                  @endif
              @if(Auth::user()->hasProfile->company!=NULL )
              <div class="form-group">
                
                         {{Form::label('company','Your workplace',['class'=>'form-control'])}}
                   {{Form::text('company',$c,['class'=>'form-control','placeholder'=>'Workplace','id'=>'company'])}}
                  </div>
                  @endif
             
              
     
       {{Form::hidden('_method','PUT')}} {{-- to make route method put--}}
       
       
              
            </div>
              {!! Form::close() !!}
              <button class="btn   btn-login form-control" id="pro_update">Save changes</button>
     
   </div>

 </div>
 
  {{--edit profile modal end--}}
  <div class="row">
      <div class="col-md-3">
         <a href="{{route('terms')}}"><h4>See Terms of use</h4></a>
          </div>
            <div class="col-md-3">
         <a href="{{route('privacy')}}"><h4>See Privacy policy</h4></a>
          </div>
      </div>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
   
    var remove = document.getElementById('out-profile');
   output.src = URL.createObjectURL(event.target.files[0]);
    

    remove.src="";
  };
</script>
@endsection