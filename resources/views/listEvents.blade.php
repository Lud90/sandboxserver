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
        <table id="eventsTable">
            <thead>
            <th><input type="checkbox" id="checkAll"><label for="checkAll"></label></th>
            <th>Title</th>
            <th>Times</th>
            <th>Sandboxes</th>
            <th>Actions</th>
            </thead>
            @foreach ($events as $event)
                <tr>
                    <td>
                        <input type="checkbox" class="eventCheck" id="{{ $event->id }}"><label for="{{ $event->id }}"></label>
                    </td>
                    <td>
                        {{ $event->title }}
                    </td>
                    <td>
                        @if (date_format(date_create($event->start_time), 'M j, o') == date_format(date_create($event->end_time), 'M j, o'))
                            {{ date_format(date_create($event->start_time), 'h:ia') }} - {{ date_format(date_create($event->end_time), 'h:ia, M j, o') }}
                        @else
                            {{ date_format(date_create($event->start_time), 'h:ia, M j, o') }} - {{ date_format(date_create($event->end_time), 'h:ia, M j, o') }}
                        @endif
                    </td>
                    <td>
                        @foreach($event->sandboxes as $sandbox)
                            {{ $sandbox->name }}
                        @endforeach
                    </td>
                    <td>
                        <a href="#"><i class="material-icons">recent_actors</i></a>
                        <a href="{{ action('FP\EventController@editEvent', $event->id) }}"><i class="material-icons">mode_edit</i></a>
                        <a href="{{ action('FP\EventController@deleteEvent', $event->id) }}"><i class="material-icons">delete</i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $events->count() }} results. Page {{ $events->currentPage() }} of {{ $events->lastPage() }}
        {!! $events->render() !!}
    </div>
@endsection

@section('bodyscripts')
    <script>
        $('#checkAll').change(function(){
            $('.eventCheck').prop('checked', $(this).prop('checked'));
        });

        $('.eventCheck').change(function(){
            if($('.eventCheck:checked').length == $('.eventCheck').length){
                $('#checkAll').prop('checked', true);
                $('#checkAll').prop('indeterminate', false);
            }else if($('.eventCheck:checked').length > 0){
                $('#checkAll').prop('indeterminate', true);
            }else{
                $('#checkAll').prop('checked', false);
                $('#checkAll').prop('indeterminate', false);
            }
        })
    </script>
@endsection
