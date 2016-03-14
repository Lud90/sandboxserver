<!--
* Created by PhpStorm.
* User: cole
* Date: 04/03/16
* Time: 3:38 PM
* This blade is a form for adding events.
*
-->

@extends('partials.contentdisplay') {{-- the stuff necassary on each page--}}

@section('title', 'New Event') {{-- The title of the page, displays on tab --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <form method="post">
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
                        </div>

                        <div class="col s6">{{-- Right colunm at top of form--}}
                            <div class="input-field">
                                <input type="text" id="location" name="location"
                                       class="validate"/>
                                <label for="location">Location</label>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="date" id="start" name="start"
                                           class="validate datepicker"/>
                                    <label for="start" class="active">Start Date</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="date" id="end" name="end"
                                           class="validate datepicker"/>
                                    <label for="end" class="active">End Date</label>
                                </div>
                            </div>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Image</span>
                                    <input type="file" name="image">
                                </div>
                                <div class="file-path-wrapper">
                                    <input id="imgpath" class="file-path validate" type="text" placeholder="Path to image">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-field">
                        <textarea type="text" id="description" name="description"
                                  class="materialize-textarea"></textarea>
                        <label for="description">Description</label>
                    </div>

                    <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('endscripts')
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 5 // Creates a dropdown of 15 years to control year
        });
    </script>
@endsection