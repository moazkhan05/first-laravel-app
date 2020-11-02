<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## My documentation and concepts
Laravel Tutorials

To define model and its migration file
	php artisan make:model <model name> -m
-m creates migration file for given model name
model name should be singular (I.e if we talk about customers it should be customer)

### for validation of fields in laravel
//adding validation layer
// laravel validation rules https://laravel.com/docs/master/validation#available-validation-rules
$data=request()->validate([
'name'=>'required | min:3',
'email'=>'required'
]);


### Schema defination
You have to define schema in ./database/migration/<table name>.php
public function up()
{
Schema::create('customers', function (Blueprint $table) {
$table->bigIncrements('id');
$table->string('name');
$table->string('email');
$table->timestamps();
});
}

### Migration
 After any changes in database you have to migrate it by using
 php artisan migrate

### Old Values
To get old values of form , if any field is unfilled
value="{{old('name')}}"


### Errors Display
To display form errors
{{$errors->first('email')}}


### Defining sections in laravel
method 1
	@section('title'.'Contact Us')

method 2
	@section('title')
	About Us
	@endsection

### mass assignment

controller.php
Customer::create($data); //mass assgining data


model.php
/*fillable attributes are used to specify those fields which are to be mass assigned. Guarded attributes are used to specify those fields which are not mass assignable*/

//Fillable Example
//protected $fillable = ['name','email','phone_number','active'];

//guarded Example
protected $guarded = [];


php artisan tinker
	it open shell scripting of php 


### Defining relation between two tables in laravel 5.8

write functions in both files with inverse logic

in ./app/company.php
//defining relation between companpy and customers
public function customers(){
return $this->hasMany(Customer::class);
}

in ./app/customer.php
//defining relation between companpy and customers
public function company(){
return $this->belongsTo(Company::class);
}

### Accessors
using accessors and mutators to display Active and inactive istead of  1 & 0
you can add multiple optopns
/*Accessors and mutators allow you to format interject any call that we want and do something before either display or save in db.*/
public function getActiveAttribute($attribute){
return[
0=>'Inactive',
1=>'Active',
][$attribute];
}


### MOdel Binding
#### Code Refactoring for Routes 
if you passed route as /customers/{customer}
and using $customer as show method parameter
then 
  you can change show function from
//function to display newly added customer
 public function show($customer){
     $customer = Customer::where('id',$customer)->firstOrFail();
      return view ('customers.show',compact('customer')); 
}

to 

// public function show($customer){
public function show(Customer $customer){
      return view ('customers.show',compact('customer')); 
}

this is known as routes model binding
Note: Your route and parameter name should be match for model route binding

##### Old data or Customer Data 
you can use old data or the data of customer’s as well
{{old('email') ?? $customer->email }}

Note the above method will failed on creation as there was no customer→email or we can say no customer object

to tackle this issue we can put check on every statement that if we have data or not 

2nd method is to pass empty customer object in create method 
$customer = new Customer();

as we have order that check for old and then customer so in case the form didn’t find old it will go for customer
else it will take customer data

### Route Resource 
you can write all routes in single line
this
Route::resource('photos', PhotoController::class);

instead of
Route::get ('customers','CustomersController@index'); //index page
Route::get ('customers/create','CustomersController@create'); //create 
Route::post ('customers','CustomersController@store'); //stores
Route::get ('customers/{customer}','CustomersController@show'); //show the customer's details
Route::get ('customers/{customer}/edit ','CustomersController@edit'); //display the edit form for customer
Route::put ('customers/{customer} ','CustomersController@update'); //upldates details and redirect to show page
Route::delete ('customers/{customer} ','CustomersController@destroy'); //deletes customer records but that should not be tha part in real life


### Make Controller for related class

This single route declaration creates multiple routes to handle a variety of actions on the resource. The generated controller will already have methods stubbed for each of these actions, including notes informing you of the HTTP verbs and URIs they handle.

php artisan make:controller TestController -r -m Customer
this will create controller and bind it with model 
it has all RESTful methods declaration already just define and use


### mailable to write mails 

make:mail use for creating mailables 
markdown creates template 
	usually in view directory but you can define by yourself as well

php artisan make:mail ContactFormMail –markdown=emails.contact.contact-form
	in this case mail template will be created in ./views/emails/contact/    as contact-form.blade.php

to send emails there are services like mail trap which shows an inbox for testing
but for deployments you can will use mailgun or related to send your mails

in your controller 
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
 import these
and in store method 
Mail::to('test@test.com')->send(new ContactFormMail());

mail to test@test.com and what you have to send “ContactFormMail”

no you have to setup mail in .env file
	MAIL_DRIVER=smtp
	MAIL_HOST=smtp.mailtrap.io
	MAIL_PORT=2525
	MAIL_USERNAME=null
	MAIL_PASSWORD=null
	MAIL_ENCRYPTION=null
setup account at mailtrap 
	move inside inboxes and then my inbox
 	click on settings in integration select which type of credentials you need
	and start working 

	