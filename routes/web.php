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

Auth::routes();
Route::get('/','HomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'UserProfileController@index')->name('profile');
Route::put('/profile', 'UserProfileController@update')->name('profile.update');
Route::get('/about', function () { return view('about');})->name('about');
Route::resource('project', 'ProjectController');
route::get('/project/new', 'ProjectController@new')->name('project.new');
//Route::resource('material', 'MaterialController');
//Route::resource('crew', 'CrewController');


