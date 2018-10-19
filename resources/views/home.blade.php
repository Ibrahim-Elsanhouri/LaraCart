@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="thumbnail">
           <img src="" alt=""/>
            <div class="caption">
            <h3>{{ $product->title}}</h3>
            <p>
               {{$product->details}}
                </p>
                <div class="clearfix">
                <a href="{{ route('addtocart' , $product->id)}}" class="btn btn-primary">{{ $product->price }}</a>
                </div>
            </div>
            @endforeach 
        </div>
            
       
    
  
        
    </div>
</div>
@endsection
