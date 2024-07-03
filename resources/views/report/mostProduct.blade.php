@extends('layouts.conquer')
@section('content')
<table class="table">
    <thead>
        <th>Nama User</th>
        <th>Jumlah Reservasi</th>
    </thead>
    <tbody>
        @foreach ($products as $p)
        <tr>
            <td>{{ $p->user_name }}</td>
            <td>{{ $p->total_quantity }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection