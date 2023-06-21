<div class="card">
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-tranx">
                    <thead>
                        <tr class="tb-tnx-head">
                            <th class="tb-tnx-id">#</th>
                            <th>Alternative</th>
                            @foreach ($criterias as $item)
                            <th>C{{ $loop->iteration }}</th>
                            @endforeach
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>
                                <a href="#"><span>{{ $loop->iteration }}</span></a>
                            </td>
                            <td>
                                <span>{{ $item->name }}</span>
                            </td>
                            @foreach ($item->values as $value)
                            <td>
                                <span>{{ $value->value }}</span>
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            @foreach ($criterias as $item)
                            <td>
                                @if ($item->categories == 'benefit')
                                <span class="text-primary">{{ $item->categories }}</span>
                                @elseif ($item->categories == 'cost')
                                <span class="text-danger">{{ $item->categories }}</span>
                                @endif
                            </td>
                            @endforeach
                        </tr>
                        <tr class="bg-primary">
                            <td></td>
                            <td>
                                <span class="text-white">Weight</span>
                            </td>
                            @foreach ($criterias as $item)
                            <td>
                                <span class="text-white">{{ $item->weight }}</span>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
