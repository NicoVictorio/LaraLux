@extends('layouts.conquer')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

@if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif

<div class="Title">
    <div class="hotel-info">
        <h1>Hotel {{ $data->name }}</h1>
        <div>
            @if($data->filenames2)
            @foreach (array_slice($data->filenames2, 0, 2) as $filename)
            <img src="{{asset('img/hotel/'.$data->id.'/'.$filename)}}" alt="Photo of {{$data->name}}">
            @endforeach
            @endif
        </div>
        <p><strong>Rating:</strong> ★★★★☆</p>
        <p><strong>Address:</strong> {{$data->address}}</p>
        <p><strong>Email:</strong> {{$data->email}}</p>
        <p><strong>Phone Number:</strong> {{$data->phone_number}}</p>
    </div>
</div>

<div class="card-container">
    @foreach ($data->products as $d)
    <div class="card">
        <div class="card-left">
            @if($d->filenames)
            <img class="main-image" src="{{asset('img/product/'.$d->id.'/'.$d->filenames[0])}}"
                alt="Photo of {{$d->name}}">
            <div class="sub-images">
                @foreach (array_slice($d->filenames, 1, 3) as $filename)
                <img src="{{asset('img/product/'.$d->id.'/'.$filename)}}" alt="Photo of {{$d->name}}">
                @endforeach
            </div>
            @endif
        </div>
        <div class="card-middle">
            <div class="nama">
                <h2>{{$d->name}}</h2>
            </div>
            <br><br><br>
            <p><strong>Type:</strong>{{$d->productType->name}}</p>
            <p><strong>Price: Rp</strong> {{$d->price}}</p>
            <p><strong>Description:</strong> {{$d->description}}</p>
            <p><strong>Available Room:</strong> {{$d->available_room}}</p>
        </div>
        <div class="card-right">
            <a class="btn btn-info" href="{{ route('addCart', $d->id) }}">Add to Cart</a>
            <br>
            <a class="btn btn-warning" href="{{ route('product.edit', ['product' => $d->id]) }}">Edit Product</a>
            <br>
            <form method="POST" action="{{route('product.destroy', $d->id)}}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete Product" class="btn btn-danger btnDelete"
                    onclick="return confirm('Are you sure to delete {{$d->id}} - {{$d->name}} ? ');">
            </form>
        </div>
    </div>
    @endforeach
</div>

<a href="{{route('product.create')}}" class="btn-create">Create Product</a>

@endsection

@section('javascript')

@endsection