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
  
             {{Form::label('title_image','Upload title image',['class'=>'btn btn-outline-success btn-login'])}}     {{Form::file('title_image')}}
            
           </div> 
         
                <div class="form-group">
                                
                                {{Form::select('genre',$selectGenre , null, ['placeholder' => 'Pick a category...','id'=>'genre'])}}                              
                                
                                    </div>
        
             
                <div class="form-group">
                    {{Form::label('content','Upload content',['class'=>'btn btn-outline-success btn-login'])}}     {{Form::file('content')}}
            
       
               
    </div>
        
           
          {{Form::submit('Done and post',['class'=>'btn btn-outline-success btn-login'])}}
           
       
        
            
                
          
       
       
    
         
             
               {!! Form::close() !!}
          
          
          </div>
</div>
          
@endsection
