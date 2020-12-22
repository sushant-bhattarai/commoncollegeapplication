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
Route::view('/adminHome', 'adminHome')->name('adminHome')->middleware('auth','studentMiddleware');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/profile','ProfileController');

Route::resource('/college','CollegeForAdminController');

Route::get('/search', 'CollegeForStudentController@showSearchForm');
Route::post('/search', 'CollegeForStudentController@handleSearch');
Route::get('/available/colleges', 'CollegeForStudentController@showCollegeToStudent');
Route::get('/college/{college_id}/info', 'CollegeForStudentController@showCollegeInfo');
Route::post('/college/{college_id}/add/{profile_id}', 'CollegeForStudentController@addCollege');
Route::post('/college/{college_id}/delete/{profile_id}', 'CollegeForStudentController@deleteFromMyCollege');
Route::post('/college/{college_id}/apply/{profile_id}', 'CollegeForStudentController@applyCollege');
Route::get('/college/my/{profile_id}', 'CollegeForStudentController@showMyColleges')->name('myCollege');



