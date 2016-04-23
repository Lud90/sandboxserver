@extends('partials.adminPanel')

@section('title', 'Sandboxes')

@section('context_buttons')
    <li><a href="{{ action('FP\SandboxController@create') }}"><i class="material-icons">add</i> New Sandbox</a></li>
@endsection

@section('content')
    <div class="container">
        <table id="sandboxTable">
            <thead>
            <th class="hide-on-small-only"><input type="checkbox" id="checkAll"><label for="checkAll"></label></th>
            <th>Name</th>
            <th class="hide-on-small-only">Primary Email</th>
            <th>Actions</th>
            </thead>
            @foreach($sandboxes as $sandbox)
                <tr>
                    <td class="hide-on-small-only">
                        <input type="checkbox" class="sandboxCheck" id="{{ $sandbox->id }}"><label for="{{ $sandbox->id }}"></label>
                    </td>
                    <td>
                        {{ $sandbox->name }}
                    </td>
                    <td class="hide-on-small-only">
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
        <span>{{ $sandboxes->total() }} Results &mdash; Showing {{ $sandboxes->firstItem() }} to {{ $sandboxes->lastItem() }}</span> <span class="right">Page {{ $sandboxes->currentPage() }} of {{ $sandboxes->lastPage() }}</span>
        {!! $sandboxes->render() !!}
    </div>
@endsection

@section('endscripts')
    <script src="/js/buttonMethods.js"></script>
    <script>
        $(function() {
            laravel.initialize();

            //checkbox logic
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
