@extends('layout')

@section('title'.'Contact Us')
   

@section('content')
    <form action="/contact" method="POST">
        <div class="form-group">
            <label for="name" class="pr-3 col-md-4 col-sm-12">*Name</label>
            <input class="form-control col-md-8 col-sm-12" type="text" name="name" placeholder="Name" value="{{old('name')}}">
            <div>{{$errors->first('name')}}</div>
        </div>

        <div class="form-group ">
            <label for="email" class="pr-3 col-md-4 col-sm-12">*Email</label>
            <input class="form-control col-md-8 col-sm-12" type="text" name="email" placeholder="username@domain.com" value="{{old('email')}}">
            <div>{{$errors->first('email')}}</div>
        </div>

        <div class="form-group ">
            <label for="phone_number" class="pr-3 col-md-4 col-sm-12">*Phone Number</label>
            <input class="form-control col-md-8 col-sm-12" type="text" name="phone_number" placeholder="03202255225" value="{{old('phone_number')}}">
            <div>{{$errors->first('phone_number')}}</div>
        </div>

        <div class="form-group ">
            <label for="active" class="pr-3 col-md-4 col-sm-12">*Message</label>
            <textarea name="message" id="message" cols="5" rows="10" 
                class="form-control col-md-8 col-sm-12">{{old('message')}}</textarea>
            <div>{{$errors->first('message')}}</div>
        </div>

    @csrf 
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
@endsection