@extends('layouts.main')

@section('title')
{{ucfirst($theory->title)}} - {{ucfirst($theory->writtenBy->fname)}} {{ucfirst($theory->writtenBy->lname)}}  | fluidbN
@endsection

  
    

@section('content')


<div class="container">

  <div class="w3-container w3-hide-small w3-hide-medium">

<h2 class="featurette-heading" style="margin-top:20px; color:black;font-weight:bold;font-size:6rem;">{{ucfirst($theory->title)}}</h2>
  </div>
  <div class="w3-container w3-hide-large" style="margin-top:15%;" >

<h2 class="featurette-heading w3-xxxlarge" style="margin-top:20px; color:black;font-weight:bold;">{{ucfirst($theory->title)}}</h2>
  </div>
          
          <div class="box" id="mainView" data-theoryid="{{$theory->id}}" >
              
         
          
         
              <a href="{{route('profile',['user'=>$theory->writtenBy,'slug'=>str_slug($theory->writtenBy->fname." ".$theory->writtenBy->lname)])}}">
              <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$theory->writtenBy->hasProfile->profile_image}}" alt=""><h5 class="writer">{{ucfirst($theory->writtenBy->fname)}}
              {{ucfirst($theory->writtenBy->lname)}}</h5></a>
          
             
              <h6 class="writer-small" style="margin-top:5px;">{{$theory->writtenBy->hasProfile->about }}</h6>
                @php
          $f = Auth::user()->follows()->wherePivot('follower_id',Auth::user()->id)->wherePivot('following_id',$theory->writtenBy->id)->first();
          
           if($f)
           $cl="pressed";
           else
           $cl="";
          @endphp
            
                <div class="">
          <button class="btn btn-login fol {{$cl}}" id ="" data-userid="{{$theory->writtenBy->id}}">{{$follow ? "Following" : "Follow"}}</button>  
          
          {{-- Button to Open the delete modal --}}
         @if($user->id==$theory->writtenBy->id)
           <button  class="btn btn-login" style="" id=""  data-toggle="modal" data-target="#deleteArticle">
             Delete theory
           </button>  
           @endif
             </div>
         
           <!-- The Modal -->
           <div class="modal fade" id="deleteArticle">
             <div class="modal-dialog modal-sm">
               <div class="modal-content">
               
                 <!-- Modal Header -->
                 <div class="modal-header">
                   <h4 class="modal-title writer" style="font-weight:bold;font-size:15px;">Are you sure to delete this theory ? Theory will be permanently deleted</h4>
                  

                 </div>
            
                 <!-- Modal body -->
                 <div class="">
                 <div class="modal-body">
                  
                 {!! Form::open(['action'=>['Theory\TheoryController@destroy',$theory->id],'method'=>'POST'])!!}
   
              {{Form::hidden('_method','DELETE')}} {{-- to make route method delete--}}
                  
                 {{Form::submit('Yes, delete story',['class'=>'btn  btn-login'])}}
          {!!Form::close()!!}   
          
          
           <button type="button" class=" btn  btn-login" data-dismiss="modal">No, take me back</button>
         </div> 
          </div>
                
           
                 
               </div>
             </div>
           </div>
           
            {{--delete modal end--}}
            
      
  
               </div>
     <div class" w3-hide w3-container" id="fol-sugg-tab">
                  <h3 class="w3-large" style="color:black;font-weight:bold;">Follow suggestions  <button class="w3-button w3-black" id="fol-sugg-cls"><i class="fa fa-close"></i></button></h3>
                  <table class="table table-bordered table-hover">
                      
                    <tbody id="fol_sugg">
                    
                    </tbody>
                     
                    </table>
                  </div>
      
      
    
 
