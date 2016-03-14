{{--
    this is the basic blade for displaying content, It includes the side bar and header,
    so to create a page with new content you just need to create the content and
    create a new blade extending this with your content in a section labeled 'content'
--}}


@extends('partials.skeleton')

@section('styles')
    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet" type="text/css" media="screen,projection"/>
@endsection

@section('body')
    <header>
        @include('partials.header')
    </header>

    <main>
        @yield('content')
    </main>
@endsection