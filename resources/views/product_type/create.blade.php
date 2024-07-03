@extends('layouts.conquer')
@section('content')
<form method="POST" action="{{ route('producttype.store') }}">
    @csrf
    <div class="form-group">
        <label>New Product Type</label>
        <input type="text" name="name" class="form-control" id="txttype" placeholder="Enter hotel type">
    </div>
    <a class="btn btn-info" href="{{ url()->previous() }}"> Cancel </a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection