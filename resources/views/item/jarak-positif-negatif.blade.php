<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="tb-tnx-head">
                        <th class="tb-tnx-id"><span class="">#</span></th>
                        <th>Alternative</th>
                        <th>Positif</th>
                        <th>Negative</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positiveNegative as $key => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>Alternative {{ $key }}</td>
                            <td>{{ $item['positive'] }}</td>
                            <td>{{ $item['negative'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
