<?php

use App\College;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Auth;

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
Route::view('/adminHome', 'adminHome')->name('adminHome')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/profile','ProfileController')->middleware('auth');

Route::resource('/college','CollegeForAdminController')->middleware('auth');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/search', 'CollegeForStudentController@showSearchForm');
    Route::post('/search', 'CollegeForStudentController@handleSearch');
    Route::get('/available/colleges', 'CollegeForStudentController@showCollegeToStudent');
    Route::get('/college/{college_id}/info', 'CollegeForStudentController@showCollegeInfo');

});




