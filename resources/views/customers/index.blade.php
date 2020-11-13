@extends('layouts.app') 

@section('title','Customers List')

@section('content')
    <!-- heading -->

    <div class="row">
        <div class="col-12">
            <h1>Customers List</h1>
        </div>
    </div>

    @can('create',App\Customer::class)
        <div class="row">
            <div class="col-12">
                <p><a href="/customers/create">Add Customer</a></p>
            </div>
        </div>
    @endcan
        <!-- Customers List  -->
    @foreach( $customers as $customer )
        <div class="row">
            <div class="col-2">{{ $customer->id }}</div>
            <div class="col-4">
                <a href="/customers/{{$customer->id}}">{{ $customer->name }}</a>
            </div>
            <div class="col-4">{{ $customer->company->name }}</div>
            <div class="col-2">{{ $customer->active }}</div>
        </div>
    @endforeach      

        <div class="row">
            <div class="col-12 text-center">
            {{ $customers->links() }}
            </div>
        </div>

@endsection