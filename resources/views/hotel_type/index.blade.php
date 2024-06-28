@extends('layouts/conquer')

@section('content')

@if (session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<a href="#modalCreate" data-toggle="modal" class="btn btn-info">+ New Type(with Modals)</a>

<table class="table">
    <thead>
        <tr>
            <th>Nama Tipe Hotel</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr id="tr_{{ $d->id }}">
            <td id="td_name_{{ $d->id }}">{{ $d->name }}</td>
            <td>{{ $d->created_at }}</td>
            <td>{{ $d->updated_at }}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('hoteltype.edit', $d->id) }}">Edit</a>
            </td>
            <td>
                <form method="POST" action="{{ route('hoteltype.destroy', $d->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger"
                        onclick="return confirm('Are you sure to delete {{ $d->id }} - {{ $d->name }} ? ');">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add New Type</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('hoteltype.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputType">Name of Type</label>
                        <input type="text" class="form-control" id="exampleInputType" name="type_name"
                            aria-describedby="nameHelp" placeholder="Enter Name of Type...">
                        <small id="nameHelp" class="form-text text-muted">Please write down the name of
                            type here.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>