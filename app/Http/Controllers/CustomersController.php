<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    //function to show list of customers
    public function list(){
        // $customers=Customer::all();
        // return view('customers',compact('customers'));

        $activeCustomers=Customer::active()->get();
        $inActiveCustomers=Customer::in active()->get();
        return view('customers',compact('activeCustomers','inActiveCustomers'));
    }

    //function to store customer's record in database
    public function store(){
        //adding validation layer
        // laravel validation rules https://laravel.com/docs/master/validation#available-validation-rules
        $data=request()->validate([
            'name'=>'required | min:3',
            'email'=>'required | email',
            'phone_number'=>'required | numeric | min:11 ',
            'active'=>'required '
        ]);
        
        //validation layer end
        $customer = new Customer();
        $customer->name=request('name');
        $customer->email=request('email');
        $customer->phone_number=request('phone_number');
        $customer->active=request('active');
        $customer->save();
        return back();
    }
}
