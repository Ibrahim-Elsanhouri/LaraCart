<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order; 
class UserController extends Controller
{
    
    public function get_profile(){
        $orders = Auth::user()->orders; 
        $orders->transform(function($order , $key){
            $order->cart = unserialize($order->cart); 
        return $order; 
        }); 
        return view('profile' , compact('orders')); 
    }
}
