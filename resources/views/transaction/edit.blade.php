@extends('layouts.conquer')

@section('content') 
<form method="POST" action="{{ route('transaction.update', $data->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Customer</label>
        <select class="form-control" name="user">
            @foreach ($users as $u)
                <option @if ($data->user_id == $u->id) selected @endif value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody id="productTable">
            @foreach($dataProducts as $dp)
                <tr>
                    <td><select class="form-control product" name="product[]">
                            @foreach ($products as $p)
                                <option @if ($dp->id == $p->id) selected @endif value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select></td>
                    <td><input type="number" class="form-control quantity" name="quantity[]" value="{{ $dp->pivot->quantity }}"
                            placeholder="Enter number of room"></td>
                    <td><input type="number" class="form-control subtotal" name="subtotal[]" value="{{ $dp->pivot->subtotal }}" readonly></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-secondary" id="add">Add Product</button><br><br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
@endsection

@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#add").click(function () {
            $data = `<tr>
                        <td><select class="form-control product" name="product[]">
                            @foreach ($products as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select></td>
                        <td><input type="number" class="form-control quantity" name="quantity[]" placeholder="Enter number of room"></td>
                        <td><input type="number" class="form-control subtotal" name="subtotal[]" readonly></td>
                    </tr>`;
            $("#productTable").append($data);
        });

        function updateSubtotal(element) {
            var productId = element.closest('tr').find('.product').val();
            var quantity = element.closest('tr').find('.quantity').val();

            $.ajax({
                type: 'POST',
                url: '{{ route("getPrice") }}',
                data: {
                    '_token': '<?php echo csrf_token() ?>',
                    'id': productId,
                },
                success: function (response) {
                    element.closest('tr').find('.subtotal').val(response.price * quantity);
                }
            });
        }

        $(document).on('change', '.product', function () {
            updateSubtotal($(this));
        });

        $(document).on('input', '.quantity', function () {
            updateSubtotal($(this));
        });
    });
</script>
@endsection