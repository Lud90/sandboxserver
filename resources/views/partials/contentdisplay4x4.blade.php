{{--
* Created by PhpStorm.
* User: cole
* Date: 09/03/16
* Time: 2:07 PM
*
    Creates a 4 by 4 grid of places to put content, used by the admin home currently to
    display seperate modules.
*
--}}
@extends('partials.contentdisplay')
@section('content')
    <div class="col s9">
        <div class="row s12">
            <div class="col s6">
                @yield('content1')
            </div>
            <div class="col s6">
                @yield('content2')
            </div>
        </div>
        <div class="row s12">
            <div class="col s6">
                @yield('content3')
            </div>
            <div class="col s6">
                @yield('content4')
            </div>
        </div>
    </div>
@endsection