@extends('partials.contentdisplay') {{-- the stuff necassary on each page--}}

@section('title', 'Administrators') {{-- The title of the page, displays on tab --}}

@section('context_buttons')
    <li><a href="#"><i class="material-icons">person_add</i> New Admin</a></li>
@endsection

@section('content')
    <div class="container">
        <div class="collection">
        @foreach ($admins as $admin)
            <div class="collection-item">
                <div class="listItem">
                    <div class="row">
                        <div class="col s5">
                            {{ $admin->name }}
                        </div>
                        <div class="col s5">
                            {{ $admin->email }}
                        </div>
                        <div class="secondary-content">
                            <a href="{{ action('FP\AdminController@editAdmin', $admin->id) }}"><i class="material-icons">mode_edit</i></a>
                            @if($admin->id == Auth::id())
                                <i class="material-icons grey-text disabled" onclick="Materialize.toast('Cannot delete current user', 2000)">delete</i>
                            @else
                                <a href="{{ action('FP\AdminController@deleteAdmin', $admin->id) }}"><i class="material-icons">delete</i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        {{ $admins->count() }} results. Page {{ $admins->currentPage() }} of {{ $admins->lastPage() }}
        {!! $admins->render() !!}
    </div>
@endsection
