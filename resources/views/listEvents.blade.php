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
                            <a href="{{ action('FP\EventController@edit', $event->id) }}"><i class="material-icons">mode_edit</i></a>
                            <a href="/admin/event/{{$event->id}}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure you want to delete the event {{ $event->title }}? This cannot be undone."><i class="material-icons">delete</i></a>
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

@section('endscripts')
    <script>
        (function() {

            var laravel = {
                initialize: function() {
                    this.methodLinks = $('a[data-method]');
                    this.token = $('a[data-token]');
                    this.registerEvents();
                },

                registerEvents: function() {
                    this.methodLinks.on('click', this.handleMethod);
                },

                handleMethod: function(e) {
                    var link = $(this);
                    var httpMethod = link.data('method').toUpperCase();
                    var form;

                    // If the data-method attribute is not PUT or DELETE,
                    // then we don't know what to do. Just ignore.
                    if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
                        return;
                    }

                    // Allow user to optionally provide data-confirm="Are you sure?"
                    if ( link.data('confirm') ) {
                        if ( ! laravel.verifyConfirm(link) ) {
                            return false;
                        }
                    }

                    form = laravel.createForm(link);
                    form.submit();

                    e.preventDefault();
                },

                verifyConfirm: function(link) {
                    return confirm(link.data('confirm'));
                },

                createForm: function(link) {
                    var form =
                            $('<form>', {
                                'method': 'POST',
                                'action': link.attr('href')
                            });

                    var token =
                            $('<input>', {
                                'type': 'hidden',
                                'name': '_token',
                                'value': link.data('token')
                            });

                    var hiddenInput =
                            $('<input>', {
                                'name': '_method',
                                'type': 'hidden',
                                'value': link.data('method')
                            });

                    return form.append(token, hiddenInput)
                            .appendTo('body');
                }
            };

            laravel.initialize();

        })();
    </script>
@endsection
