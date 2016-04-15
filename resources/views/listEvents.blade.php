<!--
* Created by PhpStorm.
* User: cole
* Date: 04/03/16
* Time: 3:38 PM
* This blade is a form for adding events.
*
-->

@extends('partials.contentdisplay') {{-- the stuff necassary on each page--}}

@section('title', 'All Events') {{-- The title of the page, displays on tab --}}

@section('content')
    <div class="container">
        <div class="collection itemList">
        @foreach ($events as $event)
            <div class="collection-item">
                <div class="listItem">
                    <div class="row">
                        <div class="col s8 m2">
                            {{ $event->title }}
                        </div>
                        <div class="col s5 truncate hide-on-small-and-down">
                            {{ $event->content }}
                        </div>
                        <div class="col s3 hide-on-small-and-down">
                            @if (date_format(date_create($event->start_time), 'M j, o') == date_format(date_create($event->end_time), 'M j, o'))
                                {{ date_format(date_create($event->start_time), 'h:ia') }} - {{ date_format(date_create($event->end_time), 'h:ia, M j, o') }}
                            @else
                                {{ date_format(date_create($event->start_time), 'h:ia, M j, o') }} - {{ date_format(date_create($event->end_time), 'h:ia, M j, o') }}
                            @endif
                        </div>
                        <div class="secondary-content">
                            <a href="#"><i class="material-icons">recent_actors</i></a>
                            <a href="{{ action('FP\EventController@editEvent', $event->id) }}"><i class="material-icons">mode_edit</i></a>
                            <a href="{{ action('FP\EventController@deleteEvent', $event->id) }}"><i class="material-icons">delete</i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        {{ $events->count() }} results. Page {{ $events->currentPage() }} of {{ $events->lastPage() }}
        {!! $events->render() !!}
    </div>
@endsection
