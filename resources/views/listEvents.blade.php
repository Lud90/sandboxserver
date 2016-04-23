@extends('partials.contentdisplay') {{-- the stuff necassary on each page--}}

@section('title', 'All Events') {{-- The title of the page, displays on tab --}}

@section('context_buttons')
    <li><a href="{{ action('FP\EventController@create') }}"><i class="material-icons">add</i> New Event</a></li>
@endsection

@section('content')
    <div class="container">
        <table id="eventsTable">
            <thead>
            <th class="hide-on-small-only"><input type="checkbox" id="checkAll"><label for="checkAll"></label></th>
            <th>Title</th>
            <th class="hide-on-small-only">Times</th>
            <th>Sandboxes</th>
            <th>Actions</th>
            </thead>
            @foreach ($events as $event)
                <tr>
                    <td class="hide-on-small-only">
                        <input type="checkbox" class="eventCheck" id="{{ $event->id }}"><label for="{{ $event->id }}"></label>
                    </td>
                    <td>
                        {{ $event->title }}
                    </td>
                    <td class="hide-on-small-only">
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
                        {{-- Use this link for registered users when implemented
                        <a href="#"><i class="material-icons">recent_actors</i></a> --}}
                        <a href="{{ action('FP\EventController@edit', $event->id) }}"><i class="material-icons">mode_edit</i></a>
                        <a href="{{ action('FP\EventController@destroy', $event->id) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure you want to delete the event {{ $event->title }}? This cannot be undone."><i class="material-icons">delete</i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        <span>{{ $events->total() }} Results &mdash; Showing {{ $events->firstItem() }} to {{ $events->lastItem() }}</span> <span class="right">Page {{ $events->currentPage() }} of {{ $events->lastPage() }}</span>
        {!! $events->render() !!}
    </div>
@endsection

@section('endscripts')
    <script src="/js/buttonMethods.js"></script>
    <script>
        $(function() {

            laravel.initialize();

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
