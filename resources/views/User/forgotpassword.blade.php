@extends('layouts.main')
@section('title')
Forgot password | fluidbN
@endsection

@section('content')
<div class="container">
<h2 style="font-weight:bold;">Get a new password for your account</h2>
<div class="row">
    <div class="col-sm-5">
        <div class="card" style="width:100%;">
{!!Form::open(['route'=>'update-pass','method'=>'POST'])!!}
<div class="form-group">
{{Form::label('email','Your email',['class'=>'form-control'])}}
{{Form::email('email','',['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('password','New password',['class'=>'form-control'])}}
{{Form::password('password',['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('conf-pass','Confirm password',['class'=>'form-control'])}}
{{Form::password('conf-pass',['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::submit('Make changes',['class'=>'btn btn-login'])}}
</div>
@csrf
{!!Form::close()!!}
</div>
</div>
</div>
</div>
@endsection