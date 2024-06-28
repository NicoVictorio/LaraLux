@extends('layouts.conquer')

@section('head')
<title>Product Details</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .back-button {
        margin-bottom: 20px;
    }

    .tengah {
        display: flex;
        justify-content: center;
    }
</style>
@endsection

@section('content')
<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4 p-0">
            <div class="card" style="border-radius: 15px;">
                <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
                    data-mdb-ripple-color="light">
                    <img src="/img/{{ $product->image }}"
                        style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid"
                        alt="{{ $product->name }}" />
                    <a href="#!">
                        <div class="mask"></div>
                    </a>
                </div>
                <div class="card-body pb-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p><a href="#!" class="text-dark">{{ $product->name }}</a></p>
                            <p class="small text-muted">{{$product->hotel->name}}</p>
                        </div>
                        <div>
                            <div class="d-flex flex-row justify-content-end mt-1 mb-4 text-danger">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="small text-muted">Rated 4.0/5</p>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body pb-0">
                    <div class="d-flex justify-content-between">
                        <p class="text-dark">Rp. {{ $product->price }}</p>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                        <a href="{{ route('product.index') }}" class="text-dark fw-bold">Cancel</a>
                        <button type="button" class="btn btn-primary">Book</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection