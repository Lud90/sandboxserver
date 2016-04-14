@extends('partials.skeleton')

@section('title', 'Forgot Password')

@section('styles')
    <link href="{{ URL::asset('css/login.css') }}" rel="stylesheet" type="text/css" media="screen,projection"/>
@endsection

@section('body')
    <div class="valign-wrapper login-wrapper">
        <div class="valign center-block">
            <div class="card z-depth-4">
                <form action="{{ action('Auth\PasswordController@postReset') }}" method="post" id="resetForm">
                    {!! csrf_field() !!}
                    <input type="hidden" name="token" value="{{ $token }}">
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
                                @foreach($errors->all() as $error)
                                    <span class="white-text">
                                        {{ $errors->first() }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                        <p>Enter a new password</p>
                        <div class="input-field">
                            <input type="email" id="email" name="email" class="validate" value="{{ old('email') }}"/>
                            <label for="email">Email Address</label>
                        </div>
                        <div class="input-field">
                            <input type="password" id="password" name="password"/>
                            <label for="password">New Password</label>
                        </div>
                        <div class="input-field">
                            <input type="password" id="password_confirmation" name="password_confirmation"/>
                            <label for="password_confirmation">Confirm Password</label>
                        </div>
                    </div>
                    <div class="card-action block-buttons">
                        <a href="#!" onclick="document.getElementById('resetForm').submit();" class="teal-text text-lighten1 waves-effect right">Reset Password</a>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection