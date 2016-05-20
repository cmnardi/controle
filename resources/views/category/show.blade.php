@extends('layout.master')
@section('title', $category->name)


@section('content')
	<h2>{{$category->name}}</h2>
	{{$category->description}}
@endsection