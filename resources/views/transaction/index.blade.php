@extends('layouts.conquer')

@section('content')
@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="container">
    <h1>Daftar Transaksi</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Lihat Detail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->user->name }}</td>
                <td>{{ $d->created_at }}</td>
                <td>{{ $d->updated_at }}</td>
                <td><a href="#myModal" class="btn btn-default" data-toggle="modal"
                        onclick="getDetailData({{ $d->id }});">Lihat Rincian</a></td>
                <td><a href="{{ route('transaction.edit', $d->id) }}" class="btn btn-warning"">Edit</a></td>
                <td><form method=" POST" action="{{ route('transaction.destroy', $d->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger"
                            onclick="return confirm('Are you sure want to delete this transaction? ');">
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content" id="msg"></div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function getDetailData(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("transaction.showAjax")}}',
            data: '_token=<?php echo csrf_token() ?> &id='+id,
            success: function (data) {
                $('#msg').html(data.msg);
            }
        });
    }
</script>
@endsection