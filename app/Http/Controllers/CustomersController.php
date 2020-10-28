<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

class CustomersController extends Controller
{
    //function to show customerslist (directing to index)
    public function index(){
        $customers=Customer::all(); 
        return view('customers.index',compact('customers'));
    }
 
    //function to create customer
    public function create(){
        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create',compact('companies','customer'));
    }

    //function to store customer's record in database
    public function store(){  
        Customer::create($this->validateRequest()); //mass assgining data
        return redirect('customers');
    }

    //function to display newly added customer
    public function show(Customer $customer){
        return view ('customers.show',compact('customer'));        
    }

    public function edit(Customer $customer){
        $companies = Company::all();
        return view('customers.edit',compact('customer','companies'));
    }
    public function update(Customer $customer){
        $customer->update($this->validateRequest());
        return redirect('customers/' .$customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
       return redirect ('customers');
    }

    //validation method
    public function validateRequest()
    {
        //adding validation layer
        return request()->validate([
            'company_id'=>'required',
            'name'=>'required | min:3',
            'email'=>'required | email',
            'phone_number'=>'required | numeric',
            'active'=>'required '
            ]);  
    }
}
