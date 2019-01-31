
@if(count($errors)>0)

@foreach($errors->all() as $error)       <!--$errors contains errors in validation it is an reference to the array-->
<div id="msg">
<div class="alert alert-danger">
{{$error}}
</div>
</div>
@endforeach
@endif
@if(session('success'))                  <!-- to check if session is successful or not-->
<div id="msg">
<div class="alert alert-success">
{{session('success')}}
</div>
</div>
@endif

<div id="msg">
@if(session('error'))
<div class="alert alert-danger">
{{session('error')}}
</div>
</div>
@endif