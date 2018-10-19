@extends('layouts.app')

@section('content')
<div class="container">
@if(!Session::has('cart'))
<div class="alert alert-primary">
there is no products in your cart
</div>
@else 
<table class="table">
<tr>
<th>Name</th>
<th>qty</th>
<th>Single Price</th>
<th>price</th>
<th>Reduce by 1 </th>
<th>Reduce All</th>
</tr>
@foreach($products as $product)
<tr> 
<td>{{ $product['item']['title'] }}</td>
<td>{{ $product['qty'] }}</td>
<td>{{ $product['item']['price'] }}</td>

<td>$ {{ $product['price'] }}</td>
<td><a class="btn btn-primary" href="{{ route('reduce' , $product['item']['id'])}}">Reduce by 1 </a></td>
<td><a class="btn btn-danger"   href="{{ route('remove' , $product['item']['id'])}}">Reduce All </a></td>


</tr> 
@endforeach
<tr>
<td colspan="5"> Total Price = $ {{ $totalPrice }}</td>
</tr>
</table>
</hr>
<a class="btn btn-success" href="/checkout">Checkout</a>
@endif
</div> 
@endsection
