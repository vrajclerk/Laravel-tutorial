<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
       return view('customer');
    }
    public function store(Request $request){
        echo "<pre>";
        print_r($request->all());

        $customer=new customer;
        $customer->customer_name=$request['customer_name'];
        $customer->customer_email=$request['customer_email'];
        $customer->gender=$request['gender'];
        $customer->dob=$request['dob'];
        $customer->customer_address=$request['customer_address'];
        $customer->country=$request['country'];
        $customer->state=$request['state'];
        $customer->city=$request['city'];
        $customer->password=md5($request['password']); //for encoding
        $customer->save();
}
    
}