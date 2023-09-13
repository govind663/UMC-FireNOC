@extends('errors.master')
@section('body')
	    <div class="section">
		  	<h1 class="error">500</h1>
		  	<div class="page">The server encountered an internal error or misconfiguration and was unable to complete your request</div>
		  	{{--<a class="back-home" href="{{ url()->previous() }}">Back</a>--}}
		</div>
@endsection
