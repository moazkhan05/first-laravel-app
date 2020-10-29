@extends('layouts.app') 

@section('title','Add New Customer')

@section('content')
    <!-- heading -->
    <div class="row">
        <div class="col-12">
            <h1>Add Customer</h1>
        </div>
    </div>
    <!-- form -->
    <div class="row pb-3">
        <div class="col-12">
            <form action="/customers" method="POST">
                    @include('customers.form')
                <button class="btn btn-primary " type="submit" >Add Customer</button>
                
            </form>
        </div>
    </div>
    
    
      

@endsection