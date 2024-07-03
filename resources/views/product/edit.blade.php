@extends('layouts.conquer')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/hotel.create.css') }}">

<div class="card">
    <div class="card-header">Edit Product {{ $data->name }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('product.update', ['product' => $data->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control" value="{{$data->name}}"
                    placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input type="number" name="price" class="form-control" value="{{$data->price}}"
                    placeholder="Enter Product Price">
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <input type="text" name="description" class="form-control" value="{{$data->description}}"
                    placeholder="Enter Product Price">
            </div>
            <input type="hidden" name="hotel_id" value="{{ $data->hotel_id }}">
            <div class="form-group">
                <label>Product Type</label>
                <select class="form-control" name="type_id">
                    @foreach ($types as $h)
                    <option @if($data->type_id==$h->id)
                        selected
                        @endif
                        value="{{ $h->id }}">{{ $h->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection