{{--
    Request password reset page
--}}

@extends('partials.skeleton')

@section('title', 'Forgot Password')

@section('styles')
    <link href="{{ URL::asset('css/login.css') }}" rel="stylesheet" type="text/css" media="screen,projection"/>
@endsection

@section('body')
    <div class="valign-wrapper login-wrapper">
        <div class="valign center-block">
            <div class="card z-depth-4">
                <form action="{{ action('Auth\PasswordController@postEmail') }}" method="post" id="loginForm">
                    {!! csrf_field() !!}
                    <div class="card-content">
                        <span class="card-title">Reset Password</span>
                        @if (session('status'))
                            <div class="card-panel green lighten-1">
                                <span class="black-text">
                                    {{ session('status') }}
                                </span>
                            </div>
                        @elseif(count($errors) > 0 )
                            <div class="card-panel red lighten-1">
                                <span class="white-text">
                                    {{ $errors->first() }}
                                </span>
                            </div>
                        @endif
                        <p>Enter your email address and we'll send you a link to reset your password.</p>
                        <div class="input-field">
                            <input type="email" id="email" name="email" class="validate" value="{{ Request::old('email') }}"/>
                            <label for="email">Email Address</label>
                        </div>
                    </div>
                    <div class="card-action block-buttons">
                        <a href="{{ route('login') }}" class="teal-text text-lighten1 waves-effect left">Back</a>
                        <a href="#!" onclick="document.getElementById('loginForm').submit();" class="teal-text text-lighten1 waves-effect right">Send</a>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection