<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>Nilai Preferensi</h2>
        </div>
        <div class="col-12 mt-3">
            <div class="d-flex">
                <button class="btn btn-primary me-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="true" aria-controls="collapseWidthExample">
                    Coefficient Closeness
                </button>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample2" aria-expanded="false" aria-controls="collapseWidthExample2">
                    Sorting From Highest
                </button>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="collapse show" id="collapseWidthExample">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Alternative</th>
                                        <th>Nilai Preferensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($closenessCoefficient as $key => $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Alternative {{ $key }}</td>
                                        <td>{{ $item }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseWidthExample2">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Alternative</th>
                                        <th>Nilai Preferensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sortData as $key => $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Alternative {{ $key }}</td>
                                        <td>{{ $item }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
