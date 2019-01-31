@extends('layouts.main')
@section('title')
{{ucfirst($user->fname)."'s story choices"}}
@endsection

@section('content')

<div class="container" style="align:center;">
    <div class="lower-margin">
    @if(Auth::user()->id==$user->id)
    <h1 class="featurette-heading">Your story choices</h1>
    @if($count<$totalGenres)
     <button class="btn btn-outline-success btn-login box" onclick="location.href='{{route('choosegenre',['slug'=>uniqid()])}}'" >Add more</button>
   @endif
    @else
    <h2 class="featurette-heading">{{ucfirst($user->fname)."'s story choices"}}</h2>
    @endif
    </div>
    <div class="row">
@foreach ($userGenre as $ug)
<div class="col-md-3">
   <a href="{{route('stories-genre',['genre'=>$ug])}}">
    <div class="card-genre" style="width:70%;">
            <img class="featurette-image img-fluid mx-auto img-card" src="/storage/genere/{{$ug->image}}" alt="">
    </div>
    </a>
</div>
    
@endforeach
    </div>
</div>

@endsection