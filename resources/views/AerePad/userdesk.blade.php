 @extends('layouts.aerepadmain')
@section('title')
@auth('aerepad')
{{Auth::guard('aerepad')->user()->deskname}} | Aerepad
@endauth
@endsection

@section('content')
@auth('aerepad')
<div class="container">
<div class="box">
 
<h1 class="w3-xxxlarge" style="color:black;font-weight:bold;">Hey, {{Auth::guard('aerepad')->user()->deskname}} !</h1>
</div>
<div class="row">
    <button  class="w3-button w3-flat-pomegranate w3-padding-large" style="width:auto; margin-top:5px;margin-left:5px;" data-toggle="modal" data-target="#broadcast">Broadcast news or message</button>
       
    <!-- The Modal -->
    <div class="modal fade" id="broadcast">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
              
         
            <button type="button" class="close w3-large w3-red" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
               
          
            {!! Form::open(['route'=>'storeNews','method'=>'POST','files'=>true,'enctype'=>'multipart/form-data']) !!}
                          
                          
                       
                             
                               <div class="form-group">
                                       {{Form::label('title','Title of news or message ')}}
                                       {{Form::text('title','',['class'=>'form-control'])}}
                                       </div>
                                       <div class="form-group">
                                        {{Form::label('title_image','Upload title image if any',['class'=>'w3-button w3-flat-pomegranate w3-padding-large'])}}     {{Form::file('title_image',['accept'=>"image/*",'onchange'=>'loadFile(event)'])}}
            
                                        </div>
                                          <div class="" id="output-frame">   
<img id="output" class=" img-fluid mx-auto" style="width:100%;">
</div>
                                       <div class="form-group">
                                       {{Form::label('content','Content','')}}
                                       {{Form::textarea('content','',['class'=>'form-control'])}}
                                        </div>
                                      
                                       <div class="form-group">
                                       {{Form::submit('Broadcast', ['class'=>'w3-button w3-flat-pomegranate w3-padding-large'])}}
                                       </div>
                                     @csrf
          
                                     {!! Form::close() !!}
                                   
                               {{--                      
           
                                     <div class="form-group">
                                        {!! Form::open(['route'=>'aerepadlogin','method'=>'POST','class'=>'dropzone']) !!}
                                                      
                                        {!! Form::close() !!}
                                        </div>  
                        --}}
                            
                                      
                        </div>
          
    
          
        </div>
      </div>
    
    </div>
</div>
@if(count($news)>0)
<div class="box">
        <h2 style="color:black;font-weight:bold;" class="w3-xxlarge">Your broadcasted news</h2>
</div>

    <div class="newsscroll box">
           
        <div class="row">
   
    @foreach ($news as $a)
   <div class="col-md-5">
        <div class="container-related featured-article">
            
                <h3 class="featurette-heading-feed">{{ucfirst($a->broadcastedBy->deskname)}}</h3>
        </div>
   
    <div class="card-related lower-margin featured-article">
                        
                <img class="featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/aerepad_images/{{$a->title_image}}" alt="">
              
                <div class="container-related featured-article">
                  <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                 {{--  @php
                    $wows = $a->likedBy()->wherePivot('article_id',$a->id)->count();
                    if($wows==0)
                    $w = '';
                    else if($wows==1)
                    $w = '  '.$wows.' wow';
                    else
                    $w = '  '.$wows.' wows';
                    
                    $bookmark = Auth::user()->bookmarks()->wherePivot('user_id',Auth::user()->id)->wherePivot('article_id', $a->id)->first();
                 @endphp --}}
                  {{--  <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>  --}}
                 <div class="" style="margin-botton:5px;">

                          <button onclick="document.getElementById('{{ $a->id }}').style.display='block'" class="w3-button w3-flat-pomegranate">Full info</button>
                       
                        </div>
                         
                 
                  
                  {{--
                  @if($a->views>0)<small class="views right"> {{$v}}</small>@endif  <small class="views right-wow">{{$w}}</small>

                @php  $like = $user->likes()->wherePivot('user_id', $user->id)->wherePivot('article_id',$a->id)->first();
                 @endphp
                 <button class="btn btn-outline-success margin like"  data-articleid="{{$a->id}}" type="submit">{{$like ? "Thanks for appreciating !" : "Wow !"}}</button>
                 --}}
                </div>
              </div>

</div>     
   <div id={{ $a->id}} class="w3-modal">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container "> 
        <span onclick="document.getElementById({{ $a->id }}).style.display='none'" 
        class="w3-button w3-large w3-red w3-display-topright">&times;</span>
  
        <div>
             {{--  <img class="featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/aerepad_images/{{$a->title_image}}" alt="">
                        --}}
        </div>
      </header>
      <div class="w3-container w3-large" style="color:black;margin-top:2%;">
                       
              <p>{!! $a->content!!}         
      </div>
      
    </div>
  </div>
    @endforeach
    
 
   </div>
  
{{$news->links()}}
</div>
@endif
</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
   
   output.src = URL.createObjectURL(event.target.files[0]);
    

  };
</script>
<script>
        $('ul.pagination').hide();
        $(function() {
            $('.newsscroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.newsscroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
        var token = "{{Session::token()}}";
        var urlBookmark = "{{route('bookmark')}}";
        var urlUnmark = "{{route('unmark')}}";
        var urlNotification = "{{route('notifications')}}";
    </script> 
    @endauth

@endsection