<?php

namespace App;
use App\Customer;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /*fillable attributes are used to specify those fields which are to be mass assigned. Guarded attributes are used to specify those fields which are not mass assignable*/

    //guarded Example
    protected $guarded = [];

    protected $attributes = [
        'active' => 1
    ];

    /*Accessors and mutators allow you to format interject any call that we want and do something before either display or save in db.*/
    //Accessor Example
    public function getActiveAttribute($attribute){
        return $this->activeOptions()[$attribute];
    }

    public function scopeActive($query){
        return $query->where('active',1);
    }

    public function scopeInactive($query){
        return $query->where('active',0);
    }

     //defining relation between companpy and customers
     public function company(){
        return $this->belongsTo(Company::class);
    }

    public function activeOptions()
    {
        return [
            1=>'Active',
            0=>'Inactive',
        ];
    }
}

