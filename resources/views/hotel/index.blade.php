@extends('layouts.conquer')

@section('javascript')
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

@if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif

<div class="card-container">
    @foreach ($items as $d)
    <div class="card">
        <div class="card-left">
            @if($d->filenames)
            <img class="main-image" src="{{asset('img/hotel/'.$d->id.'/'.$d->filenames[0])}}"
                alt="Photo of {{$d->name}}">
            <div class="sub-images">
                @foreach (array_slice($d->filenames, 1, 3) as $filename)
                <img src="{{asset('img/hotel/'.$d->id.'/'.$filename)}}" alt="Photo of {{$d->name}}">
                @endforeach
            </div>
            @endif
        </div>
        <div class="card-middle">
            <div class="nama">
                <h2>{{$d->name}}</h2>
                <span class="rating">☆★★★★</span>
            </div>
            <br><br><br>
            <p><strong>Address:</strong> {{$d->address}}</p>
            <p><strong>Email:</strong> {{$d->email}}</p>
            <p><strong>Phone Number:</strong> {{$d->phone_number}}</p>
        </div>
        <div class="card-right">
            <a class="btn btn-info" href="{{ route('hotel.show', $d->id) }}">See Hotel Products</a>
            <br>
            <a class="btn btn-warning" href="{{ route('hotel.edit', $d->id) }}">Edit Hotel</a>
            <br>
            <form method="POST" action="{{route('hotel.destroy', $d->id)}}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete Hotel" class="btn btn-danger"
                    onclick="return confirm('Are you sure to delete {{$d->id}} - {{$d->name}} ? ');">
            </form>
        </div>
    </div>
    @endforeach
</div>

<a href="{{route('hotel.create')}}" class="btn-create">Create Hotel</a>

@endsection