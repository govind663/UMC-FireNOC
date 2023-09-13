@extends('errors.master')
@section('body')
	    <div class="section">
		  	<h1 class="error">419</h1>
		  	<div class="page">Sorry, your session has expired. Please refresh and try again.</div>
		  	<a class="back-home" href="{{ url()->previous() }}">Back</a>
		</div>
@endsection