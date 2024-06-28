@extends('layouts.conquer')

@section('head')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        color: #333;
    }

    .container-fluid {
        padding: 20px;
        margin: 0;
    }

    p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .card {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        height: 100%;
        position: relative;
    }

    .deskripsi {
        flex-grow: 1;
    }

    .card img {
        max-width: 100%;
        border-radius: 5px;
        margin-bottom: 10px;
        float: right;
    }

    .card-img-top {
        display: block;
        height: 250px;
    }

    .card .links,
    .card .links2 {
        text-align: center;
    }

    .card .links a,
    .card .links2 a {
        display: block;
        text-decoration: none;
        margin-top: 10px;
    }

    .btnDelete {
        display: block;
        text-decoration: none;
        margin-top: 10px;
        width: 100%;
    }

    .card .links a:hover,
    .card .links2 a:hover {
        text-decoration: underline;
    }

    .tengah {
        display: flex;
        justify-content: center;
    }

    .col-md-4 {
        margin-bottom: 20px;
    }

    .container .row {
        width: 100%;
    }
</style>
@endsection

@section('content')

@if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif

<div class="judul tengah" style="padding-top: 25px;">
    <h1>List of Products</h1>
</div>

<a href="{{route('product.create')}}" class="btn btn-info">+ New Product</a>

<div class="container-fluid">
    <div class="row m-0">
        @foreach($items as $d)
        <div class='col-md-4'>
            <div class='card'>
                <div class='card-img-top image tengah'>
                    <img src="/img/{{$d->image}}" class='float-right'>
                </div>
                <div class='deskripsi'>
                    <div>
                        <h5 style="text-align: center;">{{$d->name}}</h5>
                    </div>
                    <div>
                        <p style="text-align: center; margin: 0;">{{$d->hotel->name}}</p>
                        <p style="text-align: center; margin: 0;">{{$d->productType->name}}</p>
                        <p style="text-align: center; margin: 0;">{{$d->price}}</p>
                        <p style="text-align: center; margin: 0;">{{$d->description}}</p>
                    </div>
                    <div class="row" style="display: flex; justify-content:space-evenly;">
                        <div class="links" style="width: 45%;">
                            <a href="{{ route('product.show', ['product' => $d->id]) }}" class="btn btn-info">Lihat
                                detail</a>
                            <a href="{{ route('product.edit', ['product' => $d->id]) }}" class="btn btn-info">Edit</a>
                            <form method="POST" action="{{route('product.destroy', $d->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger btnDelete"
                                    onclick="return confirm('Are you sure to delete {{$d->id}} - {{$d->name}} ? ');">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection