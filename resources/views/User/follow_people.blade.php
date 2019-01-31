@extends('layouts.main')
@section('title')
People from {{$same_place}} | fluidbN
@endsection

@section('content')

<div class="container">
    <div style="margin-bottom:50px;">
    <h1 class="featurette-heading" style="font-weight:bold; font-size:30px;color:black;">People from {{$same_place}}</h1>
   </div>
   
   
 
    @if(count($follow_people)>0)
    <div class="infinite-folUser">
    @foreach($follow_people as $f)
 
   
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
    @else
    <h2>Sorry no people from your place yet</h2>
    @endif
   {{$follow_people->links()}}
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
          $('.infinite-folUser').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-folUser',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
     
</script>
@endsection