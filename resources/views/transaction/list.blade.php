<div class="col-md-8 col-sm-12">
    <div class="box box-info">
        <table class="table table-striped table-bordered">
            <tr>
                <th>#</th>
                <th>Categoria</th>
                <th>Sub-Categoria</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Valor</th>
            <tr>
            <?php $total = 0;?>
            @foreach ($transactions as $row)
                <?php $total += $row->value; ?>
                <tr>
                    <td><a data-toggle="modal" data-target="#myModal"
                    data-id="{{$row->id}}">{{$row->id}}</a></td>
                    <td>{{$row->category}}</td>
                    <td>{{$row->subcategory}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{date('d/m/Y', strtotime($row->date))}}</td>
                    <td class="text-right">R$ {{number_format($row->value,2, ',', '.')}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5"></td>
                <td class="text-right">R$ {{number_format($total,2,',','.')}}</td>
            </tr>
        </table>
    </div>
</div>
    
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        @include('transaction.form_empty')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
