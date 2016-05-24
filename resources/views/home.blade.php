@extends('layout.master')
@section('title', 'Home')


@section('content')

<div class="row">
  @if(!is_null($months))
	 <div class="col-md-3 col-sm-6 col-xs-12">

      <div class="info-box">
  			<span class="info-box-icon bg-green">
  				<i class="fa fa-money"></i></span>

  			<div class="info-box-content">
  				<span class="info-box-text">Total</span>
                  <span class="info-box-number text-right">R$ {{number_format($total,2, ',', '.')}}</span>
  			</div>
  			<!-- /.info-box-content -->
  		</div>
  		<!-- /.info-box -->
	 </div>
   @else 
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-blue">
				<i class="fa fa-calendar"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Total (mês) {{$date}}</span>
                <span class="info-box-number text-right">
                  R$ {{number_format($monthTotalOut,2, ',', '.')}}
                </span>
                <span class="info-box-number text-right">
                  R$ {{number_format($monthTotalIn,2, ',', '.')}}
                </span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
  @endif
</div>

<div class="row">
  
  @if(!is_null($months))
    <div class="col-md-6 col-sm-12">
      <div class="box box-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th>Mês</th>
            <th>Valor</th>
          <tr>
          @foreach ($months as $row)
              <tr>
                <td>
                  <a href="/{{$row->month}}/{{$row->year}}">
                  {{$row->month}}/{{$row->year}}
                  </a>
                </td>
                <td class="text-right">
                  @if($row->value < 0)
                    <p class="text-danger">
                  @endif
                  R$ {{number_format($row->value,2, ',', '.')}}
                  @if($row->value < 0)
                    </p>
                  @endif
                </td>
              </tr>
          @endforeach
        </table>
      </div>
    </div>
  @endif

	<div class="col-md-6 col-sm-12">
		<div class="box box-info">
			<table class="table table-striped table-bordered">
				<tr>
					<th>Categoria</th>
					<th>Valor</th>
				<tr>
				@foreach ($categoryData as $row)
				    <tr>
				    	<td><a href="/category/{{$row->id}}/{{$date}}">{{$row->name}}</a></td>
                        <td class="text-right">R$ {{number_format($row->value,2, ',', '.')}}</td>
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
				    	<td><a href="#">{{$row->category}}</a></td>
				    	<td><a href="/category/{{$row->id}}/{{$date}}">{{$row->name}}</a></td>
                        <td class="text-right">R$ {{number_format($row->value,2, ',', '.')}}</td>
				    </tr>
                @endforeach
			</table>
		</tr>
	</div>


@endsection