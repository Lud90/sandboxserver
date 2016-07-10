@extends('partials.adminPanel')

@if(Request::is('*/create'))
    @section('title', 'New Event')
@else
    @section('title', 'Edit Event')
@endif

@section('styles')
    {{-- Datepicker and editor styles --}}
    <link href="/css/codeMirror/codemirror.css" rel="stylesheet">
    <link href="/css/codeMirror/monokai.css" rel="stylesheet">
    <link href="/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
@endsection

@section('context_buttons')
    {{-- Save function in bottomscripts
    <li><a href="javascript:{}" onclick="document.getElementById('eventForm').submit();"><i class="material-icons">done</i> Save</a></li>--}}
    <li><a href="javascript:{}" id="save">Save</a></li>

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
                @if(isset($event))
                    {!! Form::model($event, array('route' => array('admin.event.update', $event->id), 'method' => 'patch', 'files' => true, 'id' => 'eventForm')) !!}
                @else
                    {!! Form::open(array('route' => 'admin.event.store', 'files' => true, 'id' => 'eventForm')) !!}
                @endif
                    <div class="row">
                        <div class="col s6">
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
                                {!! Form::text('cost', null, array('id' => 'cost', 'class' => 'validate')) !!}
                                <label for="cost">Cost</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-field">
                                {!! Form::text('publish_at', null, array('id' => 'publish_at', 'class' => 'datepicker')) !!}
                                <label for="publish_at">Publish At (Optional)</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="input-field">
                                {!! Form::text('url', null, array('id' => 'url', 'class' => 'validate')) !!}
                                <label for="url">Website (Optional)</label>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        {!! Form::text('start_time', null, array('id' => 'start_time', 'class' => 'datepicker')) !!}
                                        <label for="start" class="active">Starts At</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        {!! Form::text('end_time', null, array('id' => 'end_time', 'class' => 'datepicker')) !!}
                                        <label for="end" class="active">Ends At</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="input-field">
                                {!! Form::select(' ', $sandboxes)!!}
                                <label for="sandboxes">Host Sandboxes</label>
                            </div>
                        </div>

                        <div class="col s12 m6">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Image</span>
                                    {!! Form::file('image') !!}
                                </div>
                                <div class="file-path-wrapper">
                                    <input id="imgpath" class="file-path validate" type="text" placeholder="Image Path">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-field">
                        {{ Form::textarea('snippet', null, array('id' => 'snippet', 'class' => 'materialize-textarea validate', 'length' => '120')) }}
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
    {{-- Datepicker and text editor scripts --}}
    <script src="/lib/codeMirror/codeMirror.js"></script>
    <script src="/lib/codeMirror/xml.js"></script>
    <script src="/js/materialNote.js"></script>
    <script src="/js/ckMaterializeOverrides.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment-with-locales.min.js"></script>
    <script src="/js/bootstrap-material-datetimepicker.js"></script>

    <script>
      {{}}  $(document).ready(function() {

            //create the material select box
            $('select').material_select();
            var toolbar = [
                ['style', ['style', 'bold', 'italic', 'underline', 'strikethrough', 'ul', 'ol', 'clear']],
                ['undo', ['undo', 'redo', 'help']],
                ['misc', ['link', 'picture', 'video', 'codeview', 'fullscreen']]
            ];

            //create materialnote for contentBox
            $('#contentBox').materialnote({ toolbar: toolbar });

            //create datepickers with minimum date/time of now.
            $('.datepicker').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD HH:mm', minDate: moment() });


            //on save click
            $('#save').click(function(){
                //copy materialnote data to the actual textbox
                $('#contentBox').val($('#contentBox').code());
                //submit the form
                $('#eventForm').submit();
            });

        });
    </script>
@endsection