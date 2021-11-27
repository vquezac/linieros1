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

//PROYECTO
Route::resource('project', 'ProjectController')->middleware('auth'); // free for all
Route::get('projec/list', 'ProjectController@getProjects')->middleware('auth')->name('project.list'); //filtrar para jefe projecto (5), supervisor (2)

//MATERIAL
Route::resource('material', 'MaterialController')->middleware('auth'); //perfil 99

Route::resource('projectMaterial', 'ProjectMaterialController')->middleware('auth'); //perfil 4
Route::get('projectmaterial/list', 'ProjectMaterialController@getProjectMaterials')->middleware('auth')->name('projectmaterial.list'); //filtrar para jefe projecto (5), supervisor (2)
//CREW
Route::resource('crew', 'CrewController')->middleware('auth'); // perfil >2

//IMPUTACIONES
Route::resource('impugnation', 'CrewImpugnationController')->middleware('auth'); //perfil 1, 2
Route::resource('FuserImpugnation', 'FusionSplicerImpugnationController')->middleware('auth'); //perfil3
