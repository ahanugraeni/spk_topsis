

    <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
            <div class="container">
                <h4>Jadi, urutan dari yang terbesar adalah:</h4>
                <ul class="list-group">
                    @foreach ($sortData as $key => $item)
                    <li class="list-group-item">
                        @if($loop->iteration == 1)
                        <strong>Alternative {{ $key }}</strong> dengan nilai {{ $item }}
                        @else
                        Alternative {{ $key }} dengan nilai {{ $item }}
                        @endif
                    </li>
                    @if($loop->iteration == 3)
                    @break
                    @endif
                    @endforeach
                </ul>
            </div>
    </div>
