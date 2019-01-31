@extends('layouts.main')

@section('title')
Signup | fluidbN
@endsection
@section('content')
<div class="container">

    <div class="row justify-content-center">
        
        <div class="col-lg-6">
              <img src="/storage/general/welcome-signup.png" style="width:100%;height:auto;box-shadow:10px 10px 10px #888888;">
            </div>
        <div class="col-lg-6">
            <div class="card" style="width:100%;">
                <div class="card-body" style="width:100%;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="fname" class="col-lg-4 col-form-label text-lg-right pro_info">{{ __('First name') }}</label>

                            <div class="col-lg-6">
                                <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                                <label for="lname" class="col-lg-4 col-form-label text-lg-right pro_info">{{ __('Last name') }}</label>
    
                                <div class="col-lg-6">
                                    <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required autofocus>
    
                                    @if ($errors->has('lname'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('lname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-4 col-form-label text-lg-right pro_info">{{ __('E-mail') }}</label>

                            <div class="col-lg-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-lg-4 col-form-label text-lg-right pro_info">{{ __('Password') }}</label>

                            <div class="col-lg-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-lg-4 col-form-label text-lg-right pro_info">{{ __('Confirm Password') }}</label>

                            <div class="col-lg-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit" class="btn btn-outline-success btn-login">
                                    {{ __('Signup') }}
                                </button>
                               
                            </div>
                             <small>By signing up you are agreeing to our <a href="{{route('terms')}}" style="color:mediumvioletred">Terms of use</a> and <a href="{{route('privacy')}}" style="color:mediumvioletred">Privacy policy</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
