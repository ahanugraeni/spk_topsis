@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 p-4">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Alternatif Baru - Upload Excel File </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="excelFile" class="form-label">Select Excel File:</label>
                            <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xlsx, .xls" required>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-secondary mr-2" onclick="history.back()">Back</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
