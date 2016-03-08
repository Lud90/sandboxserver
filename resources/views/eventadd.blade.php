<!--
* Created by PhpStorm.
* User: cole
* Date: 04/03/16
* Time: 3:38 PM
* This blade is a form for adding events.
*
-->

@extends('partials.skeleton') {{-- the stuff necassary on each page--}}

@section('title', 'Add Event') {{-- The title of the page, displays on tab --}}

@section('styles')
    <link href="{{ URL::asset('css/login.css') }}" rel="stylesheet" type="text/css" media="screen,projection"/>
@endsection

@section('body')
    <body>
    <div class="row">
        @include('partials.header')
    </div>
    <div class="row"> <!-- the main content and side bar -->
        @include('partials.sidebar')
        @include('forms.addevent')
    </div>
    </body>
@endsection