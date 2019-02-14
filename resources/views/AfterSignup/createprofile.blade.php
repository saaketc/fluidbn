
@extends('layouts.main2')
@section('title')
Signup - create-profile | fluidbN
@endsection

@section('content')
<div class="container">
<div class="box lower-margin"> 

<h1 >Welcome to fluidbN family {{ucfirst(Auth::user()->fname)}} !!</h1>
<h2 >Just one more step to go !</h1>
</div>
<div class="row">
    
    <div class="col-sm-6">
        <img src="/storage/general/welcome.png" style="width:80%;height:auto;">
        </div>
    @php
    $selectedu = ["B.Tech"=>"B.Tech","B.Des"=>"B.Des","M.Tech"=>"M.Tech","M.Des"=>"M.Des","Other"=>"Other"];
    $selectyear = ["First year"=>"First year","Second year"=>"Second year","Third year"=>"Third year","Fourth year"=>"Fourth year"];
    $selectcollege = ["PDPM IIITDMJ"=>"PDPM IIITDMJ"];
    
    @endphp
    
        <div class="col-sm-6">
{!! Form::open(['route'=>'get-me-in','method'=>'POST','files'=>true,'enctype'=>'multipart/form-data']) !!}  

<div class="form-group">
    {{Form::label('image','Upload profile pic',['class'=>'w3-button w3-flat-pomegranate w3-padding-large'])}}
    {{Form::file('image',['accept'=>"image/*",'onchange'=>'loadFile(event)'])}}
        </div>
            <div class="" id="">   
<img id="output" class=" img-fluid mx-auto" style="">
</div>
        <div class="form-group">
                
                {{Form::radio('gender','Male',['class'=>'form-control','placeholder'=>''])}} {{Form::label('gender','Male',['class'=>'pro_info'])}}
                {{Form::radio('gender','Female',['class'=>'form-control','placeholder'=>''])}} {{Form::label('gender','Female',['class'=>'pro_info'])}}
                
            </div>
             
            <div class="form-group">
            {{Form::label('dob','Your birthdate',['class'=>'pro_info w3-button w3-flat-pomegranate'])}} 
              {{Form::date('dob',"",[ 'class'=>'pro_info form-control','id'=>'dob'])}}
      </div>
    
        <div class="form-group">

{{Form::text('about','',['class'=>'pro_info form-control','placeholder'=>'A line about you','required'=>'required'])}}
</div>
{{--  {{Form::label('student','Student',['class'=>'pro_info'])}}
<label class="switch">
 
  {{Form::checkbox('student','',null,['placeholder'=>'','id'=>'s-f'])}}
  
  <span class="slider round"></span>
  <br/>

</label>  --}}
{{--
{{Form::label('professional','Professional',['class'=>'pro_info form-control'])}}
<label class="switch">

  {{Form::checkbox('professional','',null,['placeholder'=>'','id'=>'p-f'])}}
  <span class="slider round"></span>
--}}
</label>
  {{--  <div class="student" id="student-form">  --}}
<div>
   <div class="form-group">
      {{-- {{Form::label('education','Your current education',['class'=>'pro_info form-control'])}}--}}
        {{Form::select('education',$selectedu , null, ['placeholder' => 'Your current education','id'=>'edu', 'class'=>'pro_info form-control','required'=>'required'])}}                              
                                
   </div>
        
 <div class="form-group">
     {{--  {{Form::label('yos','Year of study',['class'=>'pro_info form-control'])}}--}}
        {{Form::select('yos',$selectyear , null, ['placeholder' => 'Year of study','id'=>'yos', 'class'=>'pro_info form-control','required'=>'required'])}}                              
                                
   </div>
        
<div class="form-group">
{{--{{Form::label('college','Your college',['class'=>'pro_info form-control'])}}--}}
{{Form::select('college',$selectcollege,null,['class'=>'pro_info form-control','placeholder'=>'Your college','id'=>'col','required'=>'required'])}}
</div>
<div class="form-group">
{{Form::label('startup','If you are running a startup or a blog',['class'=>'pro_info'])}}
{{Form::text('startup','',['class'=>'pro_info form-control','placeholder'=>'Position @ Company name/blog name'])}}

</div>
<div class="form-group">
  {{Form::text('weburl','',['class'=>'pro_info form-control','placeholder'=>'Web address of company/blog'])}}  
    </div>
   {{Form::submit('Take me in',['class'=>'w3-button w3-flat-pomegranate w3-padding-large'])}}
    </div> 
<div class="professional" id="professional-form">

        <div class="form-group">
{{Form::label('designation','Your designation',['class'=>'pro_info form-control'])}}
{{Form::text('designation','',['class'=>'form-control','placeholder'=>'','id'=>'desig'])}}
</div>
<div class="form-group">

{{Form::label('company','Your workplace ',['class'=>'pro_info form-control'])}}
{{Form::text('company','',['id'=>'',  'class'=>'form-control','placeholder'=>'','id'=>'comp'])}}
</div>
{{Form::submit('Take me in',['class'=>'btn   btn-login'])}}
</div>

 {!! Form::close() !!}
       </div>

</div>

</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
   
   output.src = URL.createObjectURL(event.target.files[0]);
    
  };
</script>
@endsection

