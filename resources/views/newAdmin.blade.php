{{--
    New admin page and edit admin page
--}}
@extends('partials.adminPanel')

@if(Request::is('*/create'))
    @section('title', 'New Admin')
@else
    @section('title', 'Edit Admin')
@endif

@section('context_buttons')
    <li><a href="javascript:{}" onclick="document.getElementById('adminForm').submit();"><i class="material-icons">done</i> Save</a></li>
@endsection

@section('content')
    <div class="container">
        @if (count($errors) > 0 )
            <div class="card-panel red lighten-1">
                <ul class="white-text">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col s12">
                {{-- If we're editing, associate form with model and use patch method. Otherwise, use a basic form --}}
                @if(isset($admin))
                    {!! Form::model($admin, array('route' => array('admin.admin.update', $admin->id), 'method' => 'patch', 'files' => true, 'id' => 'adminForm')) !!}
                @else
                    {!! Form::open(array('route' => 'admin.admin.store', 'files' => true, 'id' => 'adminForm')) !!}
                @endif
                    <div class="row">
                        <div class="col s12 m6"> {{-- left colunm at top of form--}}
                            <div class="input-field">
                                {!! Form::text('name', null, array('id' => 'name', 'class' => 'validate')) !!}
                                <label for="name">Name</label>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="input-field">
                                {!! Form::email('email', null, array('id' => 'email', 'class' => 'validate')) !!}
                                <label for="email">Email Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="input-field">
                                {!! Form::password('password', null, array('id' => 'password', 'class' => 'validate')) !!}
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="input-field">
                                {!! Form::password('password_confirmation', null, array('id' => 'password_confirmation', 'class' => 'validate')) !!}
                                <label for="password_confirmation" class="active">Confirm Password</label>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection