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


Route::get('/', 'IndexController@index')->name('index');
Route::get('/donate','IndexController@donate');
Route::get('/contactUs','IndexController@contact')->name('contact_us');

// about_us......
Route::get('/aboutus/who_we_are','AboutController@about_us');
Route::get('/aboutus','AboutController@about_us');

Route::get('/aboutus/team','AboutController@team');


//  Events.......
Route::get('/events','EventsController@index');


// our works.......

Route::get('/our_works/education','OurWorkController@education');
Route::get('/our_works/health','OurWorkController@health');
Route::get('/our_works/women_enpowerment','OurWorkController@women');

// Route::get('/home', function (){
//     return view('welcome');
// });

Auth::routes();




Route::post('/donating', 'DonateController@store')->name('donating');
Route::post('/paytm-callback','DonateController@paytmCallback');
Route::group(['middleware' => ['auth','Admin']], function () {
    
    Route::any('/dashboard', 'DashboardController@index')->name("dashboard");
    Route::get('/profiles','DashboardController@profiles');
    
    Route::get('/aboutusEdit','AboutEditWhoWeAreController@index');
    Route::post('/aboutSave','AboutEditWhoWeAreController@store')->name('aboutSave');
    
    Route::get('/aboutusEditTeam','AboutTeamEditController@index_1');
    Route::post('/slideData','AboutTeamEditController@store_slide_data')->name('SaveData');
    Route::post('/newDepartment','AboutTeamEditController@new_department_name')->name('SaveNewDeaprtment');

});