@extends('partials.skeleton')

@section('title', 'Forgot Password')

@section('body')
<h1>NS Sandboxes</h1>
<p>You requested to reset your password for the NS Sandboxes Admin panel. Click or copy and paste link below into your address bar to reset it:</p>
<a href="{{ url('/admin/password/reset/'.$token) }}">{{ url('/admin/password/reset/'.$token) }}</a>
<p>If you did not request a password reset, you may safely ignore this email. The reset link is only valid for the next 60 minutes</p>
@endsection