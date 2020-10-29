@extends('layouts.app') 

@section('title','Edit'.$customer->name)

@section('content')
    <!-- heading -->
    <div class="row">
        <div class="col-12">
            <h1>Edit Details</h1>
        </div>
    </div>
    <!-- form -->
    <div class="row pb-3">
        <div class="col-12">
            <form action="/customers/{{ $customer->id }}" method="POST">
                    @method('PUT')
                    @include('customers.form')
                <button class="btn btn-primary " type="submit" >Save Customer</button>
                
            </form>
        </div>
    </div>
    
    
      

@endsection