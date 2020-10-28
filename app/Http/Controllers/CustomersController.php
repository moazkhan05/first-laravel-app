<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

class CustomersController extends Controller
{
    //function to show customerslist (directing to index)
    public function index(){
        // $activeCustomers=Customer::active()->get();
        // $inActiveCustomers=Customer::inactive()->get();
        // $companies=Company::all();
        $customers=Customer::all(); 
        return view('customers.index',compact('customers'));
    }
 
    //function to create customer
    public function create(){
        $companies=Company::all();
        return view('customers.create',compact('companies'));
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
        Customer::create($data); //mass assgining data
        return redirect('customers');
    }

    //function to display newly added customer
    // public function show($customer){
    //     $customer = Customer::where('id',$customer)->firstOrFail();
    public function show(Customer $customer){
        return view ('customers.show',compact('customer'));        
    }
}
