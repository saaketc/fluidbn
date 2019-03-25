@extends('layouts.main3')
@section('title')
Not logged in!
@endsection

@section('content')
<div class="w3-container"> 
<div class='row'>
            <div class='col-md-6'>
            <h1 class='w3-xxlarge' style='color:black;font-weight:bold;'>Looks like you are not logged in</h1>
            <a class='w3-button w3-padding-large w3-center w3-flat-pomegranate' href="{{ route('login') }}">Login</a>
            </div>
            </div>
            </div>
@endsection