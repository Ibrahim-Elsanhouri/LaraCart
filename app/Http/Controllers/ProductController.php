<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session; 
use App\Cart; 
use App\Order; 
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all(); 
        return view('home' , compact('products'));
    }
    public function addtocart(Request $request , $id){
        $product = Product::find($id); 
        $oldCart = Session::has('cart') ? Session::get('cart') : null; 
        $cart = new Cart($oldCart);
        $cart->add($product , $product->id); 
        $request->session()->put('cart', $cart); 
        return redirect('/home')->with('msg' , 'Product has been added to your Shopping Cart'); 
    }
    public function getCart(){
        if(! Session::has('cart')){
            return view ('cart' , ['products' => null ]);
        }
        $oldCart = Session::get('cart'); 
        $cart = new Cart($oldCart); 
        return view ('cart' , ['products' => $cart->items , 'totalPrice' => $cart->totalPrice]); 
    }
    public function checkout(){
$cart = Session::get('cart'); 
$order = new Order();
$order->user_id = Auth::user()->id; 
$order->cart = serialize($cart);
$order->save(); 
Session::forget('cart'); 
return redirect('/home'); 
    }
    public function getReduceByOne($id){
                $oldCart = Session::has('cart') ? Session::get('cart') : null; 
        $cart = new Cart($oldCart);
$cart->reduceByone($id);
       if (count($cart->items) > 0){
                      Session::put('cart' , $cart); 

        }else{
          Session::forget('cart'); 
  
        }
                   
                return redirect('/shopcart'); 

    }
    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null; 
$cart = new Cart($oldCart);
        $cart->removeItem($id); 
        if (count($cart->items) > 0){
                      Session::put('cart' , $cart); 

        }else{
          Session::forget('cart'); 
  
        }
        return redirect('/shopcart'); 
    
}
}

    
    
    
    
    
    
    
    
    
    
    
    
    
    