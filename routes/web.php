<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
   return view('auth.login');
});


//Documents

Route::group(['prefix' => 'document'], function () {
    Route::get('/list','DocumentController@listDocument')->name('document.list');
    Route::get('/create','DocumentController@createDocument')->name('document.create');
    Route::post('/store','DocumentController@storeDocument')->name('document.store');
    Route::get('/delete','DocumentController@deleteDocument')->name('document.delete');
    Route::get('downLoadFile/{id}','DocumentController@documentDownloadFile')->name('document.downLoadFile');
});

//Roles
Route::group(['prefix' => ''], function () {
    Route::resource('roles', 'RolesController');
});


Route::get('/adminUser', 'SharingController@displayWelcomeUser')->name('adminUser');

Route::get('logout','LogoutController@displayLogout');

//users
Route::get('users','UserController@listUser')->name('userlist');
Route::get('users/add','UserController@addUser')->name('adduser');
Route::get('users/edit','UserController@editUser')->name('user.edit');
Route::get('users/delete','UserController@deleteUser')->name('user.delete');
Route::post('users/save','UserController@saveUser')->name('user.save');


// orderLog List

Route::get('orderLog','OrderLogController@orderLog')->name('orderLog');

// profiles


Route::get('passwordChange','ProfileController@changePassword');
Route::post('passwordSave','ProfileController@savePassword');




Route::get('profileDisplay','ProfileController@displayProfile');
Route::post('profileUpdate','ProfileController@profileUpdate');
Route::get('particularProfile','ProfileController@displayParticularProfile');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
Auth::routes();

//Auth::routes(['register']);
//Auth::routes(['login']);


Route::get('/home', 'HomeController@index')->name('home');

//shipper
Route::get('shipper/create','ShippersController@create')->name('shipper.create');
Route::post('shipper/store','ShippersController@store')->name('shipper.store');
Route::get('shippers','ShippersController@index')->name('shipper.index');
Route::get('shipper/edit/{slug}','ShippersController@edit')->name('shipper.edit');
Route::post('shipper/update','ShippersController@update')->name('shipper.update');
Route::get('shipper/delete/{slug}','ShippersController@destroy')->name('shipper.destroy');
Route::get('shipper/show/{slug}','ShippersController@show')->name('shipper.show');


//shipper contact
Route::get('userContact/create/{slug}','UserContactController@create')->name('user.contact.create');
Route::post('userContact/store','UserContactController@store')->name('user.contact.store');
Route::get('userContact/edit/{slug}','UserContactController@edit')->name('user.contact.edit');
Route::post('userContact/update','UserContactController@update')->name('user.contact.update');
Route::get('userContact/delete/{slug}','UserContactController@destroy')->name('user.contact.destroy');

//consignee
Route::get('consignee/create','ConsigneeController@create')->name('consignee.create');
Route::post('consignee/store','ConsigneeController@store')->name('consignee.store');
Route::get('consignees','ConsigneeController@index')->name('consignee.index');
Route::get('consignee/edit/{slug}','ConsigneeController@edit')->name('consignee.edit');
Route::post('consignee/update','ConsigneeController@update')->name('consignee.update');
Route::get('consignee/delete/{slug}','ConsigneeController@destroy')->name('consignee.destroy');
Route::get('consignee/show/{slug}','ConsigneeController@show')->name('consignee.show');

//consignee contact
Route::get('consigneeContact/create/{slug}','ConsigneeContactController@create')->name('consignee.contact.create');
Route::post('consigneeContact/store','ConsigneeContactController@store')->name('consignee.contact.store');
Route::get('consigneeContact/edit/{slug}','ConsigneeContactController@edit')->name('consignee.contact.edit');
Route::post('consigneeContact/update','ConsigneeContactController@update')->name('consignee.contact.update');
Route::get('consigneeContact/delete/{slug}','ConsigneeContactController@destroy')->name('consignee.contact.destroy');
