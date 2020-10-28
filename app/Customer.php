<?php

namespace App;
use App\Customer;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /*fillable attributes are used to specify those fields which are to be mass assigned. Guarded attributes are used to specify those fields which are not mass assignable*/

    //Fillable Example
    //protected $fillable = ['name','email','phone_number','active'];

   
    //guarded Example
    protected $guarded = [];

    public function scopeActive($query){
        return $query->where('active',1);
    }

    public function scopeInactive($query){
        return $query->where('active',0);
    }
}

