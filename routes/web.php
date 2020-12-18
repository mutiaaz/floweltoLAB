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

Route::get('/login', function () {
    return view('Login_Flowelto');
});

//Home
Route::get('/userhome', 'UsersController@index');
Route::get('/managerhome', 'ManagerController@index');
Route::get('/guesthome', 'GuestsController@index');

//Manage & View Flower & Categories
Route::get('/managerVF/{id}', 'ManagerController@categoriesCheck')->name('managerVF');
Route::get('/userVF/{id}', 'UsersController@categoriesCheck');
Route::get('/guestVF/{id}', 'GuestsController@categoriesCheck');
Route::get('/flowerDetail/{id}','UsersController@detailPage');
Route::get('/mflowerDetail/{id}','ManagerController@detailPage');
Route::get('/gflowerDetail/{id}','GuestsController@detailPage');
Route::get('/manageCategories','ManagerController@manageCategory');

//delete flower & category
Route::get('/deleteFlower/{id}','ManagerController@destroy');
Route::get('/deleteCategory/{id}','ManagerController@deleteCategory');

//update flowers & categories
Route::get('/updateFlower/{id}','ManagerController@updateFlower');
Route::post('/saveUpdateFlower/{id}','ManagerController@saveUpdateFlower');
Route::get('/updateCategory/{id}','ManagerController@updateCategory');
Route::post('/saveUpdateCategory/{id}','ManagerController@saveUpdateCategory');

Route::get('/addFlower', function () {
    return view('Manager/AddFlower');
});
