@extends('layouts.conquer')
@section('content')
<table class="table">
    <thead>
        <th>Nama User</th>
        <th>Total Transaksi</th>
    </thead>
    <tbody>
        @foreach ($products as $p)
        <tr>
            <td>{{ $p->user_name }}</td>
            <td>{{ $p->total_transaksi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection