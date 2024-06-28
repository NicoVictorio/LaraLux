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
            @if(count($d->filenames) == 1)
            <img class="main-image full" src="{{asset('img/hotel/'.$d->id.'/'.$d->filenames[0])}}"
                alt="Photo of {{$d->name}}">
            @elseif(count($d->filenames) == 2)
            <img class="main-image" src="{{asset('img/hotel/'.$d->id.'/'.$d->filenames[0])}}"
                alt="Photo of {{$d->name}}">
            <div class="sub-images">
                <img class="sub-image full" src="{{asset('img/hotel/'.$d->id.'/'.$d->filenames[1])}}"
                    alt="Photo of {{$d->name}}">
            </div>
            @elseif(count($d->filenames) == 3)
            <img class="main-image" src="{{asset('img/hotel/'.$d->id.'/'.$d->filenames[0])}}"
                alt="Photo of {{$d->name}}">
            <div class="sub-images">
                @foreach (array_slice($d->filenames, 1, 2) as $filename)
                <img class="sub-image half" src="{{asset('img/hotel/'.$d->id.'/'.$filename)}}"
                    alt="Photo of {{$d->name}}">
                @endforeach
            </div>
            @elseif(count($d->filenames) >= 4)
            <img class="main-image" src="{{asset('img/hotel/'.$d->id.'/'.$d->filenames[0])}}"
                alt="Photo of {{$d->name}}">
            <div class="sub-images">
                @foreach (array_slice($d->filenames, 1, 3) as $filename)
                <img src="{{asset('img/hotel/'.$d->id.'/'.$filename)}}" alt="Photo of {{$d->name}}">
                @endforeach
            </div>
            @endif
            @endif
        </div>
        <div class="card-middle">
            <h3>{{$d->name}}</h3>
            <p><strong>Address:</strong> {{$d->address}}</p>
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