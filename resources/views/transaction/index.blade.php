@extends('layout.master')
@section('title', 'Categorias')


@section('content')
	@include('transaction.list', ['transactions' => $transactions])
@endsection