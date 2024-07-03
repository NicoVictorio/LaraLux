@extends('layouts.conquer')
@section('content')
<table class="table">
    <thead>
        <th>Nama Member</th>
        <th>Jumlah Poin</th>
    </thead>
    <tbody>
        @foreach ($data as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>{{ $p->poin }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection