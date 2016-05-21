<div class="col-md-6 col-sm-12">
    <div class="box box-info">
        <table class="table table-striped table-bordered">
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Valor</th>
            <tr>
            <?php $total = 0;?>
            @foreach ($transactions as $row)
                <?php $total += $row->value; ?>
                <tr>
                    <td><a href="/transaction/{{$row->id}}">{{$row->id}}</a></td>
                    <td>{{$row->description}}</td>
                    <td>{{date('d/m/Y', strtotime($row->date))}}</td>
                    <td class="text-right">R$ {{number_format($row->value,2, ',', '.')}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"></td>
                <td class="text-right">R$ {{$total}}</td>
            </tr>
        </table>
    </div>
</div>