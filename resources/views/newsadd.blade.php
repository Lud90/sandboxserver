<!--
* Created by PhpStorm.
* User: cole
* Date: 04/03/16
* Time: 3:38 PM
* This blade is a form for adding events.
*
-->

@extends('partials.contentdisplay') {{-- the stuff necassary on each page--}}

@section('title', 'New News') {{-- The title of the page, displays on tab --}}

@section('context_buttons')
    <li><a href="javascript:{}" onclick="document.getElementById('form').submit();">Save</a></li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <form id="form" method="post">
                    <div class="row">
                        <div class="col s6"> {{-- left colunm at top of form--}}
                            <div class="input-field">
                                <input type="text" id="title" name="title" class="validate"/>
                                <label for="title">Title</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="link" name="link" class="validate"/>
                                <label for="link">Website (Optional)</label>
                            </div>
                            {{-- currently the news object does not have a field for these
                            <div class="input-field">
                                <select multiple id="sandboxes" name="sandboxes">
                                    <option value="" disabled selected>Make a selection</option>
                                    <option value="cultiv8">Cultiv8</option>
                                    <option value="idea">Idea</option>
                                    <option value="island">Island</option>
                                    <option value="launchbox">Launchbox</option>
                                    <option value="shiftkeylabs">Shiftkey Labs</option>
                                    <option value="sparkzone">Spark Zone</option>
                                </select>
                                <label>Host Sandboxes</label>
                            </div>
                            --}}
                        </div>

                        <div class="col s6">{{-- Right colunm at top of form--}}
                            <div class="input-field">
                                <input type="text" id="author" name="author"
                                       class="validate"/>
                                <label for="author">Author</label>
                            </div>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Image</span>
                                    <input type="file" name="image">
                                </div>
                                <div class="file-path-wrapper">
                                    <input id="imgpath" class="file-path validate" type="text"
                                           placeholder="Path to image">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-field">
                        <textarea type="text" id="description" name="description"
                                  class="materialize-textarea"></textarea>
                        <label for="description">Description</label>
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