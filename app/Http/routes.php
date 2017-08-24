<?php
$api = app('Dingo\Api\Routing\Router');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/addUser', function () {
return view('addUser');
});





Route::get('/', function () {
return view('login');
});
Route::get('/dashboard', [
	    'as' => '/dashboard', 'uses' => 'InvoicController@getDashBoardCount'
]);

Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'Api\V1\UserController@importFileIntoDB'));
/*Route::get('/addCompanyProfile', function () {
return view('addProfile');
});*/
Route::get('/addCompanyProfile', [
	    'as' => '/addCompanyProfile', 'uses' => 'Api\V1\UserController@getCompanyProfile'
]);

/*Route::get('/create_invocie', function () {
return view('getUserForInvoice');
});
*/

Route::get('/create_invocie', [
	    'as' => '/', 'uses' => 'InvoicController@getCount'
]);

Route::get('viewCustomer', [
'as' => '/viewCustomer', 'uses' => 'Api\V1\UserController@viewCustomer'
]);

Route::get('/viewInvoice', [
'as' => '/', 'uses' => 'Api\V1\UserController@viewInvoice'
]);


Route::get('/invoice', [
	    'as' => '/', 'uses' => 'InvoicController@getCount'
]);

Route::get('pdfview/{id}',array('as'=>'pdfview','uses'=>'Api\V1\UserController@pdfview'));

Route::get('preview/{id}',array('as'=>'pdfview','uses'=>'Api\V1\UserController@preview'));

Route::get('edit/{id}',array('as'=>'/edit','uses'=>'Api\V1\UserController@edit'));

/*Route::get('mail/{id}',array('as'=>'/mail','uses'=>'Api\V1\UserController@mail'));*/
$api->version('v1', function ($api) {
	$api->get('mail/{id}','App\Http\Controllers\Api\V1\UserController@mail');
});

$api->version('v1', function ($api) {
	$api->get('previewInvoice/{id}','App\Http\Controllers\Api\V1\UserController@previewInvoice');
});

$api->version('v1', function ($api) {
	$api->post('login','App\Http\Controllers\Api\V1\UserController@login');
});

$api->version('v1', function ($api) {
	$api->post('insertInvoice','App\Http\Controllers\Api\V1\UserController@insertInvoice');
});

$api->version('v1', function ($api) {
	$api->post('addProfile','App\Http\Controllers\Api\V1\UserController@addProfile');
});

$api->version('v1', function ($api) {
	$api->post('updateProfile','App\Http\Controllers\Api\V1\UserController@updateProfile');
});

$api->version('v1', function ($api) {
	$api->post('addCustomer','App\Http\Controllers\Api\V1\UserController@addCustomer');
});

$api->version('v1', function ($api) {
	$api->post('editCustomer','App\Http\Controllers\Api\V1\UserController@editCustomer');
});



$api->version('v1', function ($api) {
	$api->get('pdfgen/{id}','App\Http\Controllers\Api\V1\UserController@pdfview');
});

$api->version('v1', function ($api) {
	$api->get('getCustomerById/{id}','App\Http\Controllers\Api\V1\UserController@getCustomerById');
});

$api->version('v1', function ($api) {
	$api->get('getCompanyDetails/{id}','App\Http\Controllers\Api\V1\UserController@getCompanyDetails');
});

$api->version('v1', function ($api) {
	$api->post('editInvoice','App\Http\Controllers\Api\V1\UserController@editInvoice');
});

$api->version('v1', function ($api) {
	$api->get('search/{data}','App\Http\Controllers\Api\V1\UserController@search');
});

