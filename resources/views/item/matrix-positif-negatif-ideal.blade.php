<!-- <div class="card">
    <div class="card-inner card-inner-xl"> -->
        <div class="card card-preview">
            <div class="table-responsive">
                <table class="table table-tranx">
                    <thead>
                        <tr class="tb-tnx-head">
                            <th colspan="{{ count($criterias) + 1 }}" class="tb-tnx-id">
                                <span>Positif</span>
                            </th>
                        </tr>
                        <tr>
                            <th></th>
                            @foreach ($criterias as $item)
                            <th>C{{ $loop->iteration }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            @foreach ($positiveNegativeIdeal as $key => $item)
                            <td>{{ $item['positive'] }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <!-- </div>
</div> -->
<br>
<!-- <div class="card">
    <div class="card-inner card-inner-xl"> -->
        <div class="card card-preview">
            <div class="table-responsive">
                <table class="table table-tranx">
                    <thead>
                        <tr class="tb-tnx-head">
                            <th colspan="{{ count($criterias) + 1 }}" class="tb-tnx-id">
                                <span>Negatif</span>
                            </th>
                        </tr>
                        <tr>
                            <th></th>
                            @foreach ($criterias as $item)
                            <th>C{{ $loop->iteration }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            @foreach ($positiveNegativeIdeal as $key => $item)
                            <td>{{ $item['negative'] }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            <!-- </div>
        </div> -->
    </div>
</div>
