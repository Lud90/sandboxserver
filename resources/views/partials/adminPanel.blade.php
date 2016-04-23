{{--
    this is the basic blade for displaying admin panel content, It includes the side bar and header,
    so to create a page with new content you just need to create the content and
    create a new blade extending this with your content in a section labeled 'content'
--}}


@extends('partials.skeleton')

@section('body')
    <header>
        @include('partials.header')
    </header>

    <main>
        @yield('content')
    </main>
@endsection