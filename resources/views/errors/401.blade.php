@extends('errors.master')
@section('body')
	    <div class="section">
		  	<h1 class="error">401</h1>
		  	<div class="page">RESTRICTED ACCESS</div>
		  	<div class="page">This page is meant to only be accessed by certain people.</div>
		  	<a class="back-home" href="{{ url()->previous() }}">Back</a>
		</div>
@endsection