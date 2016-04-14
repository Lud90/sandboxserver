@extends('partials.skeleton')

@section('title', 'Login')

@section('styles')
    <link href="{{ URL::asset('css/login.css') }}" rel="stylesheet" type="text/css" media="screen,projection"/>
@endsection

@section('body')
    <div class="valign-wrapper login-wrapper">
        <div class="valign center-block">
            <div class="card z-depth-4">
                {!! Form::open(array('route' => 'loginAuth', 'method' => 'post', 'id' => 'loginForm')) !!}
                <div class="card-content">
                    <span class="card-title">Admin Login</span>
                    @if (count($errors) > 0 )
                        <div class="card-panel red lighten-1">
                            <span class="white-text">
                                {{ $errors->first() }}
                            </span>
                        </div>
                    @endif
                    <div class="input-field">
                        <input type="email" id="email" name="email" class="validate" value="{{ Request::old('email') }}"/>
                        <label for="email">Email Address</label>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password"/>
                        <label for="password">Password</label>
                    </div>
                    <input type="checkbox" id="remember" class="filled-in" name="remember" checked="{{ Request::old('remember') }}"/>
                    <label for="remember">Remember Me</label>
                </div>
                <div class="card-action block-buttons">
                    <a href="{{ route('forgotPassword') }}" class="teal-text text-lighten1 waves-effect left">Forgot Password</a>
                    <a href="#!" onclick="document.getElementById('loginForm').submit();" class="teal-text text-lighten1 waves-effect right">Login</a>
                    <div class="clearfix"></div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection