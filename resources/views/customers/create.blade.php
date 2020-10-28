@extends('layout') 

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
    
    
      

@endsection