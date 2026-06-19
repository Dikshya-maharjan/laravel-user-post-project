<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; 


class CustomerController extends Controller
{
    //
    public function create(){
        return view('customer.create');
    }
    public function store(Request $request){
        Customer::create([
            'name'=>$request->name,
            "email"=>$request->email
        ]);
    }
}
