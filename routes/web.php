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
// Auth
Route::get('/', 'AuthController@showLoginForm')->name("login");
Route::post('/', 'AuthController@login');
Route::get('/logout', 'AuthController@logout')->name('logout');


// Panel
Route::group(["middleware"=>"CheckAuthenticatedUser"], function ()
{
    //Route::get('/profileAdminWeb','UserAdminController@showProfileAdminWeb')->name("user-profile");
    Route::get("/panel", function() {
        return view("panel_task.panel");
    });
});