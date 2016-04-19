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
    <link href="/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
@endsection

@section('context_buttons')
    <li><a href="#">Save</a></li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                @if(isset($event))
                    {!! Form::model($event, array('route' => array('admin.event.update', $event->id), 'files' => true)) !!}
                @else
                    {!! Form::open(array('route' => 'admin.event.store', 'files' => true)) !!}
                @endif
                    <div class="row">
                        <div class="col s6"> {{-- left colunm at top of form --}}
                            <div class="input-field">
                                {!! Form::text('title', null, array('id' => 'title', 'class' => 'validate')) !!}
                                <label for="title">Title</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                {!! Form::text('location', null, array('id' => 'location', 'class' => 'validate')) !!}
                                <label for="location">Location</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                {!! Form::text('url', null, array('id' => 'url', 'class' => 'validate')) !!}
                                <label for="url">Website (Optional)</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="row">
                                <div class="col s12 m6">
                                    <div class="input-field">
                                        {!! Form::text('start_time', null, array('id' => 'start_time', 'class' => 'datepicker')) !!}
                                        <label for="start" class="active">Start Date</label>
                                    </div>
                                </div>
                                <div class="col s12 m6">
                                    <div class="input-field">
                                        {!! Form::text('end_time', null, array('id' => 'end_time', 'class' => 'datepicker')) !!}
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
                                        <option value="{{ $sandbox->id }}"

                                                @if((old('sandboxes') || isset($selectedSandboxes)) && in_array($sandbox->id, old('sandboxes',  isset($selectedSandboxes) ? $selectedSandboxes : null)))
                                                selected="selected"
                                                @endif
                                        >{{ $sandbox->name }}</option>

                                    @endforeach
                                </select>
                                <label>Host Sandboxes</label>
                            </div>
                        </div>

                        <div class="col s6">{{-- Right colunm at top of form--}}
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Image</span>
                                    {!! Form::file('image') !!}
                                </div>
                                <div class="file-path-wrapper  hide-on-small-and-down">
                                    <input id="imgpath" class="file-path validate" type="text" placeholder="Path to image">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-field">
                        {{ Form::textarea('snippet', null, array('id' => 'snippet', 'class' => 'materialize-textarea')) }}
                        <label for="snippet">Snippet</label>
                    </div>
                    <div class="input-field richtext">
                        <label for="contentBox">Content</label>
                        {{ Form::textarea('content', null, array('id' => 'contentBox')) }}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('endscripts')
    <script src="/lib/codeMirror/codeMirror.js"></script>
    <script src="/lib/codeMirror/xml.js"></script>
    <script src="/js/materialNote.js"></script>
    <script src="/js/ckMaterializeOverrides.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment-with-locales.min.js"></script>
    <script src="/js/bootstrap-material-datetimepicker.js"></script>
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


            $('.datepicker').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD HH:mm' });

    </script>
@endsection