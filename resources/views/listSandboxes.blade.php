@extends('partials.contentdisplay') {{-- the stuff necassary on each page--}}

@section('title', 'Sandboxes') {{-- The title of the page, displays on tab --}}

@section('context_buttons')
    <li><a href="{{ action('FP\SandboxController@create') }}"><i class="material-icons">add</i> New Sandbox</a></li>
@endsection

@section('content')
    <div class="container">
        <table id="sandboxTable">
            <thead>
            <th><input type="checkbox" id="checkAll"><label for="checkAll"></label></th>
            <th>Name</th>
            <th>Primary Email</th>
            <th>Actions</th>
            </thead>
            @foreach($sandboxes as $sandbox)
                <tr>
                    <td>
                        <input type="checkbox" class="sandboxCheck" id="{{ $sandbox->id }}"><label for="{{ $sandbox->id }}"></label>
                    </td>
                    <td>
                        {{ $sandbox->name }}
                    </td>
                    <td>
                        {{ $sandbox->email }}
                    </td>
                    <td>
                        <a href="{{ action('FP\SandboxController@edit', $sandbox->id) }}"><i class="material-icons">mode_edit</i></a>
                        @if($sandbox->id == Auth::id())
                            <i class="material-icons grey-text disabled">delete</i>
                        @else
                            <a href="{{ action('FP\SandboxController@destroy', $sandbox->id) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure you want to delete the sandbox account {{ $sandbox->name }}? This cannot be undone."><i class="material-icons">delete</i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $sandboxes->count() }} results. Page {{ $sandboxes->currentPage() }} of {{ $sandboxes->lastPage() }}
        {!! $sandboxes->render() !!}
    </div>
@endsection

@section('endscripts')
    <script src="/js/buttonMethods.js"></script>
    <script>
        $(function() {
            laravel.initialize();

            $('#checkAll').change(function(){
                $('.sandboxCheck').prop('checked', $(this).prop('checked'));
            });

            $('.eventCheck').change(function(){
                if($('.sandboxCheck:checked').length == $('.sandboxCheck').length){
                    $('#checkAll').prop('checked', true);
                    $('#checkAll').prop('indeterminate', false);
                }else if($('.sandboxCheck:checked').length > 0){
                    $('#checkAll').prop('indeterminate', true);
                }else{
                    $('#checkAll').prop('checked', false);
                    $('#checkAll').prop('indeterminate', false);
                }
            })
        });
    </script>
@endsection
