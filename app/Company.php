<?php

namespace App;
use App\Customer;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded =[];

    //defining relation between companpy and customers
    public function customers(){
        return $this->hasMany(Customer::class);
    }
}
