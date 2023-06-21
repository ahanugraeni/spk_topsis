@extends('layouts.layout')

@section('content')
<div class="content-page wide-lg">
    <div class="nk-block-head nk-block-head-lg">
        <div class="nk-block-head-content">
            <h2 class="nk-block-title fw-normal">Data Positif Negatif Ideal</h2>
            <div class="nk-block-des">
                <p class="lead">Data Positif Negatif Ideal Disini</p>
            </div>
        </div>
    </div><!-- .nk-block -->
    <div class="nk-block">
        <div class="accordion" id="accordionExample">
            @include('item.matrix-positif-negatif-ideal')
        </div>
    </div><!-- .nk-block -->
</div><!-- .content-page -->


@endsection
