<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function create(){
        $url=url("/customer/create");
        $title="Customer Registration";
        $data=compact('url','title');
       return view('customer')->with($data);
    }
    public function store(Request $request){
        echo "<pre>";
        print_r($request->all());
        echo "</pre>";

        //Insert Query
        $customer=new Customer;
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
        $customer=Customer::all();
        // echo "<pre>"; //to view formate array
        // print_r($customers->toArray());
        // die;

        $data=compact('customer');
        return view('customer-view')->with($data);

    }
    public function delete($id){

        $customer=Customer::find($id);
        //if data is not null then this function will execute
        if(!is_null($customer)){
        $customer->delete();}
        return redirect('customer');
    }
    public function restore($id){

        $customer=Customer::withTrashed()->find($id);
        //if data is not null then this function will execute
        if(!is_null($customer)){
        $customer->restore();
    }
        return redirect('customer');
    }
    public function forceDelete($id){

        $customer=Customer::withTrashed()->find($id);
        //if data is not null then this function will execute
        if(!is_null($customer)){
        $customer->forceDelete();
    }
        return redirect()->back();
    }
    public function edit($id){
        $customer=Customer::find($id);
        if(is_null($customer)){
       
        return redirect('customer');
        }else{
            $url=url("/customer/update")."/". $id;
            $title="Update Customer";
            $data=compact('customer','url','title');
            return view('customer')->with($data);
        }
    } 
    public function update(Request $request,$id){

        // p($request->all());
        // die;
        $customer=Customer::find($id);
        
        $customer->customer_name=$request['customer_name'];
        $customer->customer_email=$request['customer_email'];
        $customer->gender=$request['gender'];
        $customer->dob=$request['dob'];
        $customer->customer_address=$request['customer_address'];
        $customer->country=$request['country'];
        $customer->state=$request['state'];
        $customer->city=$request['city'];
        $customer->save();
        
        return redirect('customer');
    }
    public function trash(){
        $customer=Customer::onlyTrashed()->get();
        $data=compact('customer');
        return view('customer-trash')->with($data);
    }
}

