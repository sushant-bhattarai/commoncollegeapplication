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

Route::resource('/college','CollegeController')->middleware('auth:admin');

Route::view('/search', 'college.search');
Route::post('/search', function(SearchRequest $request){
    $q = $request->input('q');
    // var_dump($q);
    if($q != ' '){
        $college = College::where('name','LIKE','%'.$q.'%')
                            ->orWhere('address','LIKE','%'.$q.'%')
                            ->get();
        if(count($college) > 0)
            return view('college.search')->withDetails($college)->withQuery ( $q );

        return view ('college.search')->withStatus('No colleges found. Try again!');
    }


});






