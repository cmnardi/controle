@extends('layout.master')
@section('title', 'Transaction')


@section('content')
<div class="row">
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Transaction #{{$transaction->id}}</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form role="form" method="post" action="/transaction">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{$transaction->id}}">
				<div class="box-body">
					<div class="form-group">
						<label for="description">ID</label>
						<input type="text" class="form-control" value="{{$transaction->fitid}}" readonly>
					</div>
					<div class="form-group">
						<label for="description">Descrição</label>
						<input type="text" placeholder="Descrição" class="form-control" name="description" value="{{$transaction->description}}">
					</div>
					<div class="form-group">
						<label for="value">Valor</label>
						<div class="input-group">
							<span class="input-group-addon">R$</span>
							<input type="number" placeholder="Valor" class="form-control" readonly value="{{$transaction->value}}"  step="0.01">
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputFile">Categoria {{$transaction->category->id_category}}</label>
						<select class="form-control" id="id_category">
							<option></option>
							@foreach($rootCategories as $category)
								<option value="{{$category->id}}"
									@if($category->id == $transaction->category->id_category) selected="selected" @endif
								>
								{{$category->name}}
								</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputFile">SubCategoria</label>
						<select class="form-control" name="id_category" id="id_sub_category">
							<option></option>
							@foreach($categories as $category)
								<option value="{{$category->id}}" 
									@if($category->id == $transaction->id_category) selected @endif
								>
								{{$category->name}}
								</option>
							@endforeach
						</select>
					</div>
				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<button class="btn btn-primary" type="submit">Gravar</button>
				</div>
			</form>
		</div>
		<!-- /.box -->
	</div>
</div>

@endsection
