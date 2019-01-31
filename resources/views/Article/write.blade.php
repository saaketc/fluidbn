@extends('layouts.main')

@section('title')
Write article | fluidbN
@endsection

@section('content')

<!-- Page Content -->

<div style="margin-top:2%">

<div class="w3-container ">
    <div class=" w3-card-4 w3-bar-block w3-hide-small w3-hide-medium w3-panel" style="width:100%;margin-bottom:2%;">
    <h3 class="w3-bar-item coolhead w3-xxlarge">{{ucfirst(Auth::user()->fname).', your board to create stories'}}</h3>
    <button class="w3-button w3-bar-item w3-flat-pomegranate w3-xlarge"  onclick="window.open('https://www.canva.com')">Design title image using Canva</button>
   
 </div>
  <div class=" w3-card-4 w3-bar-block w3-hide-large w3-panel" style="width:100%;margin-top:10%;">
    <h3 class="w3-bar-item coolhead w3-large">{{ucfirst(Auth::user()->fname).', your board to create stories'}}</h3>
    <button class="w3-button w3-bar-item w3-flat-pomegranate w3-large"  onclick="window.open('https://www.canva.com')">Design title image using Canva</button>
   
 </div>
     {!! Form::open(['action'=>'Article\ArticleController@store','method'=>'POST','files'=>true,'class'=>'','enctype'=>'multipart/form-data']) !!}  
       
       {{Form::text('title','',['id'=>'title','class'=>'w3-xlarge w3-flat-pomegranate','placeholder'=>'Title of your story here...',])}}
<div class=" " style="margin-top:1rem; margin-bottom:1rem;">
{{Form::label('title_image','Upload title image',['class'=>'w3-button w3-bar-item w3-flat-carrot w3-xlarge'])}}     {{Form::file('title_image',['accept'=>"image/*",'onchange'=>'loadFile(event)'])}} 
       
     
        {{Form::select('genre',$selectGenre , null, ['class'=>'w3-bar-item w3-large ','placeholder' => "What's your story genre?",'id'=>'genre'])}}                              
   </div>


    <div class="" id="output-frame">   
<img id="output" class=" img-fluid mx-auto" style="width:100%;">
</div>
</div>
<img src="/storage/general/write-story.png" alt="" id="blnk_img" style="width:100%" class=" img-fluid mx-auto">

<div class="w3-container w3-flat-orange w3-xlarge" style="margin-top:2rem">
<h2>Your story content</h2>

</div>
{{Form::textarea('content','',['id'=>'editor','class'=>'','placeholder'=>'Write and show your creativity...'])}}
   <div style="margin-top:2%;">
   {{Form::submit('Post',['class'=>'w3-button w3-bar-item w3-medium w3-flat-orange w3-large'])}}        
</div>
 

</div>

<!-- Sidebar -->


  
   {{--                             
<button class="w3-button w3-bar-item w3-medium" id="save">Save</button> 
  --}}         



  
    {!! Form::close() !!}
   
            

       




<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

 <script>
               ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
               
                </script>
          
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
   
    var remove = document.getElementById('blnk_img');
   output.src = URL.createObjectURL(event.target.files[0]);
    

    remove.src="";
  };
</script>
<script>
    var token = "{{Session::token()}}";
    var urlSave = "{{route('save')}}";

</script>
@endsection

