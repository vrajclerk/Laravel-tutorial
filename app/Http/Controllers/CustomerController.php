<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function create(){
       return view('customer');
    }
    public function store(Request $request){
        echo "<pre>";
        print_r($request->all());

        //Insert Query
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

        return redirect('/customer');
}
    public function view(){
        $customers=Customer::all();
        // echo "<pre>"; //to view formate array
        // print_r($customers->toArray());
        // die;

        $data=compact('customers');
        return view('customer-view')->with($data);

    }
}