</div>
     
     
      <div class="container">
      <div class="row">
      
      
      
      <div class="col-md-12" id = {{'th-'.$theory->id}}>
          
          <small class="writer">{{$theory->created_at->format('d F Y')}}</small> 
          <hr class="featurette-divider">
          <div style="font-size:1.3rem;color:black;">
          <p class="lead">{!! htmlspecialchars_decode($theory->content) !!}</p>
         
           
        </div> 
        <div class="w3-card-white"><button class="report w3-button w3-flat-pomegranate w3-right" data-theoId="{{$theory->id}}">Report theory</button> 
                    </div>
          </div
          
                  
           </div>
        
  
   

       <footer>
           {{--
          <div class="box lower-margin">
              <button class="btn  btn-login " id="like"  style="margin-left:20px;margin-top:5px;" data-articleid="{{$theory->id}}" type="submit">Wow</button>
          <button class="btn   btn-login bookmark" style="margin-top:5px;" data-articleId="{{$theory->id}}">Bookmark</button>
          
        </div>
  --}}
         {{--
         
            @if(Auth::user()->id != $theory->writtenBy->id)
          @if(count($theorys_of_samewriter)>0)
          <div class="lower-margin">
          <h2 class="featurette-heading"style="color:black;margin-left:20px;">More cool stories from {{ucfirst($theory->writtenBy->fname)}}...!  @if(count($theories_of_samewriter)==3)<a href="{{route('stories-user',['user'=>$theory->writtenBy])}}">See all</a>@endif</h2>
          </div>
          <div class="row featurette"  style="margin-left:6px;">
            @foreach ( $theories_of_samewriter as $ra )
               
            <div class="col-md-4">
       
              <div class="">
                <a href="{{route('stories-genre',['genre'=>$ra->ofGenre])}}" <small class="genre-feed">{{ucfirst($ra->ofGenre->name)}}</small></a>
              </div>
               
                <a href="{{route('show-theory',['theory'=>$ra,'slug'=>str_slug($ra->title)])}}">
                <div class="card-related" style="width:100%;">
                  <img class="featurette-image img-fluid mx-auto img-card" src="/storage/theory_images/{{$ra->title_image}}" alt="">
                  <div class="container-related lower-margin" style="width:100%;">
                    <h2  class="featurette-heading-small"style="font-size:25px;font-weight:bold;">{{ucfirst($ra->title)}}</h2>
                   
                   <p class="lead">{!!wordwrap(str_limit($ra->content,50),20,"<br>\n",TRUE)!!}</p> @if($ra->views>0)<small class="views"> {{ '   '.$ra->views.' views'}}</small>@endif
                  </div>
                </div>
                </a>
               
                  <br/>
                  
                  
           </div>
      
                       
                
            @endforeach
            </div>
          
          @endif
         @endif 
         --}}
{{--
         <div class="">

          

            <button  class="btn   btn-login" style="margin-left:20px;" id="comment"  data-toggle="modal" data-target="#commenton">
           Write a word of appreciation
            </button>
          
            <!-- The Modal -->
            <div class="modal fade" id="commenton">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title writer">{{ucfirst(Auth::user()->fname).' express your words of appreciation to '.ucfirst($theory->writtenBy->fname) }} !</h4>
                   
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                   
                  {!! Form::open(['route'=>['comment',$theory->id],'method'=>'POST']) !!} 
                     
          
                          
                       
                          <div class="form-group">
               
                  {{Form::textarea('comment','',['class'=>'form-control','placeholder'=>'Share your words of appreciation...','id'=>'commentarea'])}}
                  </div>
                 
                  {{Form::submit('Done',['class'=>'btn  ','id'=>'commentSubmit'])}}
                  
                         
                       
                         {!! Form::close() !!}
                  </div>
                  
            
                  
                </div>
              </div>
            </div>
            
          
       </div>
       --}}
                       
       
         
       </div>
        </footer>
    </div>
  
<script>
 var report = "{{ route('report-th') }}";
    @include('includes.buttons') 
    
</script>
    <script>
        $('ul.pagination').hide();
        $(function() {
            $('.infinite').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite',
                callback: function() {
                    $('ul.pagination').remove();
                   }
                 });
              });
        
      </script> 
  






@endsection


