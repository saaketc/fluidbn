@extends('layouts.aerepadmain')
@section('title')
Signup for AerePad
@endsection

@section('content')
<div class="container">
    <div class="row">
       
      <form class="form-horizontal" method="POST" action="{{ route('aerepadregister') }}">
        {{ csrf_field() }}

     
        <div class="form-group{{ $errors->has('deskname') ? ' has-error' : '' }}">
          <label for="deskname" class="control-label">Set your desk name </label>

       
              <input id="deskname" type="text" class="form-control" name="deskname" value="{{ old('deskname') }}" required autofocus>

              @if ($errors->has('deskname'))
                  <span class="help-block">
                      <strong>{{ $errors->first('deskname') }}</strong>
                  </span>
              @endif
         
      </div>
     
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="control-label">Name of institution or business</label>

       
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        
    </div> 
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">Email</label>

           
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Password</label>

           
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            
        </div>

        <div class="form-group">
          <label for="password-confirm" class="control-label">Confirm Password</label>

         
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
         
      </div>


        <div class="form-group">
            
                <button type="submit" class="btn btn-outline-success btn-login btn-block">
                    Get my desk
                </button>
               </div>
    </form>
      
      {{--
           
                   {!! Form::open(['route'=>'aerepadregister','method'=>'POST']) !!}
                                  
                                               <div class="form-group">
                                               {{Form::label('Set your desk name','')}}
                                               {{Form::text('deskname','',['class'=>'form-control','required'=>'required'])}}
                                               </div>
                                               <div class="form-group">
                                                {{Form::label('Name of institution or business','')}}
                                                {{Form::text('name','',['class'=>'form-control','required'=>'required'])}}
                                                </div>
                                       <div class="form-group">
                                        {{Form::label('Email','')}}
                                        {{Form::email('email','',['class'=>'form-control','required'=>'required'])}}
                                        </div>
                                               <div class="form-group">
                                               {{Form::label(' Password ','')}}
                                               {{Form::password('password',['class'=>'form-control','required'=>'required'])}}
                                                </div>
                                              
                                               <div class="form-group">
                                               {{Form::submit('Get my desk', ['class'=>'btn btn-outline-success btn-login  btn-block '])}}
                                               </div>
                                             @csrf
                                           {!! Form::close() !!}
                                            --}}
                                   
                                    
</div>
</div>       
                                    
                                              
                           
        
   {{--institution modal--
   
   <!-- The Modal -->
   <div class="modal fade" id="ins">
     <div class="modal-dialog modal-md">
       <div class="modal-content">
       
         <!-- Modal Header -->
         <div class="modal-header">
               <div class="imgcontainer">
                               <img src="/storage/general/welcome back.png" alt="Avatar" class="avatar">
                           </div>
       
        
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         
         <!-- Modal body -->
         <div class="modal-body">
          
          {!! Form::open(['route'=>'aerepadregister','method'=>'POST']) !!}
                         
          
                      
                            
                              <div class="form-group">
                                      {{Form::label('Set your desk name','')}}
                                      {{Form::text('deskname','',['class'=>'form-control','required'=>'required'])}}
                                      </div>
                                      
                                      <div class="form-group">
                                        {{Form::label('Name of institution or business','')}}
                                        {{Form::text('inst','',['class'=>'form-control','required'=>'required'])}}
                                        </div>
                                        
                                      <div class="form-group">
                               {{Form::label('Email','')}}
                               {{Form::email('email','',['class'=>'form-control','required'=>'required'])}}
                               </div>
                                      <div class="form-group">
                                      {{Form::label(' Password ','')}}
                                      {{Form::password('password',['class'=>'form-control','required'=>'required'])}}
                                       </div>
                                     
                                      <div class="form-group">
                                      {{Form::submit('Get my desk', ['class'=>'btn btn-outline-success btn-login  btn-block '])}}
                                      </div>
                                    @csrf
                                  {!! Form::close() !!}
                                      
                          
                       
                           
                                     
                       </div>
         
   
         
       </div>
     </div>
   
   </div>   



   {{--end ins--}}
         
          

@endsection
