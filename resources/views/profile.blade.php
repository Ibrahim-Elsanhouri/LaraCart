@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
<h3>My Orders</h3>
        <table class="table">
        <tr>
            <th>Order ID </th>
            <th>Products</th>
          

            </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id}}</td>
            <td>
            <table class="table">
                @foreach($order->cart->items as $item)
                <tr>
                <td>{{ $item['price']}} </td>
               <td>                {{$item['item']['title']}}
</td>
                                    <td>{{ $item['qty']}} </td>

                    
                     </tr>
                @endforeach
                
                <tr>
                <td colspan="2">Total Price {{ $order->cart->totalPrice}}</td>
                </tr>
                </table>
            </td>
            </tr>
            @endforeach
        </table>
        </div>
            
       
    
  
        
    </div>

@endsection
