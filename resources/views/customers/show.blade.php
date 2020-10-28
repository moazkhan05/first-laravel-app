@extends('layout')

@section('title','Customer Details')

@section('content')
    <div class="rowe">
        <div class="col-12">
            <h1>Customer Details</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <h3>{{$customer->name}}</h3>
            <p><strong>Email: </strong>{{$customer->email}}</p>
            <p><strong>Phone Number: </strong>{{$customer->phone_number}}</p>
            <p><strong>Company: </strong>{{$customer->company->name}}</p>
            <p><strong>Active: </strong>{{$customer->active}}</p>
        </div>
    </div>
@endsection