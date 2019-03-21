@extends('layouts.main')
@section('title')
Studio | fluidbN
@endsection

@section('content')
<div class="container">
<div class="row">

    <div class="col-sm-9">
       
        {!! Form::open(['route'=>'storeContent','method'=>'POST','files'=>true,'enctype'=>'multipart/form-data']) !!}  

        <div class="form-group">
               
                 {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title of your story here...','id'=>'title'])}}
                </div>
<div class="form-group">
  
             {{Form::label('title_image','Upload title image',['class'=>'w3-button w3-flat-pomegranate w3-padding-large'])}}     {{Form::file('title_image')}}
            
           </div> 
         
                <div class="form-group">
                                
                                {{Form::select('genre',$selectGenre , null, ['placeholder' => 'Pick a category...','id'=>'genre'])}}                              
                                
                                    </div>
        
             
                <div class="form-group">
                    {{Form::label('content[]','Upload content',['class'=>'w3-button w3-flat-pomegranate w3-padding-large'])}}     {{Form::file('content[]',['multiple'=>'multiple'])}}
            
       
               
    </div>
        
           
          {{Form::submit('Post',['class'=>'w3-button w3-flat-pomegranate w3-padding-large'])}}
           
       
        
            
                
          
       
       
    
         
             
               {!! Form::close() !!}
          
          
          </div>
</div>
          
@endsection
