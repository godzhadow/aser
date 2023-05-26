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

Route::get('/', 'WelcomeController@index');
Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

// preregister
Route::get('/preregister','PreregisterController@index');

// our program
Route::get('/program', function () {
    return view('ourprogram');
});
// about us
Route::get('/about', function () {
    return view('about');
});
// our schedule
Route::get('/schedule', function () {
    return view('ourschedule');
});

// admin page
Route::group(['middleware' => ['App\Http\Middleware\AdminMiddleware']], function()
{
    // Route::get('/admin', function () {
    //     return view('layouts.admin.index');
    // });

    // for testing route group admin later
    Route::group(
        [
            'namespace' => 'admin',
            // 'prefix' => 'v1',
        ], function(){

            Route::get('/admin/dashboard', ['uses'=>'AdminController@index']);

            // tab user
            Route::get('/admin/dashboard/user', ['uses'=>'UserController@index']);
            Route::post('/admin/users/store',['uses'=>'UserController@store']);
            Route::post('/admin/edituser',['uses'=>'UserController@update_user']);
            Route::get('/admin/deleteuser/{id}',['uses'=>'UserController@delete_user']);

            // tab paper
            Route::get('/admin/dashboard/paper', ['uses'=>'PaperController@index']);
            Route::post('/admin/validation',['uses'=>'PaperController@validation']);

            // tab webinar
            Route::get('/admin/dashboard/webinar', ['uses'=>'WebinarController@index']);
            Route::post('/admin/webinar/store',['uses'=>'WebinarController@store']);
            Route::post('/admin/editwebinar',['uses'=>'WebinarController@update_webinar']);
            Route::get('/admin/deletewebinar/{id}',['uses'=>'WebinarController@delete_webinar']);

            // send message
            Route::get('/admin/dashboard/message',['uses'=>'MessageController@index']);
            Route::post('/admin/sendmessage',['uses'=>'MessageController@send_message']);

    });
});

// full paper page
Route::group(['middleware' => ['App\Http\Middleware\FullPaperMiddleware']], function()
{
    Route::group(
        [
            'namespace' => 'fullpaper',
            // 'prefix' => 'v1',
        ], function(){
            Route::get('/fullpaper/dashboard/', ['uses'=>'FullpaperController@index']);
            Route::post('fullpaper/updateprofile', ['uses'=>'FullpaperController@update_profile']);

            // tab team
            Route::get('/fullpaper/dashboard/team', ['uses'=>'TeamController@index']);
            Route::post('/fullpaper/addteam',['uses'=>'TeamController@addteam']);
            Route::post('/fullpaper/updateteam',['uses'=>'TeamController@updateteam']);
            Route::get('/fullpaper/deleteteam/{id}',['uses'=>'TeamController@deleteteam']);

            // tab abstract
            Route::get('/fullpaper/dashboard/paper',['uses'=>'PaperController@index']);
            Route::post('/fullpaper/abstract',['uses'=>'PaperController@add_abstract']);
            Route::post('/fullpaper/editabstract',['uses'=>'PaperController@edit_abstract']);
            Route::post('/fullpaper/fullpaper',['uses'=>'PaperController@add_fullpaper']);
            Route::post('/fullpaper/ppt',['uses'=>'PaperController@add_ppt']);
            Route::post('/fullpaper/payment',['uses'=>'PaperController@add_payment']);

            // tab webinar
            Route::get('/fullpaper/dashboard/webinar',['uses'=>'WebinarController@index']);

            // tab message
            Route::get('/fullpaper/dashboard/message',['uses'=>'MessageController@index']);

    });
    // Route::get('/fullpaper/dashboard', 'PaperController@index');
    // Route::post('fullpaper/updateprofile', 'PaperController@update_profile');
    // Route::post('/fullpaper/addteam', 'PaperController@addteam');

    // Route::post('/fullpaper/updateteam','PaperController@updateteam');
    // Route::get('/fullpaper/deleteteam/{id}','PaperController@deleteteam');

    // Route::post('/fullpaper/abstract','PaperController@add_abstract');
    // Route::post('/fullpaper/editabstract','PaperController@edit_abstract');
    // Route::post('/fullpaper/fullpaper','PaperController@add_fullpaper');
    // Route::post('/fullpaper/ppt','PaperController@add_ppt');
    // Route::post('/fullpaper/payment','PaperController@add_payment');
});
