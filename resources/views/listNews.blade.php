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

@section('context_buttons')
    <li><a href="{{ action('FP\NewsController@create') }}"><i class="material-icons">add</i> New News</a></li>
@endsection

@section('content')
    <div class="container">
        <table id="newsTable">
            <thead>
                <th><input type="checkbox" id="checkAll"><label for="checkAll"></label></th>
                <th>Title</th>
                <th>Author</th>
                <th class="hide-on-small-only">Publish At</th>
                <th>Actions</th>
            </thead>
            @foreach ($news as $article)
                <tr>
                    <td>
                        <input type="checkbox" class="articleCheck" id="{{ $article->id }}"><label for="{{ $article->id }}"></label>
                    </td>
                    <td>
                        {{ $article->title }}
                    </td>
                    <td>
                        {{ $article->author }}
                    </td>
                    <td class="hide-on-small-only">
                        {{ $article->publish_at }}
                    </td>
                    <td>
                        <a href="#"><i class="material-icons">recent_actors</i></a>
                        <a href="{{ action('FP\NewsController@edit', $article->id) }}"><i class="material-icons">mode_edit</i></a>
                        <a href="{{ action('FP\NewsController@destroy', $article->id) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure you want to delete the article {{ $article->title }}? This cannot be undone."><i class="material-icons">delete</i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $news->count() }} results. Page {{ $news->currentPage() }} of {{ $news->lastPage() }}
        {!! $news->render() !!}
    </div>
@endsection

@section('endscripts')
    <script src="/js/buttonMethods.js"></script>
    <script>
        $(function() {
            laravel.initialize();

            $('#checkAll').change(function(){
                $('.newsCheck').prop('checked', $(this).prop('checked'));
            });

            $('.newsCheck').change(function(){
                if($('.newsCheck:checked').length == $('.newsCheck').length){
                    $('#checkAll').prop('checked', true);
                    $('#checkAll').prop('indeterminate', false);
                }else if($('.newsCheck:checked').length > 0){
                    $('#checkAll').prop('indeterminate', true);
                }else{
                    $('#checkAll').prop('checked', false);
                    $('#checkAll').prop('indeterminate', false);
                }
            })
        });
    </script>
@endsection
