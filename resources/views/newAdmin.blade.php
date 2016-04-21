@extends('partials.contentdisplay') {{-- the stuff necassary on each page--}}

@section('title', 'New Admin') {{-- The title of the page, displays on tab --}}

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
                @if(isset($admin))
                    {!! Form::model($admin, array('route' => array('admin.admin.update', $admin->id), 'files' => true, 'id' => 'adminForm')) !!}
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

@section('endscripts')
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 2, // Creates a dropdown of 2 years to control year
            min: new Date()
        });
    </script>
@endsection