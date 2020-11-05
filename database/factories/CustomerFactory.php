<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Company;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        //'company_id' => factory(Company::class)->create(),
        'company_id' => random_int(\DB::table('companies')->min('id'), \DB::table('companies')->max('id')),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'active' => 1       
    ];
});
