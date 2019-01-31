@extends('layouts.main')

@section('title')
{{ucfirst($article->title)}} - {{ucfirst($article->writtenBy->fname)}} {{ucfirst($article->writtenBy->lname)}}  | fluidbN
@endsection

@section('content')

<div class="container">
<div class="row featurette">
   

      <div class="col-sm-7 ">
        
        <div class="box" id="editView" data-articleid="{{$article->id}}" >
            
        <a href="{{route('profile',['user'=>$article->writtenBy,'slug'=>str_slug($article->writtenBy->fname." ".$article->writtenBy->lname)])}}" <h5 class="writer">{{ucfirst($article->writtenBy->fname)}}
              {{ucfirst($article->writtenBy->lname)}}</a>
          </h5>
          <p id="msg"> </p>
          <div class="col-sm-5 ">
           <img class="featurette-image img-fluid mx-auto  propic" src="/storage/profile_images/{{$article->writtenBy->hasProfile->profile_image}}" alt="">
            </div>
       
           <p class="writer">{{"Oh it's me !"}}</p>
              
         
           {{--edit modal--}}
           {{-- Button to Open the edit modal --}}
           <button  class="btn btn-outline-success btn-login"  id="edit"  data-toggle="modal" data-target="#editArticle">
             Edit article !
           </button>   <button class="btn btn-outline-success btn-login" onclick="location.href='{{route('show-article',['article'=>$article,'slug'=>str_slug($article->title)])}}'">Show main view</button>
         {{-- Button to Open the delete modal --}}
           <div class="row">
           <button  class="btn btn-outline-success btn-login box" style="margin-left:15px;" id="edit"  data-toggle="modal" data-target="#deleteArticle">
             Delete story
           </button>   
             
         
           <!-- The Modal -->
           <div class="modal fade" id="deleteArticle">
             <div class="modal-dialog modal-sm">
               <div class="modal-content">
               
                 <!-- Modal Header -->
                 <div class="modal-header">
                   <h4 class="modal-title writer" style="font-weight:bold;font-size:15px;">Are you sure to delete this story ? Story will be permanently deleted</h4>
                  

                 </div>
                 <div class="col-sm-4">
                 <!-- Modal body -->
                 <div class="modal-body">
                  
                 {!! Form::open(['action'=>['Article\ArticleController@destroy',$article->id],'method'=>'POST'])!!}
   
              {{Form::hidden('_method','DELETE')}} {{-- to make route method delete--}}
              
                 {{Form::submit('Yes, delete story',['class'=>'btn btn-outline-success btn-login'])}}
          {!!Form::close()!!}   
          </div>
          <div class="col-sm-4">
           <button type="button" class=" btn btn-outline-success btn-login" data-dismiss="modal">No, take me back</button>
         </div>
          </div>
                 
           
                 
               </div>
             </div>
           </div>
           
            {{--delete modal end--}}
            
      </div>
             
         
           <!-- The Modal -->
           <div class="modal fade" id="editArticle">
             <div class="modal-dialog modal-lg">
               <div class="modal-content">
               
                 <!-- Modal Header -->
                 <div class="modal-header">
                   <h4 class="modal-title writer" style="color:mediumvioletred;">{{'looks like you want to edit it '.Auth::user()->fname }}... go ahead to make it more wonderful !</h4>
                  
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 
                 <!-- Modal body -->
                 <div class="modal-body">
                  
                 {!! Form::open(['action'=>['Article\ArticleController@update',$article->id],'method'=>'POST','files'=>true,'class'=>'dropzone','enctype'=>'multipart/form-data']) !!} 
                   
                      <div class="form-group">
                          
                        <div class="polaroid-small lower-margin">
                           
                          <img class="featurette-image img-fluid mx-auto" src="/storage/article_images/{{$article->title_image}}" alt="Current title image"><p class="" style="color:mediumvioletred">Current title image</p>
                          </div>
                          {{Form::text('title',$article->title,['class'=>'form-control','placeholder'=>''])}}
                         </div>
         
                         <div class="form-group">
                                         
                     {{Form::select('genre',$selectGenre , NULL, ['class'=>'writer','placeholder' =>$article->ofGenre->name])}}                              
                                         
                                             </div>
                 
                      
                         <div class="form-group">
              
                 {{Form::textarea('content',$article->content,['class'=>'form-control','id'=>'content','placeholder'=>''])}}
                 </div>
                        
                 <div class="form-group">
                <p style="color:mediumvioletred">Change title image if you want !</p> 
                </div>
                 {{Form::hidden('_method','PUT')}} {{-- to make route method put--}}
                 {{Form::submit('Save changes and post !',['class'=>'btn btn-outline-success btn-login'])}}
                 
                        @csrf
                      
                        {!! Form::close() !!}
                 </div>
                 
           
                 
               </div>
             </div>
           </div>
           
            {{--edit modal end--}}
            
      
          <h6 class="margin writer">{{$article->writtenBy->hasProfile->about }}</h6>
               {{-- date("d F Y",strtotime($article->created_at)) can also be used--}}
            
             
              </div>
      
    </div>
    
</div>

      <div class="row featurette">
         <div class="col-sm-7">
       
        <h2 class="featurette-heading">{{$article->title}}</h2>
        @php
        if($views>1)
        $v = 'views';
        else
        $v = 'view';
        if($wows>1)
        $w = 'wows';
        else
        $w = 'wow'
        @endphp
        <small class="writer">{{$article->created_at->format('d F Y')}}</small> <small class="views"> {{ '   '.$views.' '.$v}}</small> <small class="views" id="wow"> {{ '   '.$wows.' '.$w}}</small>
        <hr class="featurette-divider">
        <blockquote class="blockquote">
        <p>{!!$article->content!!}</p>
       
         
      </blockquote>   
      </div>
        <div class="col-sm-5">
            
                <div class="frame">
                  
                <img class="featurette-image img-fluid mx-auto" src="/storage/article_images/{{$article->title_image}}" alt="">
                </div>
          
        </div>
        

        
      </div>
      
   
      <div class="row featurette">
        <div class="col-sm-7 lower-margin">
          <h3>Upload other images for the story !</h3>
           {!! Form::open(['route'=>['multi-image',$article->id],'method'=>'POST','files'=>true, 'enctype'=>'multipart/form-data', 'class'=>'dropzone','id'=>'dropzone']) !!}
           @csrf
           {!! Form::close() !!}
          </div>
      </div>
    

      <footer>
    
       
       
        </footer>
    </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js" integrity="sha256-Rnxk6lia2GZLfke2EKwKWPjy0q2wCW66SN1gKCXquK4=" crossorigin="anonymous"></script>
                
<script>
  
  Dropzone.options.dropzone =
  {
     maxFilesize: 5,
     renameFile: function(file) {
         var dt = new Date();
         var time = dt.getTime();
        return time+file.name;
     },
     acceptedFiles: ".jpeg,.jpg,.png,.gif",
     addRemoveLinks: true,
     timeout: 5000,
     
     success: function(file, response) 
     {
         console.log(response);
     },
     error: function(file, response)
     {
        return false;
     }
   };
  
  @include('includes.buttons') 

  
  </script>

@endsection


