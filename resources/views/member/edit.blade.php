@extends('layouts.conquer')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/hotel.create.css') }}">

<div class="card">
    <div class="card-header">Edit Member {{ $member->name }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('membership.updateMembership', $member->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Member Name</label>
                <input type="text" class="form-control" name="name" value="{{ $member->name }}"
                    placeholder="Enter member name" readonly>
            </div>
            <div class="form-group">
                <label for="poin">Poin</label>
                <input type="text" class="form-control" name="poin" value="{{ $member->poin }}"
                    placeholder="Enter Poin">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection