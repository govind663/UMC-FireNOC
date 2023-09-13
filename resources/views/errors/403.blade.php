@extends('errors.master')
@section('body')
	    <div class="section">
		  	<h1 class="error">403</h1>
		  	<div class="page">Sorry, your access is refused due to security reasons of our server and also our sensitive data.</div>
		  	<div class="page">Please go back to the previous page to continue browsing</div>
		  	<a class="back-home" href="{{ url()->previous() }}">Back</a>
		</div>
@endsection