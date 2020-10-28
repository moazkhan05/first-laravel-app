<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

class CustomersController extends Controller
{
    //function to show list of customers
    public function list(){
        $activeCustomers=Customer::active()->get();
        $inActiveCustomers=Customer::inactive()->get();
        $companies=Company::all();
        return view('customers',compact('activeCustomers','inActiveCustomers','companies'));
    }

    //function to store customer's record in database
    public function store(){
        //adding validation layer
        // laravel validation rules https://laravel.com/docs/master/validation#available-validation-rules
        
        $data=request()->validate([
            'company_id'=>'required',
            'name'=>'required | min:3',
            'email'=>'required | email',
            'phone_number'=>'required | numeric',
            'active'=>'required '
        ]);
        
       
        //validation layer end
        Customer::create($data); //mass assgining data
        return back();
    }
}
