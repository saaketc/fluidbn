@extends('layouts.main')
@section('title')
All notifications for {{ucfirst($user->fname)}}
@endsection

@section('content')
<div class="lower-margin"style="text-align:center;">
<h1 class="featured-heading">Notifications</h1>
 </div>   
 <div class="container">
<div class="">

        @foreach ($notifications as $n )
 
            @if($n->type=="App\Notifications\UserFollowed")
            @php
            $u = $n->data['follower_id'];
            $user1 = App\User::find($u);
            $f = $n->data['follower_fname'];
            $l = $n->data['follower_lname'];
          
            @endphp
            
            
                <div  class="card-related">
            <a href="{{route('profile',['user'=>$user1,'slug'=>str_slug($f.' '.$l)])}}" style="color:black;font-size:25px;" class="notify  " id={{$n->id}}> <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$user1->hasProfile->profile_image}}" alt=""> {{$n->data['message']}}
           
            </a>
            </div>
            <br/><br/>
               @elseif($n->type=="App\Notifications\UserFollowedTheory")
                              @php 
                              $id = $n->data['theory_id']; 
                             
                             
                              $art = App\Theory::find($id);
                              $title = $n->data['theory_title']; 
                              @endphp
                              <div class="card-related">
                              <a href="{{route('show-theory',['theory'=>$art,'slug'=>str_slug($title)])}}" class="  notify" id={{$n->id}}><p class=""style="color:black;font-size:25px;">{{$n->data['message']}}</p></a>
                              </div>
                            <br/><br/>
            
            
             @elseif($n->type=="App\Notifications\UserLiked") 
             @php 
             $id = $n->data['article_id']; 
      
            
             $art = App\Article::find($id);
             $title = $n->data['article_title']; 
             @endphp
                 <div class="card-related">
             <a href="{{route('show-article',['article'=>$art,'art_noti'=>$n->id,'slug'=>str_slug($title)])}}" style="color:black;font-size:25px;" class="notify  " id={{$n->id}}> {{$n->data['message']}}</a>
            </div>
             <br/><br/>
             
             
             
             @endif
       
    
   
        @endforeach
</div>      
</div>

@endsection