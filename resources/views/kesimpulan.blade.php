@extends('layouts.layout')

@section('content')
<div class="content-page wide-lg">
    <div class="nk-block-head nk-block-head-lg">
        <div class="nk-block-head-content">
            <h2 class="nk-block-title fw-normal">Kesimpulan</h2>
            <div class="nk-block-des">
                <p class="lead">Kesimpulan Data Perhitungan</p>
            </div>
        </div>
    </div><!-- .nk-block -->
    <!-- <div class="nk-block"> -->
            @include('item.kesimpulan')
        
    <!-- </div>.nk-block -->
</div><!-- .content-page -->


@endsection
