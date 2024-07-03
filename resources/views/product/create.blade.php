@extends('layouts.conquer')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/hotel.create.css') }}">

<div class="card">
    <div class="card-header">Add New Product</div>
    <div class="card-body">
        <form method="POST" action="{{ route('product.store') }}">
            @csrf
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input type="number" name="price" class="form-control" placeholder="Enter Product Price">
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter Product Price">
            </div>
            <div class="form-group">
                <label>Product Available Room</label>
                <input type="number" name="available_room" class="form-control" placeholder="Enter Available Room">
            </div>
            <div class="form-group">
                <label>Type of Product</label>
                <select class="form-control" name="type">
                    @foreach ($type as $h)
                    <option value="{{ $h->id }}">{{ $h->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="hotel" value="{{$hotel_selected->id}}">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection