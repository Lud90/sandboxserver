@extends('partials.skeleton')

@section('title', 'Login')

@section('styles')
    <link href="{{ URL::asset('css/login.css') }}" rel="stylesheet" type="text/css" media="screen,projection"/>
@endsection

@section('body')
    <div class="valign-wrapper login-wrapper">
        <div class="valign center-block">
            <div class="card z-depth-4">
                <div class="card-content">
                    <span class="card-title">Admin Login</span>
                    <form>
                        <div class="input-field">
                            <input type="email" id="email" name="email" class="validate"/>
                            <label for="email">Email Address</label>
                        </div>
                        <div class="input-field">
                            <input type="password" id="password" name="password"/>
                            <label for="password">Password</label>
                        </div>
                        <input type="checkbox" id="rememberme" class="filled-in" name="rememberme"/>
                        <label for="rememberme">Remember Me</label>
                    </form>
                </div>
                <div class="card-action right-align block-buttons">
                    <a href="#" class="teal-text text-lighten1 waves-effect">Login</a>
                </div>
            </div>
        </div>
    </div>
@endsection