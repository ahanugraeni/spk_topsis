@extends('layouts.layout')

@section('content')
<div class="content-page wide-lg">
    <div class="nk-block-head nk-block-head-lg">
        <div class="nk-block-head-content">
            <h2 class="nk-block-title fw-normal">Data Normalisasi Terbobot</h2>
            <div class="nk-block-des">
                <p class="lead">Data Normalisasi Matrix Terbobot Disini</p>
            </div>
        </div>
    </div><!-- .nk-block -->
    <div class="nk-block">
        <div class="accordion" id="accordionExample">
            @include('item.normalisasi-matrix-terbobot')
        </div>
    </div><!-- .nk-block -->
</div><!-- .content-page -->


@endsection
