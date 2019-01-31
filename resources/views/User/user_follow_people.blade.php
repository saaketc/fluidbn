@extends('layouts.main')
@section('title')
People {{ucfirst($user->fname)}} follows | fluidbN
@endsection

@section('content')

<div class="container">
 
        @if(count($follows)>0)

    <div style="margin-bottom:50px;">
        @if($authuser->id==$user->id)
    <h1 class="featurette-heading" style="font-weight:bold; font-size:30px;color:black;">People you follow</h1>
@else
<h1 class="featurette-heading" style="font-weight:bold; font-size:30px;color:black;">People {{ucfirst($user->fname)}} follows</h1>
@endif
</div>
   
   

    <div class="infinite-fol">
    @foreach($follows as $f)
 
   
    <div class="row">
    <div class="col-sm-4">
    <a href="{{route('profile',['user'=>$f,'slug'=>str_slug($f->fname." ".$f->lname)])}}">
    <img class="featurette-image img-fluid propic-small" src="/storage/profile_images/thumbnails/{{$f->hasProfile->profile_image}}" alt="">
    <small class="writer" style="font-weight:bold; font-size:20px;">{{ucfirst($f->fname).' '.ucfirst($f->lname)}}</small>
    </a>
    </div>
   
    
     {{-- 
     <div class="col-sm-4">
         
     <button class="btn margin btn-login fol" id ="" data-userid="{{$f->id}}">Follow</button> 
            
    </div>
    --}}
    </div>
      
   
    @endforeach
    @elseif($authuser->id==$user->id)
    
    <h2>{{"You don't follow anyone yet"}}</h2>
    <a href="{{route('follow-people')}}"><h4 style="color:red;">Start following</h4></a>
    @else
    <h2>{{ucfirst($user->fname) ." isn't following anyone right now"}}</h2>
   
    @endif
   {{$follows->links()}}
   </div>
    </div>
    
     <script>
    var token = "{{Session::token()}}";
  var urlFollow = "{{route('follow')}}";
  var urlUnfollow = "{{route('unfollow')}}";
     </script>
     
     <script>
      $('ul.pagination').hide();
     
      $(function() {
          $('.infinite-fol').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-fol',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
     
</script>
@endsection