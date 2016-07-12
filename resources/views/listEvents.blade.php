@extends('partials.adminPanel')

@section('title', 'All Events')

@section('context_buttons')
    <li><a href="{{ action('FP\EventController@create') }}"><i class="material-icons">add</i> New Event</a></li>
@endsection

@section('content')
    <div class="container">
        {{--<div class="row">--}}
        {{--</div>--}}
        {{--<div class="row">--}}
        {{--</div>--}}
        @foreach ($events as $event)
        <div class="card" style="height: 200px">
            <div class="card-image waves-effect waves-block waves-light">
                {{--<img class="activator" src="{{$event->image}}">--}}
            </div>
            <div class="card-content">
                {{--<td class="card-content">--}}
                    {{--<input type="checkbox" class="eventCheck" id="{{ $event->id }}"><label for="{{ $event->id }}"></label>--}}
                {{--</td>--}}
                <span class="card-title activator grey-text text-darken-4">{{ $event->title }}<i class="material-icons right">more_vert</i></span>
                <p>{{$event->snippet}}</p>
                <br> </br>

                <p>Time:
                {{-- Display date differently if the event starts and ends on different days --}}
                @if (date_format(date_create($event->start_time), 'M j, o') == date_format(date_create($event->end_time), 'M j, o'))
                    {{ date_format(date_create($event->start_time), 'h:ia') }} - {{ date_format(date_create($event->end_time), 'h:ia, M j, o') }}
                @else
                    {{ date_format(date_create($event->start_time), 'h:ia, M j, o') }} - {{ date_format(date_create($event->end_time), 'h:ia, M j, o') }}
                @endif </p>

                {{-- Use this link for registered users when implemented
               <a href="#"><i class="material-icons">recent_actors</i></a> --}}
                <a href="{{ action('FP\EventController@edit', $event->id) }}"><i class="material-icons right ">mode_edit</i></a>
                <a href="{{ action('FP\EventController@destroy', $event->id) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure you want to delete the event {{ $event->title }}? This cannot be undone."><i class="material-icons right">delete</i></a>
            </div>

            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">{{ $event->title }}<i class="material-icons right">close</i></span>
                <p>{{$event->content}}</p>
                <br></br>
                <p><a href="#">Website </a> Hosting Sandboxes:
                @foreach($event->sandboxes as $sandbox)
                    {{ $sandbox->name }}
                @endforeach</p>
            </div>
        </div>

        @endforeach

        {{--This is the previous Events Table. Maybe we could use it for the archived events? --}}
        {{--<table id="eventsTable">--}}
            {{--<thead>--}}
            {{--<th class="hide-on-small-only"><input type="checkbox" id="checkAll"><label for="checkAll"></label></th>--}}
            {{--<th>Title</th>--}}
            {{--<th class="hide-on-small-only">Times</th>--}}
            {{--<th>Sandboxes</th>--}}
            {{--<th>Actions</th>--}}
            {{--</thead>--}}
            {{--@foreach ($events as $event)--}}
                {{--<tr>--}}
                    {{--<td class="hide-on-small-only">--}}
                        {{--<input type="checkbox" class="eventCheck" id="{{ $event->id }}"><label for="{{ $event->id }}"></label>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--{{ $event->title }}--}}
                    {{--</td>--}}
                    {{--<td class="hide-on-small-only">--}}
                        {{-- Display date differently if the event starts and ends on different days --}}
                        {{--@if (date_format(date_create($event->start_time), 'M j, o') == date_format(date_create($event->end_time), 'M j, o'))--}}
                            {{--{{ date_format(date_create($event->start_time), 'h:ia') }} - {{ date_format(date_create($event->end_time), 'h:ia, M j, o') }}--}}
                        {{--@else--}}
                            {{--{{ date_format(date_create($event->start_time), 'h:ia, M j, o') }} - {{ date_format(date_create($event->end_time), 'h:ia, M j, o') }}--}}
                        {{--@endif--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--@foreach($event->sandboxes as $sandbox)--}}
                            {{--{{ $sandbox->name }}--}}
                        {{--@endforeach--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{-- Use this link for registered users when implemented--}}
                        {{--<a href="#"><i class="material-icons">recent_actors</i></a> --}}
                        {{--<a href="{{ action('FP\EventController@edit', $event->id) }}"><i class="material-icons">mode_edit</i></a>--}}
                        {{--<a href="{{ action('FP\EventController@destroy', $event->id) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure you want to delete the event {{ $event->title }}? This cannot be undone."><i class="material-icons">delete</i></a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
        {{--</table>--}}
        {{--<span>{{ $events->total() }} Results &mdash; Showing {{ $events->firstItem() }} to {{ $events->lastItem() }}</span> <span class="right">Page {{ $events->currentPage() }} of {{ $events->lastPage() }}</span>--}}
        {{--{!! $events->render() !!}--}}
    {{--</div>--}}
@endsection

@section('endscripts')
    <script src="/js/buttonMethods.js"></script>
    <script>
        $(function() {

            laravel.initialize();

            //checkbox logic
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

        })();
    </script>
@endsection
