@extends('layouts.conquer')

@section('content')
<form method="POST" action="{{ route('transaction.store') }}">
    @csrf
    <div class="form-group">
        <label>Customer</label>
        <input type="hidden" name='user' value={{Auth::user()->id}}>
        <select class="form-control" disabled>
            @foreach ($users as $u)
            <option @if(Auth::user()->id == $u->id) selected @endif value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    @php
    $subtotal = 0;
    @endphp
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody id="productTable">
            @if(session('cart'))
            @foreach (session('cart') as $item)
            <tr>
                <td>
                    {{$item['name']}}<input type="hidden" name='product[]' value="{{$item['id']}}">
                </td>
                <td>
                    <input type="text" name='quantity[]' value="{{$item['quantity']}}" readonly>
                </td>
                <td>
                    IDR <input type="text" name='subtotal[]' value="{{$item['quantity']* $item['price']}}" readonly>
                </td>
            </tr>
            @php
            $subtotal += $item['quantity']* $item['price'];
            @endphp
            @endforeach
            @php
            $pajak = 0.11 * $subtotal;
            $grandtotal = $subtotal + $pajak;
            @endphp
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td><b>Subtotal: IDR {{$subtotal}}</b></td>
            </tr>
            <tr>
                <td><b>Pajak: IDR {{$pajak}}</b></td>
            </tr>
            <tr>
                <td><b>Grand Total: IDR {{$grandtotal}}</b></td>
            </tr>
            @php
            $poin = Auth::user()->poin * 100000;
            $diskon = 0;
            $pointerpakai = 0;
            if($poin<$grandtotal){ $diskon=$poin; $pointerpakai=floor($poin/100000); } else{
                $tmp=floor($grandtotal/100000); $diskon=$tmp*100000; $pointerpakai=$tmp; } $grandtotal -=$diskon;
                @endphp <tr id='discount-row' style='display: none;'>
                <td><b>Discount: IDR {{ $diskon }}</b></td>
                </tr>
                <tr id='grandtotal-row' style='display: none;'>
                    <td><b>Grand Total After Discount: IDR {{$grandtotal}}</b></td>
                </tr>
        </tfoot>
    </table>

    <input type="hidden" name="pointerpakai" value="{{$pointerpakai}}">
    Your Points: {{ Auth::user()->poin }}
    <br>
    Apply?
    <select id="option" name="poin">
        <option value="no">NO</option>
        <option value="yes">YES</option>
    </select>
    <p></p>
    <br><br>
    <button type="submit" class="btn btn-primary">PAY</button>
</form>
<br>
<a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
@endsection

@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#option').on('change', function () {
            if ($(this).val() == 'yes') {
                $('#discount-row').show();
                $('#grandtotal-row').show();
            } else {
                $('#discount-row').hide();
                $('#grandtotal-row').hide();
            }
        });
    });
</script>
@endsection