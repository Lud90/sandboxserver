@extends('partials.adminPanel')

@section('title', 'Administrators')

@section('context_buttons')
    <li><a href="{{ action('FP\AdminController@create') }}"><i class="material-icons">add</i> New Admin</a></li>
@endsection

@section('content')
    <div class="container">
        <table id="adminTable">
            <thead>
                <th class="hide-on-small-only"><input type="checkbox" id="checkAll"><label for="checkAll"></label></th>
                <th class="hide-on-small-only">Name</th>
                <th>Email</th>
                <th>Actions</th>
            </thead>
            @foreach($admins as $admin)
                <tr>
                    <td class="hide-on-small-only">
                        <input type="checkbox" class="adminCheck" id="{{ $admin->id }}"><label for="{{ $admin->id }}"></label>
                    </td>
                    <td class="hide-on-small-only">
                        {{ $admin->name }}
                    </td>
                    <td>
                        {{ $admin->email }}
                    </td>
                    <td>
                        <a href="{{ action('FP\AdminController@edit', $admin->id) }}"><i class="material-icons">mode_edit</i></a>
                        {{-- Disable delete button for logged-in user --}}
                        @if($admin->id == Auth::id())
                            <i class="material-icons grey-text disabled">delete</i>
                        @else
                            <a href="{{ action('FP\AdminController@destroy', $admin->id) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure you want to delete the admin account {{ $admin->email }}? This cannot be undone."><i class="material-icons">delete</i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        <span>{{ $admins->total() }} Results &mdash; Showing {{ $admins->firstItem() }} to {{ $admins->lastItem() }}</span> <span class="right">Page {{ $admins->currentPage() }} of {{ $admins->lastPage() }}</span>
        {!! $admins->render() !!}
    </div>
@endsection

@section('endscripts')
    <script src="/js/buttonMethods.js"></script>
    <script>
        $(function() {
            laravel.initialize();

            //handle checkbox logic
            $('#checkAll').change(function(){
                $('.adminCheck').prop('checked', $(this).prop('checked'));
            });

            $('.eventCheck').change(function(){
                if($('.adminCheck:checked').length == $('.adminCheck').length){
                    $('#checkAll').prop('checked', true);
                    $('#checkAll').prop('indeterminate', false);
                }else if($('.adminCheck:checked').length > 0){
                    $('#checkAll').prop('indeterminate', true);
                }else{
                    $('#checkAll').prop('checked', false);
                    $('#checkAll').prop('indeterminate', false);
                }
            })
        });
    </script>
@endsection
