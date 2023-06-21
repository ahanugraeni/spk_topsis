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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($normalizedMatrix as $key => $item)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>Alternative {{ $loop->iteration }}</td>
                            @foreach ($item as $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    <tr class="bg-primary">
                        <td></td>
                        <td><span class="text-white">Pembagi</span></td>
                        @foreach ($divider as $item)
                            <td><span class="text-white">{{ $item }}</span></td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
