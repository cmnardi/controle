@extends('layout.master')
@section('title', 'Home')


@section('content')
<div class="row">
	<div class="col-md-6 col-sm-12">
		<div class="box box-info">
			<table class="table table-striped table-bordered">
				<tr>
					<th>Categoria</th>
					<th>Valor</th>
				<tr>
				@foreach ($categoryData as $row)
				    <tr>
				    	<td>{{$row->name}}</td>
				    	<td>{{$row->value}}</td>
				    </tr>
				@endforeach
			</table>
		</div>
	</div>
	<div class="col-md-6 col-sm-12">
		<div class="box box-info">
			<table class="table table-striped table-bordered table-responsive">
				<tr>
					<th>Categoria</th>
					<th>Sub-Categoria</th>
					<th>Valor</th>
				<tr>
				@foreach ($subCategoryData as $row)
				    <tr>
				    	<td>{{$row->category}}</td>
				    	<td>{{$row->name}}</td>
				    	<td>{{$row->value}}</td>
				    </tr>
				@endforeach
			</table>
		</tr>
	</div>
@endsection