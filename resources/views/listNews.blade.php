<!--
* Created by PhpStorm.
* User: cole
* Date: 04/03/16
* Time: 3:38 PM
* This blade is a form for adding events.
*
-->

@extends('partials.contentdisplay') {{-- the stuff necassary on each page--}}

@section('title', 'All News') {{-- The title of the page, displays on tab --}}

@section('content')
    <div class="container">
        <div class="collection">
        @foreach ($news as $article)
            <div class="collection-item">
                <div class="listItem">
                    <div class="row">
                        <div class="col s2">
                            {{ $article->title }}
                        </div>
                        <div class="col s5 truncate">
                            {{ $article->content }}
                        </div>
                        <div class="col s3">
                            {{ date_format(date_create($article->publish_at), 'h:ia, M j, o') }}
                        </div>
                        <div class="secondary-content">
                            <a href="{{ action('FP\EventController@editEvent', $article->id) }}"><i class="material-icons">mode_edit</i></a>
                            <a href="{{ action('FP\EventController@deleteEvent', $article->id) }}"><i class="material-icons">delete</i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        {{ $news->count() }} results. Page {{ $news->currentPage() }} of {{ $news->lastPage() }}
        {!! $news->render() !!}
    </div>
@endsection
