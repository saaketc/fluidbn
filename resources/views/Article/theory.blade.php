@extends('layouts.main')

@section('title')
My theory | fluidbN
@endsection

@section('content')
          <!-- Page Content -->

<div style="margin-top:2%">

<div class="w3-container ">
    <div class=" w3-card-4 w3-bar-block w3-hide-small w3-hide-medium w3-panel" style="width:100%;margin-bottom:2%;">
    <h3 class="w3-bar-item coolhead w3-xxlarge">{{ucfirst(Auth::user()->fname).', your board to create theories'}}</h3>
    
   
 </div>
  <div class=" w3-card-4 w3-bar-block w3-hide-large w3-panel" style="width:100%;margin-top:10%;">
    <h3 class="w3-bar-item coolhead w3-large">{{ucfirst(Auth::user()->fname).', your board to create theories'}}</h3>
    
   
 </div>
     {!! Form::open(['action'=>'Article\ArticleController@storeTheory','method'=>'POST']) !!}  

       
       {{Form::text('title','',['id'=>'title','class'=>'w3-xlarge w3-flat-pomegranate','placeholder'=>'Title of your theory here...',])}}
<div class=" " style="margin-top:1rem ;margin-bottom:1rem;">

   </div>

</div>
<img src="/storage/general/write-story.png" alt="" id="blnk_img" style="width:100%" class=" img-fluid mx-auto">

<div class="w3-container w3-flat-orange w3-xlarge" style="margin-top:2rem">
<h2>Your theory content</h2>

</div>
{{Form::textarea('content','',['id'=>'editor','class'=>'','placeholder'=>'Write and show your creativity...'])}}
   <div style="margin-top:2%;">
   {{Form::submit('Share',['class'=>'w3-button w3-bar-item w3-medium w3-flat-orange w3-large'])}}        
</div>
 
 {!! Form::close() !!}
</div>


 
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

 <script>
               ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
               
                </script>
          
          

  
       



  
   
   
            
         
          
{{--
 
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script src="[ckeditor-build-path]/ckeditor.js"></script>
 <script>
               ClassicEditor
    .create( document.querySelector( '#editor' ))
		

	
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
               
               
                </script>

--}}
          
                
      <script>
        var token = "{{Session::token()}}";
       
       
</script>
@endsection

