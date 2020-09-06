<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'HomeController@index')->name('home');

Route::get('/role','RoleController@index');

Route::get('/user','UserController@index');

Route::get('/expensecategory','ExpenseCategoryController@index');

//-----------------------------Sample Permission----------------------------------//

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::match(['get', 'post'], '/user', 'UserController@index');
    Route::match(['get', 'post'], '/role', 'RoleController@index');

});

//----------------------------------CRUD USER-------------------------------------//
//--CREATE a user--//
Route::post('/users','UserController@adduser');
//--EDIT a user--//
Route::get('/users/{user_id?}','UserController@edituser');
//--UPDATE a user--//
Route::put('/users/{user_id?}', 'UserController@updateuser');
//--DELETE a user--//
Route::delete('/users/{user_id?}', 'UserController@deleteuser');
Route::get('/users-role','UserController@getusersrole');
//--populate select role in user view --//
Route::get('/getrole', 'RoleController@getrole');

//----------------------------------CRUD ROLE-------------------------------------//
//--CREATE a role--//
Route::post('/roles','RoleController@addrole');
//--EDIT a role--//
Route::get('/roles/{role_id?}','RoleController@editrole');
//--UPDATE a role--//
Route::put('/roles/{role_id?}', 'RoleController@updaterole');
//--DELETE a role--//
Route::delete('/roles/{role_id?}', 'RoleController@deleterole');

/* //---------------------------CRUD EXPENSE CATEGORIES-------------------------------------//
//--CREATE a role--//
Route::post('/expensecategories','ExpenseCategoryController@addexpensecategory');
//--EDIT a role--//
Route::get('/expensecategories/{expensecategory_id?}','ExpenseCategoryController@editexpensecategory');
//--UPDATE a role--//
Route::put('/expensecategories/{expensecategory_id?}', 'ExpenseCategoryController@updateexpensecategory');
//--DELETE a role--//
Route::delete('/expensecategories/{expensecategory_id?}', 'ExpenseCategoryController@deleteexpensecategory');
 */

//- Bug??? If the user deleted accidentally deleted the lines under. -//
//---------- User cannot login after logout ------//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
