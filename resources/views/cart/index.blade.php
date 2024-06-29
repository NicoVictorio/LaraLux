@extends('layouts.conquer')

@section('content')
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        @php
                        $subtotal = 0;
                        $pajak = 0;
                        $grandtotal = 0;
                        @endphp
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @if(session('cart'))
                                @foreach (session('cart') as $item)
                                <tr>
                                    <td>
                                        <div class="img">
                                            @if ($item['photo'] == NULL)
                                            <a href="#"><img src="{{asset('img/blank.jpg') }}" alt="Image"></a>
                                            @else
                                            <a href="#"><img
                                                    src="{{asset('img/product/'.$item['id'].'/'.$item['photo'])}}"
                                                    width="50%" height="50%" alt="Image"></a>
                                            @endif
                                            <p>{{$item['name']}}</p>
                                        </div>
                                    </td>
                                    <td>{{'IDR '.$item['price']}}</td>
                                    <td>
                                        <div class="qty">
                                            <button onclick="redQty({{$item['id']}})" class="btn-minus"><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="text" value="{{ $item['quantity'] }}">
                                            <button onclick="addQty({{$item['id']}})" class="btn-plus"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>{{ 'IDR '.$item['quantity']* $item['price'] }}</td>
                                    <td><a class="btn btn-danger" href="{{route('delFromCart', $item['id'])}}"><i
                                                class="fa fa-trash"></i>Delete</a></td>
                                </tr>
                                @php
                                $subtotal += $item['quantity']* $item['price'];
                                @endphp
                                @endforeach
                                @php
                                $pajak = 0.11 * $subtotal;
                                $grandtotal = $subtotal + $pajak;
                                @endphp
                                @else
                                <tr>
                                    <td colspan="5">
                                        <p>Tidak ada item di cart.</p>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Sub Total <span>IDR {{$subtotal}}</span></p>
                                    <p>Pajak <span>IDR {{$pajak}}</span></p>
                                    <h2>Grand Total <span>IDR {{$grandtotal}}</span></h2>
                                </div>
                                <div class="cart-btn">
                                    <a href="{{ route('transaction.create') }}" class="btn btn-info">Check Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    function redQty(id)
    {
        $.ajax({
        type:'POST',
        url:'{{route("redQty")}}',
        data: {
            '_token' : '<?php echo csrf_token() ?>',
            'id': id
        },
        success: function(data){
            location.reload();
        }
        });
    }

    function addQty(id)
    {
        $.ajax({
        type:'POST',
        url:'{{route("addQty")}}',
        data: {
            '_token' : '<?php echo csrf_token() ?>',
            'id': id
        },
        success: function(data){
            location.reload();
        }
        });
    }
</script>
@endsection