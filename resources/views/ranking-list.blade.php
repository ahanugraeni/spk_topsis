@extends('layouts.layout')

@section('content')
<div class="content-page">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <div class="nk-block-title-group flex justify-between items-center">
                <h2 class="nk-block-title fw-normal">Data Matrix</h2>
                <div>
                    <a href="{{ route('upload') }}" class="btn btn-primary">Tambah Alternatif</a>
                </div>
            </div>
        </div>
    </div><!-- .nk-block -->
    <div class="nk-block">
        <div class="accordion" id="accordionExample">
            @include('item.data-matrix')
        </div>
    </div><!-- .nk-block -->
</div><!-- .content-page -->
@endsection
