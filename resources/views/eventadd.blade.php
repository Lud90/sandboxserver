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

@section('styles')
    <link href="/css/codeMirror/codemirror.css" rel="stylesheet">
    <link href="/css/codeMirror/monokai.css" rel="stylesheet">
@endsection

@section('context_buttons')
    <li><a href="#">Save</a></li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <form method="post">
                    <div class="row">
                        <div class="col s6"> {{-- left colunm at top of form--}}
                            <div class="input-field">
                                <input type="text" id="title" name="title" class="validate"
                                    value="{{ old('title', $event->title) }}"/>
                                <label for="title">Title</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                <input type="text" id="location" name="location" class="validate"
                                    value="{{ old('location', $event->location) }}"/>
                                <label for="location">Location</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <input type="text" id="url" name="url" class="validate"
                                    value="{{ old('url', $event->url) }}"/>
                                <label for="url">Website (Optional)</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="row">
                                <div class="col s12 m6">
                                    <div class="input-field">
                                        <input type="date" id="start_time" name="start_time" class="validate datepicker"
                                            value="{{ old('start_time', $event->start_time) }}"/>
                                        <label for="start" class="active">Start Date</label>
                                    </div>
                                </div>
                                <div class="col s12 m6">
                                    <div class="input-field">
                                        <input type="date" id="end_time" name="end_time" class="validate datepicker"
                                            value="{{ old('end_time', $event->end_time) }}"/>
                                        <label for="end" class="active">End Date</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <select multiple id="sandboxes" name="sandboxes">
                                    <option value="" disabled selected>Make a selection</option>
                                    @foreach ($sandboxes as $sandbox)
                                        <option value="{{ $sandbox->id }}">{{ $sandbox->name }}</option>
                                    @endforeach
                                </select>
                                <label>Host Sandboxes</label>
                            </div>
                        </div>

                        <div class="col s6">{{-- Right colunm at top of form--}}
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Image</span>
                                    <input type="file" name="image"
                                           value="{{ old('image', $event->image) }}">
                                </div>
                                <div class="file-path-wrapper  hide-on-small-and-down">
                                    <input id="imgpath" class="file-path validate" type="text" placeholder="Path to image"
                                        value="{{ old('image', $event->image) }}">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-field">
                        <textarea type="text" id="snippet" name="snippet"
                                  class="materialize-textarea"></textarea>
                        <label for="snippet">Snippet</label>
                    </div>
                    <div class="input-field tinymce">
                        <label for="contentBox">Content</label>
                        <textarea type="text" id="contentBox" name="content"
                                  class="materialize-textarea">{{ old('content', $event->content) }}</textarea>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('endscripts')
    <script src="/lib/codeMirror/codeMirror.js"></script>
    <script src="/lib/codeMirror/xml.js"></script>
    <script src="/js/materialNote.js"></script>
    <script src="/js/ckMaterializeOverrides.js"></script>
    <script>
        $(document).ready(function() {
            $('select').material_select();

            var toolbar = [
                ['style', ['style', 'bold', 'italic', 'underline', 'strikethrough', 'clear']],
                ['undo', ['undo', 'redo', 'help']],
                ['ckMedia', ['chImageUploader', 'ckVideoEmbedder']],
                ['misc', ['link', 'picture', 'codeview', 'fullscreen']]
            ];

            $('#contentBox').materialnote({ toolbar: toolbar });

        });

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 2, // Creates a dropdown of 2 years to control year
            min: new Date()
        });
    </script>
@endsection