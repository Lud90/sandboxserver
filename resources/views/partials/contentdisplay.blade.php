{{--
    this is the basic blade for displaying content, It includes the side bar and header,
    so to create a page with new content you just need to create the content and
    create a new blade extending this with your content in a section labeled 'content'
--}}


@extends('partials.skeleton')

@section('styles')
    <link href="{{ URL::asset('css/login.css') }}" rel="stylesheet" type="text/css" media="screen,projection"/>
@endsection

@section('body')
    <div class="row">
        @include('partials.header')
    </div>
    <div class="row"> <!-- the main content and side bar -->
        @include('partials.sidebar')
        @yield('content')
    </div>
@endsection