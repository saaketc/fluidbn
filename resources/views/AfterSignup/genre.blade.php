@extends('layouts.main2')

@section('title')
@if($slug!=NULL)
Add story categories | fluidbN
@else
Signup - choose-category | fluidbN
@endif
@endsection
 
@section('content')
 
<div class="container">
<div class="box lower-margin" style="">
   <h1 class="featurette-heading-title" style="font-size:35px;">Hi {{ucfirst(Auth::user()->fname)}}, choose categories you <i class="fa fa-heart" style="font-size:40px;color:red;"></i></h1> 
   {{--
   <img class="featurette-image img-fluid mx-auto" style="box-shadow:5px 5px 5px #888888;"src="/storage/general/category.png" alt="choose category">
  --}} 
  </div>
</div>
<div class="container">
  <div class="row">
   
@foreach ($genre as $g)
@php

if(Auth::user())
$exists = Auth::user()->hasGenre()->wherePivot('user_id',Auth::user()->id)->wherePivot('genre_id',$g->id)->first();
if($exists!=NULL){
  $c="card-genre lower-margin genre-selected";
  $v = "newval".$g->id;
}

else{
  $c="card-genre lower-margin";
  $v = "someval";
}

@endphp
    <div class="col-md-3"  data-genreId="{{$g->id}}">
        <a href="/{{$g->name}}" class="chooseGenre" data-genreId="{{$g->id}}" data-name="{{$g->id}}">

          <div class="{{$c}}" id="{{$g->id}}" data-val="{{$v}}">
          <img class="featurette-image img-fluid mx-auto " style="box-shadow:5px 5px 5px #888888;" src="/storage/genere/{{$g->image}}" alt="">
      
        </div>
     
        </a>
    </div>
@endforeach

  </div>
<div>
   @if($slug!=NULL)
  <button class="btn   btn-login" onclick="location.href='{{route('user-categories',['user'=>Auth::user(),'slug'=>str_slug(Auth::user()->fname.".".Auth::user()->lname)])}}'">Save</button>
  @else
  <button class="btn   btn-login"onclick="location.href='{{route('create-profile')}}'" id="">Save and continue</button>
@endif
</div>
</div>
<script>
    var token = "{{Session::token()}}";
   
    var urlGenre = "{{route('store-genre')}}";
    var urlCreateProfile = "{{route('NewProfile')}}";
    var urlGenreRem = "{{route('rem-genre')}}";
</script>
@endsection