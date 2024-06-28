@extends('layouts.conquer')

@section('content') 
<form method="POST" action="{{ route('hotel.update', $data->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Hotel Name</label>
        <input type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="Enter hotel name">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" value="{{ $data->address }}" placeholder="Enter address">
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" class="form-control" name="phone_number" value="{{ $data->phone_number }}" placeholder="Enter phone number">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="{{ $data->email }}" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label>Type</label>
        <select class="form-control" name="type">
            @foreach ($types as $t)
            <option @if ($data->type_id == $t->id) selected @endif value="{{ $t->id }}">{{ $t->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('hotel.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection