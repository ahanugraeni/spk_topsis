<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Alternative</th>
                        @foreach ($criterias as $item)
                            <th>C{{ $loop->iteration }}</th>
                        @endforeach
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($weightedMatrix as $key => $item)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>Alternative {{ $loop->iteration }}</td>
                            <td>{{ $item[1] }}</td>
                            <td>{{ $item[2] }}</td>
                            <td>{{ $item[3] }}</td>
                            <td>{{ $item[4] }}</td>
                            <td>{{ $item[5] }}</td>
                            <td>{{ $item[6] }}</td>
                            <td>{{ $item[7] }}</td>
                            <td>{{ $item[8] }}</td>
                            <td>{{ $item[9] }}</td>
                            <td>{{ $item[10] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
