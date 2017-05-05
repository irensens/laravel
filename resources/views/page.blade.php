@extends('layouts.app')

@section('content')
 <h1> {{$static->name}} </h1>
	 {!!$static->body!!} 
@endsection
