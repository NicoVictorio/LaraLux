@extends('layouts.conquer')
@section('content')
<form method="POST" action="{{ route('product.store') }}">
    @csrf
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="name" class="form-group" placeholder="Enter Product Name">
    </div>
    <div class="form-group">
        <label>Product Price</label>
        <input type="number" name="price" class="form-group" placeholder="Enter Product Price">
    </div>
    <div class="form-group">
        <label>Product Description</label>
        <input type="text" name="description" class="form-group" placeholder="Enter Product Price">
    </div>
    {{-- <div class="form-group">
        <label>Image URL</label>
        <input type="text" name="image" class="form-group" placeholder="Enter Image">
    </div> --}}
    {{-- <div class="form-group">
        <label>Input Image</label>
        <input type="file" name="image" accept=".jpg">
    </div> --}}
    {{-- <div class="form-group">
        <label>Available Room</label>
        <input type="number" name="available_room" class="form-group" placeholder="Enter Available Room">
    </div> --}}
    <div class="form-group">
        <label>Type of Product</label>
        <select class="form-control" name="type">
            @foreach ($type as $h)
            <option value="{{ $h->id }}">{{ $h->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">    
        <label>Hotel</label>
        <select class="form-control" name="hotel">
            @foreach ($hotels as $h)
            <option value="{{ $h->id }}">{{ $h->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection