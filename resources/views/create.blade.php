@extends('layouts.layout')

@section('content')
<div class="content-page wide-lg">
    <div class="nk-block-head nk-block-head-lg">
        <div class="nk-block-head-content">
            <h2 class="nk-block-title fw-normal">Data Ranking</h2>
            <div class="nk-block-des">
                <p class="lead">Ranking SPK Disini</p>
            </div>
        </div>
    </div><!-- .nk-block -->
    <div class="nk-block">
        <article class="card">
            <div class="card-inner card-inner-xl">
                {{-- create heading --}}
                <h3>DATA</h3>
                <div class="card card-preview">
                    <table class="table table-tranx">
                        <thead>
                            <tr class="tb-tnx-head">
                                <th class="tb-tnx-id"><span class="">#</span></th>
                                <th>Alternative</th>
                                @foreach ($criterias as $item)
                                    <th>C{{ $loop->iteration }}</th>
                                @endforeach
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
                        </tbody>
                    </table>
                </div>
            </div>
        </article>
    </div><!-- .nk-block -->
</div><!-- .content-page -->
@endsection
