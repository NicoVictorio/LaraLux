@extends('layouts.conquer')

@section('content')
<div class="page-content">
    <h3 class="page-title">Upload Photo untuk Hotel {{ $hotel->name }}</h3>
    <div class="container">
        <form method="POST" enctype="multipart/form-data" action="{{ url('hotel/simpanPhoto') }}">
            @csrf
            <input type="hidden" name='hotel_id' value="{{ $hotel->id }}" />
            <div class="form-group">
                <label for="exampleInputType">Pilih Photo untuk Appearance</label>
                <input type="file" class="form-control" name="file_photo_appearance" />
            </div>
            <div class="form-group">
                <label for="exampleInputType">Pilih Photo untuk Lobby</label>
                <input type="file" class="form-control" name="file_photo_lobby" />
            </div>
            <div class="form-group">
                <label for="exampleInputType">Pilih Photo untuk Pool</label>
                <input type="file" class="form-control" name="file_photo_pool" />
            </div>
            <div class="form-group">
                <label for="exampleInputType">Pilih Photo untuk Lounge</label>
                <input type="file" class="form-control" name="file_photo_lounge" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection