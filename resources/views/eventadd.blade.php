<!--
* Created by PhpStorm.
* User: cole
* Date: 04/03/16
* Time: 3:38 PM
* This blade is a form for adding events.
*
-->

@extends('partials.contentdisplay') {{-- the stuff necassary on each page--}}

@section('title', 'Add Event') {{-- The title of the page, displays on tab --}}

@section('content')
        @include('forms.addevent')
@endsection
