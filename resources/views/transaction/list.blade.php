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
                    <td><a href="/transaction/{{$row->id}}">{{$row->id}}</a></td>
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