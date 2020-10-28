    <div class="form-group">
        <label for="name" class="pr-3 col-md-4 col-sm-12">*Name</label>
        <input class="form-control col-md-8 col-sm-12" type="text" name="name" placeholder="Name" value="{{old('name') ?? $customer->name }}">
        <div>
        {{$errors->first('name')}}
        </div>
    </div>

    <div class="form-group ">
        <label for="email" class="pr-3 col-md-4 col-sm-12">*Email</label>
        <input class="form-control col-md-8 col-sm-12" type="text" name="email" placeholder="username@domain.com" value="{{old('email') ?? $customer->email }}">
        <div>
        {{$errors->first('email')}}
        </div>
    </div>

    <div class="form-group ">
        <label for="phone_number" class="pr-3 col-md-4 col-sm-12">*Phone Number</label>
        <input class="form-control col-md-8 col-sm-12" type="text" name="phone_number" placeholder="03202255225" value="{{old('phone_number') ?? $customer->phone_number }}">
        <div>
        {{$errors->first('phone_number')}}
        </div>
    </div>

    <div class="form-group ">
    <label for="company_id" class="pr-3 col-md-4 col-sm-12">*Company</label>
        <select name="company_id" id="company_id" class="form-control col-md-8 col-sm-12">
            @foreach($companies as $company)
               <option value="{{ $company->id }}" {{ $company->id == $customer->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
            @endforeach
        </select>  
        {{-- <div>
        {{$errors->first('company_id')}}
        </div> --}} 
    </div>

    <div class="form-group ">
    <label for="active" class="pr-3 col-md-4 col-sm-12">*Status</label>
        <select name="active" id="active" class="form-control col-md-8 col-sm-12">
            @foreach ($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
              <option value="{{ $activeOptionKey }}" {{ $customer->active == $activeOptionValue ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
            @endforeach
        </select>  
        {{-- <div>
        {{$errors->first('active')}}
        </div> --}} 
    </div>
    @csrf {{--csrf is a security measure to check the form requesting is from our app--}}