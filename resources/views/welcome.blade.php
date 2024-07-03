@extends('layouts.conquer')
<style>
    .tengah {
        display: flex;
        justify-content: center;
    }
</style>

@section('content')
<div class="judul tengah">
    <h1>Welcome to Laralux</h1>
</div>
<br>
<div class="content">
    <div class="tengah">
        <p><a href="{{ route('rp_mostReservedProduct') }}">Report 3 Most Reserved Product</a></p>
    </div>
</div>
@endsection