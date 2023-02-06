<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function cart(){
        $orders = Order::where('user_id', '=', auth()->user()->id)->get();

        return view('cart', compact('orders'));
    }

    public function add_to_cart(Request $request){
        Order::create([
            'user_id' => $request->user_id,
            'item_id' => $request->item_id,
            'price' => $request->price
        ]);

        return redirect()->back()->with('success', 'Item added to cart successfully!');
    }

    public function delete_item_cart(Request $request){
        $cart = Order::find($request->order_id);
        $cart->delete();

        return redirect()->back();
    }

    public function checkout(){
        $orders = Order::where('user_id', '=', auth()->user()->id)->get();

        foreach($orders as $order){
            // Delete all products in cart
            $order->delete();
        }

        return view('checkout');
    }
}
