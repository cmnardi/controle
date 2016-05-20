@extends('layout.master')
@section('title', 'Importar arquivo')

@section('content')
<div class="col-md-6">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Importar arquivo</h3>
		</div>
		{{Form::open(array('url'=>'import','method'=>'POST', 'files'=>true))}}
		<div class="box-body">
			


			@if(Session::has('success'))
			<div class="alert-box success">
				<h2>{!! Session::get('success') !!}</h2>
			</div>
			@endif
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputEmail3">OFX</label>

				<div class="col-sm-10">
					{{Form::file('file')}}	
				</div>
			</div>			
		</div>
		<div class="box-footer">
			{{Form::submit('Enviar', array('class'=>'btn btn-info pull-right'))}}
		</div>
		{{Form::close()}}
	</div>
</div>
@endsection