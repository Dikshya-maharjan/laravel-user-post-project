<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;

class OrderController extends Controller
{
    //
    public function index(){
  $orders = Order::where('customer_id', 1)
                       ->with('customer')
                       ->get();

        return view('orders.index', compact('orders'));
        }
        public function create(){
            $customers=Customer::all();
            return view('orders.create',compact('customers'));
        }
        public function store(Request $request){
            Order::create([
            'customer_id' => $request->customer_id,
            'total' => $request->total
        ]);

        return redirect('/orders');
        }
}
