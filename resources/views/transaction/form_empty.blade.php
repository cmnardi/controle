
<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<!-- form start -->
			<form role="form" method="post" action="/transaction">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" id="id" value="">
				<div class="box-body">
					<div class="form-group">
						<label for="description">ID</label>
						<input type="text" class="form-control" id="fitid" readonly>
					</div>
					<div class="form-group">
						<label for="description">Descrição</label>
						<input type="text" placeholder="Descrição" class="form-control" name="description" id="description">
					</div>
					<div class="form-group">
						<label for="value">Valor</label>
						<div class="input-group">
							<span class="input-group-addon">R$</span>
							<input type="number" placeholder="Valor" class="form-control" readonly id="value"  step="0.01">
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputFile">Categoria</label>
						<select class="form-control" id="id_category">
							<option></option>
							@foreach($rootCategories as $category)
								<option value="{{$category->id}}">
								{{$category->name}}
								</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputFile">SubCategoria</label>
						<select class="form-control" name="id_category" id="id_sub_category">
							<option></option>
							
						</select>
					</div>
				</div>
				<!-- /.box-body -->
			</form>
		</div>
		<!-- /.box -->
	</div>
</div>

