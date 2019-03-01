@extends('layouts.aerepadmain')
@section('title')
fluidbN | News Feed
@endsection

@section('content')

<div class="w3-container">

        @if(count($news)>0)
      
        <div class="w3-hide-large" style="margin-top:5%;color:black;font-weight:bold;">
                <h1 class="w3-xxxlarge">News for you</h1>
        </div>

         <div class="w3-hide-small w3-hide-medium" style="margin-top:2%;color:black;font-weight:bold;">
                <h1 class="w3-jumbo">News for you</h1>
        </div>
        
         <div class="newsscroll box">
                   
               
           
            @foreach ($news as $a)
             <div class="row">
           <div class="col-md-8">
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
                          
                          <div class="" style="margin-botton:5px;">

                          <button onclick="document.getElementById('{{ $a->id }}').style.display='block'" class="w3-button w3-flat-pomegranate">Know more</button>
                       
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
   
</div>
        <div id={{ $a->id}} class="w3-modal">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container "> 
        <span onclick="document.getElementById({{ $a->id }}).style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2 style="color:black;">{{ $a->broadcastedBy->deskname}}</h2>
        <div>
             <img class="featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/aerepad_images/{{$a->title_image}}" alt="">
                      
        </div>
      </header>
      <div class="w3-container w3-large" style="color:black;margin-top:2%;">
                       
              <p>{!! $a->content!!}         
      </div>
      
    </div>
  </div>
  
           

            @endforeach
            
         
          
        {{$news->links()}}
        </div>
        @endif
        </div>
        
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
            
</div>

@endsection