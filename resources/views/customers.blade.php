@extends('layout') 

@section('title','Customers List')

@section('content')
    <!-- heading -->
    <div class="row">
        <div class="col-12">
            <h1>Customers List</h1>
        </div>
    </div>
    <!-- form -->
    <div class="row pb-3">
        <div class="col-12">
            <form action="customers" method="POST">
                <div class="input-grp">
                    <div class="form-group">
                        <label for="name" class="pr-3 col-md-4 col-sm-12">*Name</label>
                        <input class="form-control col-md-8 col-sm-12" type="text" name="name" placeholder="Name" value="{{old('name')}}">
                        <div>
                        {{$errors->first('name')}}
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="email" class="pr-3 col-md-4 col-sm-12">*Email</label>
                        <input class="form-control col-md-8 col-sm-12" type="text" name="email" placeholder="username@domain.com" value="{{old('email')}}">
                        <div>
                        {{$errors->first('email')}}
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="phone_number" class="pr-3 col-md-4 col-sm-12">*Phone Number</label>
                        <input class="form-control col-md-8 col-sm-12" type="text" name="phone_number" placeholder="03202255225" value="{{old('phone_number')}}">
                        <div>
                        {{$errors->first('phone_number')}}
                        </div>
                    </div>

                    <div class="form-group ">
                    <label for="company_id" class="pr-3 col-md-4 col-sm-12">*Company</label>
                        <select name="company_id" id="company_id" class="form-control col-md-8 col-sm-12">
                            @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>  
                        {{-- <div>
                        {{$errors->first('company_id')}}
                        </div> --}} 
                    </div>

                    <div class="form-group ">
                    <label for="active" class="pr-3 col-md-4 col-sm-12">*Status</label>
                        <select name="active" id="active" class="form-control col-md-8 col-sm-12">
                            <option value="" disabled>Select Customer Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>  
                        {{-- <div>
                        {{$errors->first('active')}}
                        </div> --}} 
                    </div>

                    <button class="btn btn-primary " type="submit" >Add Customer</button>
                </div>

                @csrf {{--csrf is a security measure to check the form requesting is from our app--}}
            </form>
        </div>
    </div>
    
        <!-- Customers List  -->
    <div class="row">
        <div class="col-6">
            <h3>Active Customers</h3>
            <ul>
                @foreach($activeCustomers as $activeCustomer)
                    <li>{{$activeCustomer->name}} <span class="text-muted"> ( {{$activeCustomer->email}} ) ( {{$activeCustomer->company->name}} ) </span></li>
                @endforeach          
            </ul>
        </div>

        <div class="col-6">
            <h3>Inactive Customers</h3>
            <ul>
                @foreach($inActiveCustomers as $inActiveCustomer)
                    <li>{{$inActiveCustomer->name}} <span class="text-muted"> ( {{$inActiveCustomer->email}} ) ( {{$inActiveCustomer->company->name}} ) </span></li>
                @endforeach          
            </ul>
        </div>

        <div class="row">
            <div class="col-12">
            @foreach ($companies as $company)
                <h4>{{ $company->name }}</h4>
                <ul>
                    @foreach ($company->customers as $customer)
                    <li>{{ $customer->name }}</li>
                    @endforeach   
                </ul>
            @endforeach   
            </div>
        </div>
    </div>
      

@endsection