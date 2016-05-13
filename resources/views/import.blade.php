@extends('layout.master')
@section('title', 'Importar arquivo')

@section('content')
	<div class="about-section">
		<div class="text-content">
			<div class="span7 offset1">
				@if(Session::has('success'))
					<div class="alert-box success">
						<h2>{!! Session::get('success') !!}</h2>
					</div>
				@endif
				<div class="secure">Envie o OFX</div>
					{{Form::open(array('url'=>'import','method'=>'POST', 'files'=>true))}}
				<div class="control-group">
					<div class="controls">
					{{Form::file('file')}}	
					</div>
				</div>
				<div id="success"> </div>
				{{Form::submit('Enviar', array('class'=>'send-btn'))}}
				{{Form::close()}}
			</div>
		</div>
	</div>
@endsection