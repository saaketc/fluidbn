@extends('layouts.main')
@section('title')
All story choices| fluidbN
@endsection


@section('content')


{{--story categories --}}

<div class="container">

 <h1 class="featurette-heading-title">fluidbN story choices</h1>
  <div class="row box">
    
@foreach ($genre as $g)

    <div class="col-md-3" >
        <a href="{{route('stories-genre',['genre'=>$g->name])}}">
<div class="lower-margin">
 <div class=" lower-margin featured-article">
         
          <img class="featurette-image img-fluid" style="box-shadow:5px 5px 5px #888888;" src="/storage/genere/{{$g->image}}" alt="">
      
        
     
        </a>
        </div>
        </div>
    </div>
@endforeach

  </div>
</div>



{{--end --}}
@endsection