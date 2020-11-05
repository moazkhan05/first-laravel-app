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


# Learning Outcomes
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

##### hasMany & belogsTo -> manyToOne

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


### Model Binding


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

### Authentication / Auth
Laravel ships with several pre-built authentication controllers, which are located in the App\Http\Controllers\Auth namespace. The RegisterController handles new user registration, the LoginController handles authentication, the ForgotPasswordController handles e-mailing links for resetting passwords, and the ResetPasswordController contains the logic to reset passwords. Each of these controllers uses a trait to include their necessary methods. For many applications, you will not need to modify these controllers at all.

Routing

Laravel provides a quick way to scaffold all of the routes and views you need for authentication using one simple command:

php artisan make:auth

This command should be used on fresh applications and will install a layout view, registration and login views, as well as routes for all authentication end-points. A HomeController will also be generated to handle post-login requests to your application's dashboard.

### Custom Middleware 
you can ceate your own middlewares by
php artisan  make:migration [options] [--] <name>

your custom middleware will be located in \App\Http\Middleware directory

now to register your middleware you have to go \App\Http\Kernel.php file
where you define when your middleware work
1. to run during every request to your application.
2. to run on routes of your application.
3. assigned to groups or used individual on routes / controllers
4. prioritize your middlewares , which middleware should execute first


### Events & Listener
##### Events : Something happened. In laravel, Event classes are typically stored in the app/Events directory, while their li. 
##### Listener : Respond for the occurring event listeners are stored in app/Listeners

Laravel provides a convenient place to register all of your application's event listeners in App/Providers/EventServiceProvider.php
make:event
In EventServiceProvider.php you define what listeners should be called when a particular event occurred

##### How to define Events and Listeners manually:
php artisan make:event <event-name>
php artisan make:listener <event-name>

then map listeners with events in EventServiceProvider.php

###### manually creating the files for each event and listener is cumbersome. 
Instead, add listeners and events to your EventServiceProvider and 
#### use the event:generate command. 
This command will generate any events or listeners that are listed in your EventServiceProvider. Events and listeners that already exist will be left untouched

### Queues
Queues used 

### Model Factory
When testing, you may need to insert a few records into your database before executing your test. Instead of manually specifying the value of each column when you create this test data, Laravel allows you to define a default set of attributes for each of your Eloquent models using model factories.

To create a factory, use 
##### php artisan make:factory PostFactory --model=Post

use php artisan tinker to add fake data
factory(\App\Company::class)->create(); 
factory method use class path as an argument and call second method as create
we can pass second parameter in factory method as how many data we want to enter in.

### Seeders
A database seeder is comprised of all of the necessary code to generate a world's worth of data for our app. A table seeder is an individual seeder for a particular table. Learn all about both of us, in this lesson.

Seeders are used to generate data. You can use seeders in production as well but most common use  of seeders is to generate data for development purpose
Seeders allows you to use model factory methods to generate all data in one go. 

Alot of times, you have to delete all records and generate database again, because of migrations
In this scenario, Model Factories & DB seeders helps you to continue development.

###### How to create SEEDERS
php artisan make:seeder <tableNameSeeder>
example: php artisan make:seeder UsersTableSeeder

It will create UsersTableSeeders.php file in ~\database\seeds

go into that file and use factory method.

###### How to run SEEDERS
php artisan db:seed

now if you have relations in table.
How would you seed them?
Let's take an example
As every customer is associated with a company. So inside Customer Factory we will define 
  'company_id' => factory(Company::class)->create();
  this means : create a new company and assigned its id to customer company id.

//
factory(App\User::class, 50)->create()->each(function ($user) {
        $user->posts()->save(factory(App\Post::class)->make());
    });

we can add this line in DBseeder file , it will add 50 users in db and add post corresponding to every user
we can use saveMany() function as well but i think its good to define in factory Class intead of in seeder
//
somehow, we can define our customer class like this:

Here is how I made it to work: --> first seed the user table -->then query the user table for min and max User ID from within the faker setup (I do random assignment)

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'company_id' => random_int(\DB::table('companies')->min('id'), \DB::table('companies')->max('id')),
    ];
});  

### Telescope
Telescope is an elegant debug assistant for the Laravel framework. Telescope provides insight into the requests coming into your application, exceptions, log entries, database queries, queued jobs, mail, notifications, cache operations, scheduled tasks, variable dumps and more.
A way to find out what's going on behind the scene

Installation : composer require "laravel/telescope":"~1.0"

After installing Telescope, you should also run the migrate command:

php artisan telescope:install
php artisan migrate

It helps you to look into queries , requests , commands , logs , errors and more



