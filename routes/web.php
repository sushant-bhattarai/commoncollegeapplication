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

// Route::group(['middleware' => 'adminMiddleware'], function () {
Auth::routes();
// });

// Route::post('logout','Auth\LoginController@logout')->middleware('logoutMiddleware');

Route::get('/admin/login', 'AdminLoginController@showAdminLoginForm');
Route::get('/admin/register', 'AdminRegisterController@showAdminRegisterForm');

Route::post('/admin/login', 'AdminLoginController@adminLogin');
Route::post('/admin/register', 'AdminRegisterController@createAdmin');


Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin.admin')->name('adminHome');
    // Auth::routes();
    
});


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/profile','ProfileController')->middleware('auth');

Route::resource('/college','CollegeForAdminController')->middleware('auth:admin');

Route::get('/search', 'CollegeForStudentController@showSearchForm');
Route::post('/search', 'CollegeForStudentController@handleSearch');
Route::get('/available/colleges', 'CollegeForStudentController@showCollegeToStudent');





