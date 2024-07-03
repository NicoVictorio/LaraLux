@extends('layouts.conquer')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/hotel.uploadimages.css') }}">

<div class="container">
    <div class="card">
        <div class="card-header">Upload Photo untuk Hotel {{ $hotel->name }}</div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ url('hotel/simpanPhoto') }}">
                @csrf
                <input type="hidden" name='hotel_id' value="{{ $hotel->id }}" />
                <div class="form-group">
                    <label for="file_photo_appearance">Pilih Photo untuk Appearance</label>
                    <input type="file" class="form-control" name="file_photo_appearance" id="file_photo_appearance" />
                </div>
                <div class="form-group">
                    <label for="file_photo_lobby">Pilih Photo untuk Lobby</label>
                    <input type="file" class="form-control" name="file_photo_lobby" id="file_photo_lobby" />
                </div>
                <div class="form-group">
                    <label for="file_photo_pool">Pilih Photo untuk Pool</label>
                    <input type="file" class="form-control" name="file_photo_pool" id="file_photo_pool" />
                </div>
                <div class="form-group">
                    <label for="file_photo_lounge">Pilih Photo untuk Lounge</label>
                    <input type="file" class="form-control" name="file_photo_lounge" id="file_photo_lounge" />
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection