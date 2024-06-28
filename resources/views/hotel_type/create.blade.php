@extends('layouts.conquer')
@section('content')
<form method="POST" action="{{ route('hoteltype.store') }}">
    @csrf
    <div class="form-group">
        <label>Hotel Type</label>
        <input type="text" name="name" class="form-control" id="txttype" placeholder="Enter hotel type">
    </div>
    <a class="btn btn-info" href="{{ url()->previous() }}"> Cancel </a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection