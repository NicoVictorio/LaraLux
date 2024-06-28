@extends('layouts.conquer')

@section('content')
<form method="POST" action="{{ route('hoteltype.update', $data->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="type">Update Hotel Type</label>
        <input type="text" class="form-control" name="type_name" aria-describedby="typeHelp"
            placeholder="Enter hotel type" value="{{$data->name}}">
        <small id="typeHelp" class="form-text text-muted">Please determine your hotel type</small>
    </div>
    <a class="btn btn-info" href="{{ url()->previous() }}"> Cancel </a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection