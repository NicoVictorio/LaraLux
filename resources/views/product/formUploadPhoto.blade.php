@extends('layouts.conquer')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/hotel.uploadimages.css') }}">

<div class="container">
    <div class="card">
        <div class="card-header">Upload Photo untuk Product {{ $data->name }}</div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ url('product/simpanPhoto') }}">
                @csrf
                <input type="hidden" name='product_id' value="{{ $data->id }}" />
                <input type="hidden" name='hotel_id' value="{{ $data->hotel_id }}" />
                <div class="form-group">
                    <label for="file_photo_kamar">Pilih Photo untuk Kamar</label>
                    <input type="file" class="form-control" name="file_photo_kamar" id="file_photo_kamar" />
                </div>
                <div class="form-group">
                    <label for="file_photo_kamar2">Pilih Photo untuk Kamar</label>
                    <input type="file" class="form-control" name="file_photo_kamar2" id="file_photo_kamar2" />
                </div>
                <div class="form-group">
                    <label for="file_photo_kamar3">Pilih Photo untuk Kamar</label>
                    <input type="file" class="form-control" name="file_photo_kamar3" id="file_photo_kamar3" />
                </div>
                <div class="form-group">
                    <label for="file_photo_kamar4">Pilih Photo untuk Kamar</label>
                    <input type="file" class="form-control" name="file_photo_kamar4" id="file_photo_kamar4" />
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection