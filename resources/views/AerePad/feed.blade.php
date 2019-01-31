@extends('layouts.aerepadmain')
@section('title')
AerePad News Feed
@endsection

@section('content')
@auth('aerepad')
<div class="container">
        @if(count($news)>0)
        <div class="box">
                <h1 class="featurette-heading">News for you</h1>
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
                          <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>
                          <div class="" style="margin-botton:5px;">
                       <div class=""><small class="margin writer-small" style="font-size:20px;font-weight:bold;">{{$a->broadcastedBy->deskname }}</small></div>
                         
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
           
            @endforeach
            
         
           </div>
          
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
            @endauth
</div>

@endsection