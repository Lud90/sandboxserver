@extends('partials.adminPanel')

@if(Request::is('*/create'))
    @section('title', 'New Sandbox')
@else
    @section('title', 'Edit Sandbox')
@endif

@section('context_buttons')
    <li><a href="#!" onclick="document.getElementById('sandboxForm').submit();"><i class="material-icons">done</i> Save</a></li>
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
                @if(isset($sandbox))
                    {!! Form::model($sandbox, array('route' => array('admin.sandbox.update', $sandbox->id), 'method' => 'patch', 'id' => 'sandboxForm')) !!}
                @else
                    {!! Form::open(array('route' => 'admin.sandbox.store', 'id' => 'sandboxForm')) !!}
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
                            {!! Form::text('address', null, array('id' => 'address', 'class' => 'validate')) !!}
                            <label for="Address">Address</label>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="input-field">
                            {!! Form::url('url', null, array('id' => 'url', 'class' => 'validate')) !!}
                            <label for="url" class="active">Website</label>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection