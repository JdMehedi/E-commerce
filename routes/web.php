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

Route::group(['middleware' => 'customAuth'], function(){

//    userdetails    list with search

    Route::post('userDetails/search', 'UserController@listUserDetailsSearch');
    Route::get('userDetails/search', 'UserController@listUserDetailsSearch');




    Route::get('uDetails','UserController@listUserDetails');
    Route::get('userDetails/add','UserController@addUserDetails');
    Route::get('userDetails/edit','UserController@editUserDetails');
    Route::get('userDetails/delete','UserController@deleteUserDetails');
    Route::post('userDetails/save','UserController@saveUserDetails');



    //    Notice list Add, Edit, Delete

    Route::get('notices/add','NoticeController@addNotice');
    Route::get('notices/edit','NoticeController@editNotice');
    Route::get('notices/delete','NoticeController@deleteNotice');
    Route::post('notices/save','NoticeController@saveNotice');


//    userlist with search

    Route::post('users/search', 'UserController@listUserSearch');
    Route::get('users/search', 'UserController@listUserSearch');

});

//notice list

Route::get('notices','NoticeController@listNotice');

// profiles


Route::get('passwordChange','ProfileController@changePassword');
Route::post('passwordSave','ProfileController@savePassword');




Route::get('profileDisplay','ProfileController@displayProfile');
Route::get('particularProfile','ProfileController@displayParticularProfile');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
Auth::routes();

//Auth::routes(['register']);
//Auth::routes(['login']);

Route::post('studentLogin','StudentController@loginStudent');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('download-file-{id}','WelcomeController@downloadFile')->name('downLoadFile');
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
Route::get('user-Contact','UserContactController@index')->name('user.contact.index');
