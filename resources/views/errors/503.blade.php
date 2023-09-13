@extends('errors.master')
@section('body')
	    <div class="section">
		  	<h1 class="error">503</h1>
		  	<div class="page">The server is temporrarly busy. Try again later!</div>
		  	{{--<a class="back-home" href="{{ url()->previous() }}">Back</a>--}}
		</div>
@endsection