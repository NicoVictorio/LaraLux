@extends('layouts.conquer')
@section('content')
<form method="POST" action="{{ route('product.update', ['product' => $data->id]) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="name" class="form-group" value="{{$data->name}}" placeholder="Enter Product Name">
    </div>
    <div class="form-group">
        <label>Product Price</label>
        <input type="number" name="price" class="form-group" value="{{$data->price}}" placeholder="Enter Product Price">
    </div>
    <div class="form-group">
        <label>Product Description</label>
        <input type="text" name="description" class="form-group" value="{{$data->description}}" placeholder="Enter Product Price">
    </div>
    <!-- <div class="form-group">
        <label>Image URL</label>
        <input type="text" name="image" class="form-group" value="{{$data->image}}" placeholder="Enter Image">
    </div> -->
    {{-- <div class="form-group">
        <label>Input Image</label>
        <input type="file" name="image" accept=".jpg">
    </div> --}}
    <!-- <div class="form-group">
        <label>Available Room</label>
        <input type="number" name="available_room" class="form-group" value="{{$data->available_room}}"
            placeholder="Enter Available Room">
    </div> -->
    <div class="form-group">
        <label>Hotel</label>
        <select class="form-control" name="hotel_id">
            @foreach ($hotel as $h)
            <option @if($data->hotel_id==$h->id)
                selected
                @endif
                value="{{ $h->id }}">{{ $h->name }}</option>
            @endforeach
        </select>
    </div>
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
    <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection