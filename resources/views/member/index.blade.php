@extends('layouts/conquer')

@section('content')

@if (session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Poin</th>
            @can('delete-permission', Auth::user())
            <th>Edit</th>
            <th>Delete</th>
            @endcan
        </tr>
    </thead>
    <tbody>

        @foreach ($members as $m)
        <tr>
            <td>{{ $m->name }}</td>
            <td>{{ $m->email }}</td>
            <td>{{ $m->poin }}</td>
            @can('delete-permission', Auth::user())
            <td>
                <a class="btn btn-warning" href="{{ route('membership.editMembership', $m->id) }}">Edit</a>
            </td>
            <td>
                <a class="btn btn-danger" href="{{ route('membership.deleteMembership', $m->id) }}"
                    onclick="return confirm('Are you sure to delete {{ $m->id }} - {{ $m->name }} ? ');">Delete
                    Membership</a>
            </td>
            @endcan
        </tr>
        @endforeach
    </tbody>
</table>
@endsection