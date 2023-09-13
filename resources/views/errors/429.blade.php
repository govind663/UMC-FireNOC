@extends('errors.master')
@section('body')
	    <div class="section">
		  	<h1 class="error">429</h1>
		  	<div class="page">We're sorry, but you have sent too many requests to us recently. Please try again later</div>
		  	{{--<a class="back-home" href="{{ url()->previous() }}">Back</a>--}}
		</div>
@endsection