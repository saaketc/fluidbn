
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
<div class="row" id="">
    
    <div class="col-sm-6">
        <img src="/storage/general/welcome.png" style="width:80%;height:auto;">
        </div>
    @php
    $selectedu = ["High School"=>"High School","M.B.B.S"=>"M.B.B.S","B.Tech"=>"B.Tech","B.Des"=>"B.Des","M.Tech"=>"M.Tech","M.Des"=>"M.Des","B.B.A"=>"B.B.A","B.com"=>"B.com","M.B.A"=>"M.B.A","M.com"=>"M.com","B.A"=>"B.A","M.A"=>"M.A","L.L.B"=>"L.L.B","Other"=>"Other"];
    $selectyear = ["Class 9"=>"Class 9","Class 10"=>"Class 10","Class 11"=>"Class 11","Class 12"=>"Class 12","First year"=>"First year","Second year"=>"Second year","Third year"=>"Third year","Fourth year"=>"Fourth year"];
  //  $selectcollege = ["PDPM IIITDMJ"=>"PDPM IIITDMJ"];
    
    @endphp
    
        <div class="col-sm-6">
{!! Form::open(['route'=>'get-me-in','method'=>'POST','files'=>true,'enctype'=>'multipart/form-data','id'=>'pro-form']) !!}  

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
              {{Form::date('dob',"",[ 'class'=>'pro_info form-control','id'=>'dob','data-u'=>Auth::user()->id,'required'=>'required'])}}
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
{{ Form::text('college','',['class'=>'pro_info form-control','placeholder'=>'Your college or school name'])}}
{{--  {{Form::select('college',$selectcollege,null,['class'=>'pro_info form-control','placeholder'=>'Your college','id'=>'col','required'=>'required'])}}  --}}

</div>
{{-- not a student --}}
 {{Form::label('non-student','Not a student?',['class'=>'pro_info'])}}
   {{Form::text('designation','',['class'=>'pro_info form-control','placeholder'=>'Your occupation','id'=>'occ'])}}
             
<div class="form-group">
{{Form::label('startup','If you are running a startup or a blog',['class'=>'pro_info'])}}
{{Form::text('startup','',['class'=>'pro_info form-control','placeholder'=>'Position @ Company name/blog name'])}}

</div>
<div class="form-group">
  {{Form::text('weburl','',['class'=>'pro_info form-control','placeholder'=>'Web address of company/blog'])}}  
    </div>
   {{Form::submit('Take me in',['class'=>'w3-button w3-flat-pomegranate w3-padding-large','id'=>'submit'])}}
    </div> 

{{-- <div class="professional" id="professional-form">

        <div class="form-group">
{{Form::label('designation','Your designation',['class'=>'pro_info form-control'])}}
{{Form::text('designation','',['class'=>'form-control','placeholder'=>'','id'=>'desig'])}}
</div>
<div class="form-group">

{{Form::label('company','Your workplace ',['class'=>'pro_info form-control'])}}
{{Form::text('company','',['id'=>'',  'class'=>'form-control','placeholder'=>'','id'=>'comp'])}}
</div>
{{Form::submit('Take me in',['class'=>'btn   btn-login'])}}
</div> --}}

 {!! Form::close() !!}
       </div>

</div>

</div>

<script>
  document.getElementById('occ').addEventListener('input',function(){
var occ = document.getElementById('occ');
occ.setAttribute('required','required');
document.getElementById('edu').removeAttribute('required');
document.getElementById('yos').removeAttribute('required');
document.getElementById('col').removeAttribute('required');  
});
</script>

{{-- <script>
document.getElementById('dob').addEventListener('input',function(){
  var date = new Date();
  var current_year = date.getFullYear();
  var dob = new Date(document.getElementById('dob').value);
  var birth_year = dob.getFullYear();
  var age = current_year - birth_year;
  var id = document.getElementById('dob').getAttribute('data-u');
  var url= "{{ route('reject-user') }}";
  var token = "{{Session::token()}}";
  if(age<15){
    alert('Sorry kiddo ! you are not old enough to signup for fluidbN, Take your parents help instead');
    $.post(url,{
      _token:token,
      id:id
    }, 
      function(data){
        if(data.status==1) 
        window.location='https://www.fluidbn.com';
      }
    );
    }
});


</script> --}}
<script>
  $(document).ready(function(){
    $('#pro-form').on('submit',function(e){
      
      var date = new Date();
  var current_year = date.getFullYear();
  var dob = new Date(document.getElementById('dob').value);
  var birth_year = dob.getFullYear();
  var age = current_year - birth_year;
  var id = document.getElementById('dob').getAttribute('data-u');
    var url= "{{ route('reject-user') }}";
    var token = "{{ Session::token()}}";
   if(age<0){
    e.preventDefault();
    
    alert('You are not even born! how can we sign you up');
  }
  else if(age==0){
e.preventDefault();
    
    alert('You are just born, we cannot sign you up');
  
  }
   else if(age==1){
    e.preventDefault();
    
    alert('You are too young to join fluidbN, just '+age+' year old! we cannot sign you up');
  
  }
    else if(age>1 && age<=10 ){
    e.preventDefault();
    
    alert('You are too young to join fluidbN, just '+age+' years old! we cannot sign you up');
  }
  else if(age>=11 && age<15){
    e.preventDefault();
    
    alert('Sorry! you are not old enough to join fluidbN, take your parents help to signup');
  }

  else if(age>=15) {
    // to carry normal form processing
   // $(this).unbind('submit').submit();
    return true;
  }
   $.post(url,{
      _token:token,
      id:id
    }, 
      function(data){
        if(data.status==1) 
        window.location='https://www.fluidbn.com';
      }
    );

    });
  });
</script>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
   
   output.src = URL.createObjectURL(event.target.files[0]);
    
  };
</script>

@endsection

