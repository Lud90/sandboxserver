<!--
* Created by PhpStorm.
* User: cole
* Date: 04/03/16
* Time: 3:38 PM
* This blade is a form for adding events.
*
-->

@extends('partials.contentdisplay') {{-- the stuff necassary on each page--}}

@section('title', 'New Admin') {{-- The title of the page, displays on tab --}}

@section('context_buttons')
    <li><a href="javascript:{}" onclick="document.getElementById('form').submit();"><i class="material-icons">done</i> Save</a></li>
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
                <form id="form" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col s12 m6"> {{-- left colunm at top of form--}}
                            <div class="input-field">
                                <input type="text" id="name" name="name" class="validate"/>
                                <label for="name">Name</label>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="input-field">
                                <input type="email" id="email" name="email" class="validate"/>
                                <label for="email">Email Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="input-field">
                                <input type="password" id="password" name="password" class="validate" placeholder="At least 6 characters"/>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="input-field">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="validate" />
                                <label for="password_confirmation" class="active">Confirm Password</label>
                            </div>
                        </div>
                    </div>
                </form>
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