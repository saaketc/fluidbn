
@extends('layouts.main2')
@section('title')
Signup - create-profile | fluidbN
@endsection

@section('content')
<div class="container">
<div class="box lower-margin"> 

<h1 style="color:mediumvioletred;">Welcome to fluidbN family {{ucfirst(Auth::user()->fname)}} !!</h1>
<h2 >Just one more step to go </h2>
</div>
<div class="row">
    
    <div class="col-sm-6">
        <img src="/storage/general/welcome.png" style="width:80%;height:auto;">
        </div>
    @php
    $selectedu = ["B.Tech"=>"B.Tech","B.Des"=>"B.Des","M.Tech"=>"M.Tech","M.Des"=>"M.Des","Other"=>"Other"];
    $selectyear = ["First year"=>"First year","Second year"=>"Second year","Third year"=>"Third year","Fourth year"=>"Fourth year"];
    @endphp
    
        <div class="col-sm-6">
{!! Form::open(['route'=>'get-me-in','method'=>'POST','files'=>true,'enctype'=>'multipart/form-data']) !!}  

<div class="form-group">
    {{Form::label('image','Upload profile pic',['class'=>'btn   btn-login'])}}
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
            {{Form::label('dob','Your birthdate',['class'=>'pro_info btn btn-login'])}} 
              {{Form::date('dob',"",[ 'class'=>'form-control','id'=>'dob'])}}
      </div>
    
        <div class="form-group">
{{Form::label('about','A line about you',['class'=>'pro_info form-control'])}}
{{Form::text('about','',['class'=>'form-control','placeholder'=>'','required'=>'required'])}}
</div>
{{Form::label('student','Student',['class'=>'pro_info form-control'])}}
<label class="switch">
 
  {{Form::checkbox('student','',null,['placeholder'=>'','id'=>'s-f'])}}
  <span class="slider round"></span>

</label>
{{Form::label('professional','Professional',['class'=>'pro_info form-control'])}}
<label class="switch">

  {{Form::checkbox('professional','',null,['placeholder'=>'','id'=>'p-f'])}}
  <span class="slider round"></span>

</label>
  <div class="student" id="student-form">

   <div class="form-group">
      {{-- {{Form::label('education','Your current education',['class'=>'pro_info form-control'])}}--}}
        {{Form::select('education',$selectedu , null, ['placeholder' => 'Your current education','id'=>'edu', 'class'=>'form-control'])}}                              
                                
   </div>
        
 <div class="form-group">
     {{--  {{Form::label('yos','Year of study',['class'=>'pro_info form-control'])}}--}}
        {{Form::select('yos',$selectyear , null, ['placeholder' => 'Year of study','id'=>'yos', 'class'=>'form-control'])}}                              
                                
   </div>
        
<div class="form-group">
{{--{{Form::label('college','Your college',['class'=>'pro_info form-control'])}}--}}
{{Form::text('college','',['class'=>'form-control','placeholder'=>'Your college','id'=>'col'])}}
</div>
<div class="form-group">
{{Form::label('startup','If running a startup',['class'=>'pro_info form-control'])}}
{{Form::text('startup','',['class'=>'form-control','placeholder'=>'Position @ Company name'])}}

</div>
<div class="form-group">
  {{Form::text('weburl','',['class'=>'form-control','placeholder'=>'Web address of company'])}}  
    </div>
   {{Form::submit('Get me in',['class'=>'btn   btn-login'])}}
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
{{Form::submit('Get me in',['class'=>'btn   btn-login'])}}
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

