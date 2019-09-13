<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
    	$orders = Order::all();
        if (Auth::user()->role == User::ROLE_ADMIN){
           return view('admin.orders.index', compact('orders'));
        }

    	return view('orders.index', compact('orders'));
    }

    public function store(Request $request){
        
        if (Auth::user()->role == User::ROLE_ADMIN){
            if (isset($request->orders['unLock']) && $request->orders['unLock'] != null) {
                foreach ($request->orders['unLock'] as $order_id) {
                    Order::where('id', $order_id)->update(['user_id' => null]);
                }
            }

            if (isset($request->orders['toLock']) && $request->orders['toLock'] != null) {
                foreach ($request->orders['toLock'] as $order_id) {
                    Order::where('id', $order_id)->update(['user_id' => Auth::user()->id]);
                }
            }

            return view('admin.orders.index', compact('orders'));
       
        }

    	if ($request->orders != null) {
    		foreach ($request->orders as $order_id) {
    			Order::where('id', $order_id)->update(['user_id' => Auth::user()->id]);
    		}
    		
    	}

    	$orders = Order::all();

    	return view('orders.index', compact('orders'));
    }
}
