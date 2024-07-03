@extends('layouts.conquer')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/hotel.create.css') }}">

<div class="card">
    <div class="card-header">Add New Hotel</div>
    <div class="card-body">
        <form method="POST" action="{{ route('hotel.store') }}">
            @csrf
            <div class="form-group">
                <label>Hotel Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Hotel Name">
            </div>
            <div class="form-group">
                <label>Hotel Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Hotel Address">
            </div>
            <div class="form-group">
                <label>Hotel Phone Number</label>
                <input type="number" name="phone_number" class="form-control" placeholder="Enter Hotel Phone Number">
            </div>
            <div class="form-group">
                <label>Hotel Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Hotel Email">
            </div>
            <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="type">
                    @foreach ($types as $t)
                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('hotel.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection