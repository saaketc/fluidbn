@extends('layouts.main')

@section('title')
Login | fluidbN
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-6">
<img src="/storage/general/welcome-login.png" style="box-shadow:10px 10px 10px #888888;width:100%;">
       </div>
       
        <div class="col-md-5">
            <div class="card" style="width:100%;">
                <div class="card-header pro_info" style="color:black;font-size:25px;">{{ __('Login') }}</div>

                <div class="card-body pro_info" style="width:100%;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-lg-6 col-form-label  fa fa-user"> {{ __(' E-Mail') }}</label>

                            <div class="col-lg-8" style="margin-right:10px;">
                                <input id="email" type="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-lg-6 col-form-label  fa fa-lock"> {{ __(' Password') }}</label>

                            <div class="col-lg-8" style="margin-right:10px;">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-login">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" style="color:mediumvioletred;" href="{{ route('forgot') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                
    
                                        <a class="btn btn-link" style="color:mediumvioletred;" href="{{ route('register') }}">
                                            {{ __('Signup Now') }}
                                        </a>

                            
                        </>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
