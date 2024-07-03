@extends('layouts.conquer')
@section('content')
<table class="table">
    <thead>
        <th>Nama Product</th>
        <th>Jumlah Reservasi</th>
        <th>Hotel</th>
    </thead>
    <tbody>
        @foreach ($products as $p)
        <tr>
            <td>{{ $p->product_name }}</td>
            <td>{{ $p->total_quantity }}</td>
            <td>{{ $p->hotel_name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection